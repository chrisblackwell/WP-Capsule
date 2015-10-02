<?php namespace WPCapsule;

/**
 * Class ThemeSetup
 *
 * Setup the functionality of the WordPress theme
 * and add actions and filters.
 *
 * Collection of best practices used from various WordPress
 * themes over the years, including most recent additions
 * from Twenty Fifteen
 *
 * @package WPCapsule
 * @subpackage Optimus
 */
class ThemeSetup {

  /**
   * The theme text domain and name
   * @var string
   */
  public $textdomain;

  /**
   * The currently registered sidebars
   * @var array
   */
  protected $sidebars = array();

  /**
   * Setup our theme with a given name and
   * trigger the actions and filters
   *
   * @param string $name
   */
  public function __construct($name)
  {
    $this->textdomain = $name;
    add_action( 'after_setup_theme', array($this, 'setup') );
    add_action( 'wp_enqueue_scripts', array($this, 'scripts_and_styles') );
    add_action( 'admin_enqueue_scripts', array($this, 'admin_scripts_and_styles') );
    add_action( 'widgets_init', array($this, 'register_sidebars') );
  }

  /**
   * Creates a duplicated WordPress function to
   * add a new image size to theme
   *
   * @param $name
   * @param $width
   * @param $height
   * @param bool $crop
   */
  public function add_image_size($name, $width, $height, $crop = false)
  {
    add_image_size( $name, $width, $height, $crop );
  }

  /**
   * Primary function for setting theme
   * features and support
   *
   */
  public function setup()
  {
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // Make theme available for translation
    load_theme_textdomain( $this->textdomain, get_template_directory() . '/languages' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    // Setup the WordPress core custom background feature.
    $custom_background_args = array(
      'default-color'       => '000000',
      'default-repeat'      => 'no-repeat',
      'default-position-x'  => 'center',
      'default-attachment'  => 'fixed'
    );
    add_theme_support( 'custom-background', $custom_background_args );

    // Remove WordPress version number
    remove_action('wp_head', 'wp_generator');

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'header_primary'    => __( 'Primary Nav', $this->textdomain)
    ) );

    // Enable post thumbnails and set their size
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300 );

  }

  /**
   * Register all styles and scripts for theme
   */
  public function scripts_and_styles() {
    global $wp_styles;

    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
      wp_enqueue_script( 'comment-reply' );

    /*
     * Load JavaScript files
     */
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js', array(), '2.6.2',  false );
    wp_enqueue_script(
      $this->textdomain . '-scripts',
      get_template_directory_uri() . '/assets/js/bundle.js',
      array('jquery'),
      '1.0',
      true
    );

    /*
     * Load CSS files
     */
    wp_enqueue_style( $this->textdomain . '-styles', get_template_directory_uri() . '/assets/css/main.css' );

  }

  /**
   * Register our admin styles and scripts to be used
   *
   */
  public function admin_scripts_and_styles()
  {
    // Load CSS files
    wp_enqueue_style( $this->textdomain . '-admin-styles', get_template_directory_uri() . '/assets/css/admin.css' );
  }

  /**
   * Register a sidebar to use in WordPress
   *
   * @param string $sidebar_name
   * @param string $description
   */
  public function add_sidebar($sidebar_name, $description = '') {
    $sidebar_id = ucwords(str_replace( '_', ' ', $sidebar_name ));
    $this->sidebars[] = array(
      'name' => __( $sidebar_name ),
      'id' => $sidebar_id,
      'description' => __( $description ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>'
    );
  }

  /**
   * Loop through all the sidebars defined in
   * $sidebars and register with WordPress
   */
  public function register_sidebars()
  {
    foreach($this->sidebars as $sidebar)
    {
      register_sidebar($sidebar);
    }
  }

}
