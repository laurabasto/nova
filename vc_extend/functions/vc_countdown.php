<?php  
	add_shortcode( 'countdown', 'countdown_settings' );

	function countdown_settings( $atts) {
		$image = wp_get_attachment_image_url($atts['image_countdown'], 'full');
		//$atts['margin_bottom_aspect_ratio']
		
		$output = '<div class="container-countdown">';

		$output .= '<img src="'.$image.'">';
		$output .= '<div class="content-countdown">';
	 	$output .= '<span class="counter" style="color:'.$atts['color_titulo_countdown'].'">'.$atts['cantidad_countdown'].'</span>';
	 	$output .= '<p style="color:'.$atts['color_cantidad_countdown'].'">'.$atts['titulo_countdown'].'</p>';
	  	$output .= '</div>';
	  	$output .= '</div>';
	 	return $output;
	}

	add_action( 'vc_before_init', 'info_aspect_ratio_integrateWithVC' );
	function info_aspect_ratio_integrateWithVC() {
		vc_map( array(
			"name" => __( "Countdown", "my-text-domain" ),
			"base" => "countdown",
			"class" => "container-countdown",
			"category" => __( "Nova", "nova"),
			"icon" => "container-countdown",
			"custom_markup" => "",
			'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/vc_css.css'),
			"params" => array(
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Titulo", "nova" ),
					"param_name" => "titulo_countdown",
					"description" => __( "Titulo para el bloque", "nova" ),
					"admin_label" => false,
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Color de fondo del Titulo", "y2buy" ),
					"param_name" => "color_titulo_countdown",
					"description" => __( "Color para el titulo", "y2buy" ),
					"admin_label" => false,
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Cantidad", "nova" ),
					"param_name" => "cantidad_countdown",
					"admin_label" => false,
				),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Color de la cantidad", "nova" ),
					"param_name" => "color_cantidad_countdown",
					"description" => __( "Color de cantidad", "nova" ),
					"admin_label" => false,
				),
				array(
					"type" => "attach_image",
					"holder" => "img",
					"class" => "",
					"heading" => __( "Imagen de fondo", "nova" ),
					"param_name" => "image_countdown",
					"description" => __( "Imagen de fondo para el bloque", "nova" ),
					"admin_label" => false,
				),

			)) 
		);
	}
?>