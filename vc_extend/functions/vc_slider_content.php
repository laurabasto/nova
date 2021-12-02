<?php

/**
 * The Shortcode
 */
function ebor_slider_shortcode( $atts, $content = null ) {
	$output = '<div class="skills-content-wrapper">'. do_shortcode($content) .'</div>';
	return $output;
}
add_shortcode( 'slider_skills', 'ebor_slider_shortcode' );

/**
 * The Shortcode
 */
function ebor_slider_content_shortcode( $atts, $content = null ) {

	extract( 
		shortcode_atts( 
			array(
				'url_button_vcextend_nova' => '',
				'title' => '',
				'image_carousel_vcextend_nova' => '',
				'excerpt_button_vcextend_nova' => '',
			), $atts 
		) 
	);
	$url = vc_build_link(htmlspecialchars_decode($url_button_vcextend_nova));
	$id_img = htmlspecialchars_decode($image_carousel_vcextend_nova);
	$image = wp_get_attachment_image_url($id_img, 'vc_slider_content');

	$output = '<div class="skill-content"><div class="box-skill-content"><a href="'.$url['url'].'">';
	$output .= '<img src="'.$image .'" alt="">';
	$output .= '<h2>'.htmlspecialchars_decode($title).'</h2>';
	$output.= '<p>'.htmlspecialchars_decode($excerpt_button_vcextend_nova).'</p>';
	
	$output .= '</a></div></div>';
	
	return $output;
}
add_shortcode( 'slider_skills_content', 'ebor_slider_content_shortcode' );

// Parent Element
function ebor_slider_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'container-slider-link',
		    'name'                    => __( 'Slide Container con link' , 'nova' ),
		    'base'                    => 'slider_skills',
		    'description'             => __( 'Añade slides', 'nova' ),
		    'as_parent'               => array('only' => 'slider_skills_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		    'content_element'         => true,
		    'show_settings_on_create' => false,
		    "js_view" => 'VcColumnView',
		    "category" => __('Nova', 'nova'),
		    'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/vc_css.css'),
		) 
	);
}
add_action( 'vc_before_init', 'ebor_slider_shortcode_vc' );

// Nested Element
function ebor_slider_content_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'content-slider-link',
		    'name'            => __('Slider contenido con link', 'nova'),
		    'base'            => 'slider_skills_content',
		    'description'     => __( 'contenido de slides.', 'nova' ),
		    "category" => __('Nova', 'nova'),
		    'content_element' => true,
		    'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/vc_css.css'),
		    'as_child'        => array('only' => 'slider_skills'), // Use only|except attributes to limit parent (separate multiple values with comma)
		    'params'          => array(
		    	array(
					'type' => 'vc_link',
					'holder' => 'div',
					'heading' => __( 'Url', 'Nova' ),
					'param_name' => 'url_button_vcextend_nova',
					'description' => __( 'Url del bloque', 'y2buy' ),
					
				),

	            array(
	            	"type" => "textfield",
	            	"heading" => __("Title", 'nova'),
	            	"param_name" => "title",
	            	'holder' => 'div'
	            ),
	            array(
					'type' => 'attach_image',
					'heading' => __( 'Imagen de fondo', 'nova' ),
					'param_name' => 'image_carousel_vcextend_nova',
					'holder' => 'img',
					'description' => __( 'Imagen de fondo para el bloque', 'nova' ),
				),
				array(
					'type' => 'textarea',
					'holder' => 'div',
					'heading' => __( 'Descripcion', 'nova' ),
					'param_name' => 'excerpt_button_vcextend_nova',
					'description' => __( 'pequeña descripcion', 'nova' ),
					
				),
				
	            
		    ),
		) 
	);
}
add_action( 'vc_before_init', 'ebor_slider_content_shortcode_vc' );

// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer')){
    class WPBakeryShortCode_slider_skills extends WPBakeryShortCodesContainer {

    }
}

// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_slider_skills_content extends WPBakeryShortCode {

    }
}