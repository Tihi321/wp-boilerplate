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
$image  = $images->get_post_image( 'full_width' );
?>
<article class="article-grid">
  <div class="article-grid__container">
  <?php get_template_part( 'template-parts/listing/articles/Types/post', get_post_format() ); ?>
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
        <?php the_excerpt(); ?>
      </div>
      <div class="read-more-container">
        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'Read More' ); ?></a>
      </div>
      <footer class="entry-footer">
        <?php echo $general_helper->unicorn_posted_footer(); ?>
      </footer>
    </div>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
</article>
