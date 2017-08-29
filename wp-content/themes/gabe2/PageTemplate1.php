<?php
/**
* Template Name:PageTemplate1
*/
?>
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
<?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<head>
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
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="description" content="Добавте сюда описание сайта"/>
<meta  name="keywords" content="Первое ключевое слово, второе ключевое слово,"/>
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
<div id="ttr_page_inner" class="PageTemplate1">
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
<?php if (get_option('heading_tag_title'))
$heading_tag = get_option('heading_tag_title');
?>
<?php $heading_tag = ( is_home() || is_front_page() ) ? get_option('heading_tag_title') : 'div'; ?>
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
<?php if (get_option ("ttr_header_logo_enable")):?>
<?php if (get_option ("ttr_logo") != null):?>
<img src="<?php echo get_option('ttr_logo'); ?>" class="ttr_header_logo" alt="logo" />
<?php endif; ?>
<?php endif; ?>
<a href="http://www.templatetoaster.com" class="headerforeground01">
</a>
<a href="http://www.templatetoaster.com" class="headerforeground02">
</a>
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
<div class="ttr_banner_menu">
<?php
if( is_active_sidebar( 'menuabovecolumn1'  ) || is_active_sidebar( 'menuabovecolumn2'  ) || is_active_sidebar( 'menuabovecolumn3'  ) || is_active_sidebar( 'menuabovecolumn4'  )):
?>
<div class="ttr_banner_menu_inner_above0">
<?php if ( is_active_sidebar('menuabovecolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="menuabovecolumn1">
<?php theme_dynamic_sidebar( 'MAWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('menuabovecolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="menuabovecolumn2">
<?php theme_dynamic_sidebar( 'MAWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('menuabovecolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="menuabovecolumn3">
<?php theme_dynamic_sidebar( 'MAWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('menuabovecolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="menuabovecolumn4">
<?php theme_dynamic_sidebar( 'MAWidgetArea03'); ?>
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
<nav id="ttr_PageTemplate1_menu">
<div id="ttr_PageTemplate1_menu_inner_in">
<div id="navigationmenu">
<h3 class="menu-toggle"><?php _e('Menu',CURRENT_THEME); ?></h3>
<div class="menu-center">
<ul class="ttr_menu_items">
<?php echo theme_nav_menu('ttr_','primary','menu',False);?>
</ul>
</div>
</div>
</div>
</nav>
<div class="ttr_banner_menu">
<?php
if( is_active_sidebar( 'menubelowcolumn1'  ) || is_active_sidebar( 'menubelowcolumn2'  ) || is_active_sidebar( 'menubelowcolumn3'  ) || is_active_sidebar( 'menubelowcolumn4'  )):
?>
<div class="ttr_banner_menu_inner_below0">
<?php if ( is_active_sidebar('menubelowcolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="menubelowcolumn1">
<?php theme_dynamic_sidebar( 'MBWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('menubelowcolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="menubelowcolumn2">
<?php theme_dynamic_sidebar( 'MBWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('menubelowcolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="menubelowcolumn3">
<?php theme_dynamic_sidebar( 'MBWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('menubelowcolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="menubelowcolumn4">
<?php theme_dynamic_sidebar( 'MBWidgetArea03'); ?>
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
<div id="ttr_content_and_sidebar_container">
<aside style="float:left;" id="ttr_sidebar_left">
<?php get_sidebar('1'); ?>
 </aside> 
<div style="width:79,3221253259013%;float:left;" id="ttr_content">
<div id="ttr_content_margin">
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php if (get_option("ttr_breadcrumb")):?>
<?php wordpress_breadcrumbs(); ?>
<?php endif; ?>
<?php
if( is_active_sidebar( 'contenttopcolumn1'  ) || is_active_sidebar( 'contenttopcolumn2'  ) || is_active_sidebar( 'contenttopcolumn3'  ) || is_active_sidebar( 'contenttopcolumn4'  )):
?>
<div class="contenttopcolumn0">
<?php if ( is_active_sidebar('contenttopcolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="topcolumn1">
<?php theme_dynamic_sidebar( 'CAWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('contenttopcolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="topcolumn2">
<?php theme_dynamic_sidebar( 'CAWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('contenttopcolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="topcolumn3">
<?php theme_dynamic_sidebar( 'CAWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('contenttopcolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="topcolumn4">
<?php theme_dynamic_sidebar( 'CAWidgetArea03'); ?>
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
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>
<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>
<?php
if( is_active_sidebar( 'contentbottomcolumn1'  ) || is_active_sidebar( 'contentbottomcolumn2'  ) || is_active_sidebar( 'contentbottomcolumn3'  ) || is_active_sidebar( 'contentbottomcolumn4'  )):
?>
<div class="contentbottomcolumn0">
<?php if ( is_active_sidebar('contentbottomcolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="bottomcolumn1">
<?php theme_dynamic_sidebar( 'CBWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('contentbottomcolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="bottomcolumn2">
<?php theme_dynamic_sidebar( 'CBWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('contentbottomcolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="bottomcolumn3">
<?php theme_dynamic_sidebar( 'CBWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('contentbottomcolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="bottomcolumn4">
<?php theme_dynamic_sidebar( 'CBWidgetArea03'); ?>
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
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
</div>
</div>
<div style="clear:both;">
</div>
</div>
<div class="footer-widget-area" role="complementary">
<div class="footer-widget-area_inner">
<?php
if( is_active_sidebar( 'footerabovecolumn1'  ) || is_active_sidebar( 'footerabovecolumn2'  ) || is_active_sidebar( 'footerabovecolumn3'  ) || is_active_sidebar( 'footerabovecolumn4'  )):
?>
<div class="ttr_footer-widget-area_inner_above0">
<?php if ( is_active_sidebar('footerabovecolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="footerabovecolumn1">
<?php theme_dynamic_sidebar( 'FAWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('footerabovecolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="footerabovecolumn2">
<?php theme_dynamic_sidebar( 'FAWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('footerabovecolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="footerabovecolumn3">
<?php theme_dynamic_sidebar( 'FAWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('footerabovecolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="footerabovecolumn4">
<?php theme_dynamic_sidebar( 'FAWidgetArea03'); ?>
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
</div>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<footer id="ttr_footer">
<div id="ttr_footer_top_for_widgets">
<div class="ttr_footer_top_for_widgets_inner">
<?php get_sidebar( 'footer' ); ?>
</div>
</div>
<div class="ttr_footer_bottom_footer">
<div class="ttr_footer_bottom_footer_inner">
<?php if (get_option("ttr_copyright_disable")):?>
<div id="ttr_copyright">
<a style="color:<?php echo get_option('ttr_copyright'); ?>;font-size:<?php echo get_option('ttr_font_size_copyright');?>px;" href="<?php if (get_option("ttr_copyright_url")):
$copyright_url = get_option("ttr_copyright_url");
echo $copyright_url;
endif;
?>">
<?php if (get_option("ttr_copyright_text")):
$copyright_text = get_option("ttr_copyright_text");
echo $copyright_text;
endif;
?>
</a>
</div>
<?php endif; ?>
<div id="ttr_footer_designed_by_links">
<span id="ttr_footer_designed_by" style="color:<?php echo get_option('ttr_designedby');?>;font-size:<?php echo get_option('ttr_font_size_designedby');?>px;">
<?php echo(__('Wordpress Theme Designed with',CURRENT_THEME));?>
</span>
<a href="http://templatetoaster.com" style="color:<?php echo get_option('ttr_designedbylink');?> !important;font-size:<?php echo get_option('ttr_font_size_designedbylink');?>px;">
TemplateToaster
</a>
</div>
<a href="<?php bloginfo('rss2_url'); ?>">
<div class="ttr_footer_rss">
</div>
</a>
</div>
</div>
</footer>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<div class="footer-widget-area" role="complementary">
<div class="footer-widget-area_inner">
<?php
if( is_active_sidebar( 'footerbelowcolumn1'  ) || is_active_sidebar( 'footerbelowcolumn2'  ) || is_active_sidebar( 'footerbelowcolumn3'  ) || is_active_sidebar( 'footerbelowcolumn4'  )):
?>
<div class="ttr_footer-widget-area_inner_below0">
<?php if ( is_active_sidebar('footerbelowcolumn1') ) : ?>
<div class="cell1" style="width:25%;float:left;">
<div class="footerbelowcolumn1">
<?php theme_dynamic_sidebar( 'FBWidgetArea00'); ?>
</div>
</div>
<?php else: ?>
<div class="cell1" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('footerbelowcolumn2') ) : ?>
<div class="cell2" style="width:25%;float:left;">
<div class="footerbelowcolumn2">
<?php theme_dynamic_sidebar( 'FBWidgetArea01'); ?>
</div>
</div>
<?php else: ?>
<div class="cell2" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('footerbelowcolumn3') ) : ?>
<div class="cell3" style="width:25%;float:left;">
<div class="footerbelowcolumn3">
<?php theme_dynamic_sidebar( 'FBWidgetArea02'); ?>
</div>
</div>
<?php else: ?>
<div class="cell3" style="width:25%;float:left;background-color:transparent;">
&nbsp;
</div>
<?php endif; ?>
<?php if ( is_active_sidebar('footerbelowcolumn4') ) : ?>
<div class="cell4" style="width:25%;float:right;">
<div class="footerbelowcolumn4">
<?php theme_dynamic_sidebar( 'FBWidgetArea03'); ?>
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
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
