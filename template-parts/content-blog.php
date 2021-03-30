<?php
/**
 * Template part for displaying blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFlytheme
 */
?>

<article id="post-<?php  the_ID(); ?>" class = "<?php post_class(); ?>">
  <div class="blog-single">
            <div class = "blog-header-box-container">
                <div class ="blog-header-box-date">
                    <p><?php the_time('j');?>
                        <span><?php the_time('M'); ?></span>
                    </p>
                </div>
                <div class ="blog-header-box-title">
                    <h4><?php the_title(); ?></h4>
                </div>
            </div>
            <div class="post-data">
                <img class = "post-image"
                     src= "<?php the_post_thumbnail_url(); ?>" />
                <div class="post-text-content">
                    <div class="post-header-content">
                        <p>by <a class="post-highlight" href="#"><?php the_author(); ?></a>
                            on <?php the_time('j M Y'); ?>
                            <span class="post-comment post-highlight "><?php comments_number();?></span></p>
                    </div>
                   <div class = "post-content-para">
                       <?php the_content(); ?>
                   </div>
                    <a class ="post-read-more" href="<?php echo esc_url( get_permalink());?>">READ MORE</a>
                </div>
            </div>
            </div>
</article>

