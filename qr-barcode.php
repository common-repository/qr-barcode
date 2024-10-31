<?php
	/*
	Plugin Name: QR Barcode
	Plugin URI: http://gfxcomplex.com/qr-barcode
	Description: An easy way to create a QR bar code in wordpress. example of use [qrcode pix=200]http://somelink[/qrocode] pix is size of image - default pix is 120
	Author: Joshua Randall Chernoff | GFX Complex
	Version: 1.0
	Author URI: http://gfxcomplex.com
	*/

add_shortcode('qrcode', 'writeQRbarcode');  
add_action('init', 'add_button');  

function writeQRbarcode($atts, $content) {  
    extract(shortcode_atts(array(  
        "pix" => '120'  
    ), $atts));  
	return '<img src="http://chart.apis.google.com/chart?cht=qr&amp;chs=' . $pix . 'x'. $pix .'&chl='. $content .'&chld=L|1$choe=UTF-8">';
}


function add_button() {
 
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
 
   if ( get_user_option('rich_editing') == 'true' ) {
		add_filter('mce_external_plugins', 'add_plugin');  
    	add_filter('mce_buttons', 'register_button');  
   }
 
}

function add_plugin($plugin_array) {
   $plugin_array['qrcode'] = get_bloginfo('wpurl').'/wp-content/plugins/'.basename(dirname(__FILE__)).'/js/customcodes.js';
   return $plugin_array;
}
function register_button($buttons) {
   array_push($buttons, "|",  "qrcode");
   return $buttons;
}
?>