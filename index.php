<?php
/*
    Plugin Name: Google Adsense for Responsive Design - GARD
	Plugin URI: http://thedigitalhippies.com/gard
	Description: Allows you to use shortcode to display responsive adsense ads throughout your responsive theme.
	Version: 1.3
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
		    register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_UNINSTALL');
		    register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_HELP');
		    register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_ASYNC');
		    if(_procheck()) { include(dirname(dirname(__FILE__)).'/gard-pro/register.php'); }
		    global $adsizes;
			foreach($adsizes as $size => $key) {register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_'.$size);}
		}		
	}

	function gard_on_deactivate() {
		# source http://dannyvankooten.com/199/remove-your-wp-plugins-stored-data/
	    if ( 1 == get_option('GARD_UNINSTALL') ) {
			delete_option('myplugin_used_option');

			delete_option('GARD_ID');
			delete_option('GARD_UNINSTALL');
			delete_option('GARD_HELP');
		    if(_procheck()) { include(dirname(dirname(__FILE__)).'/gard-pro/unregister.php'); }
		    global $adsizes;
			foreach($adsizes as $size => $key) {
				delete_option('GARD_'.$size);}
	    }
	}
	register_deactivation_hook(__FILE__, 'gard_on_deactivate');

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
		$icon_url = plugin_dir_url( __FILE__ ).'icon.png';
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function , $icon_url ); 

    // HELP PAGE
		$parent_slug = 'GARD';
		$page_title = 'GARD Help';
		$menu_title = 'GARD Help';
		$capability = 'manage_options';
		$menu_slug = 'gard-help';
		$function  = 'gard_help' ;
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

    // PRO PAGE
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

	function gard_help()  { 
			if (!current_user_can('manage_options')) 
			{
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			$plugin_id = GARDPLUGINOPTIONS_ID;
			include(dirname(__FILE__) . '/help.php');
	}

	function gard_pro_settings() {
		if( _procheck() ) {
			gard_license_page();
		} else {
			echo "<br/><br/><b>Upgrade to <a href='#' target='_blank'>GARD Pro</a> today</b>:
			<ul style='list-style: disc;margin-left:50px;'>
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

	function _GARD( $atts = '' ) {
			
		extract( shortcode_atts( array(
			'align' => '',
			'async' => 'false'
		), $atts ) );


		if($align == 'center') {
			$align = 'margin-left: auto;margin-right: auto;display: block;text-align: center;';
		} elseif($align == 'left') {
			$align = 'margin: 0 10px 10px 0;float: left;display: block;';
		} elseif($align == 'right') {
			$align = 'margin: 0 0 10px 10px;float: right;display: block;';
		}

		$id = "ca-pub-".get_option("GARD_ID");
		$num = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
#####################################################################
		if(get_option("GARD_ASYNC") == 1 ) {

			# ASYNC CODE
			$adsense = '
			<div class="GARD" id="google-ads-'.$num.'" >
				<script data-cfasync="false" async="async" src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<div id="GARDasync_'.$num.'"></div>
				<script data-cfasync="false">
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>';

			# determine size and insert correct ad.
			$adsense .=	'		
				<script data-cfasync="false">
					adUnit = document.getElementById("google-ads-'.$num.'");
					adWidth = adUnit.offsetWidth;		
					if ( adWidth >= 999999 ) {
							/* GETTING THE FIRST IF OUT OF THE WAY */ 
						}';

					global $adsizes;
					foreach($adsizes as $size => $description) {
						$code = get_option("GARD_".$size);
						$size = explode('x', $size);
						$size1 = $size[0];
						$size2 = $size[1];

						if ( strlen($code) == '10' && is_numeric($code)) {			
							$adsense .= ' else if ( adWidth >= '.$size1.' ) {
								document.getElementById("GARDasync_'.$num.'").innerHTML = "<ins class=\"adsbygoogle\" style=\"'.$align.'width:'.$size1.'px;height:'.$size2.'px;display:block;\" data-ad-client=\"'.$id.'\" data-ad-slot=\"'.$code.'\"></ins>";
								}';
						}
					}
			$adsense .= '
			</script>';

#####################################################################
		} else {
			$adsense =	'		
				<div class="GARD" id="google-ads-'.$num.'">
				<div id="GARDinner" style="'.$align.'">
				<script data-cfasync="false">
				adUnit = document.getElementById("google-ads-'.$num.'");
				adWidth = adUnit.offsetWidth;		
				google_ad_client = "'.$id.'";			
				if ( adWidth >= 999999 ) {
						/* GETTING THE FIRST IF OUT OF THE WAY */ 
					}';

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
						}';
				}
			}

			$adsense .= ' else {
					google_ad_slot	 = "0";
					adUnit.style.display = "none";
				}</script>
				<script data-cfasync="false" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></div></div>';
		}

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