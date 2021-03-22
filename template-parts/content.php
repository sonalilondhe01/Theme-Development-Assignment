<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DesignFlytheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <script>
            jQuery(document).ready(function() {
                $(".header--hero-section").hide();
            })();
        </script>
        <?php
        if ( is_singular() ) :
            ?>
       <div class ="row container">
          <div class = "post-section-container col-md-8">
             <div class = "post-section">
                 <div class = "post-header">
                     <h1 class = "post-title">Going to the place and making a case!</h1>
                     <div class = "post-details">
                         <p class = "post-author-date">By
                             <span class = "post-highlight">Robin sen</span>
                             on 21 Dec 2012</p>
                         <p class = "post-highlight">12 comments</p>
                     </div>
                 </div>
                 <div class = "post-content">
                     <p class = "post-text">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Mauris congue justo hendrerit nibh placerat, at mattis elit consequat.
                         Donec mollis venenatis quam.Fusce auctor augue quis lacus mattis efficitur.
                         Morbi quis mauris gravida, dapibus lacus id, finibus nulla.
                     </p>
                     <img class = "post-img"
                          src="/wordpress_theme_development/wp-content/themes/designflytheme/images/home/image-1.png">
                     <p class = "post-text">Sed vitae ullamcorper metus. Aenean nunc ipsum, pellentesque ac ultrices quis,
                         consequat non velit. Curabitur pharetra, dolor vel iaculis congue,
                         est quam maximus libero, quis hendrerit sapien felis eu erat.
                         Proin vitae dui eget erat condimentum semper.Lorem ipsum dolor sit amet, consectetur
                         adipiscing elit.
                         Mauris congue justo hendrerit nibh placerat, at mattis elit consequat.
                         Donec mollis venenatis quam.Fusce auctor augue quis lacus mattis efficitur.
                         Morbi quis mauris gravida, dapibus lacus id, finibus nulla.
                         Fusce auctor augue quis lacus mattis efficitur.
                         Morbi quis mauris gravida, dapibus lacus id, finibus nulla.
                         Proin consectetur vestibulum nunc vitae pretium.</p>
                     <img class = "post-img"
                          src="/wordpress_theme_development/wp-content/themes/designflytheme/images/home/image-2.png">
                     <p class = "post-text">Sed vitae ullamcorper metus.
                         Aenean nunc ipsum, pellentesque ac ultrices quis, consequat non velit.
                         Curabitur pharetra, Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Mauris congue justo hendrerit nibh placerat, at mattis elit consequat.
                         Donec mollis venenatis quam.Fusce auctor augue quis lacus mattis efficitur.
                         Morbi quis mauris gravida, dapibus lacus id, finibus nulla. dolor vel iaculis congue, est quam maximus libero,
                         quis hendrerit sapien felis eu erat. Proin vitae dui eget erat condimentum semper.
                         Fusce auctor augue quis lacus mattis efficitur.</p>
                 </div>
                 <p class = "post-text">TAGS: <span class="post-highlight">HTML, CSS, Javascript</span></p>
             </div>
              <?php
              // If comments are open or we have at least one comment, load up the comment template.
              if (comments_open() || get_comments_number() ) :
                  comments_template();
              endif;
              ?>
          </div>

           <div class ="col-md-4">
               <?php
               get_sidebar(); ?>
           </div>
       </div>
        <?php
        else :
            ?>
        <div class="row container">
            <div class = "blog-container-left col-md-8">
                <div class = "blog-list-header">
                    <h2>LET'S BLOG</h2>
                </div>
                <div class="blog-single">
                    <div class = "blog-header-box-container">
                        <div class ="blog-header-box-date">
                            <p>22
                            <span>Dec</span>
                            </p>
                        </div>
                        <div class ="blog-header-box-title">
                            <h4>Going to the place and making a case!</h4>
                        </div>
                    </div>
                    <div class="post-data">
                        <img class = "post-image"
                                src="/wordpress_theme_development/wp-content\themes\designflytheme\images\home\image-6.png">
                        <div class="post-text-content">
                            <div class="post-header-content">
                                <p>by <a class="post-highlight" href="#">Robin Sec</a>
                                    on 22 Dec 2012<span class="post-comment post-highlight ">12 comments</span></p>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Vestibulum tortor
                                quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                libero sit amet quam egestas semper.
                            </p>
                            <a class ="post-read-more" href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="blog-single">
                    <div class = "blog-header-box-container">
                        <div class ="blog-header-box-date">
                            <p>21
                                <span>Dec</span>
                            </p>
                        </div>
                        <div class ="blog-header-box-title">
                            <h4>Achieve your grandest dream!</h4>
                        </div>
                    </div>
                    <div class="post-data">
                        <img class = "post-image"
                             src="/wordpress_theme_development/wp-content\themes\designflytheme\images\home\image-4.png">
                        <div class="post-text-content">
                            <div class="post-header-content">
                                <p>by <a class="post-highlight" href="#">Robin Sec</a>
                                    on 21 Dec 2012<span class="post-comment post-highlight ">12 comments</span></p>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Vestibulum tortor
                                quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                libero sit amet quam egestas semper.
                            </p>
                            <a class ="post-read-more" href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="blog-single">
                    <div class = "blog-header-box-container">
                        <div class ="blog-header-box-date">
                            <p>20
                                <span>Dec</span>
                            </p>
                        </div>
                        <div class ="blog-header-box-title">
                            <h4>It is time to pause and reflect...</h4>
                        </div>
                    </div>
                    <div class="post-data">
                        <img class = "post-image"
                             src="/wordpress_theme_development/wp-content\themes\designflytheme\images\home\image-3.png">
                        <div class="post-text-content">
                            <div class="post-header-content">
                                <p>by <a class="post-highlight" href="#">Robin Sec</a>
                                    on 20 Dec 2012<span class="post-comment post-highlight ">12 comments</span></p>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Vestibulum tortor
                                quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                libero sit amet quam egestas semper.
                            </p>
                            <a class ="post-read-more" href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="blog-single">
                    <div class = "blog-header-box-container">
                        <div class ="blog-header-box-date">
                            <p>18
                                <span>Dec</span>
                            </p>
                        </div>
                        <div class ="blog-header-box-title">
                            <h4>Blesed is he who has found his work!</h4>
                        </div>
                    </div>
                    <div class="post-data">
                        <img class = "post-image"
                             src="/wordpress_theme_development/wp-content\themes\designflytheme\images\home\image-5.png">
                        <div class="post-text-content">
                            <div class="post-header-content">
                                <p>by <a class="post-highlight" href="#">Robin Sec</a>
                                    on 18 Dec 2012<span class="post-comment post-highlight ">12 comments</span></p>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Vestibulum tortor
                                quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                libero sit amet quam egestas semper.
                            </p>
                            <a class ="post-read-more" href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="blog-single">
                    <div class = "blog-header-box-container">
                        <div class ="blog-header-box-date">
                            <p>17
                                <span>Dec</span>
                            </p>
                        </div>
                        <div class ="blog-header-box-title">
                            <h4>Achieve your grandest dream!</h4>
                        </div>
                    </div>
                    <div class="post-data">
                        <img class = "post-image"
                             src="/wordpress_theme_development/wp-content\themes\designflytheme\images\home\image-6.png">
                        <div class="post-text-content">
                            <div class="post-header-content">
                                <p>by <a class="post-highlight" href="#">Robin Sec</a>
                                    on 17 Dec 2012<span class="post-comment post-highlight ">12 comments</span></p>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et
                                netus et malesuada fames ac turpis egestas. Vestibulum tortor
                                quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                libero sit amet quam egestas semper.
                            </p>
                            <a class ="post-read-more" href="#">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="post-pagination-buttons">
                    <button class="post-pagination-button">1</button>
                    <button class="post-pagination-button">2</button>
                    <button class="post-pagination-button">3</button>
                    <button id="pagination-arrow-button"><img
                                src="/wordpress_theme_development/wp-content/themes/designflytheme/images/other pages/pagination-arrow.png">
                    </button>
                </div>
            </div>
            <div class = "blog-container-right col-md-4">
                <?php
                get_sidebar(); ?>
                <script>
                    jQuery(document).ready(
                        function(){
                            $(".related-post-sidebar").hide();
                        }
                    )
                </script>
            </div>
        </div>
        <?php
        endif;
        ?>
    </header><!-- .entry-header -->
    <footer class="entry-footer">
<!--        --><?php //designflytheme_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article>
