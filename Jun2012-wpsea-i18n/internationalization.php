<?php
/* 
Plugin Name: WPSea Internationalization
Plugin URI: 
Description: Demo plugin to go along with the June Seattle WordPress Developers Meetup
Version: 1.0
Author: Ben Lobaugh
Author URI: http://ben.lobaugh.net
License: GPLv2 only
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpsea-i18n
*/



/*
 * Load the translation domain for your plugin. This differentiates your plugin 
 * translations from other plugins and allows you to provide the correct translation
 * context you require.
 * 
 * load_plugin_text_domain( $domain, false, $rel_path_to_translation_files )
 * 
 * - $domain - Unique identifier for your plugin. Typically the same as your plugin folder
 * - Do not use the second parameter. It is deprecaited. Pass in false
 * - $rel_path_to_translation_files - Relative path to the translation files from WP_PLUGIN_DIR
 */
define( 'WPSEA_TEXT_DOMAIN', 'wpsea-i18n' ); // Used for convenience with other i18n functions
load_plugin_textdomain( WPSEA_TEXT_DOMAIN, false, 'wpsea-i18n/lang' );


/**
 * Shortcode to demonstrate a few of the i18n methods in WordPress
 * 
 * NOTE: None of the echo methods can be used in a shortcode, however they are 
 * available as an alternative for all translation methods
 * 
 * @return String 
 */
function wpsea_i18n_shortcode() {
    $s = '<ul>'; // String that will contain the i18n output
    
    // __( $string, $domain )
    // Returns the translated string
    $s .= "<li>\$text = __( 'Hello World', WPSEA_TEXT_DOMAIN ) <br/>" . __( 'Hello World', WPSEA_TEXT_DOMAIN );
    
    // _e( $string, $domain )
    // Echos the translated string
    //$s .= "<br/>_e( 'Hello World', WPSEA_TEXT_DOMAIN ) - "; _e( $text, WPSEA_TEXT_DOMAIN );
    
    // esc_attr__( $string, $domain )
    // escapes HTML attributes, I.E. in links
    $s .= "</li><li>\$link = &lt;a href='http://helloworld.com' title='esc_attr__( 'Hello World', WPSEA_TEXT_DOMAIN )'&gt;__( 'Hello World', WPSEA_TEXT_DOMAIN )</a> <br/> ";
    $s .= "<a href='http://helloworld.com' title='" . esc_attr__( 'Hello World', WPSEA_TEXT_DOMAIN ) . "'>" . __( 'Hello World', WPSEA_TEXT_DOMAIN ) . "</a>";
    
    // esc_html__( $string, $domain )
    // Safely removes HTML from a string when it should not be used
    $s .= "</li><li>\$text = esc_html__( '<Hello> World', WPSEA_TEXT_DOMAIN ) <br/> " . esc_html__( '<Hello> World', WPSEA_TEXT_DOMAIN );
    
    // __n( $singular_string, $plural_string, $count, $domain )
    // Differentiates between singular and plural forms of text based on $count
    $s .= "</li><li>\$text = _n( 'Hello World', 'Hello Galaxy', 1, WPSEA_TEXT_DOMAIN ) <br/> " . _n( 'Hello World', 'Hello Galaxy', 1, WPSEA_TEXT_DOMAIN );
    $s .= "</li><li>\$text = _n( 'Hello World', 'Hello Galaxy', 2, WPSEA_TEXT_DOMAIN ) <br/> " . _n( 'Hello World', 'Hello Galaxy', 2, WPSEA_TEXT_DOMAIN );
    
    return  $s;
}
add_shortcode( 'wpsea_i18n', 'wpsea_i18n_shortcode' );