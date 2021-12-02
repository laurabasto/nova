<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nova
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="col-full">
			<div class="menu-aside">
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
			<div class="social-footer">
				<?php echo do_shortcode('[cn-social-icon attr_id="menu-footer"]') ?>
			</div>
			<div class="site-info">
				<p>Copyright © <?php echo do_shortcode('[year]') ?> . Diseñado por <a href="https://garcialara.com/">García Lara</a></p>
				<?php
						wp_nav_menu( array( 
						    'theme_location' => 'footer-menu') ); 
					?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

</body>
</html>
