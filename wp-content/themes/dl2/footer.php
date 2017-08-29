<?php $theme_path = get_bloginfo('template_url'); ?>
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
<?php echo(__('Wordpress gabensoft.hol.es',CURRENT_THEME));?>
</span>
<a href="http://templatetoaster.com" style="color:<?php echo get_option('ttr_designedbylink');?> !important;font-size:<?php echo get_option('ttr_font_size_designedbylink');?>px;">
emplateToaster
</a>
</div>
</div>
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
