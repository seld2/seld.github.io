<article class="ttr_post">
<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
<div class="entry-thumbnail">
<?php the_post_thumbnail(); ?>
</div>
<?php endif; ?>
<div class="ttr_post_content_inner">
<?php $var = get_post_meta($post->ID, 'ttr_post_title',true);
 $var_all=get_option('ttr_all_post_title');
if($var != 'false' && $var_all ):?>
<h1 class="ttr_post_title">
<?php the_title(); ?></h1>
<?php endif; ?>
<div class="ttr_article">
<div class="ttr_post_inner_box">
<?php if ( 'post' == get_post_type() ) : ?>
<?php twentythirteen_posted_on(True,True); ?>
<?php endif; ?>
</div>
<div class="postcontent">
<?php the_content(); ?>
<div style="clear:both;"></div>
</div>
<div class="pagination">
<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', CURRENT_THEME ) . '</span>', 'after' => '</div>' ) ); ?>
</div>
<div class="postedon">
<?php
$categories_list = get_the_category_list( __( ', ', CURRENT_THEME ) );
$tag_list = get_the_tag_list( '', __( ', ', CURRENT_THEME ) );
if ( '' != $tag_list ) {
if(get_option('ttr_remove_post_category')){
$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', CURRENT_THEME );
}
else{$utility_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', CURRENT_THEME );
}
}
elseif ( '' != $categories_list ) {
if(get_option('ttr_remove_post_category'))
{
$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', CURRENT_THEME );
} else {
$utility_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', CURRENT_THEME );
}
}
else{
if(get_option('ttr_remove_post_category')){
$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', CURRENT_THEME );
}
else{$utility_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', CURRENT_THEME );
}
}
printf(
$utility_text,
$categories_list,
$tag_list,
esc_url( get_permalink() ),
the_title_attribute( 'echo=0' ),
get_the_author(),
esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
);
?>
<?php if ( $post = &get_post( $id )and $url = get_edit_post_link( $post->ID ) ) {
$link = __('Edit This');
$post_type_obj = get_post_type_object( $post->post_type );
$link = '<a href="' . $url . '" title="' . esc_attr( $post_type_obj->labels->edit_item ) . '">' . $link . '</a>';
echo '<span class="edit-link">' . apply_filters( 'edit_post_link', $link, $post->ID ) .  '</span>';
}
?>
<?php if ( get_the_author_meta( 'description' ) && is_multi_author() ) :?> 
<div id="author-info">
<div id="author-avatar">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentythirteen_author_bio_avatar_size', 68 ) ); ?>
</div>
<div id="author-description">
<h2><?php printf( esc_attr__( 'About %s', CURRENT_THEME ), get_the_author() ); ?></h2>
<?php the_author_meta( 'description' ); ?>
<div id="author-link">
<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', CURRENT_THEME ), get_the_author() ); ?>
</a>
</div>
</div>
</div>
<?php endif; ?>
</div>
</div>
</div>
</article>
