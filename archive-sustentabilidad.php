<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

get_header();
?>
<div class="banner-archive">
	<h2>cultura de sustentabilidad</h2>
</div>
<div id="container">
	<div class="col-full">

		<main  class="site-main archive-row">

			<?php if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'sustentabilidad' );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div>
</div>

<?php
get_footer();
