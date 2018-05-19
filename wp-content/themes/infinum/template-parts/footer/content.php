<?php
/**
 * Display footer content
 *
 * @package Infinum\Template_Parts\Footer
 */

?>

<footer class="footer">
  <div class="footer__newsletter">
  <?php dynamic_sidebar( 'newsletter' ); ?>
  </div>
  <div class="footer__bottom">
    <div class="footer-logo>"
      <a class="footer__logo-link" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $blog_name ); ?>">
      <img class="footer__logo-img" src="<?php echo esc_url( INF_IMAGE_URL . 'logo.png' ); ?>" title="<?php echo esc_attr( $header_logo_info ); ?>" alt="<?php echo esc_attr( $header_logo_info ); ?>" />
    </a>
    <span>@ 2015 Uniduck. All right reserved.</span>
    </div>
    <ul class="footer-social">
      <li>Like <a href="#">Uniduck</a> on <span class="facebook-icon"></span></li>
      <li>Follow <a href="#">@uniduck</a> on <span class="twitter-icon"></span></li>
      <li>Follow <a href="#">@uniduck</a> on <span class="instagram-icon"></span></li>
    </ul>
  </div>

</footer>
