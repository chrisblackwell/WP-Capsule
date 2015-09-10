<?php namespace WPCapsule;

class WordPressSettings {

  /**
   * Domain Text to be used for translation
   * and to keep as an ID stub
   *
   * @var string
   */
  private $textdomain;

  /**
   * Initialize the settings class and
   * trigger the actions
   * @param string $textdomain
   */
  public function __construct($textdomain)
  {
    $this->textdomain = $textdomain;
    add_action( 'admin_menu', array($this, 'add_admin_menu') );
    add_action( 'admin_init', array($this, 'settings_init') );
  }

  /**
   * API wrapper around the add_settings_section
   * WordPress function so we can call the same
   * function multiple times
   *
   * @param string $name
   * @param string $description
   */
  public function add_section($name, $description = '')
  {
    $section_name = strtolower(str_replace(' ', '_', $name)) . '_settings_section';
    add_action( 'admin_init', function() use ($section_name, $name, $description) {
      add_settings_section(
        $section_name,
        __( $name, $this->textdomain),
        function() use ($description) {
          echo __( $description, $this->textdomain);
        },
        'wp_capsule_theme_page'
      );
    });

    return $name;
  }

  /**
   * API wrapper around the add_settings_field
   * WordPress function so we can call the
   * same function muiltiple times
   *
   * @param string $name
   * @param string $description
   * @param string $section
   */
  public function add_setting($name, $description, $section)
  {
    $setting_name = strtolower(str_replace(' ', '_', $name)) . '_setting_field';
    $section_name = strtolower(str_replace(' ', '_', $section)) . '_settings_section';
    add_action( 'admin_init', function() use ($setting_name, $description, $section_name) {
      add_settings_field(
        $setting_name,
        __( $description, $this->textdomain ),
        function() use ($setting_name) {
          ?>
          <input type="text" name="wp_capsule_settings[<?php echo $setting_name; ?>]" value="">
          <?php
        },
        'wp_capsule_theme_page',
        $section_name
      );
    });
  }

  /**
   * Creates the theme options page and
   * adds it to the Apperance menu
   *
   */
  public function add_admin_menu()
  {
    add_submenu_page( 'themes.php', 'Theme Options', 'Settings', 'manage_options',  $this->textdomain. '-options', array($this, 'wp_capsule_options_page') );
  }


  /**
   * Registers our settings with WordPress
   *
   */
  public function settings_init()
  {
    register_setting( 'wp_capsule_theme_page', 'wp_capsule_settings' );
  }

  /**
   * Callback function that includes the template
   *
   */
  public function wp_capsule_options_page()
  {
    include_once get_template_directory() . '/inc/options-page-template.php';
  }

}
