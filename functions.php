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
        'before_widget' => '<section id="%1$s" class="widget %2$s sidebar-container">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
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

    wp_enqueue_script('designflytheme-custom-js', get_template_directory_uri(). '/js/custom.js');
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
    $comments = get_comments( array( 'post_id' => get_the_ID()) );
    foreach ( $comments as $comment ) :
    ?>
   <div class="comment-div">
       <p class = "comment-details">
           <a  href="#"> <?php echo $comment->comment_author; ?></a> said on
           <time> <?php echo  get_comment_date( 'F j, Y ', $comment ) ?>at <?php echo  get_comment_time( 'h:i a', $comment ) ?></time>
       </p>
       <p class = "comment-content">
           <?php echo $comment->comment_content; ?>
       </p>
   </div>
    <?php
        endforeach;
}


/**
 * Look custom post typ function 'add_custom_post_type_portfolio
 */
add_action('init', 'register_custom_post_type_portfolio');


/**
 * Look custom post typ function 'create_portfolio_category_taxonomies
 */
add_action('init', 'create_portfolio_category_taxonomies');

/**
 *  Add thickbox
 */
//add_action('init', 'add_portfolio_thickbox');

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



/**
 * Register custom widget to show popular posts in sidebar widget area
 */
add_action('widgets_init', 'register_custom_portfolio_widget');
function register_custom_portfolio_widget()
{
    register_widget('Display_portfolio_Widget');
}

class Display_portfolio_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'portfolio_widget', // Base ID
            'Portfolio', // Name
            array( 'description' => __(
                'Show your site\'s portfolio',
                'designflytheme'
            ), ) // Args
        );
    }

    /**
     * This method creates frontend UI to
     * show custom widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance )
    {
        extract($args);
        $title = apply_filters(
            'widget_title',
            $instance['title']
        );

        echo $before_widget;
        ?>
        <!--    related post sidebar start -->
        <div class = "portfolio-container">
            <div  class = "sidebar-header">
                <?php
                if (! empty($title) ) {
                    echo $before_title . $title . $after_title;
                }
                $args = array (
                    'post_per_page' => 5
                );?>
            </div>
            <?php
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    ?>
                    <img class ="portfolio--img"
                         src="<?php the_post_thumbnail_url();?>">
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <!--     related post sidebar end -->

        <?php
        echo $after_widget;
    }

    /**
     * This method creates form to show in admin panel.
     *
     * @param  array $instance
     * @return string|void
     */

    public function form( $instance )
    {
        if (isset($instance[ 'title' ])) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __('Portfolio', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name(
                'title'); ?>">
                <?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'); ?>"
                   name="<?php echo $this->get_field_name(
                       'title'); ?>"
                   type="text" value="<?php
            echo esc_attr($title);
            ?>" />
        </p>
        <?php
    }

    /**
     * This method updates form field's
     * old instances with new instances
     *
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty($new_instance['title']) ) ?
            strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * Register custom widget to show related posts in sidebar widget area
 */
add_action('widgets_init', 'register_custom_related_post_widget');
function register_custom_related_post_widget()
{
    register_widget('Display_related_post_Widget');
}

//Class to display related post widget
class Display_related_post_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'related_posts_widget', // Base ID
            'Related Posts', // Name
            array( 'description' => __(
                'Related Posts',
                'designflytheme'
            ), ) // Args
        );
    }

    /**
     * This method creates frontend UI to
     * show custom widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance )
    {
        extract($args);
        $title = apply_filters(
            'widget_title',
            $instance['title']
        );

        echo $before_widget;
        ?>
        <!--    related post sidebar start -->
        <div class = "related-post-sidebar related-post sidebar-margin-top">
            <div class="sidebar-header">
                <?php
                if (! empty($title) ) {
                    echo $before_title .$title. $after_title;
                }


                $post_id = get_the_ID();
                $author = get_the_author();
                $cat_ids = array();
                $categories = get_the_category( $post_id );

                if ( $categories && !is_wp_error( $categories ) ) {

                    foreach ( $categories as $category ) {

                        array_push( $cat_ids, $category->term_id );
                    }
                }
                $args = array (
                    'relation' => 'OR',
                    array(
                        array(
                            'category__in' => $cat_ids,
                        ),
                        array(
                            'author'=> $author
                        )
                    )
                    );
                ?>
            </div>
            <?php
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    ?>
                    <div class="related-post-content">
                        <div class = "related-post-single">
                            <img class ="related-post--img"
                                 src="<?php the_post_thumbnail_url();?>">
                            <div class="related-post-text post-text">
                                <span class = "post-content-tittle"><?php the_title();?></span>
                                <span class = "post-span-bottom post-text">
                                    by <a class = "post-highlight" > <?php the_author();?></a>
                                <time>on <?php the_time('j M Y');?></time>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <!--     related post sidebar end -->

        <?php
        echo $after_widget;
    }

    /**
     * This method creates form to show in admin panel.
     *
     * @param  array $instance
     * @return string|void
     */

    public function form( $instance )
    {
        if (isset($instance[ 'title' ])) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __('Related Posts', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name(
                'title'); ?>">
                <?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'); ?>"
                   name="<?php echo $this->get_field_name(
                       'title'); ?>"
                   type="text" value="<?php
            echo esc_attr($title);
            ?>" />
        </p>
        <p>
        <select id="<?php echo $this->get_field_id(
            'relate_post_by'); ?>"
                name = '<?php echo $this->get_field_name(
                    'relate_post_by');?>'>
            <option value = "none" selected disabled hidden>
                Select options
            </option>
            <option value=""> Relate posts by category </option>
            <option value=""> Relate posts by author </option>
        </select>
        <?php
    }

    /**
     * This method updates form field's
     * old instances with new instances
     *
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty($new_instance['title']) ) ?
            strip_tags($new_instance['title']) : '';
        $instance['relate_post_by'] = ( ! empty($new_instance['relate_post_by']) ) ?
            strip_tags($new_instance['relate_post_by']) : '';
        return $instance;
    }
}

/**
 * Register custom widget to show recent posts in sidebar widget area
 */
add_action('widgets_init', 'register_custom_recent_post_widget');
function register_custom_recent_post_widget()
{
    register_widget('Display_recent_post_Widget');
}

class Display_recent_post_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'recent_posts_widget', // Base ID
            'Recent Posts', // Name
            array( 'description' => __(
                'Show your site\'s Recent Posts',
                'designflytheme'
            ), ) // Args
        );
    }

    /**
     * This method creates frontend UI to
     * show custom widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance )
    {
        extract($args);
        $title = apply_filters(
            'widget_title',
            $instance['title']
        );

        echo $before_widget;
        ?>
        <!--    related post sidebar start -->
        <div class = "related-post-sidebar related-post sidebar-margin-top">
            <div class="sidebar-header">
                <?php
                if (! empty($title) ) {
                    echo $before_title . $title . $after_title;
                }
                $args = array (
                    'post_per_page' => 5,
                    'order_by'=> 'date',
                    'order' => 'DESC'
                );?>
            </div>
            <?php
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    ?>
                    <div class="related-post-content">
                        <div class = "related-post-single">
                            <img class ="related-post--img"
                                 src="<?php the_post_thumbnail_url();?>">
                            <div class="related-post-text post-text">
                                <span class = "post-content-tittle"><?php the_title();?></span>
                                <span class = "post-span-bottom post-text">
                                    by <a class = "post-highlight" > <?php the_author();?></a>
                                <time>on <?php the_time('j M Y');?></time>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <!--     related post sidebar end -->

        <?php
        echo $after_widget;
    }

    /**
     * This method creates form to show in admin panel.
     *
     * @param  array $instance
     * @return string|void
     */

    public function form( $instance )
    {
        if (isset($instance[ 'title' ])) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __('Recent Posts', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name(
                'title'); ?>">
                <?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'); ?>"
                   name="<?php echo $this->get_field_name(
                       'title'); ?>"
                   type="text" value="<?php
            echo esc_attr($title);
            ?>" />
        </p>
        <?php
    }

    /**
     * This method updates form field's
     * old instances with new instances
     *
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty($new_instance['title']) ) ?
            strip_tags($new_instance['title']) : '';
        return $instance;
    }
}


/**
 * Register custom widget to show popular posts in sidebar widget area
 */
add_action('widgets_init', 'register_custom_popular_post_widget');
function register_custom_popular_post_widget()
{
    register_widget('Display_popular_post_Widget');
}

class Display_popular_post_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'popular_posts_widget', // Base ID
            'Popular Posts', // Name
            array( 'description' => __(
                'Show your site\'s popular Posts',
                'designflytheme'
            ), ) // Args
        );
    }

    /**
     * This method creates frontend UI to
     * show custom widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance )
    {
        extract($args);
        $title = apply_filters(
            'widget_title',
            $instance['title']
        );

        echo $before_widget;
        ?>
        <!--    related post sidebar start -->
        <div class = "related-post-sidebar related-post sidebar-margin-top">
            <div class="sidebar-header">
                <?php
                if (! empty($title) ) {
                    echo $before_title . $title . $after_title;
                }
                $args = array (
                    'post_per_page' => 5
                );?>
            </div>
            <?php
            $wp_query = new WP_Query($args);
            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) :
                    $wp_query->the_post();
                    ?>
                    <div class="related-post-content">
                        <div class = "related-post-single">
                            <img class ="related-post--img"
                                 src="<?php the_post_thumbnail_url();?>">
                            <div class="related-post-text post-text">
                                <span class = "post-content-tittle"><?php the_title();?></span>
                                <span class = "post-span-bottom post-text">
                                    by <a class = "post-highlight" > <?php the_author();?></a>
                                <time>on <?php the_time('j M Y');?></time>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <!--     related post sidebar end -->

        <?php
        echo $after_widget;
    }

    /**
     * This method creates form to show in admin panel.
     *
     * @param  array $instance
     * @return string|void
     */

    public function form( $instance )
    {
        if (isset($instance[ 'title' ])) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __('Popular Posts', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name(
                'title'); ?>">
                <?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'); ?>"
                   name="<?php echo $this->get_field_name(
                       'title'); ?>"
                   type="text" value="<?php
            echo esc_attr($title);
            ?>" />
        </p>
        <?php
    }

    /**
     * This method updates form field's
     * old instances with new instances
     *
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty($new_instance['title']) ) ?
            strip_tags($new_instance['title']) : '';
        return $instance;
    }
}


/**
 * Register custom widget to show archives in sidebar widget area
 */
add_action('widgets_init', 'register_custom_archives_widget');
function register_custom_archives_widget()
{
    register_widget('Display_archives_Widget');
}

class Display_archives_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'archives_widget', // Base ID
            'Archives', // Name
            array( 'description' => __(
                'Show archives for your site\'s posts',
                'designflytheme'
            ), ) // Args
        );
    }

    /**
     * This method creates frontend UI to
     * show custom widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance )
    {
        extract($args);
        $title = apply_filters(
            'widget_title',
            $instance['title']
        );

        echo $before_widget;
        ?>
        <!--    related post sidebar start -->
        <div class = "related-post-sidebar related-post sidebar-margin-top">
            <div class="sidebar-header">
                <?php
                if (! empty($title) ) {
                    echo $before_title . $title . $after_title;
                }
                $args = array (
                    'post_per_page' => 5
                );?>
            </div>
            <?php
//            $wp_query = new WP_Query($args);
//            if ($wp_query->have_posts()) :
//                $i=0;
//                while ($wp_query->have_posts() && $i<5) :
//                    $wp_query->the_post();
//                    ?>
                    <div class="archieve-list">
                        <ul>
                            <li class="archive-text">November 2012</li>
                            <li class="archive-text">December 2012</li>
                        </ul>
                    </div>
                    <?php
//                    $i++;
//                endwhile;
//            endif;
//            wp_reset_postdata();
//            ?>
        </div>
        <!--     related post sidebar end -->

        <?php
        echo $after_widget;
    }

    /**
     * This method creates form to show in admin panel.
     *
     * @param  array $instance
     * @return string|void
     */

    public function form( $instance )
    {
        if (isset($instance[ 'title' ])) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __('Archives', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name(
                'title'); ?>">
                <?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'); ?>"
                   name="<?php echo $this->get_field_name(
                       'title'); ?>"
                   type="text" value="<?php
            echo esc_attr($title);
            ?>" />
        </p>
        <p>
            <input type = "checkbox" class="widefat" id="<?php echo $this->get_field_id(
                'post_count'); ?>"
                   name="<?php echo $this->get_field_name(
                       'post_count'); ?>"/>
            <label for="<?php echo $this->get_field_name(
                'post_count'); ?>">
                <?php _e('Show post count:'); ?></label>
        </p>
        <?php
    }

    /**
     * This method updates form field's
     * old instances with new instances
     *
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty($new_instance['title']) ) ?
            strip_tags($new_instance['title']) : '';
        $instance['post_count'] = ( ! empty($new_instance['post_count']) ) ?
            strip_tags($new_instance['post_count']) : '';
        return $instance;
    }
}

/**
 * Register custom widget to show latest tweet in sidebar widget area
 */
add_action('widgets_init', 'register_custom_latest_tweet_widget');
function register_custom_latest_tweet_widget()
{
    register_widget('Display_latest_tweet_Widget');
}

class Display_latest_tweet_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'latest_tweet_widget', // Base ID
            'Latest Tweet', // Name
            array( 'description' => __(
                'Show archives for your site\'s posts',
                'designflytheme'
            ), ) // Args
        );
    }

    /**
     * This method creates frontend UI to
     * show custom widget.
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance )
    {
        extract($args);
        $title = apply_filters(
            'widget_title',
            $instance['title']
        );
        $author_name = apply_filters(
            'widget_title',
            $instance['author_name']
        );
        $author_email = apply_filters(
            'widget_title',
            $instance['author_email']
        );
        $author_tweet = apply_filters(
            'widget_title',
            $instance['author_tweet']
        );

        echo $before_widget;
        ?>
        <!--    latest tweeet sidebar start -->
        <div class = "related-post-sidebar related-post sidebar-margin-top">
            <div class="sidebar-header">
                <div class="sidebar-margin-top">
                    <div class="follow-us-sidebar-header sidebar-header">
                        <?php
                        if (! empty($title) ) {
                            echo $before_title . $title . $after_title;
                        }?>
                        <button id = "btn-follow-us">
                            <i class="fa fa-twitter icon-twitter" aria-hidden="true"></i> Follow us
                        </button>
                    </div>
            </div>
            <?php
        if (! empty($author_name) && ! empty($author_email) && ! empty($author_tweet) ) {
            ?>
                <div class = "follow-us-sidebar-content">
                    <div class = "follow-us-user-info">
                        <img class ="avatar--img"
                             src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png">
                        <div class="follow-us-text">
                            <p class="post-text"> <?php echo $author_name?> <span class = "follow-us-activity-time">9h</span><br/>
                                <span class = "post-highlight"><?php echo $author_email?></span></p>
                        </div>
                    </div>
                    <div>
                        <p class="post-text">
                            <?php echo $author_tweet?>
                        </p>
                    </div>
                </div>
            <?php }
        ?>
                <div class = "facebook-box-container">
                    <div class = "facebook-box-header">
                        <p>Find us on facebook</p>
                        <h6>facebook</h6>
                    </div>
                    <div class = "facebook-designfly-section">
                        <div class="facebook-designfly-top-container">
                            <img class = "designfly-logo" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/favicon.ico">
                            <div class="facebook-like-right-section">
                                <h6>DESIGNfly</h6>
                                <div>
                                    <button><i class="fa fa-check"></i> Like</button>
                                    <p>You like this.</p>
                                </div>
                            </div>
                        </div>
                        <div class = "facebook-designfly-middle-container">
                            <p>5, 173 people like <b>rtCamp</b></p>
                            <div class="facebook-users">
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Manish</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Abhishek</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Amal</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Gagan</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Manish</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Kamal</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Komal</span>
                                </div>
                                <div class="facebook-single-user-div">
                                    <img class = "facebook-user-img" src="/wordpress_theme_development/wp-content/themes/designflytheme/images/female-avatar.png"/>
                                    <span>Pratik</span>
                                </div>

                            </div>
                        </div>
                        <div class="facebook-icon-div">
                            <i class="fa fa-facebook-square facebook-icon"></i>
                            <p>Facebook social plugin</p>
                        </div>

                    </div>

                </div>
                <!--     latest tweet sidebar end -->

            </div>
        </div>


        <?php

        echo $after_widget;
    }

    /**
     * This method creates form to show in admin panel.
     *
     * @param  array $instance
     * @return string|void
     */

    public function form( $instance )
    {
        if (isset($instance[ 'title' ])) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __('Latest Tweet', 'text_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name(
                'title'); ?>">
                <?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'title'); ?>"
                   name="<?php echo $this->get_field_name(
                       'title'); ?>"
                   type="text" value="<?php
            echo esc_attr($title);
            ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name(
                'author_name'); ?>">
                <?php _e('Author name:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'author_name'); ?>"
                   name="<?php echo $this->get_field_name(
                       'author_name'); ?>"
                   type="text" >

            <label for="<?php echo $this->get_field_name(
                'author_email'); ?>">
                <?php _e('Author email:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'author_email'); ?>"
                   name="<?php echo $this->get_field_name(
                       'author_email'); ?>"
                   type="text" >

            <label for="<?php echo $this->get_field_name(
                'author_tweet'); ?>">
                <?php _e('Author tweet:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id(
                'author_tweet'); ?>"
                   name="<?php echo $this->get_field_name(
                       'author_tweet'); ?>"
                   type="text" >
        </p>
        <?php
    }

    /**
     * This method updates form field's
     * old instances with new instances
     *
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = ( ! empty($new_instance['title']) ) ?
            strip_tags($new_instance['title']) : '';
        $instance['author_name'] = ( ! empty($new_instance['author_name']) ) ?
            strip_tags($new_instance['author_name']) : '';
        $instance['author_email'] = ( ! empty($new_instance['author_email']) ) ?
            strip_tags($new_instance['author_email']) : '';
        $instance['author_tweet'] = ( ! empty($new_instance['author_tweet']) ) ?
            strip_tags($new_instance['author_tweet']) : '';
        return $instance;
    }
}

/**
 * This function creates pagination
 * @param $query_wp
 */
function pagination_bar( $custom_query)
{

        $total_pages = $custom_query->max_num_pages;
        $big         = 999999999; // need an unlikely integer

        if ( $total_pages > 1 ) {
            $current_page = max( 1, get_query_var( 'paged' ) );

            $pages = paginate_links(
                array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '?paged=%#%',
                    'current'   => $current_page,
                    'total'     => $total_pages,
                    'type'      => 'array',
                    'prev_text' => '<span class="dashicons dashicons-controls-play paginate-arrow-left"></span>',
                    'next_text' => '<span class="dashicons dashicons-controls-play"></span>',
                )
            );

            /* for echoing out with custom html tags */
            if ( is_array( $pages ) ) {
                $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
                echo '<div class="paginate">';
                echo '<div class="post-pagination-buttons">';
                foreach ( $pages as $page ) {
                    echo '<div class = "paginate-button" id = "paginate-button">'.$page.'</div>';
                }
                echo '</div>';
                echo '</div>';
            }
        }

    }

/**
 * This function creates texonomy for post type = 'portfolio'
 * Hierarchical taxonomy: 'Category'
 */
function create_portfolio_category_taxonomies()
{
    $labels = array(
        'name'              => _x(
            'Categories',
            'taxonomy general name',
            'designflytheme'
        ),
        'singular_name'     => _x(
            'Category',
            'taxonomy singular name',
            'designflytheme'
        ),
        'search_items'      => __(
            'Search Portfolio Category',
            'designflytheme'
        ),
        'all_items'         => __(
            'All Portfolio Categories',
            'designflytheme'
        ),
        'parent_item'       => __(
            'Parent Portfolio Category',
            'designflytheme'
        ),
        'parent_item_colon' => __(
            'Parent Portfolio Category:',
            'designflytheme'
        ),
        'edit_item'         => __(
            'Edit Portfolio Category',
            'designflytheme'
        ),
        'update_item'       => __(
            'Update Portfolio Category',
            'designflytheme'
        ),
        'add_new_item'      => __(
            'Add New Portfolio Category',
            'designflytheme'
        ),
        'new_item_name'     => __(
            'New Portfolio Category Name',
            'designflytheme'
        ),
        'menu_name'         => __(
            'Portfolio Categories',
            'designflytheme'
        ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'category' ),
    );
    register_taxonomy('Category', 'portfolio', $args);
}






