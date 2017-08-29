function setColumns() {
( function() {
if (jQuery(window).width() > 750) {
contentDiv = jQuery(document.getElementById("ttr_content"));
contentMarginDiv = jQuery(document.getElementById("ttr_content_margin"));
sidebar1Div = jQuery(document.getElementById("ttr_sidebar_left"));
sidebar1MarginDiv = jQuery(document.getElementById("ttr_sidebar_left_margin"));
sidebar2Div = jQuery(document.getElementById("ttr_sidebar_right"));
sidebar2MarginDiv = jQuery(document.getElementById("ttr_sidebar_right_margin"));
if (sidebar1Div != null)
{
if (contentDiv.height() > sidebar1Div.height())
{
if (sidebar2Div != null)
{
if (contentDiv.height() > sidebar2Div.height())
{
sidebar1MarginDiv.height(contentDiv.height() - 0 - 0);
sidebar2MarginDiv.height(contentDiv.height() - 0 - 0);
}
else
{
sidebar1MarginDiv.height(sidebar2Div.height() - 0 - 0);
contentMarginDiv.height(sidebar2Div.height()- 5 - 5);
 }
}
else
{
sidebar1MarginDiv.height(contentDiv.height()- 0 - 0);
}
}
else
{
if (sidebar2Div != null)
{
if (sidebar1Div.height() > sidebar2Div.height())
{
sidebar2MarginDiv.height(sidebar1Div.height()- 0 - 0);
contentMarginDiv.height(sidebar1Div.height()- 5 - 5);
}
else
{
sidebar1MarginDiv.height(sidebar2Div.height() - 0 - 0);
contentMarginDiv.height(sidebar2Div.height()- 5 - 5);
}
}
else
{
contentMarginDiv.height(sidebar1Div.height()- 5 - 5);
}
}
}
}
} )();
}
jQuery(window).load(function(){
setColumns();
});
