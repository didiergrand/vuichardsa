<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package J.Vuichard_SA
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e( 'Skip to content', 'menuiserie-charpente-semsales' ); ?></a>
		<header id="masthead" class="site-header">
				<div class="site-header-container">
					<div class="site-branding">
						<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
											rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
							else :
								?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
											rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
							endif;
							$menuiserie_charpente_semsales_description = get_bloginfo( 'description', 'display' );
							if ( $menuiserie_charpente_semsales_description || is_customize_preview() ) :
								?>
						<p class="site-description">
							<?php echo $menuiserie_charpente_semsales_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</p>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<button class="menu-toggle hamburger-lines" aria-controls="primary-menu" aria-expanded="false">
						<span class="line line1"></span>
						<span class="line line2"></span>
						<span class="line line3"></span>
					</button>

				</div>
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
				</nav><!-- #site-navigation -->
		</header><!-- #masthead -->