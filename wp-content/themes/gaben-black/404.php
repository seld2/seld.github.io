<?php get_header(); ?>
<div id="ttr_content_and_sidebar_container">
<aside id="ttr_sidebar_left">
<?php get_sidebar('1'); ?>
</aside>
<div id="ttr_content">
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
<h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', CURRENT_THEME ); ?></h1>
<div class="postcontent">
<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', CURRENT_THEME ); ?></p>
<?php get_search_form(); ?>
<br/><br/>
<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
<div class="widget">
<br/>
	<h2><?php _e( 'Most Used Categories', CURRENT_THEME ); ?></h2>
<ul>
<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
</ul>
<br/>
</div>
<?php
$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', CURRENT_THEME ), convert_smilies( ':)' ) ) . '</p>';
the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
?>
<br/>
<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
<div style="clear:both;"></div>
</div>
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
<?php get_footer(); ?>
