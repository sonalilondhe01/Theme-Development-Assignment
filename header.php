<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DesignFlytheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,800;1,700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
        <header id="masthead" class="site-header">
        <div class = "header--box">
            <div class="container">
                <div class="site-branding">
                    <img src="wp-content/themes/designflytheme/images/home/logo.png" class="header--logo">

                    <nav id="site-navigation" class="main-navigation">
                        <!--            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'designflytheme' ); ?><!--</button>-->
                        <a class="site-navigation--menu" href="#">Home</a>
                        <a class="site-navigation--menu" href = "#">Services</a>
                        <a class="site-navigation--menu" href = "#">Portfolio</a>
                        <a class="site-navigation--menu" href = "#">Blog</a>
                        <a class="site-navigation--menu" href = "#">Contact</a>
                    </nav><!-- #site-navigation -->

                    <div class="header--searchbar">
                        <input type="text" class="header--serchbox-input">
                        <button class = "header--btn-search">
                            <img class="header--search-icon"
                                 src="wp-content/themes/designflytheme/images/home/search-icon.png">
                        </button>
                    </div>
                </div><!-- .site-branding -->
            </div>
        </div>
            <div class ="header--hero-section">
                <div class = "header--hero-image-container">
<!--                    <img class = "header--hero-image"-->
<!--                         src="wp-content/themes/designflytheme/images/home/slider-image.png">-->
                 <div>
                     <img class = "hero--left-slider-arrows"
                          src="wp-content/themes/designflytheme/images/home/left-slider-arrows.png">
                     <div class="header--hero-image-text">
                         <h1 id="header--hero-image-header">Gearing up the ideas</h1>
                         <p id="header--hero-image-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquet faucibus
                             purus dictum euismod.
                             Donec vitae ex ipsum.</p>
                     </div>
                     <img class = "hero--right-slider-arrows"
                          src="wp-content/themes/designflytheme/images/home/right-slider-arrows.png">
                 </div>

                </div>
            </div>
            <div class="header--feature-section">
                <div class="header--feature-container container">
                    <div class="header--feature-section--single-feature">
                        <img class="header--feature-section-img" src="wp-content/themes/designflytheme/images/home/leaf-icon.png">
                        <div class="header--feature-section-text">
                            <h5 class="header--feature-header">Advertising</h5>
                            <p class="header--feature-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquet faucibus
                                purus dictum euismod</p>
                        </div>
                    </div>
                    <div class="header--feature-section--single-feature">
                        <img class="header--feature-section-img" src="wp-content/themes/designflytheme/images/home/mobile-icon.png">
                        <div class="header--feature-section-text">
                            <h5 class="header--feature-header">Multimedia</h5>
                            <p class="header--feature-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquet faucibus
                                purus dictum euismod</p>
                        </div>
                    </div>
                    <div class="header--feature-section--single-feature">
                        <img class="header--feature-section-img" src="wp-content/themes/designflytheme/images/home/camera-icon.png">
                        <div class="header--feature-section-text">
                            <h5 class="header--feature-header">Photography</h5>
                            <p class="header--feature-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris aliquet faucibus
                                purus dictum euismod</p>
                        </div>
                    </div>
                    <div></div>
                    <div></div>
                </div>

            </div>

    </header><!-- #masthead -->
