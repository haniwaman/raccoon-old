<?php
/**
 * My Customizer Sanitize
 *
 * @package WordPress
 */

require_once get_template_directory() . '/inc/customizer/color.php';
require_once get_template_directory() . '/inc/customizer/parts.php';
require_once get_template_directory() . '/inc/customizer/layout.php';
require_once get_template_directory() . '/inc/customizer/performance.php';

if ( ! function_exists( 'my_sanitize_checkbox' ) ) {
	/**
	 * Sanitize Checkbox
	 *
	 * @param [type] $checked Checkbox Value.
	 * @return boolean true or false.
	 */
	function my_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
}


if ( ! function_exists( 'my_sanitize_select' ) ) {
	/**
	 * Sanitize Radiobutton and Selectbox
	 *
	 * @param [type] $input .
	 * @param [type] $setting .
	 * @return [type] .
	 */
	function my_sanitize_select( $input, $setting ) {
		$input   = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}


if ( ! function_exists( 'my_sanitize_image' ) ) {
	/**
	 * Sanitize Image
	 *
	 * @param [type] $image .
	 * @param [type] $setting .
	 * @return [type] .
	 */
	function my_sanitize_image( $image, $setting ) {
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
		);
		$file  = wp_check_filetype( $image, $mimes );
		return ( $file['ext'] ? $image : $setting->default );
	}
}

if ( ! function_exists( 'my_sanitize_number_range' ) ) {

	/**
	 * Sanitize Number
	 *
	 * @param [type] $number .
	 * @param [type] $setting .
	 * @return [type] .
	 */
	function my_sanitize_number_range( $number, $setting ) {
		$number = absint( $number );
		$atts   = $setting->manager->get_control( $setting->id )->input_attrs;
		$min    = ( isset( $atts['min'] ) ? $atts['min'] : $number );
		$max    = ( isset( $atts['max'] ) ? $atts['max'] : $number );
		$step   = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}
}
