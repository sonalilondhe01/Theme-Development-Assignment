<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFlytheme
 */

$post_id = url_to_postid(get_page_link());
?>
<article id="post-<?php echo $post_id; ?>" <?php post_class(); ?>>
<header class="entry-header">
        <script>
            jQuery(document).ready(function() {
                $(".header--hero-section").hide();
            })();
        </script>
</header><!-- .entry-header -->
        <?php
        if ( is_singular() ) {
            ?>
       <div class ="row container">
          <div class = "post-section-container col-md-8 p-0 m-0">
             <div class = "post-section">
                 <div class = "post-header">
                     <h1 class = "post-title"><?php the_title(); ?></h1>
                     <div class = "post-details">
                         <p class = "post-author-date">By
                             <span class = "post-highlight"><?php the_author();?></span>
                             on <?php the_time('j M Y'); ?></p>
                         <p class = "post-highlight"><?php comments_number();?> </p>
                     </div>
                 </div>
                 <div class = "post-content">
                         <?php
                       echo the_content();
                         if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                             the_post_thumbnail( 'thumbnail', array(
                                 'class' => 'post-img'

                             ));
                         }?>
                 </div>
                 <p class ="post-text-tags">TAGS: <span class="post-highlight">
                        <?php $tags = get_tags(); ?>
                      <?php foreach ( $tags as $tag ) { ?>
                         <a class="post-highlight" href="<?php echo get_tag_link( $tag->term_id ); ?> " rel="tag"><?php echo $tag->name; ?></a>
                     <?php } ?>
                     </span></p>
             </div>
              <?php
              // If comments are open or we have at least one comment, load up the comment template.
              if (comments_open() || get_comments_number() ) :
                  comments_template();
              endif;
              ?>
          </div>
          <div class ="col-md-4 p-0 m-0">
               <?php
               get_sidebar();
//               get_template_part('template-parts/content', 'custom_sidebar_widgets');?>
          </div>
       </div> <?php
         }
        ?>
</article>