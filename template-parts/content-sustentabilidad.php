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
	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'thumb-sustentabilidad') ?>" alt="">
	<h2><?php the_title() ?> </h2>
	<?php echo get_excerpt( 200, get_the_ID() ) ?>
	<a href="<?php echo get_permalink(get_the_ID()) ?>" class="btn btn-primary">Conoce Más</a>
	

</article><!-- #post-<?php the_ID(); ?> -->
