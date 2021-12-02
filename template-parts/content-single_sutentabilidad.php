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
	
	
	<?php echo the_content() ?>
	

</article><!-- #post-<?php the_ID(); ?> -->
