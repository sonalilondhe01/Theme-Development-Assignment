<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFlytheme
 */

get_header();
?>

    <main id="primary" class="site-main">
    <div class="row container">
            <div class = "blog-container-left col-md-8">
                <div class = "blog-list-header">
                    <h2>LET'S BLOG</h2>
                </div>
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
                $args = array(
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
                get_template_part('template-parts/content', 'blog');
                endwhile;
                    wp_reset_postdata();
                else :

                _e('Sorry, no posts matched your criteria.', 'designflytheme');
                endif;
                ?>
                <div>
                    <!-- Pagination bar: functions.php-->
                    <?php pagination_bar( $wp_query ); ?>
                </div>
            </div>
        <div class = "blog-container-right col-md-4">
            <?php
            get_sidebar();
//            get_template_part('template-parts/content', 'custom_sidebar_widgets');?>

        </div>
        </div>
       
    </main><!-- #main -->

<?php
get_footer();
?>
