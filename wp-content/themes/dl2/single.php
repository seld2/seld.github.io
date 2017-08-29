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
<?php while ( have_posts() ) : the_post(); ?>
<nav id="nav-single">
<?php if(get_option('ttr_post_navigation')){?>
<h3 class="assistive-text"><?php _e( 'Post navigation', CURRENT_THEME ); ?></h3>
<?php } ?>
<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', CURRENT_THEME ) ); ?></span>
<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', CURRENT_THEME ) ); ?></span>
</nav>
<?php get_template_part( 'content', 'single' ); ?>
<?php comments_template( '', true ); ?>
<?php endwhile;?>
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
