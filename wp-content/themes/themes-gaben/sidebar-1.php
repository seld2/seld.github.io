<div id="ttr_sidebar_left_margin"> 
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php
if (get_option('ttr_left_menu_enable')):?>
<?php $locations = get_nav_menu_locations(); ?>
<?php if(empty($locations)): ?>
<?php $menu = NULL; ?>
<?php else: ?>
<?php $menu = wp_get_nav_menu_object( $locations['left'] ); ?>
<?php endif; ?> 
<?php if($menu == NULL):?>
<div class="ttr_verticalmenu">
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<div class="ttr_verticalmenu_without_header">
</div>
<?php else: ?>
<div class="ttr_verticalmenu">
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<div class="ttr_verticalmenu_header">
<?php if (get_option('ttr_heading_tag_sidebarmenu'))
$sidebarmenuheading_tag = get_option('ttr_heading_tag_sidebarmenu');
?>
<<?php echo $sidebarmenuheading_tag; ?> class="ttr_verticalmenu_heading"style="color:<?php echo get_option('ttr_sidebarmenuheading');?>;font-size:<?php echo get_option('ttr_font_size_sidebarmenu');?>px;">
<img src="<?php echo (get_bloginfo('template_url').'/images/verticalmenuicon.png')?>" alt="verticalmenuicon" />
<?php echo $menu->name; ?>
</<?php echo $sidebarmenuheading_tag; ?>>
</div>
<?php endif; ?> 
<div class="ttr_verticalmenu_content">
<ul class="ttr_vmenu_items">
<?php echo theme_nav_menu('ttr_','left','vmenu',False);?>
</ul>
</div>
</div>
<?php endif; ?>
<div class="ttr_sidebar_left_padding">
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
<?php if(!theme_dynamic_sidebar(1)){
global $theme_widget_args;
extract($theme_widget_args);
echo ($before_widget.$before_title.__('Search',CURRENT_THEME).$after_title);
get_search_form();
echo substr($after_widget,0,-3);
echo ($before_widget.$before_title.__('Calendar',CURRENT_THEME).$after_title);
get_calendar();
echo substr($after_widget,0,-3);
}
?>
<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
 </div> 
</div>
