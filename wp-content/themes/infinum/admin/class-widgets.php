<?php
/**
 * The Widgets specific functionality.
 *
 * @since   2.0.0
 * @package Infinum\Admin
 */

namespace Infinum\Admin;

/**
 * Class Widgets
 */
class Widgets {

  /**
   * Global theme name
   *
   * @var string
   *
   * @since 2.0.0
   */
  protected $theme_name;

  /**
   * Global theme version
   *
   * @var string
   *
   * @since 2.0.0
   */
  protected $theme_version;

  /**
   * Newsletter widget
   *
   * @var string
   *
   * @since 2.0.0
   */
  private $newsletter;

  /**
   * Initialize class
   *
   * @param array $theme_info Load global theme info.
   *
   * @since 2.0.0
   */
  public function __construct( $theme_info = null ) {
    $this->theme_name    = $theme_info['theme_name'];
    $this->theme_version = $theme_info['theme_version'];
  }

  /**
   * Set up widget areas
   *
   * @since 2.0.0
   */
  public function register_widget_position() {
    register_sidebar(
      array(
          'name'          => esc_html__( 'Newsletter', 'infinum' ),
          'id'            => 'newsletter',
          'description'   => esc_html__( 'Newsletter widget area for footer', 'infinum' ),
          'before_widget' => '<section id="%1$s" class="widget %2$s">',
          'after_widget'  => '</section>',
          'before_title'  => '<h2 class="widget-title">',
          'after_title'   => '</h2>',
      )
    );
  }

  // register newletter widget
  public function register_newsletter_widget() {
      register_widget( 'Infinum\Admin\NewsletterWidget' );
  }

}
