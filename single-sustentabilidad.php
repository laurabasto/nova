<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nova
 */

get_header();
?>
<div class="banner-single" style="background-image:url('<?php echo get_the_post_thumbnail_url( get_the_ID(),'full') ?>')">
	<div class="col-full"><h2><?php the_title() ?> </h2></div>
</div>
<div class="col-full">
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single_sutentabilidad' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior', 'nova' ) . '</span> <span class="nav-title"></span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Siguiente', 'nova' ) . '</span> <span class="nav-title"></span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div>
<?php
get_footer();
