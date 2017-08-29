<?php
add_action('wp_enqueue_scripts', 'my_scripts_method');
function my_scripts_method() {
wp_enqueue_script('jquery');
wp_enqueue_script('navigation', get_template_directory_uri() . '/navigation.js', array(), '1.0', true);
wp_enqueue_script('height', get_template_directory_uri() . '/height.js', array(), '1.0', true);
if(get_option('ttr_back_to_top')): 
wp_enqueue_script('totop', get_template_directory_uri() . '/js/totop.js', array(), '1.0', true);
endif;
}
function twentythirteen_widgets_init() {
global $cssprefix;
$cssprefix="ttr_";
global $theme_widget_args;
if(get_option('ttr_heading_tag_block'))
{
$theme_widget_args = array('before_widget' => '<div class="'.$cssprefix.'block"><div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div> <div class="'.$cssprefix.'block_header">',
'after_widget' => '</div></div>~tt',
'before_title' => '<'.get_option('ttr_heading_tag_block').' style="'. 'color:'.get_option('ttr_blockheading').';font-size:'.get_option('ttr_font_size_block').'px;" class="'.$cssprefix.'block_heading">
<img src="'.get_bloginfo('template_url').'/images/blockicon.png" alt="blockicon" />
',
'after_title' => '</'.get_option('ttr_heading_tag_block').'></div> <div class="'.$cssprefix.'block_content">',
);
}
else
{
$theme_widget_args = array('before_widget' => '<div class="'.$cssprefix.'block"><div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div> <div class="'.$cssprefix.'block_header">',
'after_widget' => '</div></div>~tt',
'before_title' => '<h3 class="'.$cssprefix.'block_heading">
<img src="'.get_bloginfo('template_url').'/images/blockicon.png" alt="blockicon" />
',
'after_title' => '</h3></div> <div class="'.$cssprefix.'block_content">',
);
}
extract($theme_widget_args);
register_sidebar( array(
'name' => __( 'Left Sidebar', CURRENT_THEME ),
'id' => 'sidebar-1',
'description' => __( 'The sidebar for the optional Showcase Template', CURRENT_THEME ),
'before_widget' => $before_widget,
'after_widget' => $after_widget,
'before_title' => $before_title,
'after_title' => $after_title,
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea00', CURRENT_THEME ),
'id' => 'contenttopcolumn1',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea01', CURRENT_THEME ),
'id' => 'contenttopcolumn2',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea02', CURRENT_THEME ),
'id' => 'contenttopcolumn3',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CAWidgetArea03', CURRENT_THEME ),
'id' => 'contenttopcolumn4',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HAWidgetArea00', CURRENT_THEME ),
'id' => 'headerabovecolumn1',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HAWidgetArea01', CURRENT_THEME ),
'id' => 'headerabovecolumn2',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HAWidgetArea02', CURRENT_THEME ),
'id' => 'headerabovecolumn3',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HAWidgetArea03', CURRENT_THEME ),
'id' => 'headerabovecolumn4',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HBWidgetArea00', CURRENT_THEME ),
'id' => 'headerbelowcolumn1',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HBWidgetArea01', CURRENT_THEME ),
'id' => 'headerbelowcolumn2',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HBWidgetArea02', CURRENT_THEME ),
'id' => 'headerbelowcolumn3',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'HBWidgetArea03', CURRENT_THEME ),
'id' => 'headerbelowcolumn4',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea00', CURRENT_THEME ),
'id' => 'contentbottomcolumn1',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea01', CURRENT_THEME ),
'id' => 'contentbottomcolumn2',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea02', CURRENT_THEME ),
'id' => 'contentbottomcolumn3',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
register_sidebar( array(
'name' => __( 'CBWidgetArea03', CURRENT_THEME ),
'id' => 'contentbottomcolumn4',
'description' => __( 'An optional widget area for your site footer', CURRENT_THEME ),
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => "</aside>~tt",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );?>