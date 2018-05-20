<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles\Types
 */
use Infinum\Helpers as General_Helpers;
$general_helper = new General_Helpers\General_Helper();
?>
  <a class="article-grid__image" href="<?php the_permalink(); ?>" style="background-image:url( <?php echo $general_helper->unicorn_get_attachment(); ?> )">
  <?php $custom_text = get_post_meta( get_the_ID(),'_unicorn_custom_text_value_key',true); ?>
    <?php if($custom_text): ?>
    <h3 class="grid__custom_text_image">
      <?php echo $custom_text; ?>
    </h3>
    <?php endif ?>
  </a>