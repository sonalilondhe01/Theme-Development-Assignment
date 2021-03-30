<?php
/**
 * This template shows gallery for respective category posts
 */
?>
<div id ="portfolio-post-image-container">
    <div id = "portfolio-post-single-image-container">
        <!--        image 1-->
        <?php
        $args = array (
            'post_type'      => 'portfolio',
            'post_status'    => 'publish',
            'posts_per_page' => 6,
            'category_name' => $_GET['category']
        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) :
        $wp_query->the_post();
        ?>

        <?php add_thickbox(); ?>
        <img class ="portfolio-post--img" src="<?php the_post_thumbnail_url();?>">
        <div id="thickbox-inline-division1">
            <div class="tb-close-btn-div"  style="background: #fff; margin-left: -3px;">
                <button type="button" id="TB_closeWindowButton"
                        style="background: #fff; margin-left: -10px;">
                    <span class="screen-render-text">Close</span>
                    <span class="tb-close-icon"></span>
                </button>
            </div>
            <div class="tb-img-div">
                <img id = "image1" class ="portfolio-post--img-thickbox" src="<?php the_post_thumbnail_url();?>">
                <div class="thickbox-slider-arrow">
                    <img class= "slider-arrows" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/home/left-slider-arrows.png">
                    <p><?php the_title();?></p>
                    <img class= "slider-arrows" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/home/right-slider-arrows.png">
                </div>
            </div>
        </div>
        <div class="hover-style-image-container">
            <img id = "hover-image-icon" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/favicon.ico">
            <a href="#TB_inline?&width=600&height=600&inlineId=thickbox-inline-division1" class="thickbox thickbox-link" >View image</a>
        </div>
    </div>
    <?php
    endwhile;
    wp_reset_postdata();
    endif;
    ?>
    <div style="margin: 0 auto">
        <!-- Pagination bar: functions.php-->
        <?php pagination_bar( $wp_query ); ?>
    </div>
</div>
