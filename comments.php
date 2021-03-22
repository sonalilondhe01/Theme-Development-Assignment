<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFlytheme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if (have_comments() ) :
        ?>
    <div class="comment-title-div">
        <h2 class="comments--title"> Comments</h2>
    </div>

<!--        --><?php
//        $designflytheme_comment_count = get_comments_number();
//        if ('1' === $designflytheme_comment_count ) {
//            printf(
//            /* translators: 1: title. */
//                esc_html__('One thought on &ldquo;%1$s&rdquo;', 'designflytheme'),
//                '<span>' . wp_kses_post(get_the_title()) . '</span>'
//            );
//        } else {
//            printf(
//            /* translators: 1: comment count number, 2: title. */
//                esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $designflytheme_comment_count, 'comments title', 'designflytheme')),
//                number_format_i18n($designflytheme_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
//                '<span>' . wp_kses_post(get_the_title()) . '</span>'
//            );
//        }
//        ?>
<!--        </h2>-->
        <!-- .comments-title -->

        <?php the_comments_navigation(); ?>
    <div class = "comment-list-div">
        <ul class="comment-list" type="none">
        <?php
        wp_list_comments(
            'type=comment&callback=designflytheme_comment'
        );
        ?>
        </ul><!-- .comment-list -->
    </div>

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'designflytheme'); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().
$comments_args = [

 //Define Fields
    'fields' => array(
        //Author field
        'author' => '
<div class="comment-name-section">
<label for = "name" >Name</label> <br />
<input id="name" name="name" class = "" aria-required="true" placeholder="">
</div>',
        //Email Field
        'email' => '
<div class="comment-email-section">
<label for = "email"  >Email</label> <br />
<input id="email" name="email" placeholder="">
</div>',
        //URL Field
        'url' => '
<div class="comment-website-section">
<label for = "website">Website</label> <br />
<input id="website" name="website" placeholder="">
</div>',
        //Cookies
        'cookies' => '<input type="checkbox" style = "display: none">'
            .'<a href="' . get_privacy_policy_url() . '"></a>',
   ),
    // Change the title of send button
    'label_submit' => __( 'Submit', 'designflytheme' ),
    // Change the title of the reply section
    'title_reply' => __( 'Post your Comment', 'designflytheme' ),
    'comment_field' => '<div><label for="comment">' . _x( '', 'noun' ) .
        '</label><br />
<textarea id="comment" class="comment-form-comment" name="comment" rows = "8" cols = "10" aria-required="true"></textarea></div>',
    'comment_notes_before' => '',
];
    comment_form($comments_args);
    ?>

</div><!-- #comments -->
