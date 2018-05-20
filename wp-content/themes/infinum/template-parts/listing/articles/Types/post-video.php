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

    <?php if( $general_helper->unicorn_get_embedded_media( array('video','iframe')) ): ?>
    <div class="embed-responsive embed-responsive-16by9">
			<?php echo $general_helper->unicorn_get_embedded_media( array('video','iframe') ); ?>
		</div>
    <?php else: ?>
      <a class="article-grid__image" href="<?php the_permalink(); ?>" style="background-image:url( <?php echo esc_url( $image['image'] ); ?> )"></a>
		<?php endif; ?>