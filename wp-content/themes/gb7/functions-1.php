<?php global $no_slides,$slide_show_visible; ?>
<?php $no_slides = 1;?>
<?php $slide_show_visible = false;?>
<?php
function color_array()
{
$colors = array(
array('id' => 'ttr_title', 'std' => '#FFFFFF'),
 array('id' => 'ttr_slogan', 'std' => '#E1E1E1'), 
 array('id' => 'ttr_blockheading', 'std' => '#000000'),
 array('id' => 'ttr_sidebarmenuheading', 'std' => '#000000')
);
return $colors;
}
?>
<?php add_action( 'init', 'register_my_menus' );
function register_my_menus() {
register_nav_menus(
array(
'primary' => __('Menu',CURRENT_THEME),
'left' => __( 'Sidebar-1 Menu',CURRENT_THEME)
)
);
}
function sidebar_options_array()
{
$sidebaroptions = array (
array(	"name" => __("Sidebar Options",CURRENT_THEME),
"type" => "title"),
array("type" => "open"),
array( "name" => __("Use vertical menu on Sidebar-1",CURRENT_THEME),
"desc" => "Check this box if you would like to ENABLE the vertical menu.",
"id"=> "ttr_left_menu_enable",
"type" => "checkbox",
"std" => "true"),
array("name" => __("Sidebarmenu Heading Font Size",CURRENT_THEME),
"desc" => "Enter the font size of Sidebarmenu Heading.",
"id" => "ttr_font_size_sidebarmenu",
"std" => "14",
"type" => "text"),
array("name" => __("Heading Tag for Sidebarmenu Heading",CURRENT_THEME),
"desc" =>"Choose heading tag for Sidebarmenu Heading.",
"id" => "ttr_heading_tag_sidebarmenu",
"std" => "h3",
"type" => "select",
"options" => array( "h1", "h2", "h3", "h4", "h5", "h6"),
),
array("name" => __("Block Heading Font Size",CURRENT_THEME),
"desc" =>"Enter the font size of Block Heading.",
"id" => "ttr_font_size_block",
"std" => "16",
"type" => "text"),
array("name" => __("Heading Tag for Block Heading",CURRENT_THEME),
"desc" =>"Choose heading tag for Block Heading.",
"id" => "ttr_heading_tag_block",
"std" => "h3",
"type" => "select",
"options" => array( "h1", "h2", "h3", "h4", "h5", "h6"),
),
array("type" => "close")
);
return $sidebaroptions;
}
function header_options_array()
{
$headeroptions = array (
array(	"name" => __("Header Options",CURRENT_THEME),
"type" => "title"),
array("type" => "open"),
array("name" => __("Display Site Title",CURRENT_THEME),
"desc" => "Check this box if you would like to ENABLE the site title.",
"id" => "ttr_site_title_enable",
"std" => "true",
"type" => "checkbox"),
array("name" => __("Title Font Size",CURRENT_THEME),
"desc" =>"Enter the font size of Site Title.",
"id" => "ttr_font_size_title",
"std" => "28",
"type" => "text"),
array("name" => __("Heading Tag for Title",CURRENT_THEME),
"desc" =>"Choose heading tag for Site Title.",
"id"=> "ttr_heading_tag_title",
"std" => "h6",
"type" => "select",
"options" => array("h1", "h2", "h3", "h4", "h5", "h6"),
),
array("name" => __("Display Site Slogan",CURRENT_THEME),
"desc" => "Check this box if you would like to ENABLE the site slogan.",
"id" => "ttr_site_slogan_enable",
"std" => "true",
"type" => "checkbox"),
array("name" => __("Slogan Font Size",CURRENT_THEME),
"desc" =>"Enter the font size of Site Slogan.",
"id" => "ttr_font_size_slogan",
"std" => "20",
"type" => "text"),
array("name" => __("Heading Tag for Slogan",CURRENT_THEME),
"desc" =>"Choose heading tag for Site Slogan.",
"id" => "ttr_heading_tag_slogan",
"std" => "h5",
"type" => "select",
"options" => array("h1", "h2", "h3", "h4", "h5", "h6"),
),
array("type" => "close")
);
return $headeroptions;
}
function postcontent_array()
{
$postcontentoptions = array (
array(	"name" => __("PostContent Options",CURRENT_THEME),
"type" => "title"),
array("type" => "open"),
array("name" => __("Number of Featured Posts",CURRENT_THEME),
"desc" =>"How many posts would you like to be displayed as featured on the front page?",
"id" => "ttr_featured_post",
"std" => "1",
"type" => "text"),
array("name" => __("Number of Columns",CURRENT_THEME),
"desc" =>"In how many columns would you like to display the posts after featured posts on the front page?",
"id" => "ttr_post_layout",
"std" => "1",
"type"=> "text"),
array("name" => __("Display 'Continue reading' link in Posts",CURRENT_THEME),
"desc" =>"Check this box if you would like to ENABLE the 'Continue reading' link.",
"id" => "ttr_continue_reading_enable",
"std" => "true",
"type" => "checkbox"),
array("name" => __("Excerpt Length",CURRENT_THEME),
"desc" =>"How many words would you like to show in the posts on the front page?",
"id" => "ttr_post_word",
"std" => "40",
"type" => "text"),
array("name"=> __("Breadcrumbs",CURRENT_THEME),
"desc" =>"Check this box if you would like to ENABLE the 'Breadcrumbs'.",
"id" => "ttr_breadcrumb",
"std" => "true",
"type" => "checkbox"),
array("name"=> __("Breadcrumbs Text Separator",CURRENT_THEME),
"desc" =>"Choose breadcrumbs text separator.",
"id" => "ttr_breadcrumb_text_separator",
"type" => "text",
"std" => "&raquo;",
"ex" => "&amp;raquo; for '&raquo;', &amp;rsaquo; for '&rsaquo;' and &amp;#47; for '&#47;'"),
array("name"=> __("Featured Image Width(in px.)",CURRENT_THEME),
"desc" =>"Enter width for featured image.",
"id" => "ttr_featured_image_width",
"type" => "text",
"std" => "100"),
array("name"=> __("Featured Image Height(in px.)",CURRENT_THEME),
"desc" =>"Enter height for featured image.",
"id" => "ttr_featured_image_height",
"type" => "text",
"std" => "100"),
array("type" => "close")
);
return $postcontentoptions;
}
function post_options_array()
{
$postoptions = array(
array("type" => "open"),
array( "name" => __("Display Post Title",CURRENT_THEME),
"desc" => "Check this box if you would like to DISABLE the Post Title",
"id"=> "ttr_post_title",
"type" => "checkbox",
"std" => "true"),
array("type" => "close")
);
return $postoptions;
}
function page_options_array()
{
$pageoptions = array(
array("type" => "open"),
array( "name" => __("Display Page Title",CURRENT_THEME),
"desc" => "Check this box if you would like to DISABLE the Page Title",
"id"=> "ttr_page_title",
"type" => "checkbox",
"std" => "true"),
array("type" => "close")
);
return $pageoptions;
}
function general_options_array()
{
$generaloptions = array(
array("type" => "open"),
array( "name" => __("Google Analytics",CURRENT_THEME),
"desc" => "Text Box for google analytics",
"id"=> "ttr_google_analytics",
"type" => "textarea",
"std" => ""),
array( "name" => __("Display All Page Titles",CURRENT_THEME),
"desc" => "On/Off the page title",
"id"=> "ttr_all_page_title",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display All Post Titles",CURRENT_THEME),
"desc" => "On/Off the post title",
"id"=> "ttr_all_post_title",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display Post Date",CURRENT_THEME),
"desc" => "On/Off the post date",
"id"=> "ttr_remove_date",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display Author Name",CURRENT_THEME),
"desc" => "on/off the author name",
"id"=> "ttr_remove_author_name",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Show Post Category",CURRENT_THEME),
"desc" => "Show Post Category",
"id"=> "ttr_remove_post_category",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display Post Navigation",CURRENT_THEME),
"desc" => "show/hide post navigation",
"id"=> "ttr_post_navigation",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display Older/Newer Posts Link",CURRENT_THEME),
"desc" => "Show/Hide Older/Newer Posts Link",
"id"=> "ttr_older_newer_posts",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display Pagination Link Of Post Pages",CURRENT_THEME),
"desc" => "Show/Hide Pagination Link Of Post Pages",
"id"=> "ttr_pagination_link_posts",
"type" => "checkbox",
"std" => ""),
array( "name" => __("Display 'Comments are closed' Text",CURRENT_THEME),
"desc" => "Show/Hide 'Comments are closed' Text",
"id"=> "ttr_comments_closed_text",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Display Back To Top Button",CURRENT_THEME),
"desc" => "on/off the back to top button",
"id"=> "ttr_back_to_top",
"type" => "checkbox",
"std" => "true"),
array( "name" => __("Back To Top Icon",CURRENT_THEME),
"desc" => "Choose icon for Back To Top Button.",
"id"=> "ttr_icon_back_to_top",
"type" => "media",
"std" => ""),
array( "name" => __("Read More",CURRENT_THEME),
"desc" => "Change Text For Read More Link",
"id"=> "ttr_read_more",
"type" => "text",
"std" => __("Read More...",CURRENT_THEME)),
array("type" => "close")
);
return $generaloptions;
}
?>
