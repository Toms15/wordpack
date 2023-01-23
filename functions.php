<?php
/**
 * WordPack functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPack
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wordpack_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wordpack_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WordPack, use a find and replace
		 * to change 'wordpack' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wordpack', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'mobile' => esc_html__( 'Mobile', 'wordpack' ),
				'primary' => esc_html__( 'Primary', 'wordpack' ),
				'sitemap' => esc_html__( 'Sitemap', 'wordpack' ),
				'social' => esc_html__( 'Social', 'wordpack' ),
				'useful-links' => esc_html__( 'Useful links', 'wordpack' )
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
				'wordpack_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'wordpack_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpack_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpack_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpack_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpack_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wordpack' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordpack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'First Footer Widget Area', 'wordpack' ),
			'id'            => 'first-footer-widget-area',
			'description'   => esc_html__( 'Add widgets here.', 'wordpack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Second Footer Widget Area', 'wordpack' ),
			'id'            => 'second-footer-widget-area',
			'description'   => esc_html__( 'Add widgets here.', 'wordpack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Third Footer Widget Area', 'wordpack' ),
			'id'            => 'third-footer-widget-area',
			'description'   => esc_html__( 'Add widgets here.', 'wordpack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Fourth Footer Widget Area', 'wordpack' ),
			'id'            => 'fourth-footer-widget-area',
			'description'   => esc_html__( 'Add widgets here.', 'wordpack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'wordpack_widgets_init' );

/**
 * Implement Widget Shortcodes.
 */
defined( 'ABSPATH' ) || die;
require get_template_directory() . '/inc/widget-shortcodes.php';
require get_template_directory() . '/inc/widget-shortcodes-gutenberg.php';
Widget_Shortcode::get_instance();
Widget_Shortcode_Gutenberg::get_instance();


/**
 * Enqueue scripts and styles.
 */
function wordpack_scripts() {
	wp_enqueue_style( 'wordpack-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wordpack-style', 'rtl', 'replace' );
	// wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/app.css', array(), filemtime( get_template_directory() . '/css/app.css' ) );

	wp_enqueue_script( 'wordpack-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    // wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/app.js', array('jquery'), filemtime( get_template_directory() . '/js/app.js' ), true);

    $pageTemplate = get_page_template_slug();
    $pageTemplateName = str_replace('.php', '', $pageTemplate);
    if( is_page_template($pageTemplate) ) {
    	
    	wp_enqueue_style(
		    $pageTemplateName . '-style',
		    get_template_directory_uri() . '/css/' . $pageTemplateName . '.css',
		    array(),
		    filemtime( get_template_directory() . '/css/' . $pageTemplateName . '.css' )
		);

		wp_enqueue_script(
		    $pageTemplateName . '-script',
		    get_template_directory_uri() . '/js/' . $pageTemplateName . '.js',
		    array('jquery'),
		    filemtime( get_template_directory() . '/js/' . $pageTemplateName . '.js' ),
		    true,
		);
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpack_scripts' );


/**
 * Hide Admin bar
 */
show_admin_bar(false);

/**
 * Implement the CSRF Token for Contact Form 7
 */
add_filter( 'wpcf7_verify_nonce', '__return_true' );
add_filter( 'wpcf7_spam', '__return_false' );

/**
 * Add Google Maps API
 */
function my_acf_init() {
	acf_update_setting('google_api_key', '...');
}
add_action('acf/init', 'my_acf_init');

/**
 * Enabled ACF Field to print shortcode
 */
add_filter('acf/format_value/type=text', 'do_shortcode');
add_filter('acf/format_value/type=textarea', 'do_shortcode');

/**
 * Automatically add media information at upload time
 */
add_action( 'add_attachment', 'wordpack_add_image_meta_data' );
function wordpack_add_image_meta_data( $attachment_ID ) {
	$filename   =   $_REQUEST['name']; // or get_post by ID
	$withoutExt =   preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
	$withoutExt =   str_replace(array('-'), ' ', $withoutExt);
	$my_post = array(
	'post_title' 	=> $withoutExt,  // title
	'ID'           => $attachment_ID,
	'post_excerpt' => $withoutExt,  // caption
	'post_content' => $withoutExt,  // description
	);
	wp_update_post( $my_post );
	// update alt text for post
	update_post_meta($attachment_ID, '_wp_attachment_image_alt', $withoutExt );
}

/**
 * Implement the Option Page.
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Opzioni Generali del Tema',
		'menu_title'	=> 'Opzioni del Tema',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'    	=> 'dashicons-admin-generic',
		'position'    	=> 2
	));
}

/**
 * Generate Random String
 */
function wordpack_random_string($length = 5) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Implement the shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Implement the Custom Post Types.
 */
require get_template_directory() . '/inc/custom-editors.php';

/**
 * Implement the Custom Post Types.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Implement the Custom Taxonomies.
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Implement the Custom Admin Notices.
 */
require get_template_directory() . '/inc/custom-admin-notices.php';

/**
 * Implement Dynamic values for CF7.
 */
require get_template_directory() . '/inc/dynamic-values-cf7.php';

/**
 * Requiring plugins
 */
require get_template_directory() . '/inc/tgm_activation.php';

/**
 * Duplicate Post Types
 */
require get_template_directory() . '/inc/duplicate-post-types.php';

/**
 * Disable Wordpress' Functions
 */
require get_template_directory() . '/inc/disable-functions.php';

/**
 * Init ACF Blocks
 */
require get_template_directory() . '/inc/blocks.php';