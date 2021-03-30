<?php
get_header();
?>
<div class="container">
    <div id="portfolio-post-header">
        <h1>D'SIGN IS THE SOUL</h1>
        <div id="portfolio-category-container">
            <?php
            $categories = get_categories(array(
                'hide_empty' => false));
            foreach ( $categories as $category ) {
                ?>
                <a
                        href="<?php echo esc_url(  get_category_link( $category->term_id ) ); ?>"
                        role="button"
                        class="portfolio-post-header--buttons">
                    <?php esc_html_e( $category->name ); ?>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
    <div id ="portfolio-post-image-container">

        <!--        image 1-->
        <?php
        $id    = get_query_var( 'cat' );
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
        $args = array (
                'cat' => $id,
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 5,
            'paged'          => $paged,
            'nopaging'       => false,

        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) :
                $wp_query->the_post();
//            ?>
                <div id = "portfolio-post-single-image-container">
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
    </div>
    <div style="margin: 0 auto; display: block;">
        <!-- Pagination bar: functions.php-->
        <?php pagination_bar( $wp_query ); ?>
    </div>

</div>
<?php
get_footer();?>