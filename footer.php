<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DesignFlytheme
 */

?>

    <footer id="colophon" class="site-footer container">
        <hr>
        <div class="site-info">
            <div class = "footer-welcome-section">
                <div>
                    <h4 class = "footer--header">Welcome to DESIGNfly</h4>
                    <p class = "footer--text">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                    </p>
                    <a href="#" class="footer--text" id ="footer--btn-read-more">Read more</a>
                </div>
            </div>
            <div class = "footer-contact-section">
                <div>
                    <h4 class = "footer--header">Contact Us</h4>
                    <p class = "footer--text">Street 21 Planet, A-11, dapibus tristique, 123 551<br />
                        Tel: 123 4567890; Fax: 123 456789<br />
                        Email: contactus@designfly.com</p>
                    <img class= "footer--social-img" src = "wp-content\themes\designflytheme\images\home\social.png"
                         alt = "social media">
                </div>
            </div>
        </div><!-- .site-info -->
        <hr>
        <div class="row">
            <div class = "md-col-12 col-md-offset-5">
                <span class="footer--copyright-text">&copy; 2012 - D'SIGNfly | Designed by
                    <a id = "footer--text-highlighter" href="#"> rtCamp </a></span>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
