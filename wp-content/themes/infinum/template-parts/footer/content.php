<?php
/**
 * Display footer content
 *
 * @package Infinum\Template_Parts\Footer
 */

?>
<footer class="footer">
  <div class="footer__newsletter">
  <h2 class="footer__newsletter-title">Subscribe to duck news</h2>
  <?php dynamic_sidebar( 'newsletter' ); ?>
  </div>
  <div class="footer__bottom">
    <div class="footer__bottom-container">
      <div class="footer-logo">
        <a class="footer__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
        <img class="footer__logo-img" src="<?php echo esc_url( INF_IMAGE_URL . 'logo.png' ); ?>" title="<?php echo esc_attr( $header_logo_info ); ?>" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
      </a>
      <span>@ 2015 Uniduck. All right reserved.</span>
      </div>
      <ul class="footer-social">
        <li>Like <a href="#">Uniduck</a> on <i class="icon-ic-facebook"></i></li>
        <li>Follow <a href="#">@uniduck</a> on <i class="icon-ic-twitter"></i></li>
        <li>Follow <a href="#">@uniduck</a> on <i class="icon-ic-instagram"></i></li>
      </ul>
    </div>
  </div>
</footer>