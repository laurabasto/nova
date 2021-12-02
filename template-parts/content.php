<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nova
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'full') ?>" alt="">

	

	<footer class="entry-footer">
		<?php nova_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
