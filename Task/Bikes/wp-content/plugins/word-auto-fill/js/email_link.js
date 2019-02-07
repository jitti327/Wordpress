jQuery(document).ready(function() {
        
        jQuery('body').on("click",'#waf_submit_email_id',function(e){
        e.preventDefault();
        
        waf_email_id=jQuery('#waf_email_id').val();
        if (waf_email_id != '' && ( /(.+)@(.+){2,}\.(.+){2,}/.test(waf_email_id) ))
        {
          var loadingPath = email_link_js_vars.loading_path;
        // jQuery('#waf_email_processing').html('<img src="http://pdfautofill.mirealux.com/wp-content/plugins/gravityforms/images/loading.gif"> Sending Email...');
	       jQuery('#waf_email_processing').css('display','block');
         ajax_url=email_link_js_vars.ajax_url;
        
          var data = {
		action:'waf_send_email',
                waf_email_id:waf_email_id,
	    };
            
        jQuery.post(ajax_url, data, function(response) {
             jQuery('#waf_email_processing').css('display','none');
            alert(response);
	    //jQuery.modal(response);
         });   
        }
        
        else
          {
            alert("Please Enter a valid Email ID");
	     //jQuery.modal('<p>Please Enter a valid Email ID</p>');
          }
        
        
        
        });
    
    
    });