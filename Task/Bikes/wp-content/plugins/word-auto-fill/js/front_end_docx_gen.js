jQuery(document).ready(function(){
          //e.preventDefault();
          jQuery(document).on('click','#wdm_download_option',function(e){
            
            //alert("Hello");
            //jQuery.modal("Hello");
         /*   var ajaxurl=front_end_docx_gen_vars.ajax_url;
            var form_id=front_end_docx_gen_vars.form_id;
            var lead_id=front_end_docx_gen_vars.lead_id;*/

            e.preventDefault();//in this way you have no redirect
            var form_id = jQuery(this).attr('data-formid');
            var lead_id = jQuery(this).attr('data-leadid');
            var ajaxurl = jQuery(this).attr('data-ajaxurl');

var data = {
    action:'generate_docx_action',
                form_id:form_id,
                lead_id:lead_id,
      };
        jQuery.post(ajaxurl, data, function(response) {
              if(response)
              jQuery.modal(response);
               });
       });
      });