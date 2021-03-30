<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFlytheme
 */

?>
<div class = "design-section container">
    <div class = "design-section-header">
        <h1>D'ESIGN IS THE SOUL</h1>
        <button id="design--btn-view-all">View all</button>
    </div>
    <div class ="design-section--image-container">
        <?php
        $args = array (
            'posts_per_page' => 6
        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) :
        $wp_query->the_post();
        ?>
        <img class ="design--img" src="<?php the_post_thumbnail_url();?>">
        <?php
        endwhile;
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>
