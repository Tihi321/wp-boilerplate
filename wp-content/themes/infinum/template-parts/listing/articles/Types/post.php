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
  <div class="article-grid__image" >
    <a href="<?php the_permalink(); ?>">
    <img src="<?php echo esc_url( $image['image'] ); ?>" />
  </a>
    <?php $custom_text = $general_helper->unicorn_get_custom_text() ?>
    <?php if($custom_text): ?>
      <h3 class="grid__custom_text_image">
        <?php echo $custom_text; ?>
      </h3>
    <?php endif ?>
  </div>