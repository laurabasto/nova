<?php  
	add_shortcode( 'timeline', 'timeline_settings' );

	function timeline_settings( $atts) {
		$args = array(  
	        'post_type' => 'linea-del-tiempo',
	        'posts_per_page' => -1 
	    );

	    $loop = new WP_Query( $args ); 
?>
<div class="date-box">
<?php
	        
	    while ( $loop->have_posts() ) : $loop->the_post(); 
	    	$id_post = get_the_ID();
	?>
	<div class="item-date">
		<h2><?php the_title() ?></h2>

	</div>
	<?
	    endwhile;

	    wp_reset_postdata();
	?>
</div>
<div class="post-box">
<?php
	        
	    while ( $loop->have_posts() ) : $loop->the_post(); 
	    	$id_post = get_the_ID();
	    	$thumb = get_the_post_thumbnail_url($id_post, 'thumb-timeline') ;
	    	if(empty($thumb)){
	    	 	$thumb =  get_template_directory_uri().'/img/thumb-def-timeline.jpg';
	    	}
	?>
	<div class="item-post">
		<img src="<?php echo $thumb ?>" alt="">
		<?php the_content() ?>

	</div>
	<?
	    endwhile;

	    wp_reset_postdata();
	?>
</div>
<?php
	}

	add_action( 'vc_before_init', 'timeline_VC' );
	function timeline_VC() {
		vc_map( array(
			"name" => __( "timeline", "my-text-domain" ),
			"base" => "timeline",
			"class" => "container-timeline",
			"category" => __( "Nova", "nova"),
			"icon" => "container-timeline",
			"custom_markup" => "",
			'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/vc_css.css'),
			) 
		);
	}
?>