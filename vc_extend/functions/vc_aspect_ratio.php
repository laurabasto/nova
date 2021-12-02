<?php

/**
 * The Shortcode
 */
function container_aspect_ratio_shortcode( $atts, $content = null ) {
	$output = '<div class="gallery-aspect-ratio">'. do_shortcode($content) .'</div>';
	return $output;
}
add_shortcode( 'aspect_ratio', 'container_aspect_ratio_shortcode' );

/**
 * The Shortcode
 */
function content_aspect_ratio_shortcode( $atts, $content = null ) {

	extract( 
		shortcode_atts( 
			array(
				'dropdown_aspect_ratio' => '',
				'image_aspect_ratio' => '',
			), $atts 
		) 
	);
	$image = wp_get_attachment_image_url(htmlspecialchars_decode($image_aspect_ratio), 'full');
	$dropdown_aspect_ratio =htmlspecialchars_decode($dropdown_aspect_ratio);

	$var_aspect='';
	if($dropdown_aspect_ratio == '16:3'){
		$var_aspect='16-3';
	}
	if($dropdown_aspect_ratio == '8:5'){
		$var_aspect='8-5';
	}
	if($dropdown_aspect_ratio == '3:2'){
		$var_aspect='3-2';
	}
	if($dropdown_aspect_ratio == '1:1'){
		$var_aspect='1-1';
	}

	$output = '<a data-fancybox="demo" class="col-aspect-ratio " data-src="'.$image.'"><div class="aspect-ratio-'.$var_aspect.'" >';

	$output .= '<img src="'.$image.'">';
	$output .= '</div></a>';
	return $output;
}
add_shortcode( 'aspect_ratio_content', 'content_aspect_ratio_shortcode' );

function text_aspect_ratio_content_shortcode( $atts, $content = null ) {
	extract( 
		shortcode_atts( 
			array(
				'titulo_text_aspect_ratio' => '',
				'texto_text_aspect_ratio' => '',
				'label_button_text_aspect_ratio' => '',
				'url_button_text_aspect_ratio' => '',
				'dropdown_text_aspect_ratio' => '',
			), $atts 
		) 
	);
	$dropdown_aspect_ratio =htmlspecialchars_decode($dropdown_text_aspect_ratio);
	$link = vc_build_link(htmlspecialchars_decode($url_button_text_aspect_ratio));

	$var_aspect='';
	if($dropdown_aspect_ratio == '16:3'){
		$var_aspect='16-3';
	}
	if($dropdown_aspect_ratio == '8:5'){
		$var_aspect='8-5';
	}
	if($dropdown_aspect_ratio == '3:2'){
		$var_aspect='3-2';
	}
	if($dropdown_aspect_ratio == '1:1'){
		$var_aspect='1-1';
	}

	$output = '<div class="col-aspect-ratio  aspect-ratio-'.$var_aspect.'" ><div class="inner-aspect-ratio">';

	$output .= '<h2>'.htmlspecialchars_decode($titulo_text_aspect_ratio).'</h2>';
	$output .= '<p>'.htmlspecialchars_decode($texto_text_aspect_ratio).'</p>';
	$output .= '<a href="'.$link['url'].'" class="btn btn-primary">'.htmlspecialchars_decode($label_button_text_aspect_ratio).'</a>';
	$output .= '</div></div>';
	return $output;
}
add_shortcode( 'text_aspect_ratio_content', 'text_aspect_ratio_content_shortcode' );

// Parent Element
function container_aspect_ratio_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'aspect-ratio-vc-block',
		    'name'                    => __( 'Gallery' , 'nova' ),
		    'base'                    => 'aspect_ratio',
		    'description'             => __( 'Adds an Image Slider', 'nova' ),
		    'as_parent'               => array('only' => 'aspect_ratio_content,text_aspect_ratio_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		    'content_element'         => true,
		    'show_settings_on_create' => false,
		    "js_view" => 'VcColumnView',
		    "category" => __('Nova', 'nova')
		) 
	);
}
add_action( 'vc_before_init', 'container_aspect_ratio_shortcode_vc' );

// Nested Element
function content_aspect_ratio_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'aspect-ratio-content-vc-block',
		    'name'            => __('Imagen Aspect Ratio', 'nova'),
		    'base'            => 'aspect_ratio_content',
		    'description'     => __( 'A slide for the image slider.', 'nova' ),
		    "category" => __('Nova', 'nova'),
		    'content_element' => true,
		    'as_child'        => array('only' => 'aspect_ratio'), // Use only|except attributes to limit parent (separate multiple values with comma)
		    "params" => array(
		    	array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Aspcet Ratio", "nova" ),
					"param_name" => "dropdown_aspect_ratio",
					"value" => array('Seleccione una opcion', '16:3','8:5', '3:2', '1:1'),
					"description" => __( "Altura en Aspect Ratio", "nova" ),
					"admin_label" => false,
				),
				array(
					"type" => "attach_image",
					"holder" => "img",
					"class" => "",
					"heading" => __( "Imagen de fondo", "nova" ),
					"param_name" => "image_aspect_ratio",
					"description" => __( "Imagen de fondo para el bloque", "nova" ),
					"admin_label" => false,
				),
				
			),
		) 
	);
}
add_action( 'vc_before_init', 'content_aspect_ratio_shortcode_vc' );

function text_content_aspect_ratio_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'text-aspect-ratio-content-vc-block',
		    'name'            => __('Text Aspect Ratio', 'nova'),
		    'base'            => 'text_aspect_ratio_content',
		    'description'     => __( 'A slide for the image slider.', 'nova' ),
		    "category" => __('Nova', 'nova'),
		    'content_element' => true,
		    'as_child'        => array('only' => 'aspect_ratio'), // Use only|except attributes to limit parent (separate multiple values with comma)
		    "params" => array(

		    	array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Aspcet Ratio", "nova" ),
					"param_name" => "dropdown_text_aspect_ratio",
					"value" => array('Seleccione una opcion', '16:3','8:5', '3:2', '1:1'),
					"description" => __( "Altura en Aspect Ratio", "nova" ),
					"admin_label" => false,
				),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Titulo", "nova" ),
					"param_name" => "titulo_text_aspect_ratio",
					"description" => __( "Titulo para el bloque", "nova" ),
					"admin_label" => false,
				),
				array(
					"type" => "textarea",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Texto", "nova" ),
					"param_name" => "texto_text_aspect_ratio",
					"description" => __( "Texto del bloque", "nova" ),
					"admin_label" => false,
				),

				array(
					'type' => 'textfield',
					'holder' => 'div',
					'heading' => __( 'Etiqueta de Boton', 'nova' ),
					'param_name' => 'label_button_text_aspect_ratio',
					'description' => __( 'Etiqueta para el Boton', 'nova' ),
					//'admin_label' => false,
					'value' => '',
				),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'heading' => __( 'Url', 'Nova' ),
					'param_name' => 'url_button_text_aspect_ratio',
					'description' => __( 'Url del bloque', 'nova' ),
					//'admin_label' => false,
					'dependency' => array(
		                'element' => 'label_button_text_aspect_ratio',
		                'not_empty' => true,
		            ),
				),
			),
		) 
	);
}
add_action( 'vc_before_init', 'text_content_aspect_ratio_shortcode_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_aspect_ratio extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_aspect_ratio_content extends WPBakeryShortCode {

    }
    class WPBakeryShortCode_text_aspect_ratio_content extends WPBakeryShortCode {

    }
}
