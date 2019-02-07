jQuery(document).ready(function($){
$('#upload_docx_button').click(function() {

        formfield = $('#upload_docx').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

/*    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#upload_docx').val(imgurl);
        tb_remove();
    };*/
});
