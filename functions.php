<?php
/**
 * DesignFlytheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DesignFlytheme
 */

if (! defined('_S_VERSION') ) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (! function_exists('designflytheme_setup') ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function designflytheme_setup()
    {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on DesignFlytheme, use a find and replace
        * to change 'designflytheme' to the name of your theme in all the template files.
        */
        load_theme_textdomain('designflytheme', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
            'menu-1' => esc_html__('Primary', 'designflytheme'),
            )
        );

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'designflytheme_custom_background_args',
                array(
                'default-color' => 'ffffff',
                'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'designflytheme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function designflytheme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('designflytheme_content_width', 640);
}
add_action('after_setup_theme', 'designflytheme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function designflytheme_widgets_init()
{
    register_sidebar(
        array(
        'name'          => esc_html__('Sidebar', 'designflytheme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Portfolio.', 'designflytheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'designflytheme_widgets_init');

//add_action('widgets_init', 'designflytheme_portfolio_sidebar');
//
//function designflytheme_portfolio_sidebar{
//
//}

/**
 * Enqueue scripts and styles.
 */
function designflytheme_scripts()
{
    wp_enqueue_style('designflytheme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('designflytheme-custom-style', get_template_directory_uri(). '/custom.css');
    wp_style_add_data('designflytheme-style', 'rtl', 'replace');

    wp_enqueue_script('designflytheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'designflytheme_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION') ) {
    include get_template_directory() . '/inc/jetpack.php';
}

function designflytheme_comment(){
    ?>
   <div class="comment-div">
       <p class = "comment-details">
           <a  href="#">John Richards</a> said on
           <time> October 12, 2012 at 11:49am</time>
       </p>
       <p class = "comment-content">
           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at justo at
           enim facilisis auctor vitae id erat. Integer eu justo cursus, ullamcorper tellus nec,
           consectetur eros. Cras suscipit, lorem id convallis rhoncus, orci augue aliquet elit,
           in mollis ligula lectus vel nisi. Aenean sit amet blandit lorem. Phasellus tempor neque nunc,
           sit amet condimentum est fringilla sit amet. Nam vitae mi fermentum, lobortis justo non, feugiat mi.
           Maecenas tincidunt,
           augue quis eleifend rhoncus, lorem arcu maximus magna, ut molestie nibh nibh eu massa.
       </p>
   </div>
    <div class="comment-div">
        <p class = "comment-details">
            <a  href="#">Peter Harrison</a> said on
            <time> October 12, 2012 at 11:49am</time>
        </p>
        <p class = "comment-content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at justo at
            enim facilisis auctor vitae id erat. Integer eu justo cursus, ullamcorper tellus nec.
        </p>
    </div>
    <div class="comment-div">
        <i class="fal fa-comment-alt-dots"></i>
        <p class = "comment-details">
            <a  href="#">Author</a> said on
            <time> October 12, 2012 at 11:49am</time>
        </p>
        <p class = "comment-content">
             Aenean sit amet blandit lorem. Phasellus tempor neque nunc,
            sit amet condimentum est fringilla sit amet. Nam vitae mi fermentum, lobortis justo non.
        </p>
    </div>
    <?php
}


/**
 * Look custom post typ function 'add_custom_post_type_portfolio
 */
add_action('init', 'register_custom_post_type_portfolio');

function register_custom_post_type_portfolio() {

    $labels = array(
        'name'                  => _x(
            'Portfolio',
            'Post type general name',
            'textdomain'
        ),
        'singular_name'         => _x(
            'Portfolio',
            'Post type singular name',
            'textdomain'
        ),
        'menu_name'             => _x(
            'Portfolio',
            'Admin Menu text',
            'textdomain'
        ),
        'name_admin_bar'        => _x(
            'Portfolio',
            'Add New on Toolbar',
            'textdomain'
        ),
        'add_new'               => __(
            'Add New ',
            'textdomain'
        ),
        'add_new_item'          => __(
            'Add New Portfolio',
            'textdomain'
        ),
        'new_item'              => __(
            'New Portfolio',
            'textdomain'
        ),
        'edit_item'             => __(
            'Edit Portfolio',
            'textdomain'
        ),
        'view_item'             => __(
            'View Portfolio',
            'textdomain'
        ),
        'all_items'             => __(
            'All Portfolio',
            'textdomain'
        ),
        'search_items'          => __(
            'Search Portfolio',
            'textdomain'
        ),
        'parent_item_colon'     => __(
            'Parent Portfolio:',
            'textdomain'
        ),
        'not_found'             => __(
            'No Portfolio found.',
            'textdomain'
        ),
        'not_found_in_trash'    => __(
            'No Portfolio found in Trash.',
            'textdomain'
        ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments'
        ),
        'menu_position'      => 5,

    );
    register_post_type('Portfolio', $args);

}
