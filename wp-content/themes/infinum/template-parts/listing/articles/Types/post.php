<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles\Types
 */
use Infinum\Helpers as General_Helpers;
$general_helper = new General_Helpers\General_Helper();
?>
  <a class="article-grid__image" href="<?php the_permalink(); ?>" style="background-image:url( <?php echo $general_helper->unicorn_get_attachment(); ?> )"></a>