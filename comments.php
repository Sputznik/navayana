<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                $comments_number = get_comments_number();
                if ( $comments_number  >=1 ) {    
                  printf( 'Comments: ');
                } 
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ul lass="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ul',
                    'avatar_size' => 42,

                ) );
            ?>
        </ul><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'twentysixteen' ); ?></p>
    <?php endif; ?>

    <?php
        comment_form( array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
        ) );
    ?>

</div><!-- .comments-area -->
