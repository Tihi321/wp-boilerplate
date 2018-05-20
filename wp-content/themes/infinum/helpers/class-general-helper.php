<?php
/**
 * The general helper specific functionality.
 * Used in admin or theme side.
 *
 * @since   2.0.0
 * @package Infinum\Helpers
 */

namespace Infinum\Helpers;

/**
 * Class General Helper
 */
class General_Helper {

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

  /**
   * Check if array has key and return its value if true.
   * Useful if you want to be sure that key exists and return empty if it doesn't.
   *
   * @param string $key   Array key to check.
   * @param array  $array Array in which the key should be checked.
   * @return string       Value of the key if it exists, empty string if not.
   *
   * @since 2.0.0
   */
  public function get_array_value( $key, $array ) {
    return ( gettype( $array ) === 'array' && array_key_exists( $key, $array ) ) ? $array[ $key ] : '';
  }

  /**
   * Return timestamp when file is changes.
   * This is used for cache busting assets.
   *
   * @param string $filename File name you want to get timestamp from.
   * @return init Timestamp.
   *
   * @since 2.0.1
   */
  public function get_assets_version( $filename = null ) {
    if ( ! $filename ) {
      return false;
    }

    $file_location = get_template_directory() . $filename;

    if ( ! file_exists( $file_location ) ) {
      return;
    }

    return filemtime( $file_location );
  }

  /**
   * Check if XML is valid file used for svg.
   *
   * @param xml $xml Full xml document.
   * @return boolean
   *
   * @since 2.0.2
   */
  public function is_valid_xml( $xml ) {
    libxml_use_internal_errors( true );
    $doc = new \DOMDocument( '1.0', 'utf-8' );
    $doc->loadXML( $xml );
    $errors = libxml_get_errors();
    return empty( $errors );
  }


  /**
   * Call a shortcode function by tag name.
   *
   * @author J.D. Grimes
   * @link https://codesymphony.co/dont-do_shortcode/
   *
   * @param string $tag     The shortcode whose function to call.
   * @param array  $atts    The attributes to pass to the shortcode function. Optional.
   * @param array  $content The shortcode's content. Default is null (none).
   *
   * @return string|bool False on failure, the result of the shortcode on success.
   *
   * @since 2.0.0
   */
  public function inf_do_shortcode( $tag, array $atts = array(), $content = null ) {

    global $shortcode_tags;

    if ( ! isset( $shortcode_tags[ $tag ] ) ) {
      return false;
    }

    return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
  }

  
/*
    ========================
        BLOG LOOP CUSTOM FUNCTIONS
    ========================
*/

/*
    ========================
        Get meta tags
    ========================
*/

function unicorn_posted_meta()
{
  return '<span class="posted-date"><a href="'.esc_url(get_permalink()).'">'.get_the_date().'</a></span>';
}

/*
    ========================
        Get comments
    ========================
*/
  function unicorn_posted_footer($onlyComments = false)
{
    $comments_num = get_comments_number();
    if (comments_open()) {
        if ($comments_num == 0) {
            $comments = __('No Comments');
        } elseif ($comments_num > 1) {
            $comments = $comments_num.__(' Comments');
        } else {
            $comments = __('1 Comment');
        }
        $comments = '<a class="comments-link" href="'.get_comments_link().'"><span class="unicorn-comments-icon"></span>'.$comments.'</a>';
    } else {
        $comments = __('Comments are closed');
    }

    if ($onlyComments) {
        return $comments;
    }

    return '<div class="post-footer-container"><div class="favs-box"><span class="unicorn-faves-icon"></span>0 faves<div class="comments-box">'.$comments.'</div></div>';
  }

  /*
    ========================
        Get thumbnail or first image attachement inside the post
    ========================
*/
  function unicorn_get_attachment($num = 1)
{
    $output = '';
    if (has_post_thumbnail() && $num == 1):
        $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); else:
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_per_page' => $num,
            'post_parent' => get_the_ID(),
        ));
    if ($attachments && $num == 1):
            foreach ($attachments as $attachment):
                $output = wp_get_attachment_url($attachment->ID);
    endforeach; elseif ($attachments && $num > 1):
            $output = $attachments;
    endif;

    wp_reset_postdata();

    endif;

    return $output;
}

  /*
    ========================
        Get any embeded media
    ========================
*/
function unicorn_get_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed = get_media_embedded_in_content($content, $type);

    return $embed[0];
}


}