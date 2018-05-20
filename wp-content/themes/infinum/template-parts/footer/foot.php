<?php
/**
 * Footer
 *
 * @package Infinum\Template_Parts\Footer
 */

/**
 * Include cookies template
 */

 /*
<a href="#html, body" class="scroll-to-top js-scroll-to-top">
  <?php esc_html_e( 'To top', 'infinum' ); ?>
</a>
 */
require locate_template( 'template-parts/parts/cookies-notification.php' ); ?>
<?php wp_footer(); ?>
</body>
</html>