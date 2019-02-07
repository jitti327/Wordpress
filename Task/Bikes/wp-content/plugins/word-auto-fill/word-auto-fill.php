<?php
/*
Plugin Name: Word Auto Fill for Gravity Forms
Description: This plugin automates form filling for word docs.
Author: WisdmLabs
Author URI:http://wisdmlabs.com
Version: 2.0.6
License: GPLv2
Text Domain: word_auto_fill
Domain Path: /languages
*/

/**
 * Set the plugin slug as default text domain.
 */
define('WDM_WAF_TXT_DOMAIN', 'word_auto_fill');


/**
 * All the constants needed
 */

if (!defined('ABSPATH')) {
    die('You are not allowed to call this page directly.');
}
if (!defined('WORD_AUTO_FILL_PATH')) {
    define('WORD_AUTO_FILL_PATH', plugin_dir_path(__FILE__));
}
if (!defined('WORD_AUTO_FILL_URL')) {
    define('WORD_AUTO_FILL_URL', plugins_url('/', __FILE__));
}

use wisdmlabs\waf as wdmWaf;

global $pluginSlugPluginData;

add_action('plugins_loaded', 'wdmwafTextDomain', 9);

/**
 * Function wdmldgroupLoadTextDomain() to load plugins text domain.
 */
function wdmwafTextDomain()
{
    load_plugin_textdomain('word_auto_fill', false, plugin_basename(dirname(__FILE__)) . '/languages');
    wdmWafLoadLicense();
}

function wdmWafLoadLicense()
{
    global $pluginSlugPluginData;
    $pluginSlugPluginData = include_once('license.config.php');
    require_once 'licensing/class-wdm-license.php';
    new \Licensing\WdmLicense($pluginSlugPluginData);
}

/*
 * cron to delete file using transient
 */
add_action('init', 'waf_cron', 10);

/*
 * function to delete file every hour
 */

function waf_cron()
{
    $value = get_transient('waf_cron_time');
    if (!$value) {
        set_transient('waf_cron_time', time()+60*60);
    } else {
        if ($value <= time()) {
            $folder = 'results';
            $files = glob(WORD_AUTO_FILL_PATH.'/'.$folder . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
            set_transient('waf_cron_time', time()+60*60);
        }
    }
}

/*include_once('licensing/class-wdm-add-license-data.php');
new Licensing\WdmAddLicenseData($pluginSlugPluginData);*/

/*
 * This code checks if new version is available
 */
/*if (!class_exists('\Licensing\WdmPluginUpdater')) {
    include('Licensing/class-wdm-plugin-updater.php');
}

//get current license key
$l_key = trim(get_option('edd_'.$pluginSlugPluginData[ 'pluginSlug' ].'_license_key'));

// setup the updater
new Licensing\WdmPluginUpdater($pluginSlugPluginData['storeUrl'], __FILE__, array(
    'version' => $pluginSlugPluginData['pluginVersion'], // current version number
    'license' => trim(get_option('edd_' . $pluginSlugPluginData['pluginSlug'] . '_license_key')), // license key (used get_option above to retrieve from DB)
    'item_name' => $pluginSlugPluginData['pluginName'], // name of this plugin
    'author' => $pluginSlugPluginData['authorName'], //author of the plugin
));
$l_key = null;*/

 require_once ABSPATH.'wp-admin/includes/upgrade.php';
 require_once 'generate_docx.php';

 //Create Tables
 global $wpdb;

///******************************************************** DOCX Fields Table ************************************************************///

 $docx_template_table = $wpdb->prefix.'waf_docx_template_data';

 $pdf_sql = "CREATE TABLE IF NOT EXISTS $docx_template_table
  (
   docx_title VARCHAR(55),
   docx_url longtext
  );";

 dbDelta($pdf_sql);

///****************** Table Created ********************///

///***************************************************** Fields Mapping Table *********************************************************///

 $template_mapping = $wpdb->prefix.'waf_template_mapping_data';

 $mapping_sql = "CREATE TABLE IF NOT EXISTS $template_mapping
  (
   form VARCHAR(95),
   docx_template VARCHAR(95),
   mapped_data longtext,
   del_btn_name longtext
  );";

 dbDelta($mapping_sql);

///****************** Table Created ********************///

//Admin menu for this plugin
add_action('admin_menu', 'registerWdmWordAutoFill');

function registerWdmWordAutoFill()
{
    global $pluginSlugPluginData;
    $get_data_from_db = \Licensing\WdmLicense::checkLicenseAvailiblity($pluginSlugPluginData['pluginSlug'], true);
    
    if ($get_data_from_db == 'available') {
        add_menu_page('Word Auto Fill', 'Word Auto Fill', 'administrator', 'word-autofill', 'wdm_word_auto_fill', '');
        add_submenu_page('word-autofill', 'Form Template Mapping', __('Templates Mapping', WDM_WAF_TXT_DOMAIN), 'administrator', 'form-templates-mapping', 'formTemplatesMapping');
        add_submenu_page('word-autofill', 'All Form Entries', __('Form Entries', WDM_WAF_TXT_DOMAIN), 'administrator', 'admin.php?page=gf_entries');
        $add_option = apply_filters('waf_add_manage_download_option', true);
        if ($add_option) {
            add_submenu_page('word-autofill', __('Form Manage Downloads Option', WDM_WAF_TXT_DOMAIN), __('Manage Downloads Option', WDM_WAF_TXT_DOMAIN), 'manage_options', 'form-manage-download-option', 'manageDownloadOption');
        }
    }
}

function manageDownloadOption()
{
    global $wpdb;
    $gravity_form = GFForms::$version;
    if (version_compare($gravity_form, '2.3', '<')) {
        $template_mapping = $wpdb->prefix.'rg_form';
    } else {
        $template_mapping = $wpdb->prefix.'gf_form';
    }
    $rg_forms_query = 'SELECT id, title FROM '.$template_mapping;
    $rg_forms = $wpdb->get_results($rg_forms_query);
    $data_exists = $wpdb->get_results("SELECT form FROM ".$wpdb->prefix."waf_template_mapping_data");
    if (!empty($rg_forms) && !empty($data_exists)) {
        if (!empty($_POST) && isset($_POST['submit_file_download_options'])) {
            foreach ($rg_forms as $form_save) {
                $mapped_form_name = $wpdb->get_results('SELECT form FROM '.$wpdb->prefix.'waf_template_mapping_data WHERE form = "'.$form_save->title.'"');
                if (!empty($mapped_form_name)) {
                    if (isset($_POST[$form_save->id.'_docx_download_option']) && $_POST[$form_save->id.'_docx_download_option'] == 'on') {
                        update_option('wdm_'.$form_save->id.'_docx_download_option', 'on');
                    } else {
                        update_option('wdm_'.$form_save->id.'_docx_download_option', 'off');
                    }
                }
            }
        }
        ?>
        <div class='notice notice-warning wdm_admin_notice'>
            <p><?php echo __("Dear User, This is to inform you that WisdmLabs does not collect any user data. The data that is sent directly to your inbox is your sole responsibility and we urge you to update the privacy policy of your websites", WDM_WAF_TXT_DOMAIN); ?>
            </p>
        </div>
        <form method="POST" action="#" class = 'manage_download_file_option_form'>
            <table id = 'mapped-download-option'>
                <tr>
                    <th><?php echo __('Form name', WDM_WAF_TXT_DOMAIN); ?></th>
                    <th><?php echo __('Select checkbox to disable Doc file download Option', WDM_WAF_TXT_DOMAIN); ?></th>
                 </tr>
            <?php
            foreach ($rg_forms as $forms) {
                $mapped_form_name = $wpdb->get_results('SELECT form FROM '.$wpdb->prefix.'waf_template_mapping_data WHERE form = "'.$forms->title.'"');
                if (!empty($mapped_form_name)) {
                    $checkbox_doc_status = '';
                    if (get_option('wdm_'.$forms->id.'_docx_download_option', true) == 'on') {
                        $checkbox_doc_status = 'checked';
                    }
                    ?>
                    <tr>
                        <td><?php echo $forms->title; ?></td>
                        <td><input type="checkbox" name="<?php echo $forms->id; ?>_docx_download_option" <?php echo $checkbox_doc_status; ?> ></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </table>
        <input type="submit" name="submit_file_download_options" id = "submit_file_download_options" value="<?php echo __('Update', WDM_WAF_TXT_DOMAIN); ?>">
        </form>
        <?php
    } else {
        ?>
        <div class='notice notice-warning wdm_admin_notice'>
            <p><?php echo __("Dear User, This is to inform you that WisdmLabs does not collect any user data. The data that is sent directly to your inbox is your sole responsibility and we urge you to update the privacy policy of your websites", WDM_WAF_TXT_DOMAIN); ?>
            </p>
        </div>
        <div class='notice wdm_admin_notice'>
            <p><?php echo __("There is no mapping available, please map the gravity form to worddoc template", WDM_WAF_TXT_DOMAIN); ?>
            </p>
        </div>
        <?php
    }
}
add_action('admin_init', 'wdm_waf_admin_activation', 10, 0);

function wdm_waf_admin_activation()
{
    if (!is_plugin_active('gravityforms/gravityforms.php')) {
        deactivate_plugins(plugin_basename(__FILE__));
        unset($_GET[ 'activate' ]);
        add_action('admin_notices', 'wdm_waf_my_plugin_admin_notices');
    }
    add_action('admin_notices', 'waf_GDPR_admin_notices');
}

function wdm_waf_my_plugin_admin_notices()
{
    if (!is_plugin_active('gravityforms/gravityforms.php')) {
        ?>
        <div class='error'><p>
            <?php echo __("Gravity Forms plugin is not active. In order to make the 'Word Auto Fill Addon For Gravity Forms' plugin work, you need to install and activate Gravity Forms plugin First.", WDM_WAF_TXT_DOMAIN);
        ?>
        </p></div>

        <?php
    }
}

 //********************************************************Upload DOCX Template Start*******************************************************************
function wdocxRegisterPostType()
{
    global $wpdb;
    global $docx_template_table;
    //global $email_template_table;
    //global $template_mapping;

    $args = array(
                 'label' => __('Word Templates', WDM_WAF_TXT_DOMAIN),
                  'labels' => array(
                   'add_new_item' => __('Upload New Word Template', WDM_WAF_TXT_DOMAIN),
                   'edit_item' => __('Edit Word Template', WDM_WAF_TXT_DOMAIN),
                   'new_item' => __('New Word Template', WDM_WAF_TXT_DOMAIN),
                   'view_item' => __('View Word Template', WDM_WAF_TXT_DOMAIN),
                   'search_items' => __('Search Word Templates', WDM_WAF_TXT_DOMAIN),
                   'not_found' => __('No Word Template found', WDM_WAF_TXT_DOMAIN),
                   'not_found_in_trash' => __('No Word Template found', WDM_WAF_TXT_DOMAIN),
                   ),
                  'supports' => array('title'),
                  'register_meta_box_cb' => 'wordMetaBoxCb',
                  'show_ui' => true,
                  'query_var' => true,
                  'show_in_menu' => 'word-autofill',
                );

    register_post_type('wordoc-template', $args);
    $post_type = 'wordoc-template';
    $post_status = 'publish';
    $blank = '';
    $docx_post_id = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_type =%s AND post_status=%s AND post_title!=%s ORDER BY ID;", $post_type, $post_status, $blank));

    $post_mime_type = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    $docx_url = array();
    foreach ($docx_post_id as $docx_id) {
        $docx_url[] = $wpdb->get_var($wpdb->prepare("SELECT guid FROM $wpdb->posts WHERE post_mime_type =%s AND post_parent=%d;", $post_mime_type, $docx_id));
    }

    $docx_name = $wpdb->get_col($wpdb->prepare("SELECT post_title FROM $wpdb->posts WHERE post_type =%s AND post_status=%s AND post_title!=%s ORDER BY ID;", $post_type, $post_status, $blank));

    $wpdb->query("DELETE FROM $docx_template_table ;");

    for ($j = 0; $j < count($docx_url); ++$j) {
        $wpdb->query($wpdb->prepare("DELETE FROM $docx_template_table WHERE docx_url =%s;", $docx_url[$j]));

        if (!empty($docx_url[$j])) {
            $wpdb->insert($docx_template_table, array('docx_title' => $docx_name[$j], 'docx_url' => $docx_url[$j]));
        }
    }
}

 add_action('init', 'wdocxRegisterPostType');
 //add_filter('wp_insert_post_data','emptyDuplicateTitleError', 99, 2);

function emptyDuplicateTitleError($data, $postarr)
{
    global $docx_template_table;
    global $wpdb;
    $postarr = '';
    $template_title = $data['post_title'];

    if ('wordoc-template' == get_post_type() && empty($template_title)) {
        // Check if template title is empty

        echo '<a href="'.$_SERVER['HTTP_REFERER'].'">'.__('Back', WDM_WAF_TXT_DOMAIN).'</a> ';
        echo __(' Please enter a title for WORDOC template', WDM_WAF_TXT_DOMAIN);
        die();
    } else {
        $res = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $docx_template_table where docx_title = %s", $template_title));
        if ($res > 0) {
            echo '<a href="'.$_SERVER['HTTP_REFERER'].'">'.__('Back', WDM_WAF_TXT_DOMAIN).'</a> ';
            echo __('Sorry the given template title is already in use. Please enter a different title for this WORDOC template', WDM_WAF_TXT_DOMAIN);
            die();
        }
    }

    return $data;
}

 add_filter('post_updated_messages', 'wordocEmptyMessage');

function wordocEmptyMessage($messages)
{
    if ('wordoc-template' == get_post_type()) {
        $messages = '';
    }

    return $messages;
}

function wordMetaBoxCb()
{
    add_meta_box('wordoc-template_details', __('Media Library', WDM_WAF_TXT_DOMAIN), 'wordocMetaBoxDetails', 'wordoc-template', 'normal', 'high');
}

function wordocMetaBoxDetails()
{
    printf("<iframe frameborder='0' src=' %s ' style='width: 100%%; height: 400px;'> </iframe>", get_upload_iframe_src('media'));
}

 //Changing default upload directory for PDF files
 add_filter('wp_handle_upload_prefilter', 'wafPreUpload');
 add_filter('wp_handle_upload', 'wafPostUpload');

function wafPreUpload($file)
{
    if (array_key_exists('install-plugin-submit', $_POST)) {
        return $file;
    }

    $file['name'] = sanitize_file_name($file['name']);
    add_filter('upload_dir', 'wafCustomUploadDir');

    return $file;
}

function wafPostUpload($fileinfo)
{
    remove_filter('upload_dir', 'wafCustomUploadDir');

    return $fileinfo;
}

function wafCustomUploadDir($path)
{
    // $extension = substr(strrchr($_POST['name'],'.'),1);
    if (!array_key_exists('post_id', $_POST)) {
        return;
    }
    $c_type = get_post_type($_POST['post_id']);
    if (!empty($path['error']) ||  $c_type != 'wordoc-template') {
        return $path;
    } //error or other filetype; do nothing.
    $customdir = '/docx';
    $path['path'] = str_replace($path['subdir'], '', $path['path']); //remove default subdir (year/month)
    $path['url'] = str_replace($path['subdir'], '', $path['url']);
    $path['subdir'] = $customdir;
    $path['path']   .= $customdir;
    $path['url']    .= $customdir;

    return $path;
}

add_filter('media_upload_default_tab', 'defaultTabForMediaUploader');

function defaultTabForMediaUploader($tab)
{
    $tab = '';

    return 'gallery';
}
 //******************************************************** Upload DOCX Template End*******************************************************************

function myAdminScripts()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', plugins_url('/js/my-script.js', __FILE__), array('jquery', 'media-upload', 'thickbox'));
    wp_enqueue_script('my-upload');
}

function myAdminStyles()
{
    wp_enqueue_style('thickbox');
    wp_enqueue_style('waf_add_on_admin_css', WORD_AUTO_FILL_URL.'/css/waf-add-on-admin.css');
}

    add_action('admin_print_scripts', 'myAdminScripts');
    add_action('admin_print_styles', 'myAdminStyles');

function waf_GDPR_admin_notices()
{
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'wordoc-template') {
        ?>
        <div class='notice notice-warning'><p>
            <?php echo __("Dear User, This is to inform you that WisdmLabs does not collect any user data. The data that is sent directly to your inbox is your sole responsibility and we urge you to update the privacy policy of your websites", WDM_WAF_TXT_DOMAIN);
        ?>
        </p></div>

        <?php
    }
}
function formTemplatesMapping()
{
    global $wpdb,$template_mapping;

    wp_enqueue_script('mapping_js', WP_PLUGIN_URL.'/word-auto-fill/js/mapping.js');
    wp_enqueue_style('mapping_css', WP_PLUGIN_URL.'/word-auto-fill/css/mapping.css');
    ?>
    <div class="wrap">
        <div class='notice notice-warning'>
            <p><?php echo __("Dear User, This is to inform you that WisdmLabs does not collect any user data. The data that is sent directly to your inbox is your sole responsibility and we urge you to update the privacy policy of your websites", WDM_WAF_TXT_DOMAIN); ?>
            </p>
        </div>
        <div id="mapping_icon"></div>
        <h2><?php echo __("Map Templates with Forms", WDM_WAF_TXT_DOMAIN); ?></h2>
        <div id="err_msg">
            <table>
                <tr>
                    <td><span id="form_err" style="display:none"><?php echo __("Please select a form", WDM_WAF_TXT_DOMAIN); ?></span></td>
                    <td><span id="docx_err" style="display:none"><?php echo __("Please select a DOCX template", WDM_WAF_TXT_DOMAIN);?></span></td>
                </tr>
            </table>
        </div>
        <form name="mapping_data" method="POST">
            <?php
            $rg_form_table = get_form_table_name();
            $form_title = $wpdb->get_col("SELECT title FROM $rg_form_table where is_trash=0;");
            //$docx_title = $wpdb->get_col("SELECT docx_title FROM $docx_template_table;");
            //$wdm_post_type = 'wordoc-template';
            //$wdm_post_status = 'publish';

            //$template_names = $wpdb->get_col($wpdb->prepare("SELECT post_title FROM $wpdb->posts WHERE post_type =%s AND post_status=%s ", $wdm_post_type, $wdm_post_status));
            $template_names = get_posts(array(
                'post_status'       => 'publish',
                'posts_per_page'    => -1,
                'post_type'         => 'wordoc-template',
                'order'             => 'ASC',
                'orderby'           => 'title'
                ));
            $wdm_d_t_name = $wpdb->prefix.'waf_docx_template_data';
            $wdm_docx_title = $wpdb->get_col("SELECT docx_title FROM $wdm_d_t_name");

    ?>
             <select id="form_files" name="form_files" class="map_select">
                 <option value=""><?php echo __("Select", WDM_WAF_TXT_DOMAIN); ?></option>
                        <?php
                        for ($i = 0; $i < count($form_title); ++$i) {
                            ?>
                                  <option value="<?php echo $form_title[$i];
                            ?>">
                                        <?php echo $form_title[$i];
                            ?>
                                    </option>
                                        <?php
                        }
    ?>
             </select>
             <select id="docx_files" name="docx_files" class="map_select">
                 <option value=""><?php echo __("Select", WDM_WAF_TXT_DOMAIN); ?></option>
                    <?php
                    for ($i = 0; $i < count($template_names); ++$i) {
                        if (in_array($template_names[$i]->post_title, $wdm_docx_title)) {
                            ?>          <option value="<?php echo $template_names[$i]->post_title;
                            ?>" >
                                    <?php echo $template_names[$i]->post_title;
                            ?>
                                      </option>
                        <?php
                        }
                    }
    ?>
             </select>
         <input type="submit" value="Save Mapping" class="button-primary" name="submit_mapping" id="submit_mapping" onclick="return map_form();"/>
    </form>
    </div>
    <?php
    $mapped_form = '';
    $mapped_docx = '';
    $mapped_form = filter_input(INPUT_POST, 'form_files');
    $mapped_docx = filter_input(INPUT_POST, 'docx_files');

    $mapped_data = '['.$mapped_form.'+'.$mapped_docx.']';
    $mapping_exists = 'SELECT * FROM '.$template_mapping.' where mapped_data="'.$mapped_data.'"';
    $check_mapping_exists = $wpdb->get_results($mapping_exists);

    if (!empty($mapped_form) && !empty($mapped_docx)) {
        if (empty($check_mapping_exists)) {
            $wpdb->insert($template_mapping, array('form' => $mapped_form,
                              'docx_template' => $mapped_docx,
                              'mapped_data' => '['.$mapped_form.'+'.$mapped_docx.']',
                              'del_btn_name' => preg_replace('/\s+/', '', $mapped_form.$mapped_docx),
                              ));
            ?>
                    <div><p><strong><?php echo __('Saving Mapping ...', WDM_WAF_TXT_DOMAIN);
            ?></strong></p></div> 
        <?php
        if ($_POST) {
            echo '<script type="text/javascript">window.location=window.location.href;</script>';
        }
        } else {
            ?>
            <div><p><strong><?php echo __('Mapping Already Exists', WDM_WAF_TXT_DOMAIN);
            ?></strong></p></div> <?php
        }
    }
    $result_set = $wpdb->get_results("SELECT form, docx_template, del_btn_name FROM $template_mapping");
    ?>
          <p></p>
   <div id="mapped_result">
    <table>
        <tr>
            <th><?php echo __("Gravity Form Name", WDM_WAF_TXT_DOMAIN); ?> </th>
            <th><?php echo __("DOCX Template", WDM_WAF_TXT_DOMAIN); ?></th>
            <th id='del_map'><?php echo __("Delete Mapping", WDM_WAF_TXT_DOMAIN); ?></th>
        </tr>
    <?php
    foreach ($result_set as $mapped_table) {
        ?>
        <tr>
        <td><?php echo $mapped_table->form;
        ?></td>
        <td><?php echo $mapped_table->docx_template;
        ?></td>
        <td class='del_row'>
        <form method='POST'>
            <input type='submit' id='<?php echo $mapped_table->del_btn_name ?>' name='<?php echo $mapped_table->del_btn_name ?>' class='remove_mapping' value=''/>
            </form>
        </td>
        </tr>

        <?php
        if (isset($_POST[$mapped_table->del_btn_name])) {
            $wpdb->query($wpdb->prepare("DELETE FROM $template_mapping WHERE del_btn_name=%s;", $mapped_table->del_btn_name));

            if ($_POST) {
                echo '<script type="text/javascript">window.location=window.location.href;</script>';
            }
        }
    }
    ?>
        </table>
        </div>
<?php
}

 ///****************** BackEnd DOCX Generation *************************///

///****************** Creates the link 'Create DOCX File' on Gravity Form's Hook that generates the DOCX file********************///
add_action('init', 'wdmLoadEssentials');
function wdmLoadEssentials()
{
    wp_enqueue_script('jquery');

    wp_register_style('basic_modal_css', plugins_url('/css/basic.css', __FILE__));
    wp_enqueue_style('basic_modal_css');

    wp_register_style('basic_ie_css', plugins_url('/css/basic_ie.css', __FILE__));
    wp_enqueue_style('basic_ie_css');

    wp_register_script('basic_modal_js', plugins_url('/js/basic.js', __FILE__), array('jquery'));
    wp_enqueue_script('basic_modal_js');

    wp_register_script('jquery_simple_modal_js', plugins_url('/js/jquery.simplemodal.js', __FILE__), array('jquery'));
    wp_enqueue_script('jquery_simple_modal_js');

    wp_register_script('email_link_js', plugins_url('/js/email_link.js', __FILE__), array('jquery'));
    wp_enqueue_script('email_link_js');

    $plugins_url = plugins_url();
    $loading_path = $plugins_url.'/word-auto-fill/img/loading.gif';
    $ajax_url = admin_url('admin-ajax.php');
    wp_localize_script('email_link_js', 'email_link_js_vars', array('ajax_url' => __($ajax_url), 'loading_path' => $loading_path));
}

add_action('gform_entries_first_column_actions', 'firstColumnActions', 10, 4);

function firstColumnActions($form_id, $field_id, $value, $lead)
{
    $field_id = '';
    $value = '';
    $lead_id = $lead['id'];
    echo "| <a id='export_$lead_id' href='#'>".__('Create  DOCX  File', WDM_WAF_TXT_DOMAIN)."</a> ";
    ?>

    <script>
    //Show the PopUp Dialog When user clicks on 'Create DOCX File' link on a Gravity Form Entry
    //Dialog by : Eric Martin
    jQuery(document).ready(function(){
   
    jQuery("#export_<?php echo $lead_id;?>").click(function(e){
    e.preventDefault();//in this way you have no redirect
    var ajaxurl = '<?php echo admin_url("admin-ajax.php");?>';   
    var data = {
    action:'generate_docx_action',
            form_id:'<?php echo $form_id?>',
            lead_id:'<?php echo $lead_id?>',        
        };
      jQuery.post(ajaxurl, data, function(response) {
        if(response)
        {     
          jQuery.modal(response);
        }
        });
      });
    });
       </script>  
        <?php
}

///****************** BackEnd DOCX Generation  Ends*************************///

/////******************FrontEnd DOCX Generation  Ends*************************///
//
add_action('wp_enqueue_scripts', 'add_front_end_scripts');
function add_front_end_scripts()
{
    wp_enqueue_script('front_end_docx_gen_js', plugins_url('/js/front_end_docx_gen.js', __FILE__), array('jquery'), '1.0.0', true);
}
add_filter('gform_confirmation', 'wdm_add_link', 99, 3);
function wdm_add_link($content, $form, $entry)
{
    if (!is_array($content)) {
        $lead_id = $entry['id'];
        $form_id = $entry['form_id'];
        $form_info = RGFormsModel::get_form($form_id);
        $form_title = $form_info->title;
        $docx_download_status = get_option('wdm_'.$form_id.'_docx_download_option', true);
        global $wpdb;
        $template_mapping = $wpdb->prefix.'waf_template_mapping_data';
        $mapping_exists = 'SELECT * FROM '.$template_mapping.' where form="'.$form_title.'"';
        $check_mapping_exists = $wpdb->get_results($mapping_exists);
        if (!empty($check_mapping_exists) && $docx_download_status != 'on') {
            $ajax_url = admin_url('admin-ajax.php');
            $link = '<a href="" id="wdm_download_option" data-formid="'.$form_id.'" data-leadid="'.$lead_id.'" data-ajaxurl="'.$ajax_url.'" > '.__('Click to Generate the DOCX File', WDM_WAF_TXT_DOMAIN).'</a>';
            $content = $content.$link;
        }
        unset($form);
    }
    return $content;
}

///********************FrontEnd DOCX Generation  Ends*************************///

add_action('gform_after_delete_form', 'deleteMappingOnFormDelete');
function deleteMappingOnFormDelete($form_id)
{
    $form = GFAPI::get_form($form_id);
    $form_title = $form['title'];
    global $wpdb;
    $template_mapping = $wpdb->prefix.'waf_template_mapping_data';
    $mapping_exists = 'SELECT * FROM '.$template_mapping.' where form="'.$form_title.'"';
    $check_mapping_exists = $wpdb->get_results($mapping_exists);
    if (!empty($check_mapping_exists)) {
        $wpdb->query($wpdb->prepare("DELETE FROM $template_mapping WHERE form=%s;", $form_title));
    }
}

add_action('delete_post', 'deleteMappingOnTemplateDelete', 10, 1);
function deleteMappingOnTemplateDelete($pid)
{
    global $wpdb;
    global $post_type;

    if ($post_type != 'wordoc-template') {
        return;
    }

    $wdm_post_object = get_post($pid);
    $post_title = $wdm_post_object->post_title;
    $template_mapping = $wpdb->prefix.'waf_template_mapping_data';
    $mapping_exists = 'SELECT * FROM '.$template_mapping.' where docx_template="'.$post_title.'"';
    $check_mapping_exists = $wpdb->get_results($mapping_exists);
    if (!empty($check_mapping_exists)) {
        $wpdb->query($wpdb->prepare("DELETE FROM $template_mapping WHERE docx_template=%s;", $post_title));
    }
}
function get_form_table_name()
{
    global $wpdb;
    $gravity_form = GFForms::$version;
    if (version_compare($gravity_form, '2.3', '<')) {
        $rg_form_table = $wpdb->prefix.'rg_form';
    } else {
        $rg_form_table = $wpdb->prefix.'gf_form';
    }
    return $rg_form_table;
}
