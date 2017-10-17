<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php 
	$blog_name = get_bloginfo('name');
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'understrap' ); ?></a>

	<header id="masthead" class="site-header container" role="banner">
			<div class="site-branding row">
				<div class="col-md-5">

					<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					<?php else: // End header image check. ?>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/img/lanelogo.png" alt="<?php bloginfo('name'); ?>">
						<?php if(is_home() || is_front_page() ): echo '<h1 class="site-title">'. $blog_name .'</h1>'; endif; ?>
						<?php if(!is_home() && !is_front_page() ): echo '<span class="site-title">'. $blog_name .'</span>'; endif; ?></a>

					<?php endif;?>
				</div>
				<div class="col-md-5 col-md-offset-2 site-tagline">
					<?php bloginfo( 'description' ); ?>
				</div>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">MENU</span></button>
				<div class="col-md-11 col-md-offset-1">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
