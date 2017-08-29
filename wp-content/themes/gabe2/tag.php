<?php
get_header(); ?>
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
<?php if ( have_posts() ) : ?>
<h1>
<?php printf( __( 'Tag Archives: %s', CURRENT_THEME ), '<span>' . single_tag_title( '', false ) . '</span>' );?>
</h1>
<?php
$tag_description = tag_description();
if ( ! empty( $tag_description ) )
echo apply_filters( 'tag_archive_meta', '<div>' . $tag_description . '</div>' );?>
<?php twentythirteen_content_nav( 'nav-above' ); ?>
<?php  $layoutoption=get_option('ttr_post_layout');
$featuredpost=get_option('ttr_featured_post');
if($layoutoption==0)
$layoutoption=1;
$width=((100 - $layoutoption + 1)/$layoutoption).'%';
if($layoutoption==1)
{
while ( have_posts())
{
the_post();
get_template_part( 'content','index');
}
}
else
{
$featuredcount=1;
$columncount=0;
$lastpost=true;
while( have_posts())
{
$lastpost=true;
if($featuredcount<=$featuredpost)
{
the_post();
get_template_part( 'content','index');
$featuredcount++;
$lastpost=false;
}
else
{
if($columncount==0)
{
echo '<div style="clear:both;">';
echo '<div class="post_column" style="float:left; width:'. $width .'; padding-right:1%;">';
the_post();
get_template_part( 'content','index');
echo '</div>';
$columncount++;
$lastpost=true;
}
else
{
if($columncount==$layoutoption-1)
{
echo '<div class="post_column" style="float:right; width:'. $width .';">';
the_post();
get_template_part( 'content','index');
echo '</div>';
echo '</div>';
$columncount=0;
$lastpost=false;
}
else
{
echo '<div class="post_column" style="float:left; width:'. $width .'; padding-right:1%;">';
the_post();
get_template_part( 'content','index');
echo '</div>';
$columncount++;
$lastpost=true;
}
}
}
}
if($lastpost==true && wp_count_posts()->publish != 0)
{
echo '</div>';
}
}
?>
<div style="clear:both;">
<?php twentythirteen_content_nav( 'nav-below' ); ?>
</div>
<?php else : ?>
<h1 class="ttr_post_title">
<?php _e( 'Nothing Found', CURRENT_THEME ); ?></h1>
<div class="postcontent">
<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', CURRENT_THEME ); ?></p>
<?php get_search_form(); ?>
<div style="clear:both;"></div>
</div>
<?php endif; ?>
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
<aside id="ttr_sidebar_right">
<?php get_sidebar('2'); ?>
</aside>
<div style="clear:both;">
</div>
</div>
<?php get_footer(); ?>
