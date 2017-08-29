<?php
ob_start();

/**
 * Twenty Thirteen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentythirteen_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentythirteen_excerpt_length' );
 *     ...
 * }
 * </code> 
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
@define('CURRENT_THEME',  wp_get_theme() );
global $theme_widget_args;

if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override theme_setup() in a child theme, add your own theme_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 */
function theme_setup() {

	/* Make Twenty Thirteen available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and replace
	 * to change 'twentythirteen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( CURRENT_THEME, TEMPLATEPATH . '/languages' );
	include 'widgetinit.php';
	require_once('functions-1.php');
	require_once('custommenu.php');
	require_once('loginform.php');

	

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Load up our theme options page and related code.
	

	

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	$width  = get_option( 'ttr_featured_image_width' );
	$height = get_option( 'ttr_featured_image_height' );
		
	set_post_thumbnail_size( $width, $height,true );

	// Add support for a variety of post formats
	// add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'wheel' => array(
			'url' => '%s/images/headers/wheel.jpg',
			'thumbnail_url' => '%s/images/headers/wheel-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Wheel', CURRENT_THEME )
		),
		'shore' => array(
			'url' => '%s/images/headers/shore.jpg',
			'thumbnail_url' => '%s/images/headers/shore-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Shore', CURRENT_THEME )
		),
		'trolley' => array(
			'url' => '%s/images/headers/trolley.jpg',
			'thumbnail_url' => '%s/images/headers/trolley-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Trolley', CURRENT_THEME )
		),
		'pine-cone' => array(
			'url' => '%s/images/headers/pine-cone.jpg',
			'thumbnail_url' => '%s/images/headers/pine-cone-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Pine Cone', CURRENT_THEME )
		),
		'chessboard' => array(
			'url' => '%s/images/headers/chessboard.jpg',
			'thumbnail_url' => '%s/images/headers/chessboard-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Chessboard', CURRENT_THEME )
		),
		'lanterns' => array(
			'url' => '%s/images/headers/lanterns.jpg',
			'thumbnail_url' => '%s/images/headers/lanterns-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Lanterns', CURRENT_THEME )
		),
		'willow' => array(
			'url' => '%s/images/headers/willow.jpg',
			'thumbnail_url' => '%s/images/headers/willow-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Willow', CURRENT_THEME )
		),
		'hanoi' => array(
			'url' => '%s/images/headers/hanoi.jpg',
			'thumbnail_url' => '%s/images/headers/hanoi-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Hanoi Plant', CURRENT_THEME )
		)
	) );
}
endif; // twentythirteen_setup




function twentythirteen_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentythirteen_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function twentythirteen_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', CURRENT_THEME ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentythirteen_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function twentythirteen_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentythirteen_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentythirteen_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function twentythirteen_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentythirteen_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentythirteen_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function twentythirteen_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentythirteen_page_menu_args' );




/**
 * Display navigation to next/previous pages when applicable
 */
function twentythirteen_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">

		<?php if(get_option('ttr_post_navigation')):?>
			<h3 class="assistive-text"><?php echo(__( 'Post navigation',CURRENT_THEME )); ?></h3>
			<?php endif; ?>	

			<?php
			 if(get_option('ttr_pagination_link_posts')){
				global $wp_query;
				
				$big = 999999999; // need an unlikely integer
				echo '<div class="pagination">';
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'prev_next'    => True,
					'format' => '?paged=%#%',
					'prev_text'    => __('Previous',CURRENT_THEME),
					'next_text'    => __('Next',CURRENT_THEME),
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
				) );
				echo '</div>';
			 }
			 if(get_option('ttr_older_newer_posts'))
			 { ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', CURRENT_THEME ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', CURRENT_THEME ) ); ?></div>
			<?php } ?>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Twenty Thirteen 1.0
 * @return string|bool URL or false when no link is present.
 */
function twentythirteen_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function twentythirteen_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}
if ( ! function_exists( 'twentythirteen_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentythirteen_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', CURRENT_THEME ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', CURRENT_THEME ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<!--<div id="comment-<?php comment_ID(); ?>" class="comment">-->
		<div>
			<!--<footer class="comment-meta">-->
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', CURRENT_THEME ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', CURRENT_THEME ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', CURRENT_THEME ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', CURRENT_THEME ); ?></em>
					<br />
				<?php endif; ?>
<!--
			</footer>-->

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', CURRENT_THEME ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for twentythirteen_comment()


if ( ! function_exists( 'twentythirteen_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentythirteen_posted_on to override in a child theme
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_posted_on($date,$author) {

	$var_date=get_option('ttr_remove_date');
	$var_author=get_option('ttr_remove_author_name');
	echo '<div class="postedon">';
	if($date && $author)
	{ 
		
		if($var_date && $var_author)
		{
			printf( __( '<span class="meta"> '. __('Posted on ',CURRENT_THEME ). '</span> <img alt="date" src="'. get_bloginfo('template_url').'/images/datebutton.png"/><a href="%1$s" title="%2$s" rel="bookmark">&nbsp;<time datetime="%3$s" pubdate>%4$s</time></a><span class = "meta">  '. __('by ',CURRENT_THEME ). ' </span> <img alt="author" src="'.get_bloginfo('template_url').'/images/authorbutton.png"/>   <a href="%5$s" title="%6$s" rel="author">%7$s</a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			esc_html( get_the_author() )
		);
		}
		else if($var_author){
			printf( __( '<span class="meta-sep"> '. __('Posted by ',CURRENT_THEME ). '</span> <img alt="author" src="'.get_bloginfo('template_url').'/images/authorbutton.png"/> %1$s', CURRENT_THEME ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			get_the_author())
			);
		}
		
		else if($var_date)
		{
			printf( __( '<span class="meta">  '. __('Posted on ',CURRENT_THEME ). '</span><img alt="date" src="'. get_bloginfo('template_url').'/images/datebutton.png"/> <time datetime="%3$s" pubdate>%4$s</time></a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);
		}
		}
	
	else if($date && !$author)
	{
	if($var_date && $var_author)
		{
			printf( __( '<span class="meta"> '. __('Posted on ',CURRENT_THEME ). '</span> <img alt="date" src="'. get_bloginfo('template_url').'/images/datebutton.png"/><a href="%1$s" title="%2$s" rel="bookmark">&nbsp;<time datetime="%3$s" pubdate>%4$s</time></a><span class = "meta"> '. __('by ',CURRENT_THEME ). '</span><a href="%5$s" title="%6$s" rel="author">%7$s</a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			esc_html( get_the_author() )
		);
		}
		else if($var_author){
			printf( __( '<span class="meta-sep"> '. __('Posted by ',CURRENT_THEME ). '</span> %1$s ', CURRENT_THEME ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			get_the_author())
			);
		}
		
		else if($var_date)
		{
			printf( __( '<span class="meta"> '. __('Posted on ',CURRENT_THEME ). '</span> <img alt="date" src="'. get_bloginfo('template_url').'/images/datebutton.png"/> <time datetime="%3$s" pubdate>%4$s</time></a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);
		}
	}
	elseif(!$date && $author)
	{
	if($var_date && $var_author)
		{
			printf( __( '<span class="meta"> '. __('Posted on ',CURRENT_THEME ). '</span> <a href="%1$s" title="%2$s" rel="bookmark">&nbsp;<time datetime="%3$s" pubdate>%4$s</time></a><span class = "meta">  '. __('by ',CURRENT_THEME ). ' </span><img alt="author" src="'.get_bloginfo('template_url').'/images/authorbutton.png"/>   <a href="%5$s" title="%6$s" rel="author">%7$s</a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			esc_html( get_the_author() )
		);
		}
		else if($var_author){
			printf( __( '<span class="meta-sep"> '. __('Posted by ',CURRENT_THEME ). '</span> <img alt="author" src="'.get_bloginfo('template_url').'/images/authorbutton.png"/> %1$s  ', CURRENT_THEME ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			get_the_author())
			);
		}
		
		else if($var_date)
		{
			printf( __( '<span class="meta">  '. __('Posted on ',CURRENT_THEME ). ' <time datetime="%3$s" pubdate>%4$s</time></a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);
		}
		}
	else
	{
		
		if($var_date && $var_author)
		{
			printf( __( '<span class="meta"> '. __('Posted on ',CURRENT_THEME ). '</span> <a href="%1$s" title="%2$s" rel="bookmark">&nbsp;<time datetime="%3$s" pubdate>%4$s</time></a><span class = "meta"> '. __('by ',CURRENT_THEME ). '</span><a href="%5$s" title="%6$s" rel="author">%7$s</a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			esc_html( get_the_author() )
		);
		}
		else if($var_author){
			printf( __( '<span class="meta-sep"> '. __('Posted by ',CURRENT_THEME ). '</span>  %1$s  ', CURRENT_THEME ),
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', CURRENT_THEME ), get_the_author() ),
			get_the_author())
			);
		}
		
		else if($var_date)
		{
			printf( __( '<span class="meta"> '. __('Posted on ',CURRENT_THEME ). '<time datetime="%3$s" pubdate>%4$s</time></a>', CURRENT_THEME ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);
		}
		
	echo '</div>';
	}
}
endif;


/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_body_classes( $classes ) {

	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_classes' );




function theme_nav_menu($cssprefix="ttr_",$location,$mmenu,$magmenu)
{
   
$output='';
	$locations = get_nav_menu_locations();
	if(empty($locations))
	$menu=NULL;
	else
	$menu = wp_get_nav_menu_object( $locations[ $location] );
	
	if($menu==NULL)
	{
		return generate_menu($cssprefix,$mmenu,$magmenu);
	}
	else{
		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		$count = count($menu_items);
		foreach($menu_items as $key=>$menu_item )
	{
	if($menu_item->menu_item_parent!=0)
	continue;
		$childs=theme_getsubmenu($menu_items,$menu_item);
				
		if(empty($childs))
		{
		
			if( theme_curPageURL()===$menu_item->url)
			{
				$output.='<li class="'.$cssprefix.$mmenu.'_items_parent"><a href="' . $menu_item->url . '" class="'.$cssprefix.$mmenu.'_items_parent_link_active"><span class="menuchildicon"></span>' . $menu_item->title . '</a>';
			}
			else if (function_exists('woocommerce_get_page_id') && (int) woocommerce_get_page_id('shop') == $menu_item->object_id &&  is_shop())
			{
				$shop_page = (int) woocommerce_get_page_id('shop');
				if ( $shop_page == $menu_item->object_id)
				{
					$output.='<li class="'.$cssprefix.$mmenu.'_items_parent"><a href="' . $menu_item->url . '" class="'.$cssprefix.$mmenu.'_items_parent_link_active"><span class="menuchildicon"></span>' . $menu_item->title . '</a>';
				}
			
			}
			else{
				$output.='<li class="'.$cssprefix.$mmenu.'_items_parent"><a href="' . $menu_item->url . '" class="'.$cssprefix.$mmenu.'_items_parent_link"><span class="menuchildicon"></span>' . $menu_item->title . '</a>';
			}
			if ($key != ($count - 1))
							$output .= ('<hr class="horiz_separator" />');
			$output.='</li>';
		}
		else{
		
		
			if(theme_curPageURL()===$menu_item->url)
			{
				$output.='<li class="'.$cssprefix.$mmenu.'_items_parent"><a href="' . $menu_item->url . '" class="'.$cssprefix.$mmenu.'_items_parent_link_active_arrow"><span class="menuchildicon"></span>' . $menu_item->title . '</a>';
			}
			else if (function_exists('woocommerce_get_page_id') && (int) woocommerce_get_page_id('shop') == $menu_item->object_id &&  is_shop())
			{
				$shop_page = (int) woocommerce_get_page_id('shop');
				if ( $shop_page == $menu_item->object_id)
				{
					$output.='<li class="'.$cssprefix.$mmenu.'_items_parent"><a href="' . $menu_item->url . '" class="'.$cssprefix.$mmenu.'_items_parent_link_active_arrow"><span class="menuchildicon"></span>' . $menu_item->title . '</a>';
				}
					
			}
			else{
				$output.='<li class="'.$cssprefix.$mmenu.'_items_parent"><a href="' . $menu_item->url . '" class="'.$cssprefix.$mmenu.'_items_parent_link_arrow"><span class="menuchildicon"></span>' . $menu_item->title . '</a>';
			}

			if ($key != ($count - 1))
							$output .= ('<hr class="horiz_separator" />');
			$output.=generate_level1_custom_children($menu_items,$childs,$magmenu);
			$output.='</li>';
		}
	}
	return $output;
	}
}

function theme_curPageURL() {
 $pageURL = 'http';
 if (!empty($_SERVER['HTTPS'])) {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


function theme_getsubmenu($menu_items,$parent){
	$submenu = array();  // all menu items under $menuID

  foreach($menu_items as $key => $item){
      if($item->menu_item_parent == $parent->ID)
	  {
	
	  	$submenu[] = $item;
		
	  }
         
    } 
	return $submenu;   
}



function generate_menu($cssprefix="ttr_",$meenu, $magmenu)
{
 $output='';
 		if( is_front_page())
	{
		$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_home_url() . '" class="'.$cssprefix.$meenu.'_items_parent_link_active"><span class="menuchildicon"></span>'.__('Home',CURRENT_THEME).'</a>';
		$output .= ('<hr class="horiz_separator" />');
		$output .= '</li>';
	}
	else{
		$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_home_url() . '" class="'.$cssprefix.$meenu.'_items_parent_link"><span class="menuchildicon"></span>'.__('Home',CURRENT_THEME).'</a>';
		$output .= ('<hr class="horiz_separator" />');
		$output .= '</li>';
	}
 
	$pages=get_pages(array('child_of' => 0,'hierarchical' => 0,'parent' => 0,'sort_column' => 'menu_order,post_title'));
	$count = count($pages);
	foreach($pages as $key=>$pagg )
	{
		$childs=get_pages(array('child_of' => $pagg->ID,'hierarchical' => 0,'parent' => $pagg->ID,'sort_column' => 'menu_order,post_title'));
		if(empty($childs))
		{
			if(home_url()!=untrailingslashit(get_permalink( $pagg->ID)))
				{

				if( get_permalink()===get_permalink( $pagg->ID))
					{
						$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_permalink( $pagg->ID ) . '" class="'.$cssprefix.$meenu.'_items_parent_link_active"><span class="menuchildicon"></span>' . $pagg->post_title . '</a>';
						if ($key != ($count - 1))
							$output .= ('<hr class="horiz_separator" />');
						$output .= '</li>';
					}
				else if (function_exists('woocommerce_get_page_id') && (int) woocommerce_get_page_id('shop') === $pagg->ID &&  is_shop())
					{
						$shop_page = (int) woocommerce_get_page_id('shop');
						if ( $shop_page === $pagg->ID)
						{
							$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_permalink( $pagg->ID ) . '" class="'.$cssprefix.$meenu.'_items_parent_link_active"><span class="menuchildicon"></span>' . $pagg->post_title . '</a>';
							if ($key != ($count - 1))
								$output .= ('<hr class="horiz_separator" />');
							$output .= '</li>';
						}
						
					}
				else
					{
						$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_permalink( $pagg->ID ) . '" class="'.$cssprefix.$meenu.'_items_parent_link"><span class="menuchildicon"></span>' . $pagg->post_title . '</a>';
						if ($key != ($count - 1))
							$output .= ('<hr class="horiz_separator" />');
						$output .= '</li>';
					}
				}
		}
		else{
		if(home_url()!=untrailingslashit(get_permalink( $pagg->ID)))
				{
			if(get_permalink()===get_permalink( $pagg->ID))
			{
				$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_permalink( $pagg->ID ) . '" class="'.$cssprefix.$meenu.'_items_parent_link_active_arrow"><span class="menuchildicon"></span>' . $pagg->post_title . '</a>';
			}
			else if (function_exists('woocommerce_get_page_id') && (int) woocommerce_get_page_id('shop') === $pagg->ID &&  is_shop())
			{
				$shop_page = (int) woocommerce_get_page_id('shop');
				if ( $shop_page === $pagg->ID)
				{
					$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_permalink( $pagg->ID ) . '" class="'.$cssprefix.$meenu.'_items_parent_link_active_arrow"><span class="menuchildicon"></span>' . $pagg->post_title . '</a>';
				}
			
			}
			else{
				$output.='<li class="'.$cssprefix.$meenu.'_items_parent"><a href="' . get_permalink( $pagg->ID ) . '" class="'.$cssprefix.$meenu.'_items_parent_link_arrow"><span class="menuchildicon"></span>' . $pagg->post_title . '</a>';
			}
			}
			if ($key != ($count - 1))
							$output .= ('<hr class="horiz_separator" />');
			$output.=generate_level1_children($childs, $magmenu);
			$output.='</li>';
		}
	}
	return $output;
}

function generate_level1_children($args, $magmenu)
{
	$output='';
	$output.='<ul class="child">';
	$count = count($args);
	foreach($args as $key=>$child)
	{
		$childs=get_pages(array('child_of' => $child->ID,'hierarchical' => 0,'parent' => $child->ID,'sort_column' => 'menu_order,post_title'));
		if(empty($childs))
		{
			$output.= ('<li><a href="' .  get_permalink( $child->ID ) .  '"><span class="menuchildicon"></span>' .   $child->post_title .  '</a>');
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
		}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.= ('</li>');
		}
		else{
			$output.='<li><a href="' . get_permalink( $child->ID ) . '" class="subchild"><span class="menuchildicon"></span>' .  $child->post_title . '</a>';
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.= generate_level2_children($childs,$magmenu); 
			$output.= '</li>';
		}
	}
	$output.='</ul>';
	return $output;
}

function generate_level2_children($args,$magmenu)
{
	$output='';
	$output.='<ul>';
	$count = count($args);
	foreach($args as $key=>$child)
	{
		$childs=get_pages(array('child_of' => $child->ID,'hierarchical' => 0,'parent' => $child->ID,'sort_column' => 'menu_order,post_title'));
		if(empty($childs))
		{
			$output.='<li><a href="' . get_permalink( $child->ID ) . '"><span class="menuchildicon"></span>' . $child->post_title . '</a>';
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.='</li>';
		}
		else{
			$output.='<li><a href="' . get_permalink( $child->ID ) . '" class="subchild"><span class="menuchildicon"></span>' . $child->post_title . '</a>';
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.= generate_level2_children($childs, $magmenu);
			$output.='</li>';
		}
	}
	$output.='</ul>';
	return $output;
}


function generate_level1_custom_children($menu_items,$args,$magmenu)
{
	$output='';
	$count = count($args);
	$output.='<ul class="child">';
	foreach($args as $key=>$child)
	{
	
		$childs=theme_getsubmenu($menu_items,$child);
		if(empty($childs))
		{
			$output.= ('<li><a href="' .  $child->url .  '"><span class="menuchildicon"></span>' .   $child->title .  '</a>');
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.= '</li>';
		}
		else{
			$output.='<li><a href="' . $child->url . '" class="subchild"><span class="menuchildicon"></span>' .  $child->title . '</a>';
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.= generate_level2_custom_children($menu_items,$childs,$magmenu); 
			$output.= '</li>';
		}
	}
	$output.='</ul>';
	return $output;
}


function generate_level2_custom_children($menu_items,$args,$magmenu)
{
	$output='';
	$count = count($args);
	$output.='<ul>';
	foreach($args as $key=>$child)
	{
		$childs=theme_getsubmenu($menu_items,$child);
		if(empty($childs))
		{
			$output.='<li><a href="' . $child->url . '"><span class="menuchildicon"></span>' . $child->title . '</a>';
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.='</li>';
		}
		else{
			$output.='<li><a href="' . $child->url . '" class="subchild"><span class="menuchildicon"></span>' . $child->title . '</a>';
			if($magmenu)
			{
				$output .= ('<hr class="separator" />');
			}
			else 
			{
				if ($key != ($count - 1))
				$output .= ('<hr class="separator" />');
			}
			$output.= generate_level2_custom_children($menu_items,$childs,$magmenu);
			$output.='</li>';
		}
	}
	$output.='</ul>';
	return $output;
}



function theme_dynamic_sidebar($index){
	global $wp_registered_sidebars, $wp_registered_widgets, $cssprefix, $params, $menuclass;
	
	if ( is_int($index) ) {
		$index = "sidebar-$index";
		$i=0;
	} else {
		$i = 0;
		$index = sanitize_title($index);
		foreach ( (array) $wp_registered_sidebars as $key => $value ) {
			if ( sanitize_title($value['name']) == $index ) {
				$index = $key;
				break;
			}
		}
	}
	
	$sidebars_widgets = wp_get_sidebars_widgets();
	if ( empty( $sidebars_widgets ) )
		return false;
	
	if ( empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) || !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index]) )
		return false;
	
	$sidebar = $wp_registered_sidebars[$index];
	
	ob_start();
				if(!dynamic_sidebar($index)){
					return FALSE;
				} 
				$sidebarcontent=ob_get_clean();

	$data = explode("~tt", $sidebarcontent);

	foreach ( (array) $sidebars_widgets[$index] as $id ) {
		$params = array_merge(
				array( array_merge( (array)$sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']) ) ),
				(array) $wp_registered_widgets[$id]['params']);
		if (!isset($data[$i]))
		{
			continue;
		}
		
		$classname_ = '';
		foreach ( (array) $wp_registered_widgets[$id]['classname'] as $cn ) {
			if ( is_string($cn) )
				$classname_ .= '_' . $cn;
			elseif ( is_object($cn) )
			$classname_ .= '_' . get_class($cn);
		}
		$classname_ = ltrim($classname_, '_');
		$params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);
		$params = apply_filters( 'dynamic_sidebar_params', $params );
		
		$widget = $data[$i];
		
		$i++;
		if(!is_string($widget) || strlen(str_replace(array('&nbsp;', ' ', "\n", "\r", "\t"), '', $widget)) == 0) continue;
		if(strlen(str_replace(array('&nbsp;', ' ', "\n", "\r", "\t"), '', $params[0]['before_title'])) == 0)
		{
			$widget = preg_replace('#(\'\').*?('.$params[0]['after_title'].')#', '$1$2', $widget);
		}
		
	$pos=strpos($widget,$params[0]['after_title']);
	
	$widget_id = $params[0]['widget_id'];
	
	$widget_obj = $wp_registered_widgets[$widget_id];
	
	$widget_opt = get_option($widget_obj['callback'][0]->option_name);
	
	$widget_num = $widget_obj['params'][0]['number'];
	
	if(isset($widget_opt[$widget_num]['style']))
	{
		$style = $widget_opt[$widget_num]['style'];
	}
	else
		$style = '';
	
	if($style == "block")
	{
		if ($pos===FALSE) {
							
			$widget =str_replace($params[0]['before_widget'],'<div class = "'.$cssprefix.'block"> <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
			<div class = "'.$cssprefix.'block_without_header"> </div> <div class="'.$cssprefix.'block_content">', $widget);
		}
		else
		{
			 $widget =str_replace($params[0]['before_widget'],'<div class="'.$cssprefix.'block"><div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div> <div class="'.$cssprefix.'block_header">',$widget);
		}
		$params[0]['after_widget'] = str_replace('~tt', '', $params[0]['after_widget']);
		$widget =str_replace($params[0]['after_widget'], '</div></div>', $widget);
		$widget =str_replace($params[0]['after_title'],'</'.get_option('ttr_heading_tag_block').'></div> <div class="'.$cssprefix.'block_content">',$widget);
		$widget =str_replace($params[0]['before_title'],'<'.get_option('ttr_heading_tag_block').' style="'. 'color:'.get_option('ttr_blockheading').';font-size:'.get_option('ttr_font_size_block').'px;" class="'.$cssprefix.'block_heading">',$widget);
	}
	else if ($style == "none") {
		$classname_ = '';
		foreach ( (array) $wp_registered_widgets[$id]['classname'] as $cn ) {
			if ( is_string($cn) )
				$classname_ .= '_' . $cn;
			elseif ( is_object($cn) )
			$classname_ .= '_' . get_class($cn);
		}
		$classname_ = ltrim($classname_, '_');
		$widget =str_replace($params[0]['before_widget'], sprintf('<aside id="%1$s" class="widget %2$s">', $id, $classname_), $widget);
		$params[0]['after_widget'] = str_replace('~tt', '', $params[0]['after_widget']);
		$widget =str_replace($params[0]['after_widget'], '</aside>', $widget);
		$widget =str_replace($params[0]['after_title'],'</h3>', $widget);
		$widget =str_replace($params[0]['before_title'],'<h3 class="widget-title">', $widget);
	}
	else 
	{
		if($index=='sidebar-1')
		{

		if ($pos===FALSE) {
		
			$widget =str_replace($params[0]['before_widget'],'<div class = "'.$cssprefix.'block"> <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
			<div class = "'.$cssprefix.'block_without_header"> </div> <div class="'.$cssprefix.'block_content">', $widget);
		}
		}
	}
	
	echo $widget;
	
	}
	
			
return true;
}

function theme_comment_form( $args = array(), $post_id = null,$cssprefix="ttr_" ) {
	global $user_identity, $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name',CURRENT_THEME ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .'<br/>'.
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email',CURRENT_THEME ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .'<br/>'.
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website',CURRENT_THEME ) . '</label>' .'<br/>'.
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s',CURRENT_THEME), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>'.'<br/>',
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.',CURRENT_THEME ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>',CURRENT_THEME ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.',CURRENT_THEME ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s',CURRENT_THEME ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply',CURRENT_THEME ),
		'title_reply_to'       => __( 'Leave a Reply to %s',CURRENT_THEME ),
		'cancel_reply_link'    => __( 'Cancel reply',CURRENT_THEME ),
		'label_submit'         => __( 'Post Comment',CURRENT_THEME ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open() ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			
			<!--<div id="respond">-->
			
			<div class="<?php echo $cssprefix?>comment">
			   <div class="<?php echo $cssprefix?>comment_header">
			   <div class="<?php echo $cssprefix?>comment_header_left_border_image">
			   <div class="<?php echo $cssprefix?>comment_header_right_border_image">
			   </div>
			   </div>  
			   </div>
			   <div class="<?php echo $cssprefix?>comment_content">
               <div class="<?php echo $cssprefix?>comment_content_left_border_image">
               <div class="<?php echo $cssprefix?>comment_content_right_border_image">
               <div class="<?php echo $cssprefix?>comment_content_inner">
			   
			   
				<h3 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h3>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php echo $args['comment_notes_after']; ?>
						<div class="form-submit">
						<span class="<?php echo $cssprefix?>button" onmouseover="this.className='<?php echo $cssprefix?>button_hover1';" onmouseout="this.className='<?php echo $cssprefix?>button';">
					
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							</span>
						<div style="clear:both;"></div>
							<?php comment_id_fields( $post_id ); ?>
					</div>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
			   </div>
			   </div>
			   </div>
			   </div>
			   <div class="<?php echo $cssprefix?>comment_footer">
              <div class="<?php echo $cssprefix?>comment_footer_left_border_image">
             <div class="<?php echo $cssprefix?>comment_footer_right_border_image"> 
			 </div>
             </div>
              </div>
			
			
			
			
			
		<!--	</div>--><!-- #respond -->
		</div>
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}

function count_sidebar_widgets( $sidebar_id) {
    $the_sidebars = wp_get_sidebars_widgets();
    if( !isset( $the_sidebars[$sidebar_id] ) )
        return FALSE;
    else
        return count( $the_sidebars[$sidebar_id] );
}

add_action('admin_menu', 'mytheme_add_admin');
function mytheme_add_admin() {

    global $themename, $shortname, $contactformoptions;
	if (  function_exists( 'header_options_array' ) ) 	
    $headeroptions = header_options_array(); 

	if (  function_exists( 'postcontent_array' ) ) 	
    $postcontentoptions = postcontent_array();  

	if (  function_exists( 'footer_options_array' ) ) 	
    $footeroptions = footer_options_array();

	if ( function_exists( 'sidebar_options_array' ) ) 	
    $sidebaroptions = sidebar_options_array();

	if (  function_exists( 'general_options_array' ) ) 	
	$generaloptions = general_options_array();

    if (get_bloginfo('version') >= 3.4)
    {    $themename = wp_get_theme(); }
    else
    {    $themename = get_current_theme(); }
	$url = get_bloginfo('template_url');
    
    if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__)) {
    	
    	if ( isset ( $_GET['tab'] ) ) 
    		$tab = $_GET['tab'];
   		else 
   			$tab = 'postcontent';
   		
    	   	if ($tab == "header")
    		{
    			$options = $headeroptions;
    		}
    		else if ($tab == "postcontent")
    		{
    			$options = $postcontentoptions;
    		}
    		else if ($tab == "sidebar")
    		{
    			$options = $sidebaroptions;
    		}
    		else if ($tab == "footer")
    		{
    			$options = $footeroptions;
    		}
    		else 
    		{
    			$options = $generaloptions;
    		}
    		if(isset($_REQUEST['action'])) 	
			{
				if ( 'ttrsave' == $_REQUEST['action'] ) {
            	
            	foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                    
                    
                header("Location: admin.php?page=functions.php&tab=".$tab."&saved=true");
                die;
        }         
    }
    }

    add_object_page("Options", __("Theme Options",CURRENT_THEME), 'edit_theme_options', basename(__FILE__), 'mytheme_admin', $url.'/images/settings_theme.png' );
}


add_action('init', 'load_theme_scripts');
function load_theme_scripts() {
	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_script( 'farbtastic' );
}

function my_add_init()

{
	$screen = get_current_screen();
	wp_register_script( 'upload', get_template_directory_uri() .'/js/upload.js', array('jquery','media-upload','thickbox') );
	wp_register_script( 'addtextbox', get_template_directory_uri() .'/js/addtextbox.js', array(),1.0,false );
	wp_enqueue_script( 'addtextbox', get_template_directory_uri() .'/js/addtextbox.js', array(),1.0,false );
	if ($screen->id =='toplevel_page_functions')
	{
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('upload');
		wp_enqueue_style('thickbox');

	}
}
add_action('admin_enqueue_scripts', 'my_add_init');

function options_setup() {
	global $pagenow;

	if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {
		// Now we'll replace the 'Insert into Post Button' inside Thickbox
		add_filter( 'gettext', 'replace_thickbox_text'  , 1, 3 );
	}
}
add_action( 'admin_init', 'options_setup' );

function replace_thickbox_text($translated_text, $text, $domain) {
	if ('Insert into Post' == $text) {
		$referer = strpos( wp_get_referer(), 'functions.php' );
		if ( $referer != '' ) {
			return __('Select this image!',CURRENT_THEME);
		}
	}
	return $translated_text;
}

function mytheme_admin() {

    global $themename, $shortname, $typographyoptions;   
	if (  function_exists( 'color_array' ) ) 
	$colors=color_array();
	if (  function_exists( 'header_options_array' ) ) 
	$headeroptions=header_options_array();
	if (  function_exists( 'postcontent_array' ) ) 
	$postcontentoptions=postcontent_array();
	if (  function_exists( 'footer_options_array' ) ) 
	$footeroptions=footer_options_array();
	if (  function_exists( 'sidebar_options_array' ) ) 
	$sidebaroptions= sidebar_options_array();
	if (  function_exists( 'general_options_array' ) ) 
	$generaloptions = general_options_array();
?>
<div id="aq_container" class="wrap">
<div id="header">
<div class="navbar">
<div class="navbar-inner">
<div id="info_bar">
<div id="expand_options" class="expand">Expand</div>
</div>
<a class="brand" href="<?php echo admin_url("admin.php?page=functions.php"); ?>"><?php echo $themename; ?></a>
<div class="icon-option"> </div>
</div>
</div>
</div>
<div id="main">
<?php if ( isset ( $_GET['tab'] ) ) admin_tabs($_GET['tab']); else admin_tabs('postcontent'); ?>
<?php if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab'];
   else $tab = 'postcontent';
   ?>
<?php switch($tab) {

	case "header":
		if (is_array($headeroptions)):
		 ?>
		<div id="content">
		<form method="post">
		<?php
		foreach ($headeroptions as $value) {
			switch ($value['type']) {
		
				case "open":
					?>
		        <table class="table table-hover table-bordered">
				<?php 	break;
				
						case "close":
				?>
			    </table>
		        <?php   break;
				
				case "select":
				?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
		       </tr>
		                
		        <?php   break;
		            
				case "checkbox":
				?>
				<tr>
		            <td ><h6><?php echo $value['name']; ?></h6></td>
		            <td><?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
		                <div class="normal-toggle-button">
		                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
		                </div>
		            </td>
		        </tr>
		        <?php 	break;
		
				case 'text':
				?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" /></td>
		        </tr>
				<?php 	break;	
				case 'media': ?>
	
				<tr>
				<td><h6><?php echo $value['name']; ?></h6></td>
				<td><input type="text" class="upload" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_url(get_option( $value['id'] )); } else { echo esc_url($value['std']); update_option( $value['id'], $value['std'] ); } ?>" />
				<input type="button" class="ttrbutton" value="<?php _e( 'Upload'); ?>" /></td>
				</tr>
	
				<?php break; 
					} 
				}
				?>
				<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
				<input type="hidden" name="action" value="ttrsave"></input>
				</form>
				</div>
				<?php endif; ?>
				<?php break;
				
	case "postcontent": ?>
		<div id="content">
		<form method="post">
		<?php
		foreach ($postcontentoptions as $value) {
			switch ($value['type']) {
		
				case "open":
					?>
		        <table class="table table-hover table-bordered">
				<?php 	break;
				
						case "close":
				?>
			    </table>
		        <?php   break;
				
				case "select":
				?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
		       </tr>
		                
		        <?php   break;
		            
				case "checkbox":
				?>
				<tr>
		            <td ><h6><?php echo $value['name']; ?></h6></td>
		            <td><?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
		                <div class="normal-toggle-button">
		                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
		                </div>
		            </td>
		        </tr>
		        <?php 	break;
		
				case 'text':
				?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" />
					<?php if (isset($value['ex'])):?>
					<br />
		            <?php echo $value['ex'];?>
		            <?php endif;?>
					</td>
		        </tr>
				<?php 	break;	 
					} 
				}
				?>
				<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
				<input type="hidden" name="action" value="ttrsave"></input>
				
				</form>
				</div>
				
				<?php break;
				
	case "sidebar": 
	if (is_array($sidebaroptions)):
	?>
		<div id="content">
		<form method="post">
		<?php
		foreach ($sidebaroptions as $value) {
			switch ($value['type']) {
		
				case "open":
					?>
		        <table class="table table-hover table-bordered">
				<?php 	break;
				
						case "close":
				?>
			    </table>
		        <?php   break;
				
				case "select":
				?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
		       </tr>
		                
		        <?php   break;
		            
				case "checkbox":
				?>
			   <tr>
		            <td ><h6><?php echo $value['name']; ?></h6></td>
		            <td><?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
		                <div class="normal-toggle-button">
		                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
		                </div>
		            </td>
		        </tr>
		        <?php 	break;
		
				case 'text':
				?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" /></td>
		        </tr>
				<?php 	break;	 
					} 
				}
				?>
				<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
				<input type="hidden" name="action" value="ttrsave"></input>
				</form>
				</div>
				<?php endif; ?>
				<?php break;
				
	case "footer":
		if (is_array($footeroptions)):
?>
		<div id="content">
		<form method="post">
		<?php 
		foreach ($footeroptions as $value) { 
			switch ($value['type']) {
    	    	
				case "open":
		?>
        <table class="table table-hover table-bordered">
		<?php 	break;
		
				case "close":
		?>
	    </table>
        <?php   break;
		
		case "select":
		?>
        <tr>
            <td><h6><?php echo $value['name']; ?></h6></td>
            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
        <?php   break;
            
		case "checkbox":
		?>
		<tr>
            <td ><h6><?php echo $value['name']; ?></h6></td>
            <td><?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
                <div class="normal-toggle-button">
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
                </div>
            </td>
        </tr>
        <?php 	break;

		case 'text':
		?>
        <tr>
            <td><h6><?php echo $value['name']; ?></h6></td>
            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" /></td>
        </tr>
		<?php 	break;	 
		
		case 'textarea':
			?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?></textarea></td>
		        </tr>
				<?php 	break;	

		case 'media': ?>
					
					<tr>
					<td><h6><?php echo $value['name']; ?></h6></td>
					<td><input type="text" class="upload" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_url(get_option( $value['id'] )); } else { echo esc_url($value['std']); update_option( $value['id'], $value['std'] ); } ?>" />
					<input type="button" class="ttrbutton" value="<?php _e( 'Upload'); ?>" /></td>
					</tr>
					
				<?php break;
			} 
		}
		?>
		
		
		<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
		<input type="hidden" name="action" value="ttrsave"></input>
		</form>
		</div>
		<?php endif; ?>
		<?php 
		break;
		
		case "colors": 
			if (is_array($headeroptions) || is_array($sidebaroptions) || is_array($footeroptions)):
	?>
	
    
   
   
   
	<div id="content">
	
<?php 	if ( isset($_POST['update_options'])) { color_picker_option_update(); }
	?>
	<form method="POST">	
						<table class="table table-hover table-bordered">
			 <tbody>
			 <?php if (is_array($headeroptions)):?>
				<tr>
					<td><h6><?php echo(__('Site Title Color',CURRENT_THEME)); ?></h6></td>
					<td>	
						<input type="text" id="color1" value="<?php echo get_option('ttr_title'); ?>" name="color_picker_color1" />
						<div id="color_picker_color1"></div>
					</td>
				</tr>
				<tr>
				<script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color1').hide();
    $('#color_picker_color1').farbtastic('#color1');
    $('#color1').click(function() {
        $('#color_picker_color1').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color1').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
	});
	</script>
					<td><h6><?php echo(__('Site Slogan Color',CURRENT_THEME)); ?></h6></td>
					<td>	
						<input type="text" id="color2" value="<?php echo get_option('ttr_slogan');  ?>" name="color_picker_color2" />
						<div id="color_picker_color2"></div>
					</td>
				</tr>
				<script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color2').hide();
    $('#color_picker_color2').farbtastic('#color2');
    $('#color2').click(function() {
        $('#color_picker_color2').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color2').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
	});
    </script>
				<?php endif; ?>
				<?php if (is_array($sidebaroptions)):?>
				<tr>
					<td><h6><?php echo(__('Block Heading Color',CURRENT_THEME));?></h6></td>
					<td>	
						<input type="text" id="color3" value="<?php echo get_option('ttr_blockheading'); ?>" name="color_picker_color3" />
						<div id="color_picker_color3"></div>
					</td>
				</tr>
				<script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color3').hide();
    $('#color_picker_color3').farbtastic('#color3');
    $('#color3').click(function() {
        $('#color_picker_color3').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color3').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
	});
    </script>
	  <?php if($sidebaroptions[2]['name']=='Use vertical menu on Sidebar-1'): ?>
				<tr>
					<td><h6><?php echo(__('Sidebar Menu Heading Color',CURRENT_THEME));?></h6></td>
					<td>	
						<input type="text" id="color4" value="<?php echo get_option('ttr_sidebarmenuheading'); ?>" name="color_picker_color4" />
						<div id="color_picker_color4"></div>
					</td>
				</tr>
				 <script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color4').hide();
    $('#color_picker_color4').farbtastic('#color4');
    $('#color4').click(function() {
        $('#color_picker_color4').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color4').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
	});
    </script>
	<?php endif; ?>
				<?php endif; ?>
				<?php if (is_array($footeroptions)):?>
				<tr>
					<td><h6><?php echo(__('Footer Copyright Color',CURRENT_THEME));?></h6></td>
					<td>	
						<input type="text" id="color5" value="<?php echo get_option('ttr_copyright'); ?>" name="color_picker_color5" />
						<div id="color_picker_color5"></div>
					</td>
				</tr>
				 <script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color5').hide();
    $('#color_picker_color5').farbtastic('#color5');
    $('#color5').click(function() {
        $('#color_picker_color5').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color5').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
	});
    </script>
				<tr>
					<td><h6><?php echo(__('Footer Designed By Color',CURRENT_THEME));?></h6></td>
					<td>	
						<input type="text" id="color6" value="<?php echo get_option('ttr_designedby'); ?>" name="color_picker_color6" />
						<div id="color_picker_color6"></div>
					</td>
				</tr>
				 <script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color6').hide();
    $('#color_picker_color6').farbtastic('#color6');
    $('#color6').click(function() {
        $('#color_picker_color6').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color6').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
	});
    </script>
    
	
				<tr>
					<td><h6><?php echo(__('Footer Designed By Link Color',CURRENT_THEME));?></h6></td>
					<td>	
						<input type="text" id="color7" value="<?php echo get_option('ttr_designedbylink'); ?>" name="color_picker_color7" />
						<div id="color_picker_color7"></div>
					</td>
				</tr>
				<script type="text/javascript">
	jQuery(document).ready(function($) {
    $('#color_picker_color7').hide();
    $('#color_picker_color7').farbtastic('#color7');
    $('#color7').click(function() {
        $('#color_picker_color7').fadeIn();
    });
    $(document).mousedown(function() {
        $('#color_picker_color7').each(function() {
             var display = $(this).css('display');
             if ( display == 'block' )
                 $(this).fadeOut();
         });
     });
});
</script>
				<?php endif; ?>
	
			</tbody>	
			</table>
			
			<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
			<input type="hidden" name="update_options" value="Update Options"/>
			
		</form> 
		</div>
	
<?php endif; ?>
 


<?php 		break;
		
		case "shortcodes":?>
	
		<div id="content">
		<table class="table table-hover table-bordered">
			<tbody>
				<tr>
					<td>
					<h6>
					<?php echo(__('Google Docs Viewer',CURRENT_THEME)); ?>
					</h6>
					</td>
					<td>
					<h6>
					[pdf href="http://manuals.info.apple.com/en_US/Enterprise_Deployment_Guide.pdf"]Link text.[/pdf]
					</h6>    
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('Displaying Related Posts',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[related_posts]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('Google AdSense',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[adsense client="ca-pub-4140733950946301" slot="4822962929" width=728 height=90]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('Google Chart',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[chart data="41.52,37.79,20.67,0.03" bg="F7F9FA" labels="Reffering+sites|Search+Engines|Direct+traffic|Other" colors="058DC7,50B432,ED561B,EDEF00" size="488x200" title="Traffic Sources" type="pie"]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('TweetMeme Button',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[tweet]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('Google Map',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[googlemap width=600 height=360 src="http://maps.google.co.in/maps?hl=en&ll=30.744003,76.748182&spn=0.002471,0.005284&t=h&z=18&output=embed"]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('YouTube',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[youtube value="http://www.youtube.com/watch?v=1aBSPn2P9bg"]
					</h6>
					</td>
			    </tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('Private Content',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[member]This text will be only displayed to registered users.[/member]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('PayPal',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[donate account="paypal account" type="text" text="Donation"]
					</h6>
					</td>
				</tr>
				<tr>
					<td>
					<h6>
					<?php echo(__('Contact Us Form',CURRENT_THEME));?>
					</h6>
					</td>
					<td>
					<h6>
					[contact_us_form]
					</h6>
					</td>
				</tr>
		</tbody>
	</table>
	</div>
		<?php break;
	case "contactform":
		?>
		<div id="content">
		<?php 	if ( isset($_POST['update_options'])) { contact_form_option_update(); }
		$value_contact = get_option('contact_form');

	?>
			
			<form method="POST">	
						<table class="table table-hover table-bordered">
			 <tbody>
			<tr>
					<td colspan="3"><?php echo(__("To use CONTACT FORM, apply [contact_us_form]",CURRENT_THEME));?></td>
					
				</tr>
				<tr>
				<td><?php echo(__('Admin Email Address',CURRENT_THEME));?></td>
					<td colspan="2">	
						<input type="email" id="ttr_email" <?php if($value_contact[0]['ttr_email']){ ?> value="<?php print_r($value_contact[0]['ttr_email']); ?>" <?php } else {?> value="<?php print_r(get_option('admin_email')); ?>"<?php } ?> name="ttr_email" />
						
					</td>
					
				</tr>
				
				 <tr>
					<td><?php echo(__('Field Name:',CURRENT_THEME));?></td>
					<td><?php echo(__('Required',CURRENT_THEME));?></td>
					<td><?php echo(__('Remove',CURRENT_THEME));?></td>
				</tr>
				
				
				<?php if (is_array($value_contact)): ?>
				
				<?php foreach($value_contact as $key=>$i)
				{
					foreach($value_contact[$key] as $newkey=>$j)
					{
						if($newkey == 'ttr_email' || $newkey == 'ttr_emailreq')
							continue;
			?>
					
			<?php 	if(strpos($newkey,'req')==false) { ?>  
			
						            <td><input name="<?php echo $newkey; ?>" id="<?php echo $newkey; ?>" type="<?php echo 'text'; ?>" value="<?php if ( $value_contact[$key][$newkey] != "") { print_r($value_contact[$key][$newkey]); } ?>" /></td>
						    <?php }?>    
						          
					<?php 	if(strpos($newkey,'req')!==false) { ?>
					<td>		         
						         	<?php if(isset($value_contact[$key][$newkey]) && $value_contact[$key][$newkey] == 'on') { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
						         
						           <div class="normal-toggle-button">    
										<input type="checkbox" id="<?php echo $newkey; ?>"  name="<?php echo $newkey; ?>" <?php echo $checked; ?> />
								 		</div></td>
										<?php $url = get_bloginfo('template_url');?>
								 		<td><input type="image" src="<?php echo($url).'/images/cross.png'; ?>" class="removefield" /></td>
								 		</tr>
							<?php } ?>			
						            	        
			<?php }
				}

				endif;
		?>
				
				<tr>
					<td colspan="3"><input type="button" value="<?php echo(__('Add New Field',CURRENT_THEME));?>" class="newfield" /></td>
				</tr>
	
			</tbody>	
			</table>
			<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
			<input type="hidden" name="update_options" value="Update Options"/>
		</form>
			
			</div>
			
	<?php break;
	case "generaloptions": ?>
		<div id="content">
		<form method="post">
		<?php 
		foreach ($generaloptions as $value) { 
			switch ($value['type']) {
    	    	
				case "open":
		?>
        <table class="table table-hover table-bordered">
		<?php 	break;
		
				case "close":
		?>
	    </table>
        <?php   break;
		
		case "select":
		?>
        <tr>
            <td><h6><?php echo $value['name']; ?></h6></td>
            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
        <?php   break;
            
		case "checkbox":
				?>
				<tr>
		            <td ><h6><?php echo $value['name']; ?></h6></td>
		            <td><?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
		                <div class="normal-toggle-button">
		                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
		                </div>
		            </td>
		        </tr>
		        <?php 	break;

		case 'text':
		?>
        <tr>
            <td><h6><?php echo $value['name']; ?></h6></td>
            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" /></td>
        </tr>
		<?php 	break;	 
		
		case 'textarea':
			?>
		        <tr>
		            <td><h6><?php echo $value['name']; ?></h6></td>
		            <td><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?></textarea></td>
		        </tr>
				<?php 	break;	
				case 'media': ?>
									
									<tr>
									<td><h6><?php echo $value['name']; ?></h6></td>
									<td><input type="text" class="upload" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_url(get_option( $value['id'] )); } else { echo esc_url($value['std']); update_option( $value['id'], $value['std'] ); } ?>" />
									<input type="button" class="ttrbutton" value="<?php _e( 'Upload'); ?>" /></td>
									</tr>
									
								<?php break;
			} 
		}
		?>
		
		
		<button name="ttrsave" type="submit" class="btn"><?php echo(__('Save Changes',CURRENT_THEME));?></button>
		<input type="hidden" name="action" value="ttrsave"></input>
		</form>
		</div>
			<?php break;
}?>
<div class="clear"></div>
</div>
</div>
<?php }

function contact_form_option_update()
{

	$post_val=array();
	foreach($_POST as $key=>$i)
	{
	
		if($key=='ttrsave' || $key=='update_options')
			continue;
		if(strpos($key,'req') == false)
		{
	
			$post_val_new=array();
			$post_val_new[$key] = $_POST[$key];
		
			if (isset($_POST[$key.'req']))
			{
				$post_val_new[$key.'req'] = $_POST[$key.'req'];

			}
			else 
				$post_val_new[$key.'req']='off';
			
			array_push($post_val,$post_val_new);
		}
	}
	update_option('contact_form', $post_val);

 }


function admin_tabs( $current = 'postcontent' ) {
	if (  function_exists( 'header_options_array' ) ) 	
	$headeroptions=header_options_array();

	if (  function_exists( 'footer_options_array' ) ) 	
	$footeroptions=footer_options_array();

	if (  function_exists( 'sidebar_options_array' ) ) 	
	$sidebaroptions= sidebar_options_array();

	$tabs = array( 'header' => __('Header',CURRENT_THEME), 'postcontent' => __('Post / Content',CURRENT_THEME), 'sidebar' => __('Sidebar',CURRENT_THEME), 'footer' => __('Footer',CURRENT_THEME), 'colors' => __('Colors',CURRENT_THEME), 'shortcodes' => __('Shortcodes',CURRENT_THEME), 'contactform' => __('Contact Us Form ',CURRENT_THEME),'generaloptions' => __('General',CURRENT_THEME));
	if (!is_array($headeroptions))
	{
		if (($key = array_search('Header', $tabs)) !== false) {
			unset($tabs[$key]);
		}
	}
	if (!is_array($sidebaroptions))
	{
		if (($key = array_search('Sidebar', $tabs)) !== false) {
			unset($tabs[$key]);
		}
	}
	if (!is_array($footeroptions))
	{
		if (($key = array_search('Footer', $tabs)) !== false) {
			unset($tabs[$key]);
		}
	}
	if (!is_array($headeroptions) && !is_array($sidebaroptions) && !is_array($footeroptions))
	{
		if (($key = array_search('Colors', $tabs)) !== false) {
			unset($tabs[$key]);
		}
	}
	$links = array();
	echo '<div id="aq-nav">';
	echo '<ul>';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? 'current' : '';
		echo "<li class='$class'><a href='?page=functions.php&tab=$tab'>$name</a></li>";

	}
	echo '</ul>';
	echo '</div>';
}

function color_picker_option_update()
{
	if (  function_exists( 'header_options_array' ) ) 	
	$headeroptions=header_options_array();
	if (  function_exists( 'footer_options_array' ) ) 	
	$footeroptions=footer_options_array();
	if (  function_exists( 'sidebar_options_array' ) ) 	
	$sidebaroptions= sidebar_options_array();

	if (is_array($headeroptions))
	{
		update_option('ttr_title', esc_html($_POST['color_picker_color1']));
		update_option('ttr_slogan', esc_html($_POST['color_picker_color2']));
	}
	if (is_array($sidebaroptions))
	{
		update_option('ttr_blockheading', esc_html($_POST['color_picker_color3']));
		if($sidebaroptions[2]['name']=='Use vertical menu on Sidebar-1')
			update_option('ttr_sidebarmenuheading', esc_html($_POST['color_picker_color4']));
	}
	if (is_array($footeroptions))
	{
		update_option('ttr_copyright', esc_html($_POST['color_picker_color5']));
		update_option('ttr_designedby', esc_html($_POST['color_picker_color6']));
		update_option('ttr_designedbylink', esc_html($_POST['color_picker_color7']));
	}
}

function twentyten_excerpt_length() {
return get_option('ttr_post_word');
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

function customAdmin() {
	$url = get_bloginfo('template_url');
	$screen = get_current_screen();
	if ($screen->id =='toplevel_page_functions')
	{
		wp_register_script( 'bootstrap', get_template_directory_uri() .'/js/bootstrap.min.js');
		wp_enqueue_script( 'bootstrap');
	}
	wp_register_script( 'togglebutton', get_template_directory_uri() .'/js/jquery.toggle.buttons.js');
	wp_enqueue_script( 'togglebutton', get_template_directory_uri() .'/js/jquery.toggle.buttons.js' );

	echo '<link href="'.$url.'/css/bootstrap.css" rel="stylesheet">';
	echo '<link href="'.$url.'/css/bootstrap-toggle-buttons.css" rel="stylesheet">';
	echo '<link href="'.$url.'/admin-style.css" rel="stylesheet">';
	echo '<script type="text/javascript" src="'.$url.'/js/expand.js"></script>';
	echo '<script type="text/javascript">jQuery(document).ready(function($){$(\'\.normal-toggle-button\').toggleButtons();});</script>';		
}

add_action('admin_head', 'customAdmin');

function pdflink($attr, $content) {
	if ($attr['href']) {
		return '<a class="pdf" href="http://docs.google.com/viewer?url=' . $attr['href'] . '">'.$content.'</a>';
	} else {
		$src = str_replace("=", "", $attr[0]);
		return '<a class="pdf" href="http://docs.google.com/viewer?url=' . $src . '">'.$content.'</a>';
	}
}
add_shortcode('pdf', 'pdflink');

function related_posts_shortcode( $atts ) {
	extract(shortcode_atts(array(
	'limit' => '5',
	), $atts));

	global $wpdb, $post, $table_prefix;

	if ($post->ID) {
		$retval = '<ul>';
		// Get tags
		$tags = wp_get_post_tags($post->ID);
		$tagsarray = array();
		foreach ($tags as $tag) {
			$tagsarray[] = $tag->term_id;
		}
		$tagslist = implode(',', $tagsarray);
		if ($tagslist != null)
		{
		// Do the query
		$q = "SELECT p.*, count(tr.object_id) as count
		FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE
		tt.taxonomy ='post_tag' AND
		tt.term_taxonomy_id = tr.term_taxonomy_id AND
		tr.object_id  = p.ID AND
		tt.term_id IN ($tagslist) AND
		p.ID != $post->ID AND
		p.post_status = 'publish' AND
		p.post_date_gmt < NOW()
		GROUP BY tr.object_id
		ORDER BY count DESC, p.post_date_gmt DESC
		LIMIT $limit;";
		

		$related = $wpdb->get_results($q);
		if ( $related ) {
		foreach($related as $r) {
		$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
		}
	}
	} else {
		$retval .= '
		<li>No related posts found</li>';
		}
		$retval .= '</ul>';
		return $retval;
		}
		return;
		}
add_shortcode('related_posts', 'related_posts_shortcode');

function showads($atts) {
	extract(shortcode_atts(array(
	'client' => '',
	'slot' => '',
	'width' => '250',
	'height' => '250',
	), $atts));
	return '<script type="text/javascript"><!--
	google_ad_client = "'.$client.'";
	google_ad_slot = "'.$slot.'";
	google_ad_width = '.$width.';
	google_ad_height = '.$height.';
	//-->
	</script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	';
}
add_shortcode('adsense', 'showads');

function chart_shortcode( $atts ) {
	extract(shortcode_atts(array(
	'data' => '',
	'colors' => '',
	'size' => '400x200',
	'bg' => 'ffffff',
	'title' => '',
	'labels' => '',
	'advanced' => '',
	'type' => 'pie'
	), $atts));

	switch ($type) {
		case 'line' :
			$charttype = 'lc'; break;
		case 'xyline' :
			$charttype = 'lxy'; break;
		case 'sparkline' :
			$charttype = 'ls'; break;
		case 'meter' :
			$charttype = 'gom'; break;
		case 'scatter' :
			$charttype = 's'; break;
		case 'venn' :
			$charttype = 'v'; break;
		case 'pie' :
			$charttype = 'p3'; break;
		case 'pie2d' :
			$charttype = 'p'; break;
		default :
			$charttype = $type;
			break;
	}
	
	$string = '';
	if ($title) $string .= '&chtt='.$title.'';
	if ($labels) $string .= '&chl='.$labels.'';
	if ($colors) $string .= '&chco='.$colors.'';
	$string .= '&chs='.$size.'';
	$string .= '&chd=t:'.$data.'';
	$string .= '&chf='.$bg.'';

	return '<img title="'.$title.'" src="http://chart.apis.google.com/chart?cht='.$charttype.''.$string.$advanced.'" alt="'.$title.'" />';
}
add_shortcode('chart', 'chart_shortcode');

function tweetmeme(){
	return '    <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
}
add_shortcode('tweet', 'tweetmeme');

function fn_googleMaps($atts, $content = null) {
	extract(shortcode_atts(array(
	"width" => '640',
	"height" => '480',
	"src" => ''
	), $atts));
	return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" src="'.$src.'&output=embed"></iframe>';
}
add_shortcode("googlemap", "fn_googleMaps");

function cwc_youtube($atts) {
	extract(shortcode_atts(array(
	"value" => 'http://',
	"width" => '475',
	"height" => '350',
	"name"=> 'movie',
	"allowFullScreen" => 'true',
	"allowScriptAccess"=>'always',
	), $atts));
	$pos = strpos($value, "watch?v=");
	return '<object style="height: '.$height.'px; width: '.$width.'px"><param name="'.$name.'" value=http://youtube.com/v/'.substr($value, $pos+8).'"><param name="allowFullScreen" value="'.$allowFullScreen.'"></param><param name="allowScriptAccess" value="'.$allowScriptAccess.'"></param><embed src="http://youtube.com/v/'.substr($value, $pos+8).'" type="application/x-shockwave-flash" allowfullscreen="'.$allowFullScreen.'" allowScriptAccess="'.$allowScriptAccess.'" width="'.$width.'" height="'.$height.'"></embed></object>';
}
add_shortcode("youtube", "cwc_youtube");

function cwc_member_check_shortcode( $atts, $content = null ) {
	if ( is_user_logged_in() && !is_null( $content ) && !is_feed() )
		return $content;
	return '';
}

add_shortcode( 'member', 'cwc_member_check_shortcode' );

function donate_shortcode( $atts ) {
	extract(shortcode_atts(array(
	'text' => 'Make a donation',
	'account' => 'REPLACE ME',
	'for' => '',
	), $atts));

	global $post;

	if (!$for) $for = str_replace(" ","+",$post->post_title);
	
    return '<a class="donateLink" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation+for+'.$for.'">'.$text.'</a>';
}
add_shortcode('donate', 'donate_shortcode');

function contact_form()
{

	$value_contact=get_option('contact_form');
	?>
	<form method="post">
	<table style="width:100%; height:400px; border:0;">
			
			
			
			<?php  if (is_array($value_contact))
{?>
			<?php foreach($value_contact as $key=>$i)
	{

		foreach($value_contact[$key] as $newkey=>$j)
		{

			if($newkey == 'ttr_email' || $newkey == 'ttr_emailreq')
				continue;
			
			if(strpos($newkey,'req')==false ) { 
				if($value_contact[$key][$newkey]){?>
	
					<tr style="border: 0;">
			
			
						<td style="border: 0;"><?php print_r($value_contact[$key][$newkey]); ?>:</td>
			
						<td style="border: 0;"><input type="text" name="<?php print_r($value_contact[$key][$newkey]); ?>" style="width:300px; height:30px;" placeholder="<?php print_r(__($value_contact[$key][$newkey],CURRENT_THEME)); ?>" <?php 	if(isset($value_contact[$key][$newkey.'req']) && $value_contact[$key][$newkey.'req'] == 'on'){ ?> required<?php }  ?> /></td>
					</tr>
		<?php  
		}	
			}	
	}
}
}
?>
			<tr style="border: 0;">
				<td style="border: 0;"><?php echo(__('E-Mail Address:',CURRENT_THEME));?></td>
				<td style="border: 0;"><input type="email" name="message_email"  style="width:300px; height:30px;"  placeholder='<?php echo(__("Your E-Mail Address:",CURRENT_THEME));?>'  required  /></td>
			</tr>
			<tr style="border: 0;">
				<td style="border: 0;"><?php echo(__('Message:',CURRENT_THEME));?></td>
				<td style="border: 0;"><textarea rows="8" cols="40" name="message_text"   placeholder='<?php echo(__("Enter Your Message Here&hellip;",CURRENT_THEME));?>' required ></textarea></td>
			</tr>
			
			<tr style="border: 0;">
				<td colspan="2" style="border: 0;" ><button type="submit" value="Submit" name="submit_values" ><?php echo(__('Send Message',CURRENT_THEME));?></button></td>
			</tr>
	</table>
	</form>
	
	<?php  
	
	function my_contact_form_generate_response($type, $message){
		
		if($type == "success")
			echo "<div class='success'>{$message}</div>";
		else	
			echo "<div class='error'>{$message}</div>";
	}
	//response messages
	$message_unsent  = __("Message was not sent. Try Again.",CURRENT_THEME);
	$message_sent    = __("Thanks! Your message has been sent.",CURRENT_THEME);
	
	//user posted variables
	if(isset($_POST['submit_values']))
	{
	
		$email = $_POST['message_email'];
		$message='';
		
		$check_mail=$value_contact[0]['ttr_email'];
		if($check_mail)
		{
			$to = $check_mail;
		}
		else 
		{
			$to = get_option('admin_email');
		}
	if(isset($_POST['Subject']) && $_POST['Subject'])
	{	
	  $subject = $_POST['Subject'];
	}
	else
	{
	     $subject = get_bloginfo().'-contact-form';
	}
	
    $headers = __('From: ',CURRENT_THEME). $email . "</br>" .
    				__('Reply-To: ',CURRENT_THEME) . $email . "\r\n";
    

    foreach($value_contact as $key=>$i)
    {

    	foreach($value_contact[$key] as $newkey=>$j)
    	{
    		if($newkey == 'ttr_email' || $newkey == 'ttr_emailreq')
    			continue;
    			if(strpos($newkey,'req')==false) { 

    		$first_var=$value_contact[$key][$newkey];
    		$replace_var=str_replace(' ','_',$first_var);
 
    		if(isset($_POST[$replace_var]) && !empty($_POST[$replace_var]))
    		{   		
    			$message .=$first_var.":".$_POST[$replace_var].' ';		
    		}
    	}
    }
    }
    $message .= __('Message:   ',CURRENT_THEME).$_POST['message_text'];
   
	$sent = wp_mail($to, $subject, $message,$headers);

	if($sent)
	{
		my_contact_form_generate_response("success", $message_sent); //message sent!
	}
	else
	{
		my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
	}
	}
}	

add_shortcode('contact_us_form', 'contact_form');

function myactivationfunction($oldname, $oldtheme=false) {
	
	global $no_slides;
	if (  function_exists( 'color_array' ) ) 
	$colors=color_array();
	if (  function_exists( 'page_options_array' ) ) 
	$pageoptions=page_options_array();
	if (  function_exists( 'post_options_array' ) ) 
	$postoptions=post_options_array();
	if (  function_exists( 'header_options_array' ) ) 
	$headeroptions=header_options_array();
	if (  function_exists( 'postcontent_array' ) ) 
	$postcontentoptions=postcontent_array();
	if (  function_exists( 'footer_options_array' ) ) 
	$footeroptions=footer_options_array();
	if (  function_exists( 'sidebar_options_array' ) ) 
	$sidebaroptions= sidebar_options_array();
	if (  function_exists( 'general_options_array' ) ) 
	$generaloptions = general_options_array();

	if (is_array($headeroptions)){
	foreach( $headeroptions as $option_data ) {
		if (isset($option_data['id']))
		{
			$headervar = get_option( $option_data['id'], "ttr_test" );
			$url = get_bloginfo('template_url');
			if($option_data['id'] == 'ttr_logo')
			{
				if( $headervar == "ttr_test" ) {
					update_option( $option_data['id'], $url.'/logo.png' );
				}
			}
			
			else {
				if( $headervar == "ttr_test" ) {
					update_option( $option_data['id'], $option_data['std'] );
				}
			}	
	}
	}
	}
	
	foreach( $postcontentoptions as $option_data ) {
		if (isset($option_data['id']))
		{
		$postcontentvar = get_option( $option_data['id'], "ttr_test" );
		if( $postcontentvar == "ttr_test" ) {
			update_option( $option_data['id'], $option_data['std'] );
		}
	}
	}
	if (is_array($sidebaroptions)){
	foreach( $sidebaroptions as $option_data ) {
		if (isset($option_data['id']))
		{
		$sidebarvar = get_option( $option_data['id'], "ttr_test" );
		if( $sidebarvar == "ttr_test" ) {
			update_option( $option_data['id'], $option_data['std'] );
		}
	}
	}
	}
	if (is_array($footeroptions)){
	foreach( $footeroptions as $option_data ) {
		if (isset($option_data['id']))
		{
	$footervar = get_option( $option_data['id'], "ttr_test" );
	if($option_data['id'] == 'ttr_facebook'||
			$option_data['id'] == 'ttr_twitter'||
			$option_data['id'] == 'ttr_linkedin'||
			$option_data['id'] == 'ttr_rss' ||
			$option_data['id'] == 'ttr_googleplus')
	{
		$url = get_bloginfo('template_url');
		if( $footervar == "ttr_test" ) {
			update_option( $option_data['id'], $url.'/images/'.$option_data['std'] );
		}
	}
	else {
		if( $footervar == "ttr_test" ) {
			update_option( $option_data['id'], $option_data['std'] );
		}
	}
		}
	}
	}
	if (is_array($colors)){
	foreach( $colors as $option_data ) {
		if (isset($option_data['id']))
		{
		$colorvar = get_option( $option_data['id'], "ttr_test" );
		if( $colorvar == "ttr_test" ) {
			update_option( $option_data['id'], $option_data['std'] );
		}
	}
	}
	}
	$contactvar=get_option('contact_form',"ttr_test");
	if( $contactvar == "ttr_test" ) {
		$adminmail=get_option('admin_email');
		$default=array(0=>array('ttr_email'=>$adminmail),1=>array('ttr_name'=>__('Name',CURRENT_THEME) ,'ttr_namereq' => 'on' ), 2=>array('ttr_subject' => __('Subject',CURRENT_THEME) , 'ttr_subjectreq' => 'on'));
		update_option( 'contact_form', $default );
	}
	foreach( $generaloptions as $option_data ) {
		if (isset($option_data['id']))
		{
			$extravar = get_option( $option_data['id'], "ttr_test" );
			if($option_data['id'] == 'ttr_icon_back_to_top')
			{
				$url = get_bloginfo('template_url');
				if( $extravar == "ttr_test" ) {
					update_option( $option_data['id'], $url.'/images/gototop.png' );
				}
			}
			else 
			{
			if( $extravar == "ttr_test" ) {
				update_option( $option_data['id'], $option_data['std'] );
			
			}
			}
			
		}
			
	}
}

add_action("after_switch_theme", "myactivationfunction");

function mydeactivationfunction($newname, $newtheme) {
	
	if (  function_exists( 'color_array' ) ) 
	$colors=color_array();
	if (  function_exists( 'header_options_array' ) ) 
	$headeroptions=header_options_array();
	if (  function_exists( 'postcontent_array' ) ) 
	$postcontentoptions=postcontent_array();
	if (  function_exists( 'footer_options_array' ) ) 
	$footeroptions=footer_options_array();
	if (  function_exists( 'sidebar_options_array' ) ) 
	$sidebaroptions= sidebar_options_array();
	if (  function_exists( 'general_options_array' ) ) 
	$generaloptions = general_options_array();

	if (is_array($headeroptions)){
	foreach( $headeroptions as $option_data ) {
		$headervar = get_option( $option_data['id'], "ttr_test" );
		if( $headervar != "ttr_test" ) {
			delete_option( $option_data['id']);
		}
	}
	}
	foreach( $postcontentoptions as $option_data ) {
		$postcontentvar = get_option( $option_data['id'], "ttr_test" );
		if( $postcontentvar != "ttr_test" ) {
			delete_option( $option_data['id']);
		}
	}
	
	if (is_array($sidebaroptions)){
	foreach( $sidebaroptions as $option_data ) {
		$sidebarvar = get_option( $option_data['id'], "ttr_test" );
		if( $sidebarvar != "ttr_test" ) {
			delete_option( $option_data['id']);
		}
	}
	}
	
	if (is_array($footeroptions)){
		foreach( $footeroptions as $option_data ) {
			$footervar = get_option( $option_data['id'], "ttr_test" );
			if( $footervar != "ttr_test" ) {
			delete_option( $option_data['id']);
		}
	}
	}
	if (is_array($colors)){
	foreach( $colors as $option_data ) {
		$colorvar = get_option( $option_data['id'], "ttr_test" );
		if( $colorvar != "ttr_test" ) {
			delete_option( $option_data['id']);
		}
	}
	}
	$contactform_var=get_option('contact_form',"ttr_test");
	if( $contactform_var != "ttr_test" ) {
		delete_option( 'contact_form');
	}

	foreach( $generaloptions as $option_data ) {
		$extravar = get_option( $option_data['id'], "ttr_test" );
		if( $extravar != "ttr_test" ) {
			delete_option( $option_data['id']);
		}
	}
	
}

add_action("switch_theme", "mydeactivationfunction");

function wordpress_breadcrumbs() {

	$delimiter = get_option('ttr_breadcrumb_text_separator');
	$name = __('Home',CURRENT_THEME); //text for the 'Home' link
	$currentBefore = '<span class="current">';
	$currentAfter = '</span>';

	if ( !is_home() && !is_front_page() || is_paged() ) {

		echo '<div class="breadcrumb">';

		global $post;
		$home = get_bloginfo('url');
		echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

		if ( is_category() ) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $currentBefore . __('Archive by category &#39;',CURRENT_THEME);
			single_cat_title();
			echo '&#39;' . $currentAfter;

		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time('d') . $currentAfter;

		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo $currentBefore . get_the_time('F') . $currentAfter;

		} elseif ( is_year() ) {
			echo $currentBefore . get_the_time('Y') . $currentAfter;

		} elseif ( is_single() ) {
			$cat = get_the_category(); 
			if (isset($cat) && !empty($cat))
			{
				$cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $currentBefore;
				the_title();
				echo $currentAfter;
			}

		} elseif ( is_page() && !$post->post_parent ) {
			echo $currentBefore;
			the_title();
			echo $currentAfter;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $currentBefore;
			the_title();
			echo $currentAfter;

		} elseif ( is_search() ) {
			echo $currentBefore . __('Search results for &#39;',CURRENT_THEME) . get_search_query() . '&#39;' . $currentAfter;

		} elseif ( is_tag() ) {
			echo $currentBefore . __('Posts tagged &#39;',CURRENT_THEME);
			single_tag_title();
			echo '&#39;' . $currentAfter;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $currentBefore . __('Articles posted by ',CURRENT_THEME) . $userdata->display_name . $currentAfter;

		} elseif ( is_404() ) {
			echo $currentBefore . __('Error 404',CURRENT_THEME) . $currentAfter;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page',CURRENT_THEME) . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</div>';

	}
}

//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'kk_in_widget_form', 5, 3);
//Callback function for options update (priority 5, 3 parameters)
add_filter('widget_update_callback', 'kk_in_widget_form_update', 5 , 3);


function kk_in_widget_form($t,$return,$instance){
	
	
	$instance = wp_parse_args( (array) $instance, array( 'style' => 'default') );
	
	if ( !isset($instance['style']) )
		$instance['style'] = null;
	?>
	
        <label for="<?php echo $t->get_field_id('style'); ?>"><?php echo(__('Block Style:',CURRENT_THEME));?></label>
        <select id="<?php echo $t->get_field_id('style'); ?>" name="<?php echo $t->get_field_name('style'); ?>">
			<option <?php selected($instance['style'], 'default');?>value="default"><?php echo(__('Default',CURRENT_THEME));?></option>
            <option <?php selected($instance['style'], 'none');?> value="none"><?php echo(__('None',CURRENT_THEME));?></option>
            <option <?php selected($instance['style'], 'block');?>value="block"><?php echo(__('Block',CURRENT_THEME));?></option>    
        </select>
    <?php
    $retrun = null;
    return array($t,$return,$instance);
}

function kk_in_widget_form_update($instance, $new_instance, $old_instance){
	$instance['style'] = $new_instance['style'];
	return $instance;
}

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
 
function tt_add_custom_box() {

    $screens = array( 'post', 'page' );

    foreach($screens as $screen)
    {
    add_meta_box(
    'post_page_options',
    __( 'Theme Options',CURRENT_THEME ),
    'tt_custombox_in_publish',
    $screen,
    'side',
    'high'
    );}

}
add_action( 'add_meta_boxes', 'tt_add_custom_box' );
add_action( 'save_post', 'tt_save_postdata' );

function tt_custombox_in_publish() {
	global $post;
	if (  function_exists( 'page_options_array' ) )
	$pageoptions = page_options_array();
	if (  function_exists( 'post_options_array' ) )
	$postoptions = post_options_array();
	if ('page' != get_post_type($post) && 'post' != get_post_type($post)) return;

	if ('page' == get_post_type($post)):
	foreach ($pageoptions as $value) {
		switch ($value['type']) {
	
			case "open":
				?>
			        <table class="table table-hover table-bordered">
					<?php 	break;
					
							case "close":
					?>
				    </table>
			        <?php   break;
					
					case "select":
					?>
			        <tr>
			            <td><h6><?php echo $value['name']; ?></h6></td>
			            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
			       </tr>
			                
			        <?php   break;
			            
					case "checkbox":
					?>
				   <tr>
			            <td ><h6><?php echo $value['name']; ?></h6></td>
			            
			            <td>
			            <?php 
			            $var = get_post_meta($post->ID, $value['id'],true);?>
			            <?php if ((isset($var) && $var == 'true') || $var == '')
			            {
			            	$checked = 'checked="yes"';
		}
		else
		{
			$checked = '';
		}?>
			                <div class="normal-toggle-button">
			                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
			                </div>
			            </td>
			        </tr>
			        <?php 	break;
			
					case 'text':
					?>
			        <tr>
			            <td><h6><?php echo $value['name']; ?></h6></td>
			            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" /></td>
			        </tr>
					<?php 	break;	 
						} 
					}
					?>
					<?php 
	endif;
	if ('post' == get_post_type($post)):
	foreach ($postoptions as $value) {
		switch ($value['type']) {
	
			case "open":
				?>
				        <table class="table table-hover table-bordered">
						<?php 	break;
						
								case "close":
						?>
					    </table>
				        <?php   break;
						
						case "select":
						?>
				        <tr>
				            <td><h6><?php echo $value['name']; ?></h6></td>
				            <td ><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
				       </tr>
				                
				        <?php   break;
				            
						case "checkbox":
						?>
					   <tr>
				            <td ><h6><?php echo $value['name']; ?></h6></td>
				            
				            <td>
				            <?php 
			            $var = get_post_meta($post->ID, $value['id'],true);?>
			            <?php if ((isset($var) && $var == 'true') || $var == '')
			            {
			            	$checked = 'checked="yes"';
		}
		else
		{
			$checked = '';
		}?>
				                <div class="normal-toggle-button">
				                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />
				                </div>
				            </td>
				        </tr>
				        <?php 	break;
				
						case 'text':
						?>
				        <tr>
				            <td><h6><?php echo $value['name']; ?></h6></td>
				            <td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; update_option( $value['id'], $value['std'] ); } ?>" /></td>
				        </tr>
						<?php 	break;	 
							} 
						}
						?>
						<?php 
		endif;
}

function tt_save_postdata( $post_id ) {

	if (  function_exists( 'page_options_array' ) )
	$pageoptions = page_options_array();
	if (  function_exists( 'post_options_array' ) )
	$postoptions = post_options_array();
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX )
		return;
	
	if ( isset($_POST['post_type']) &&'page' != $_POST['post_type'] && 'post' != $_POST['post_type'] )
		return;
	
	if (isset($_POST['post_type']) && 'post' == $_POST['post_type']):
	foreach ($postoptions as $value) {
	$mydata = $_POST[$value['id']];
	if (isset($mydata))
	{
		$mydata = 'true';
	}
	else
	{
		$mydata = 'false';
	}
	
	update_post_meta($post_id, $value['id'], $mydata);
	}
	endif;
	
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']):
	foreach ($pageoptions as $value) {
		$mydata = $_POST[$value['id']];
		if (isset($mydata))
	{
		$mydata = 'true';
	}
	else
	{
		$mydata = 'false';
	}

		update_post_meta($post_id, $value['id'], $mydata);
	}
	endif;

	
}
// Changing excerpt more
   function new_excerpt_more() {
	   global $post;
	   return '...<a href="'. get_permalink($post->ID) . '">' . get_option("ttr_read_more") . '</a>';
	   }
	   add_filter('excerpt_more', 'new_excerpt_more');

	   function my_slide_show() {
	global $no_slides,$slide_show_visible;
	if (  function_exists( 'header_options_array' ) )
	$headeroptions = header_options_array();
	if($slide_show_visible):
	foreach( $headeroptions as $option_data ) {
		if($option_data['type']=='media')
		{
			for($i=0;$i<$no_slides;$i++)
			{
				if($option_data['id']=='ttr_slide_show_image'.$i)
				{
					if((get_option('ttr_slide_show_image'.$i)))
					{
						echo '<style>#Slide'.$i.'{background:url('.get_option('ttr_slide_show_image'.$i).') no-repeat center !important;}</style>';
						
					}	
				}
			}
		}
	}
	endif;
}


add_action( 'wp_head', 'my_slide_show' );

?>