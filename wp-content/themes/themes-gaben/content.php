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
<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', CURRENT_THEME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<?php endif; ?>
<div class="ttr_article">
<div class="ttr_post_inner_box">
<?php if ( 'post' == get_post_type() ) : ?>
<?php twentythirteen_posted_on(True,True); ?>
<?php endif; ?>
</div>
<?php if ( is_search() ) : ?>
<div class="entry-summary">
<?php the_excerpt(); ?>
</div>
<?php else : ?>
<div class="postcontent">
<?php if(get_option('ttr_continue_reading_enable') == true):?>
<?php the_excerpt(); ?>
<?php else:?>
<?php the_content( __( 'Continue reading <span>&rarr;</span>', CURRENT_THEME ) ); ?>
<?php endif;?>
<div style="clear:both;"></div>
</div>
<div class="pagination">
<?php wp_link_pages( array( 'before' => '<span>' . __( 'Pages:', CURRENT_THEME ) . '</span>', 'after' => '' ) ); ?>
</div>
<?php endif; ?>
<?php $show_sep = false; ?>
<div>
<?php if(get_option('ttr_remove_post_category')):?>
<?php if ( 'post' == get_post_type() ) : ?>
<?php
$categories_list = get_the_category_list( __( ', ', CURRENT_THEME ) );
if ( $categories_list ):
?>
<?php printf( __( '<span class="meta">Posted in </span> %2$s', CURRENT_THEME ), '', $categories_list );
$show_sep = true; ?>
<?php endif; ?>
<?php
$tags_list = get_the_tag_list( '', __( ', ', CURRENT_THEME ) );
if ( $tags_list ):
if ( $show_sep ) : ?>
<span class="meta-sep">|</span>
<?php endif; ?>
<?php printf( __( 'Tagged %2$s', CURRENT_THEME ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
$show_sep = true; ?>
<?php endif; ?>
<?php endif;  ?>
<?php endif;  ?>
<?php if ( $show_sep ) : ?>
<span class="meta-sep">|</span>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', CURRENT_THEME ) . '</span>', __( '<b>1</b> Reply', CURRENT_THEME ), __( '<b>%</b> Replies', CURRENT_THEME ) ); ?>
<span class="meta-sep">|</span>
<?php endif; ?>
<?php if ( $post = &get_post( $id )and $url = get_edit_post_link( $post->ID ) ) {
$link = __('Edit This');
$post_type_obj = get_post_type_object( $post->post_type );
$link = '<a href="' . $url . '" title="' . esc_attr( $post_type_obj->labels->edit_item ) . '">' . $link . '</a>';
echo '<span class="edit-link">' . apply_filters( 'edit_post_link', $link, $post->ID ) .  '</span>';
}
?>
</div>
</div>
</div>
</article>
