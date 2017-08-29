<?php
?>
<div id="comments">
<?php if ( post_password_required() ) : ?>
<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', CURRENT_THEME ); ?></p>
</div>
<?php
return;
endif;
?>
<?php
?>
<?php if ( have_comments() ) : ?>
<h2 id="comments-title">
<?php
printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), CURRENT_THEME ),
number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
?>
</h2>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
<nav id="comment-nav-above">
<h1 class="assistive-text"><?php _e( 'Comment navigation', CURRENT_THEME ); ?></h1>
<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', CURRENT_THEME ) ); ?></div>
<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', CURRENT_THEME ) ); ?></div>
</nav>
<?php endif;?>
<ol class="commentlist">
<?php
wp_list_comments( array( 'callback' => 'twentythirteen_comment' ) );
?>
</ol>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
?>
<nav id="comment-nav-below">
<h1 class="assistive-text"><?php _e( 'Comment navigation', CURRENT_THEME ); ?></h1>
<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', CURRENT_THEME ) ); ?></div>
<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', CURRENT_THEME ) ); ?></div>
</nav>
<?php endif;?>
<?php
elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
<?php if(get_option('ttr_comments_closed_text')){?>
<p class="nocomments"><?php _e( 'Comments are closed.', CURRENT_THEME ); ?></p>
<?php } ?>
<?php endif; ?>
<?php theme_comment_form($cssprefix='ttr_'); ?>
</div>
