<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nova
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/aqb6ipt.css">
	<script src="https://kit.fontawesome.com/050195a528.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nova' ); ?></a>
	<div class="menu-top">	
		<div class="col-full">
			<div class="box-info">

				<?php if(!empty(get_theme_mod( 'telephone' ))){?>
					<a href="tel:<?php echo get_theme_mod( 'telephone' )?>">
					<i class="fas fa-phone"></i>
					<span><?php echo get_theme_mod( 'telephone' )?></span>
					</a>
				<?php } ?>
				<?php if(!empty(get_theme_mod( 'mail' ))){?>
					<a href="mailto:<?php echo get_theme_mod( 'mail' )?>">
					<i class="far fa-envelope"></i>
					<span><?php echo get_theme_mod( 'mail' )?></span>
					
					</a>
				<?php } ?>
			</div>
			<div class="box-social">
				<p>Síguenos:</p>
				<?php echo do_shortcode('[cn-social-icon attr_id="menu-top"]') ?>
			</div>
		</div>
	</div>
	<header id="masthead" class="site-header">
		<div class="col-full">
			
			<div class="menu-branding">
				<div class="site-branding">
					<?php the_custom_logo();?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<?php echo do_shortcode('[rmp_menu id="132"]') ?>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
