<script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>

<script type="text/javascript">
  VK.init({apiId: 6165900, onlyWidgets: true});
</script>

<script language="javascript" type="text/javascript">      
<!-- Begin
function loadImages() {
if (document.getElementById) {  // DOM3 = IE5, NS6
document.getElementById('hidepage').style.visibility = 'hidden';
}
}
window.onload = loadImages;
//  End -->
</script>
<div id="hidepage" style=" background-color: #FFFFCC; layer-background-color: #FFFFCC; width: 100%;">
<pre><img src="http://gabensoft.hol.es/wp-content/uploads/2017/08/loaders.gif" />  loading.../загрузка...    </pre></div>

<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<!-- Put this script tag to the <head> of your page -->

__________________________________________________________________________________________________
<?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<meta name="description" content="Добавте сюда описание сайта">
<meta  name="keywords" content="Первое ключевое слово, второе ключевое слово,">
<?php $theme_path = get_bloginfo('template_url'); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
var inputs = document.getElementsByTagName('input');
for (a = 0; a < inputs.length; a++) {
if (inputs[a].type == "checkbox") {
var id = inputs[a].getAttribute("id");
if (id==null){
id=  "checkbox" +a;
}
inputs[a].setAttribute("id",id);
var container = document.createElement('div');
container.setAttribute("class", "ttr_checkbox");
var label = document.createElement('label');
label.setAttribute("for", id);
jQuery(inputs[a]).wrap(container).after(label);
}
}
});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
var inputs = document.getElementsByTagName('input');
for (a = 0; a < inputs.length; a++) {
if (inputs[a].type == "radio") {
var id = inputs[a].getAttribute("id");
if (id==null){
id=  "radio" +a;
}
inputs[a].setAttribute("id",id);
var container = document.createElement('div');
container.setAttribute("class", "ttr_radio");
var label = document.createElement('label');
label.setAttribute("for", id);
jQuery(inputs[a]).wrap(container).after(label);
}
}
});
</script>
<script type="text/javascript" src="<?php echo $theme_path?>/html5shiv.js">
</script>
<title>
<?php
global $page, $paged;
wp_title( '|', true, 'right' );
bloginfo( 'name' );
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
echo " | $site_description";
if ( $paged >= 2 || $page >= 2 )
echo ' | ' . sprintf( __( 'Page %s', CURRENT_THEME ), max( $paged, $page ) );
?>
</title>
<link rel="stylesheet"  href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen"/>
<!--[if lte IE 8]>
<link rel="stylesheet"  href="<?php bloginfo('template_url') ?>/menuie.css" type="text/css" media="screen"/>
<link rel="stylesheet"  href="<?php bloginfo('template_url') ?>/vmenuie.css" type="text/css" media="screen"/>
<![endif]-->
<script type="text/javascript" src="<?php echo $theme_path?>/prefixfree.min.js">
</script>
<link type="image/vnd.microsoft.icon" rel="shortcut icon"  href="<?php bloginfo( 'template_url' ); ?>/favicon.ico"/>
<!--[if IE 7]>
<style type="text/css" media="screen">
#ttr_vmenu_items  li.ttr_vmenu_items_parent {display:inline;}
</style>
<![endif]-->
</head>
<body>
<?php if(get_option('ttr_back_to_top')): ?>
<a href="#" class="back-to-top"><input type="image" alt="Back to Top" src="<?php echo get_option('ttr_icon_back_to_top');?>"/></a>
<?php endif; ?>
<div id="ttr_page">
<div id="ttr_page_inner">
<div class="ttr_banner_header">
<?php
if( is_active_sidebar( 'headerabovecolumn1'  ) || is_active_sidebar( 'headerabovecolumn2'  ) || is_active_sidebar( 'headerabovecolumn3'  ) || is_active_sidebar( 'headerabovecolumn4'  )):
?>
<div class="ttr_banner_header_inner_above0">
<?php if ( is_active_sidebar('headerabovecolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="headerabovecolumn1">
<?php theme_dynamic_sidebar( 'HAWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('headerabovecolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="headerabovecolumn2">
<?php theme_dynamic_sidebar( 'HAWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('headerabovecolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="headerabovecolumn3">
<?php theme_dynamic_sidebar( 'HAWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('headerabovecolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="headerabovecolumn4">
<?php theme_dynamic_sidebar( 'HAWidgetArea03'); ?>
</div>
</div>
<?php else: ?>
<div class="cell4" style="width:25%;float:right;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div style="clear:both;">
</div>
</div>
<?php endif; ?>
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<header id="ttr_header">
<div id="ttr_header_inner">
<div class="ttr_slideshow">
<div id="ttr_slideshow_inner">
</div>
</div>
<div class="ttr_slideshow_in">
<div class="ttr_slideshow_last">
<?php if (get_option ("ttr_site_title_enable")):?>
<div class="ttr_title_position">
<?php if (get_option('ttr_heading_tag_title'))
$heading_tag = get_option('ttr_heading_tag_title');
?>
<?php $heading_tag = ( is_home() || is_front_page() ) ? get_option('ttr_heading_tag_title') : 'div'; ?>
<<?php echo $heading_tag; ?> class="ttr_title_style">
<a style="color:<?php echo get_option('ttr_title');?>;font-size:<?php echo get_option('ttr_font_size_title')?>px;" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</<?php echo $heading_tag; ?>>
</div>
<?php endif; ?>
<?php if (get_option ("ttr_site_slogan_enable")):?>
<div class="ttr_slogan_position">
<?php if (get_option('ttr_heading_tag_slogan'))
$slogan_tag = get_option('ttr_heading_tag_slogan');
?>
<?php $slogan_tag = ( is_home() || is_front_page() ) ? get_option('ttr_heading_tag_slogan') : 'div'; ?>
<<?php echo $slogan_tag; ?> style="color:<?php echo get_option('ttr_slogan');?>;font-size:<?php echo get_option('ttr_font_size_slogan')?>px;" class="ttr_slogan_style">
<?php bloginfo( 'description' ); ?>
</<?php echo $slogan_tag; ?>>
</div>
<?php endif; ?>
</div>
</div>
</div>
</header>
<div class="ttr_banner_header">
<?php
if( is_active_sidebar( 'headerbelowcolumn1'  ) || is_active_sidebar( 'headerbelowcolumn2'  ) || is_active_sidebar( 'headerbelowcolumn3'  ) || is_active_sidebar( 'headerbelowcolumn4'  )):
?>
<div class="ttr_banner_header_inner_below0">
<?php if ( is_active_sidebar('headerbelowcolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="headerbelowcolumn1">
<?php theme_dynamic_sidebar( 'HBWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('headerbelowcolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="headerbelowcolumn2">
<?php theme_dynamic_sidebar( 'HBWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('headerbelowcolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="headerbelowcolumn3">
<?php theme_dynamic_sidebar( 'HBWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('headerbelowcolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="headerbelowcolumn4">
<?php theme_dynamic_sidebar( 'HBWidgetArea03'); ?>
</div>
</div>
<?php else: ?>
<div class="cell4" style="width:25%;float:right;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<div style="clear:both;">
</div>
</div>
<?php endif; ?>
</div>
