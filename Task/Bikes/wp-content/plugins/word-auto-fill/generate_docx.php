<?php

if (version_compare(phpversion(), '5.4.0', '<')) {
    if (session_id() == '') {
        session_start();
    }
} else {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function returnArray($extracted_fields, $rows, $template, $field_number_key, $field_number_value)
{
    $invalid_char = array(
        '&' => 'and',
        '>' => '',
        '<' => '',
        '"' => '',
        "'" => ''
    );
    $empty = array();
    foreach ($extracted_fields as $efs) {
        $inps = array();
        if (!empty($efs['inputs']) && ($efs['type'] != 'date' && $efs['type'] != 'time')) { //for sub fields
            foreach ($efs['inputs'] as $ef) {
                $flg = false;
                foreach ($rows as $row) {
                    if ($row[$field_number_key] == $ef['id']) {
                            $value_to_pass = strtr($row[$field_number_value], $invalid_char);
                            $template->setValue($ef['label'], $value_to_pass);
                            $inps[] = $row[$field_number_value];
                            $flg = true;
                            break;
                    }
                }
                if ($flg == false) {
                        $empty[] = $ef['label'];
                }
            }
            if ($efs['label'] == 'Address') {
                    //$value_to_pass = strtr($row['value'], $invalid_char);
                    $template->setValue($efs['label'], strtr(implode(', ', $inps), $invalid_char));
            } else {
                $template->setValue($efs['label'], strtr(implode(' ', $inps), $invalid_char));
            }
        } else { //for main fields
            $flg1 = false;
            if ($efs->type == 'list') {
                wdm_list_field_parse($efs, $rows, $template, $field_number_key, $field_number_value);
                $rows = wdm_list_parse($efs, $rows, $field_number_key, $field_number_value);
            }
            foreach ($rows as $row) {
                if ($efs->type == 'multiselect') {
                    $invalid_char_mul = array(
                        '\/' => '/'
                    );
                    $row[$field_number_value] = strtr($row[$field_number_value], $invalid_char_mul);
                }
                if ($row[$field_number_key] == $efs['id']) {
                    $value_to_pass = strtr($row[$field_number_value], $invalid_char);
                    if ($efs->type == 'number') {
                        $template->setValue($efs['label'], GFCommon::format_number($value_to_pass, $efs->numberFormat, '', true));
                    } else {
                        $template->setValue($efs['label'], $value_to_pass);
                    }
                    $flg1 = true;
                    break;
                }
            }
            if ($flg1 == false) {
                $empty[] = $efs['label'];
            }
        }
    }
        return $empty;
}
function wdm_list_field_parse($efs, $rows, $template, $field_number_key, $field_number_value)
{
    $invalid_char = array(
        '&' => 'and',
        '>' => '',
        '<' => '',
        '"' => '',
        "'" => ''
    );
    foreach ($rows as $row) {
        if ($row[$field_number_key] == $efs['id']) {
            if (!empty($efs['choices'])) {
                $list_field = unserialize($row[$field_number_value]);
                $count = 1;
                foreach ($list_field as $lists_no) {
                    foreach ($efs['choices'] as $column_name) {
                        if (!empty($lists_no[$column_name['value']])) {
                            $list_label = $efs['label']."-row[".$count."]-[".$column_name['value']."]";
                            $list_value = $lists_no[$column_name['value']];
                            $list_value = strtr($list_value, $invalid_char);
                            $template->setValue($list_label, $list_value);
                        } else {
                            $list_label = $efs['label']."-row[".$count."]-[".$column_name['value']."]";
                            $template->wdm_setValue_before($list_label, '');
                            $template->wdm_setValue_after($list_label, '');
                            $template->setValue($list_label, '');
                        }
                    }
                    $count++;
                }
                if ($efs['maxRows'] != '0' && $efs['maxRows'] > sizeof($list_field)) {
                    $extra_rows = sizeof($list_field);
                    while ($extra_rows < $efs['maxRows']) {
                        $extra_rows++;
                        foreach ($efs['choices'] as $column_name) {
                            $list_label = $efs['label']."-row[".$extra_rows."]-[".$column_name['value']."]";
                            $template->wdm_setValue_before($list_label, '');
                            $template->wdm_setValue_after($list_label, '');
                            $template->setValue($list_label, '');
                        }
                    }
                }
            }
        }
    }
}
function customize_date_value($extracted_fields, $rows, $field_number_key, $field_number_value)
{
    for ($k=0; $k < sizeof($extracted_fields); $k++) {
        if ($extracted_fields[$k]->type=='date') {
            for ($l=0; $l <sizeof($rows); $l++) {
                if ($rows[$l][$field_number_key]==$extracted_fields[$k]->id && !empty($rows[$l][$field_number_value])) {
                    $date = new DateTime($rows[$l][$field_number_value]);
                    switch ($extracted_fields[$k]->dateFormat) {
                        case 'mdy':
                            $rows[$l][$field_number_value] = $date->format('m/d/y');
                            break;
                        case 'dmy':
                            $rows[$l][$field_number_value] = $date->format('d/m/y');
                            break;
                        case 'ymd_slash':
                            $rows[$l][$field_number_value] = $date->format('y/m/d');
                            break;
                        case 'dmy_dash':
                            $rows[$l][$field_number_value] = $date->format('d-m-y');
                            break;
                        case 'dmy_dot':
                            $rows[$l][$field_number_value] = $date->format('d.m.y');
                            break;
                        case 'ymd_dot':
                            $rows[$l][$field_number_value] = $date->format('y.m.d');
                            break;
                    }
                }
            }
        }
    }
    return $rows;
}
function wdm_list_parse($efs, $rows, $field_number_key, $field_number_value)
{
    if ($efs->type=='list') {
        $column_data = '';
        for ($l=0; $l < sizeof($rows); $l++) {
            if ($rows[$l][$field_number_key]==$efs->id) {
                $list_data = unserialize($rows[$l][$field_number_value]);
                if (empty($efs->choices)) {
                    $table_show= '';
                    for ($m=0; $m < sizeof($list_data); $m++) {
                            $table_show .= $list_data[$m].', ';
                    }
                    $rows[$l][$field_number_value]= substr_replace($table_show, "", -2);
                } else {
                    $table_show = '';
                    for ($x=0; $x < sizeof($efs->choices); $x++) {
                        $column_data = '';
                        for ($m=0; $m < sizeof($list_data); $m++) {
                            $column_data .= $list_data[$m][$efs->choices[$x]['text']].', ';
                        }
                        $table_show .= $efs->choices[$x]['text']. ' ['. substr_replace($column_data, "", -2). '], ';
                        $table_show = str_replace(', ]', ',_]', $table_show);
                        $table_show = str_replace(', ,', ',_,', $table_show);
                        $table_show = str_replace('[,', '[_,', $table_show);
                    }
                    $rows[$l][$field_number_value] = substr_replace($table_show, "", -2);
                }
            }
        }
    }
    return $rows;
}

function generateDocxFile()
{
    global $wpdb;
    require_once 'PHPWord.php';
    $PHPWord = new PHPWord();
    $gravity_form = GFForms::$version;
    $form_id = $_POST['form_id'];
    $lead_id = $_POST['lead_id'];
    if (version_compare($gravity_form, '2.3', '<')) {
        $rg_lead_frm_detail = $wpdb->prefix.'rg_lead_detail';
        $rg_form_table = $wpdb->prefix.'rg_form';
        $rows = $wpdb->get_results($wpdb->prepare("SELECT field_number, value FROM $rg_lead_frm_detail WHERE lead_id=%d", $lead_id), ARRAY_A);
        $field_number_value = 'value';
        $field_number_key = 'field_number';
    } else {
        $rg_lead_frm_detail = $wpdb->prefix.'gf_entry_meta';
        $rg_form_table = $wpdb->prefix.'gf_form';
        $rows = $wpdb->get_results($wpdb->prepare("SELECT meta_key, meta_value FROM $rg_lead_frm_detail WHERE entry_id=%d", $lead_id), ARRAY_A);
        $field_number_value = 'meta_value';
        $field_number_key = 'meta_key';
    }
    $temp_map_tbl = $wpdb->prefix.'waf_template_mapping_data';
    $docx_template_table = $wpdb->prefix.'waf_docx_template_data';
    //SQL Queries For Mapping-------------------------------------------->
    $form_name = $wpdb->get_var($wpdb->prepare("SELECT title FROM  $rg_form_table where id =%d", $form_id));
    $template_name = $wpdb->get_col($wpdb->prepare("SELECT docx_template FROM  $temp_map_tbl where form =%s", $form_name));
    $img_url = plugins_url('img/error.gif', __FILE__);
    if (!$template_name) {
        printf(__("%s OOPS!! Cannot Create DOCX File!!! %s You have not specified DOCX Template to be mapped for the Gravity Form %s Hence No DOCX file could be generated. %s Please create a mapping at Template Mapping Page first (under Word AutoFill Plugin Menu)  & then return %s ", WDM_WAF_TXT_DOMAIN), "<div id='wdm_error_section'> <div id='wdm_error_heading'> <img id='wdm_error_img' src=".$img_url." style= />", "</div><br><br> <div id='wdm_error_body'>", "(id:".$form_id.").<br> <br>", "<br> <br>", "</div></div>");
        exit;
    }
    $how_many = count($template_name);
    $placeholders = array_fill(0, $how_many, '%s');    // prepare the right amount of placeholders // if you're looing for strings, use '%s' instead
    $format = implode(', ', $placeholders); // glue together all the placeholders... // $format = '%d, %d, %d, %d, %d, [...]'
    $query = "SELECT docx_url FROM  $docx_template_table where docx_title IN ($format)";
    $template_url = $wpdb->get_results($wpdb->prepare($query, $template_name));

    for ($i = 0; $i < count($template_url); ++$i) {
        $docx_url[$i] = $template_url[$i]->{'docx_url'};
    }

    $docx_path = array();
    $upload_dir = wp_upload_dir();
    $local_base_path = $upload_dir['basedir'];
    for ($i = 0; $i < count($docx_url); ++$i) {
        $parts = explode('uploads', $docx_url[$i]);
        $docx_path[$i] = trim($local_base_path.trim($parts[1]));
    }
    if (!class_exists('RGFormsModel')) {
        require_once plugins_url('/gravityforms/forms_model.php');
    }
    $form = RGFormsModel::get_form_meta($form_id);
    $extracted_fields = $form['fields'];
    $rows = customize_date_value($extracted_fields, $rows, $field_number_key, $field_number_value); //display the date in the selected date format and shows the list_field content in "column_name[data seperated by comma], column_name[data seperated by comma]" format.
    $savepath = plugin_dir_path(__FILE__).'results/'; // $format = '%d, %d, %d, %d, %d, [...]'    
    $gen_docx_files_urls = array();
    $new_file_urls = array();
    $parts_file = array();
    $parts_file2 = array();
    $file_names = array();
    //$file_names_with_ext = array(); //$curr_url = site_url();
    $parts_new = array();
    $content_url = content_url();
    $download_links = '';

    $download_links .= "<div id='wdm_download_section'>";
    $no_of_docx_templates = count($docx_path);
    for ($i = 0; $i < $no_of_docx_templates; ++$i) {
        //Load all the DOCX templates which have been mapped to a single Gravity Form. Can be 1 or more.
        $template = $PHPWord->loadTemplate($docx_path[$i]);
        $PHPWord->addFontStyle('myOwnStyle', array('name' => 'Verdana', 'size' => 14, 'color' => '#d509e8'));
        $parts_file = explode('/docx/', $docx_path[$i]);
        $parts_file2 = explode('.docx', $parts_file[1]);
        $file_names[$i] = $parts_file2[0];

        $empty = array();



        /* Implementing Ids-coding for replace images from the word document */

        $array = [
          'image1' =>  'https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
          'image2' =>  'https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'          
        ];

        $imageUrl   = 'https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500';
        $outputImage = dirname(__FILE__) . '/output/temp1.jpg';


        file_put_contents($outputImage, file_get_contents($imageUrl));

        # $template->setImageValue('image1.jpg', '/home/incredible/Downloads/images/3rd.jpeg');
        $template->setImageValue('image1.jpg', $outputImage );
        #die();


        /* Here end Ids-coding */

        $empty = returnArray($extracted_fields, $rows, $template, $field_number_key, $field_number_value);
        foreach ($empty as $emp) {
            $template->setValue($emp, null); //set empty values for which data was not filled
        }
        $gen_docx_files_urls[$i] = $savepath.'WAF_'.$file_names[$i].'(Fid='.$form_id.',Lid='.$lead_id.')'.'.docx';
        $template->save($gen_docx_files_urls[$i]);        //Save the File

        $parts_new = explode('wp-content', $gen_docx_files_urls[$i]);
        //Now extracting file name & uploads subdirectory
        $new_file_urls[$i] = $content_url.$parts_new[1];        //Created absolute url for the DOCX file that has been generated.
        $serial_no = $i + 1;
        $download_links .= "<a href='$new_file_urls[$i]'>". __('Download DOCX', WDM_WAF_TXT_DOMAIN)." $serial_no - $file_names[$i]</a>";
    }
    $download_links .= '</div>';
    $_SESSION['gen_docx_files_urls'] = $gen_docx_files_urls; //making it available for email request
    $email_section = sprintf(__('%s OR %s You can also recieve these DOCX files in your Inbox %s Enter E-mail ID', WDM_WAF_TXT_DOMAIN), "<p style='text-align:center; font-size:17px'>", "</p><p>", "</p><div style='display:inline !important;'><form class = 'send_email_form'>");
    $email_section .= sprintf(__('%s Email Files %s', WDM_WAF_TXT_DOMAIN), "<input type='email' name='waf_email_id' id='waf_email_id'/> <input type='submit' name='waf_submit_email_id' id='waf_submit_email_id' value='", "'/></div><div id='waf_email_processing' >");
    $email_section .= sprintf(__('%s Sending Email... %s', WDM_WAF_TXT_DOMAIN), "<img class='wdm_loaderimg' src=".home_url()."/wp-content/plugins/word-auto-fill/img/loading.gif>", "</div> </form>");
    if (current_user_can('administrator')) {
        $gdpr_notice = "<div class='notice notice-warning'><p>". __('Dear User, This is to inform you that WisdmLabs does not collect any user data. The data that is sent directly to your inbox is your sole responsibility and we urge you to update the privacy policy of your websites', WDM_WAF_TXT_DOMAIN)."</p></div>";
    } else {
        $gdpr_notice = '';
    }
    $response = sprintf(__("%s Here is a List of DOCX File(s) ready for download. %s A Total of %d DOCX file(s) have been generated.%s Click on the blue buttons given below to download :%s", WDM_WAF_TXT_DOMAIN), $gdpr_notice."<p>", "</p> <p>", $no_of_docx_templates, "<p>", "</p>");
    $response .= $download_links;
    $response .= $email_section;
    echo $response;
    unset($template);
    die();
}
    add_action('wp_ajax_nopriv_generate_docx_action', 'generateDocxFile');
    add_action('wp_ajax_generate_docx_action', 'generateDocxFile');
function wafSendEmail()
{
    $to_email = $_POST['waf_email_id'];
    if (empty($to_email)) {
        echo __('Please Enter a valid Email ID', WDM_WAF_TXT_DOMAIN);
        exit;
    }

    $subject = __('Word Auto Fill Filled DOCX Files', WDM_WAF_TXT_DOMAIN);
    $message = __('Hi, please find the attached DOCX files in this Email..', WDM_WAF_TXT_DOMAIN);

    $attachments = array();
    $attachments = $_SESSION['gen_docx_files_urls'];
    $ok_return = wp_mail($to_email, $subject, $message, '', $attachments);

    if ($ok_return) {
        echo __('A Mail has been successfully sent', WDM_WAF_TXT_DOMAIN);
    } else {
        echo __('Sorry,The Mail could not be sent', WDM_WAF_TXT_DOMAIN);
    }

    die();
    exit;
}
add_action('wp_ajax_nopriv_waf_send_email', 'wafSendEmail');
add_action('wp_ajax_waf_send_email', 'wafSendEmail');
