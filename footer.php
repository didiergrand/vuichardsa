<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package J.Vuichard_SA
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-widgets-container">
			<div class="container">
				<div class="footer-widgets-row">
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<?php dynamic_sidebar( 'footer-1' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							<?php dynamic_sidebar( 'footer-2' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget-col">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							<?php dynamic_sidebar( 'footer-3' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="site-info">
		<div class="container">
		<div>Vuichard J. SA - Menuiserie Charpente Semsales | </div><div><img src="<?php echo get_template_directory_uri(); ?>/images/digitalgarage.svg" alt="Digitalgarage - Création web & stratégie digitale" width="16"> webdesign & code : Didier Grand - <a href="https://digitalgarage.ch?ref=vuichard-j-sa" target="_blank" title="Digitalgarage - Création web & stratégie digitale">digitalgarage.ch</a>
		</div></div>
		</div>
	</footer><!-- #colophon -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
