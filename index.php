<?php
/*
    Plugin Name: Google Adsense for Responsive Design - GARD
	Plugin URI: http://thedigitalhippies.com/gard
	Description: Allows you to use shortcode to display responsive adsense ads throughout your responsive theme.
	Version: 1.1
	Author: The Digital Hippies
	Author URI: http://thedigitalhippies.com
*/

include('adsizes.php');

if(!class_exists('GARDPluginOptions')) {
	define('GARDPLUGINOPTIONS_ID', 'GARD-plugin-options');
	define('GARDPLUGINOPTIONS_NICK', 'Google Adsense for Responsive Design');

	class GARDPluginOptions {
		public static function file_path($file) {
			return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
		}
		public static function register() {
		    register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_ID');
		    register_setting(GARDPLUGINOPTIONS_ID.'_hash', 'GARD_HASH');
		    if(_procheck() == "licensed") { include(dirname(dirname(__FILE__)).'/gard-pro/register.php'); }
		    global $adsizes;
			foreach($adsizes as $size => $key) {register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_'.$size);}
		}		
	}

	function gard_options_page() { 
			if (!current_user_can('manage_options')) 
			{
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			$plugin_id = GARDPLUGINOPTIONS_ID;
			include(dirname(__FILE__) . '/options.php');
	}
	add_action( 'admin_menu', 'gard_menu' );

	function gard_menu() {
		$page_title = 'GARD - Google AdSense for Responsive Design';
		$menu_title = 'GARD';
		$capability = 'manage_options';
		$menu_slug = 'GARD';
		$function = 'gard_options_page' ;
		$icon_url = plugins_url().'/google-adsense-for-responsive-design-gard/icon.png';
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function , $icon_url ); 
    
		$parent_slug = 'GARD';
		$page_title = 'GARD Pro';
		$menu_title = 'GARD Pro';
		$capability = 'manage_options';
		$menu_slug = 'gard-pro';
		$function  = 'gard_pro_settings' ;
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
	}

	function gard_main() {
		if (!current_user_can('manage_options')) {
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			include(dirname(__FILE__) . '/options.php');
	}

	function gard_pro_settings() {
		if (_procheck() ==  "unactivated") {
			echo "<br/><h2>You must activate the GARD Pro plugin before you can register it.</h2>";	
		} elseif (_procheck() ==  "active" OR _procheck() == "licensed" OR _procheck() == "unlicensed") {
			gard_license_page();
		} else {
			echo "<br/><br/><b>Upgrade to <a href='#' target='_blank'>GARD Pro</a> today</b>:
			<ul style='list-style: disc;margin-left:50px;'>
				<li>Remove all admin control panel ads.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Custom Shortcode</b></a> - You can pick any shortcode you'd like to display your ads.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Auto Insert GARD</b></a> - Automatically insert ads in ALL old posts after X number of paragraphs.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>GARD Widget</b></a> - Use responsive ads where ever you can use a widget! Also show to guests only, or everyone!</li>
			</ul><br/>
			<div><h2>SAMPLE</h2>
			<a href='#' target='_blank'>
				<img style='padding: 20px;background: #FFFFB0;border: 1px solid #C2C200;opacity: .5;' src='".plugin_dir_url(__FILE__)."screenshot_pro.png' />
			</a>
			</div><br/>";
		}
	}

	function gard_settings() {
		if (!current_user_can('manage_options')) {
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}			
			$plugin_id = CCPLUGINOPTIONS_ID;
			include(file_path('options.php'));
	}

	function _GARD( ) {
		$id = "ca-pub-".get_option("GARD_ID");
		$num = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
		$adsense =	'		
			<div class="GARD" id="google-ads-'.$num.'">
			<script data-cfasync="false">
			adUnit = document.getElementById("google-ads-'.$num.'");
			adWidth = adUnit.offsetWidth;		
			google_ad_client = "'.$id.'";			
			if ( adWidth >= 999999 ) {
					/* GETTING THE FIRST IF OUT OF THE WAY */ 
				} ';

		global $adsizes;
		foreach($adsizes as $size => $description) {
			$code = get_option("GARD_".$size);
			$size = explode('x', $size);
			$size1 = $size[0];
			$size2 = $size[1];

			if ( strlen($code) == '10' && is_numeric($code)) {			
				$adsense .= ' else if ( adWidth >= '.$size1.' ) {
						google_ad_slot = "'.$code.'";
						google_ad_width = '.$size1.';
						google_ad_height = '.$size2.';
					} ';
			}
		}

		$adsense .= ' else {
				google_ad_slot	 = "0";
				adUnit.style.display = "none";
			}</script>
			<script data-cfasync="false" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></div>';
		return $adsense;
	}

	if(_procheck(TRUE)) {
		include(dirname(dirname(__FILE__)).'/gard-pro/insert.php');
	} else {
		add_shortcode( 'GARD', '_GARD' );
		add_shortcode( 'gard', '_GARD' );
	}

	if ( is_admin() ){
		add_action('admin_init', array('GARDPluginOptions', 'register'));
	}
}