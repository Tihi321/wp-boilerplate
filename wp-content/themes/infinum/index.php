<?php
/**
 * Display regular index/home page
 *
 * @package Infinum
 */

get_header();

  $args = array(
 'post_type' => 'post',
 'posts_per_page' => '1',
 'category__in' => array( 217 )
);
// the query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) { ?>

 <section class="last-featured-post">

 <?php while ( $query->have_posts() ) : $query->the_post() ; ?>
 
  <?php get_template_part( 'template-parts/listing/articles/featured' ); ?>
 

 <?php endwhile; ?>
 
 </section>
 
<?php }
/* Restore original Post Data */
wp_reset_postdata();
?>
<div class="posts-list">
<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();
    get_template_part( 'template-parts/listing/articles/grid' );
  }

    the_posts_pagination(
    array(
        'screen_reader_text' => ' ',
    )
  );

} else {

  get_template_part( 'template-parts/listing/articles/empty' );

};

?>
</div>
<?php

get_footer();
