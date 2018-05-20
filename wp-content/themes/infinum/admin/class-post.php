<?php
/**
 * The Post meta specific functionality.
 *
 * @since   2.0.0
 * @package Infinum\Admin
 */

namespace Infinum\Admin;

/**
 * Class PostMeta
 */
class PostMeta {

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
   * Add theme specific PostMeta fields
   *
   * @since 2.0.0
   */

  function unicorn_add_custom_text_meta_box() {
    add_meta_box( 'custom_text_field', 'Custom Text', array( $this, 'unicorn_custom_text_callback' ), 'post', 'normal', 'high' );
  }

  function unicorn_custom_text_callback( $post ) {

    wp_nonce_field( array( $this, 'unicorn_custom_text_meta_box_data' ), 'unicorn_custom_text_meta_box_nonce' );
    
    $value = get_post_meta( $post->ID, '_unicorn_custom_text_value_key', true );
    
    echo '<input type="text" id="unicorn_custom_text_field" name="unicorn_custom_text_field" value="' . esc_attr( $value ) . '" size="25" />';
  }

  function unicorn_custom_text_meta_box_data( $post_id ) {

    $return = $this->unicorn_meta_security($post_id, 'unicorn_custom_text_field', array( $this, 'unicorn_custom_text_meta_box_data' ) , 'unicorn_custom_text_meta_box_nonce' );
    
    if($return){
      return;
    }
    
    $my_data = sanitize_text_field( $_POST['unicorn_custom_text_field'] );
    update_post_meta( $post_id, '_unicorn_custom_text_value_key', $my_data );
  }

  function unicorn_meta_security($post_id, $field_name, $nonce_action ,$nonce_name){

	if( ! isset( $_POST[$nonce_name] ) ){
		return false;
	}
	
	if( ! wp_verify_nonce( $_POST[$nonce_name], $nonce_action) ) {
		return false;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return false;
	}
	
	if( ! isset( $_POST[$field_name] ) ) {
		return false;
	}
}

}
