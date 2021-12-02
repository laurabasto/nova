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
				'subtitle' => '',
				'icon' => ''
			), $atts 
		) 
	);
	
	$output = '<div class="skill">
		<i class="'. htmlspecialchars_decode($icon) .'"></i>
		<span class="number">'. htmlspecialchars_decode($title) .'</span>
		<span class="sub">'. htmlspecialchars_decode($subtitle) .'</span>
	</div>';
	
	return $output;
}
add_shortcode( 'machine_skills_content', 'ebor_skills_content_shortcode' );

// Parent Element
function ebor_skills_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'machine-vc-block',
		    'name'                    => __( 'Skills' , 'machine' ),
		    'base'                    => 'machine_skills',
		    'description'             => __( 'Adds an Image Slider', 'machine' ),
		    'as_parent'               => array('only' => 'machine_skills_content'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		    'content_element'         => true,
		    'show_settings_on_create' => false,
		    "js_view" => 'VcColumnView',
		    "category" => __('machine WP Theme', 'machine')
		) 
	);
}
add_action( 'vc_before_init', 'ebor_skills_shortcode_vc' );

// Nested Element
function ebor_skills_content_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'machine-vc-block',
		    'name'            => __('Skills Box', 'machine'),
		    'base'            => 'machine_skills_content',
		    'description'     => __( 'A slide for the image slider.', 'machine' ),
		    "category" => __('Machine WP Theme', 'machine'),
		    'content_element' => true,
		    'as_child'        => array('only' => 'machine_skills'), // Use only|except attributes to limit parent (separate multiple values with comma)
		    'params'          => array(
	            array(
	            	"type" => "textfield",
	            	"heading" => __("Title", 'uber'),
	            	"param_name" => "title",
	            	'holder' => 'div'
	            ),
	            array(
	            	"type" => "textfield",
	            	"heading" => __("Subtitle", 'machine'),
	            	"param_name" => "subtitle",
	            	'holder' => 'div'
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