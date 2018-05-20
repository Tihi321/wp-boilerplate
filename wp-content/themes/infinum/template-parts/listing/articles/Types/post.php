<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles\Types
 */
use Infinum\Helpers as General_Helpers;
use Infinum\Theme\Utils as Utils;

$general_helper = new General_Helpers\General_Helper();
$images = new Utils\Images();
$image  = $images->get_post_image( 'grid' );
?>
  <a class="article-grid__image" href="<?php the_permalink(); ?>" style="background-image:url( <?php echo esc_url( $image['image'] ); ?> )">
  <?php $custom_text = get_post_meta( get_the_ID(),'_unicorn_custom_text_value_key',true); ?>
    <?php if($custom_text): ?>
    <h3 class="grid__custom_text_image">
      <?php echo $custom_text; ?>
    </h3>
    <?php endif ?>
  </a>