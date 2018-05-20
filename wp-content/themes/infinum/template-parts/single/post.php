<?php
/**
 * Single Post
 *
 * @package Infinum\Template_Parts\Single
 */

use Infinum\Theme\Utils as Utils;

$images = new Utils\Images();
$image  = $images->get_post_image( 'full_width' );
?>

<!-- Single Content Section -->
<section class="single" id="<?php echo esc_attr( $post->ID ); ?>">
  <header>
  <div class="single__image" data-normal="<?php echo esc_url( $image['image'] ); ?>">
    <h1 class="single__title">
      <?php the_title(); ?>
    </h1>
    <?php $custom_text = get_post_meta( get_the_ID(),'_unicorn_custom_text_value_key',true); ?>
    <?php if($custom_text): ?>
    <h3 class="single__custom_text">
      <?php echo $custom_text; ?>
    </h3>
    <?php endif ?>
    <div class="single__author"><i class="icon-ic-writer"></i>
      <a class="single__author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
      <a class="back__blog" href="<?php echo get_post_type_archive_link( 'post' ); ?>">Back to Blog</a>
    </div>
  </div>
  </header>
  <div class="single__content content-style content-media-style">
    <?php the_content(); ?>
  </div>
  <?php require locate_template( 'template-parts/parts/google-rich-snippets.php' ); ?>
  <div class="header-tags-container"><?php echo (has_tag()) ? get_the_tag_list('<div class="tags-list">', ' ', '</div>') : '<div class="tags-list"><span>0 tags<span></div>'?></div>
  <?php $next_post = get_next_post(); ?>
  <?php if (!empty( $next_post )): ?>
    <div class="next-post">
    <h1 class="next-post__title">More magic</h1>

    <div class="next-post__listing">
    <?php $post_thumbnail = get_the_post_thumbnail( $next_post->ID, 'next-post'); ?>
    <a href="<?php the_permalink( $next_post->ID ); ?>"><?php echo $post_thumbnail; ?></a>
    <div class="nex-post__content">
      <h2 class="next-post__content-title"><?php echo get_the_title($next_post->ID); ?></h2>
      <p class="next-post__content-excerp"><?php echo get_the_excerpt($next_post->ID) ?></p>
      <div class="read-more-container">
        <a href="<?php the_permalink( $next_post->ID ); ?>" class="read-more"><?php _e( 'Read More' ); ?></a>
      </div>
    </div>
    </div>
  <?php endif; ?>
  </div>
</section>
