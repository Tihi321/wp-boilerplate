<?php
/**
 * The Newsletter widget.
 *
 * @since   2.0.0
 * @package Infinum\Admin
 */

namespace Infinum\Admin;

/**
 * Class NewsletterWidget
 */
class NewsletterWidget extends \WP_Widget {

  /**
   * Initialize class
   *
   * @param array $theme_info Load global theme info.
   *
   * @since 2.0.0
   */
  public function __construct( $theme_info = null ) {
    parent::__construct(
			'newsletter_widget', // Base ID
			__('Newsletter', 'infinum'), // Name
			array( 'description' => __( 'Newsletter form preko Mailchimp servisa, na link iz polja', 'infinum' ), ) // Args
		);
  }

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$link = ( !empty( $instance['link'] ) ) ? $instance['link']  : '';

		echo $args['before_widget'];
		?>
    <div id="mc_embed_signup">
      <form action="<?php echo $link ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
        <div id="mc_embed_signup_scroll">
          <label for="mce-EMAIL"></label>
          <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your email address" required="">
          <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_b3b6b30bec87d2139f3fa279e_41885e5915" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
      </form>
    </div>
    <?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = __( 'Mailchimp Newsletter', 'infinum' );
		$link = ( !empty( $instance['link'] ) ) ? $instance['link']  : '';
		?>
    <h1><?php echo $title ?></h1>
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Mailchimp newsletter link:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? esc_html( $new_instance['link']) : '';

		return $instance;
	}


}
