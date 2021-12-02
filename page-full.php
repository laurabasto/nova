<?php

/* Template Name: Page Full */

get_header();
?>
<div id="container">
	<div class="col-full">
		<main id="primary" class="site-main">

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div>
</div>
<?php
get_footer();
