jQuery(document).ready(function($){
var uploadID = ''; /*setup the var*/

jQuery('.ttrbutton').click(function() {
    uploadID = $(this).prev('input'); /*grab the specific input*/
    formfield = $('.upload').attr('name');
    tb_show('Upload', 'media-upload.php?referer=functions.php&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
    return false;
});

window.send_to_editor = function(html) {
    imgurl = $('img',html).attr('src');
    uploadID.val(imgurl); /*assign the value to the input*/
    tb_remove();
    $('#button').trigger('click');
};

});