<?php

/**
 * The Shortcode
 */
function ebor_skills_shortcode( $atts, $content = null ) {
	$output = '<div class="skills-wrapper">'. do_shortcode($content) .'</div>';
	return $output;
}
add_shortcode( 'machine_skills', 'ebor_skills_shortcode' );

/**
 * The Shortcode
 */
function ebor_skills_content_shortcode( $atts, $content = null ) {

	extract( 
		shortcode_atts( 
			array(
				'title' => '',
				'label_button_vcextend_nova' => '',
				'url_button_vcextend_nova' => '',
				'image_carousel_vcextend_nova' => ''
			), $atts 
		) 
	);
	$url = vc_build_link(htmlspecialchars_decode($url_button_vcextend_nova));
	$id_img = htmlspecialchars_decode($image_carousel_vcextend_nova);
	$image = wp_get_attachment_image_url($id_img, 'full');

	$output = '<div class="skill" style="background-image:url('.$image .')">';
	$output .= '<div class=" col-full">';
	$output .='<h2>'. htmlspecialchars_decode($title) .'</h2>';
	if(!empty($url['url'])){
		$output .= '<a class="btn btn-primary" href="'.$url['url'].'">'.htmlspecialchars_decode($label_button_vcextend_nova).'</a>';
	}
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}
add_shortcode( 'machine_skills_content', 'ebor_skills_content_shortcode' );

// Parent Element
function ebor_skills_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'container-slider',
		    'name'                    => __( 'Slide Container' , 'nova' ),
		    'base'                    => 'machine_skills',
		    'description'             => __( 'Añade slides', 'nova' ),
		    'as_parent'               => array('only' => 'machine_skills_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		    'content_element'         => true,
		    'show_settings_on_create' => false,
		    "js_view" => 'VcColumnView',
		    "category" => __('Nova', 'nova'),
		    'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/vc_css.css'),
		) 
	);
}
add_action( 'vc_before_init', 'ebor_skills_shortcode_vc' );

// Nested Element
function ebor_skills_content_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'content-slider',
		    'name'            => __('Slider Content', 'nova'),
		    'base'            => 'machine_skills_content',
		    'description'     => __( 'contenido de slides.', 'nova' ),
		    "category" => __('Nova', 'nova'),
		    'content_element' => true,
		    'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/vc_css.css'),
		    'as_child'        => array('only' => 'machine_skills'), // Use only|except attributes to limit parent (separate multiple values with comma)
		    'params'          => array(
	            array(
	            	"type" => "textfield",
	            	"heading" => __("Titulo", 'nova'),
	            	"param_name" => "title",
	            	'holder' => 'div'
	            ),
	            array(
					'type' => 'attach_image',
					'heading' => __( 'Imagen de fondo', 'nova' ),
					'param_name' => 'image_carousel_vcextend_nova',
					'holder' => 'img',
					'description' => __( 'Imagen de fondo para el bloque', 'nova' ),
					//'admin_label' => false,
				),
				 array(
	            	"type" => "textfield",
	            	"heading" => __("Etiqueta boton", 'nova'),
	            	"param_name" => "label_button_vcextend_nova",
	            	'holder' => 'div'
	            ),
				array(
					'type' => 'vc_link',
					'holder' => 'div',
					'heading' => __( 'Url', 'Nova' ),
					'param_name' => 'url_button_vcextend_nova',
					'description' => __( 'Url del bloque', 'nova' ),
					'dependency'    => array(
								        'element'   => 'label_button_vcextend_nova',
								        'not_empty'     => true
								    )
					
				),
				
	            
		    ),
		) 
	);
}
add_action( 'vc_before_init', 'ebor_skills_content_shortcode_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_machine_skills extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_machine_skills_content extends WPBakeryShortCode {

    }
}