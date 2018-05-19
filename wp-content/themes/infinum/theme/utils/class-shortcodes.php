<?php
/**
 * The Utils-Shortcodes specific functionality.
 *
 * @since   2.0.0
 * @package Infinum\Theme\Utils
 */

namespace Infinum\Theme\Utils;

/**
 * Class Shortcodes
 */
class Shortcodes {

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

  function unicorn_shortcodes( $atts, $content = null ) {
    
      return '<blockquote class="infinum-quote">' . $content . '</blockquote>';
      
  }
}
