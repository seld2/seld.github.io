function setColumns() {
( function() {
if (jQuery(window).width() > 750) {
contentDiv = jQuery(document.getElementById("ttr_content"));
contentMarginDiv = jQuery(document.getElementById("ttr_content_margin"));
sidebarDiv = jQuery(document.getElementById("ttr_sidebar_left"));
sidebarMarginDiv = jQuery(document.getElementById("ttr_sidebar_left_margin"));
if (contentDiv.height() > sidebarDiv.height())
{
sidebarMarginDiv.height(contentDiv.height() - 0 - 0);
}
else
{
contentMarginDiv.height(sidebarDiv.height() - 5 - 5);
}
}
} )();
}
jQuery(window).load(function(){
setColumns();
});
