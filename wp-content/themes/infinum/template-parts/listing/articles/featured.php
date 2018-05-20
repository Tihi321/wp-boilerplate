<?php
/**
 * Grid Article
 *
 * @package Infinum\Template_Parts\Listing\Articles
 */

use Infinum\Theme\Utils as Utils;
use Infinum\Helpers as General_Helpers;
$general_helper = new General_Helpers\General_Helper();
$images = new Utils\Images();
$image  = $images->get_post_image( 'featured-image' );
?>
<article class="article-grid">
  <div class="article-grid__container">
      <a class="article-grid__image" href="<?php the_permalink(); ?>">
    <img src="<?php echo esc_url( $image['image'] ); ?>" />
    <?php $custom_text = get_post_meta( get_the_ID(),'_unicorn_custom_text_value_key',true); ?>
      <?php if($custom_text): ?>
      <h3 class="grid__custom_text_image">
        <?php echo $custom_text; ?>
      </h3>
      <?php endif ?>
    </a>
    <div class="article-grid__content">
      <header>
        <div class="entry-meta">
          <?php echo $general_helper->unicorn_posted_meta(); ?>
        </div>
        <h2 class="article-grid__heading">
          <a class="article-grid__heading-link" href="<?php the_permalink(); ?>">
            <?php esc_html( the_title() ); ?>
          </a>
        </h2>
        <div class="header-tags-container"><?php echo (has_tag()) ? get_the_tag_list('<div class="tags-list">', ' ', '</div>') : '<div class="tags-list"><span>0 tags<span></div>'?></div>
      </header>
      <div class="article-grid__excerpt">
        <?php $excerp = $general_helper->limit_excerp(get_the_excerpt(), 300); ?>
        <?php echo $excerp ?>
        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'Read More' ); ?></a>
      </div>
      <footer class="entry-footer">
        <?php echo $general_helper->unicorn_posted_footer(); ?>
      </footer>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
