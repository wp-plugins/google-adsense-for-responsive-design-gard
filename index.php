<?php
/*
    Plugin Name: Google Adsense for Responsive Design - GARD
	Plugin URI: http://thedigitalhippies.com/gard
	Description: Allows you to use shortcode to display responsive adsense ads throughout your responsive theme.
	Version: 2.22
	Author: The Plugin Factory,The Digital Hippies
	Author URI: http://thedigitalhippies.com
*/



if( is_admin() ) {

	function start_gard_now() {

		include('adsizes.php');

		define('GARDPLUGINOPTIONS_VER', '2.22');
		define('GARDPLUGINOPTIONS_ID', 'GARD-plugin-options');
		define('GARDPLUGINOPTIONS_NICK', 'Google Adsense for Responsive Design');
		define('GARD_FOLDER', dirname(__FILE__) );
		define('GARD_PRO_LINK', 'http://thepluginfactory.co/warehouse/gard-pro/');
		define('GARD_PLUGIN_SUPPORT_URL', 'http://thepluginfactory.co/community/forum/plugin-specific/gard-google-adsense-for-responsive-design/');
		define('GARD_PLUGIN_SUPPORT_LINK', '<a href="http://thepluginfactory.co/community/forum/plugin-specific/gard-google-adsense-for-responsive-design/" title="GARD Support Forum" target="_blank">GARD Support Forum</a>');


		function gard_register() {
			include(dirname(__FILE__) . '/register.php');
		}	

		function gard_options_page() { 
			include(dirname(__FILE__) . '/options.php');
		}

		function gard_menu() {
			include(dirname(__FILE__) . '/menu.php');
		}

		function gard_help()  { 
			include(dirname(__FILE__) . '/help.php');
		}

		function gard_pro_settings() {
			include(dirname(__FILE__) . '/pro.php');
		}

		function GARD_ENQUEUE() {
			wp_register_script( 'spectrum_js', plugins_url( '/js/spectrum/spectrum.js', __FILE__ ) );
			wp_enqueue_script(  'spectrum_js' );

			wp_register_style( 'spectrum_css', plugins_url( '/js/spectrum/spectrum.css', __FILE__ ) );
			wp_enqueue_style(  'spectrum_css' );

			wp_enqueue_script(  'jquery' );
		}

		function GARD_PRO_plugin_links($links, $file) {
			if ($file == 'google-adsense-for-responsive-design-gard/index.php' ){
				$links[] = '<a target="_blank" style="color: #cc0000; font-weight: bold;" href="http://thepluginfactory.co/warehouse/gard-pro/?so=gard_manage_plugins">Upgrade to GARD Pro</a>';
			}
			return $links;
		}

		add_action( 'admin_init','gard_register' );
		add_action( 'admin_menu', 'gard_menu' );
		add_action( 'admin_init', 'GARD_ENQUEUE' );
		add_filter( 'plugin_row_meta', 'GARD_PRO_plugin_links', 10, 2 );
	}
	

	function gard_restrict_admin() {

		if ( ! current_user_can( 'manage_options' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
			return;
		} 

	}
	add_action( 'admin_init', 'gard_restrict_admin', 1 );
	start_gard_now();

} else {

	include('adsizes.php');
	function gard_ismobile() {
		# Source http://detectmobilebrowsers.com/
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function _GARD( $atts = '' ) {
		extract( shortcode_atts( array(
			'align' => '',
			'async' => 'false'
		), $atts ) );


		if($align == 'center') {
			$align = 'margin: 0 auto;float: none;display: block;text-align:center;';
			$float = 'none';
			$margin = '0 auto';
			$display = 'block';
			$text = 'center';
		} elseif($align == 'left') {
			$align = 'margin: 0 10px 10px 0;float: left;display: block;';
			$float = 'left';
			$margin = '0 10px 10px 0';
			$text = 'initial';
			$display = 'block';
		} elseif($align == 'right') {
			$align = 'margin: 0 0 10px 10px;float: right;display: block;';
			$float = 'right';
			$margin = '0 0 10px 10px';
			$text = 'initial';
			$display = 'block';
		} elseif ($align == '') {
			$float = '';
			$margin = '';
			$display = '';
			$text = '';			
		}

		$id = "ca-pub-".get_option("GARD_ID");
		$num = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);

		$mode = get_option('GARD_ADVANCED_MODE', '1') ;

		$async_mode = get_option("GARD_ASYNC");

		if( $mode == 1 && $async_mode !== '1' ) {

		# ADVANCED MODE

				$link_units = array(
					'728x15' => '728x15',
					'468x15' => '468x15',
					'200x90' => '200x90',
					'180x90' => '180x90',
					'160x90' => '160x90',
					'120x90' => '120x90',
					);


				$adsense =	'		
					<div class="GARD gard_advanced_mode" id="google-ads-'.$num.'"><script>
					adUnit = document.getElementById("google-ads-'.$num.'");
					google_ad_client = "'.$id.'";
					adUnit = document.getElementById("google-ads-'.$num.'");
					adWidth = adUnit.offsetWidth;	
					if ( adWidth >= 999999 ) {
							/* GETTING THE FIRST IF OUT OF THE WAY */ 
					}';

					global $adsizes;

					$link_units = array(
						'728x15' => '728x15',
						'468x15' => '468x15',
						'200x90' => '200x90',
						'180x90' => '180x90',
						'160x90' => '160x90',
						'120x90' => '120x90',
						);

					foreach($adsizes as $size => $description) {
						$type = 'ad_unit';
						if ( in_array($size, $link_units) ) {
							$type = 'link_unit';
						} elseif ($size == '300x600') {
							$type = 'large_skyscraper';
						}

							$tag = $type."_".$size;
						$code = get_option("GARD_".$size);
						$original_size = $size;
						$size = explode('x', $size);
						$size1 = $size[0];
						$size2 = $size[1];

						$mobile = get_option('GARD_MOBILE_ADVANCED_'.$original_size);

						if( $mobile == 1 && gard_ismobile() === FALSE ) {
							// If ad is set to show to mobile only, and this is not a mobile device, skip the output of this ad
							continue;
						} elseif( $mobile == 2 && gard_ismobile() === TRUE ) {
							// If ad is set to show to non-mobile only, and this is a mobile device, skip the output of this ad
							continue;
						}

						if ( strlen($code) == '10' && is_numeric($code)) {			
							$adsense .= ' else if ( adWidth >= '.$size1.' ) {
						if (document.querySelectorAll(".'.$type.'").length > 3 ) {									
							google_ad_slot	 = "0";
							adUnit.style.display = "none";
						} else {
							google_ad_slot = "'.$code.'";
							google_ad_width = '.$size1.';
							google_ad_height = '.$size2.';
							adUnit.style.cssFloat  = "'.$float.'";
							adUnit.style.styleFloat  = "'.$float.'";
							adUnit.style.margin = "'.$margin.'";
							adUnit.style.textAlign = "'.$text.'";
							adcount = document.querySelectorAll(".'.$type.'").length;
							tag = "'.$tag.'_"+adcount;
							adUnit.className = adUnit.className + " '.$type.' " + tag;
						}
					}';
						}
					}

				$adsense .= ' else {
						google_ad_slot	 = "0";
						adUnit.style.display = "none";
					}</script>
					<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></div>';

			} else if (  $mode == 1 && $async_mode == 1  ) {

		# ASYNC MODE

				$adsense = '<div class="GARD gard_async_mode" id="google-ads-'.$num.'" ><script async="async" src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><div id="GARDasync_'.$num.'"></div><script >(adsbygoogle = window.adsbygoogle || []).push({});</script></div>';

				# determine size and insert correct ad.
				$adsense .=	'<script>
						adUnit = document.getElementById("google-ads-'.$num.'");
						adWidth = adUnit.offsetWidth;		
						if ( adWidth >= 999999 ) {
								/* GETTING THE FIRST IF OUT OF THE WAY */ 
							}';

						global $adsizes;
						foreach($adsizes as $size => $description) {
							$code = get_option("GARD_".$size);
							$original_size = $size;
							$size = explode('x', $size);
							$size1 = $size[0];
							$size2 = $size[1];

							$mobile = get_option('GARD_MOBILE_ADVANCED_'.$original_size);

							if( $mobile == 1 && gard_ismobile() === FALSE ) {
								// If ad is set to show to mobile only, and this is not a mobile device, skip the output of this ad
								continue;
							} elseif( $mobile == 2 && gard_ismobile() === TRUE ) {
								// If ad is set to show to non-mobile only, and this is a mobile device, skip the output of this ad
								continue;
							}

							if ( strlen($code) == '10' && is_numeric($code)) {			
								$adsense .= ' else if ( adWidth >= '.$size1.' ) {
									document.getElementById("GARDasync_'.$num.
										'").innerHTML = "<ins class=\"adsbygoogle\" style=\"'.$align.'width:'.$size1.'px;height:'.$size2.
										'px;display:block;\" data-ad-client=\"'.$id.'\" data-ad-slot=\"'.$code.'\"></ins>";
									}';
							}
						}
				$adsense .= '</script>';

			} else {

		# BASIC MODE

				$link_units = array(
					'728x15' => '728x15',
					'468x15' => '468x15',
					'200x90' => '200x90',
					'180x90' => '180x90',
					'160x90' => '160x90',
					'120x90' => '120x90',
					);

				$google_ad_type = get_option('GARD_AD_TYPE', 'text_image' );

				if ($google_ad_type == 'link') {
					$adsizes = $link_units;
				} else {
					global $adsizes;
				}

				$google_color_border = str_replace("#", '', get_option( 'GARD_AD_BORDER', '#FFFFFF' ) );
				$google_color_bg = str_replace("#", '', get_option( 'GARD_AD_BACKGROUND', '#FFFFFF' ) );
				$google_color_link = str_replace("#", '', get_option( 'GARD_AD_TITLE', '#0000FF' ) );
				$google_color_url = str_replace("#", '', get_option( 'GARD_AD_URL', '#008000' ) );
				$google_color_text = str_replace("#", '', get_option( 'GARD_AD_TEXT', '#000000' ) );
				$google_ui_features = get_option('GARD_AD_RADIUS', '0');
					
				$format_extension = '_as';

				if ($google_ad_type == 'link') {
					$format_extension = '_0ads_al';
					$google_ad_type = 'google_ad_type = "";';
				} else {
					$google_ad_type = 'google_ad_type = "text";';
					// $google_ad_type = 'google_ad_type = "'.$google_ad_type.'";';
				}
					

				$adsense =	'		
					<div class="GARD gard_basic_mode" id="google-ads-'.$num.'"><script >
					adUnit = document.getElementById("google-ads-'.$num.'");
					adWidth = adUnit.offsetWidth;	

					if ( adWidth >= 999999 ) {
							/* GETTING THE FIRST IF OUT OF THE WAY */ 
					}';

					foreach($adsizes as $size => $description) {

						$code = get_option('GARD_'.$size.'_BASIC');
						$mobile = get_option('GARD_MOBILE_BASIC');

						$type = 'ad_unit';
						if ( get_option('GARD_AD_TYPE', 'text_image' ) == 'link' ) {
							$type = 'link_unit';
						} elseif ($size == '300x600') {
							$type = 'large_skyscraper';
						}

						$tag = $type."_".$size;
						$original_size = $size;
						$size = explode('x', $size);
						$size1 = $size[0];
						$size2 = $size[1];

						if ($code == '') {
							continue;
						}

						$mobile = get_option('GARD_MOBILE_BASIC_'.$original_size);

						if( $mobile == 1 && gard_ismobile() === FALSE ) {
							// If ad is set to show to mobile only, and this is not a mobile device, skip the output of this ad
							continue;
						} elseif( $mobile == 2 && gard_ismobile() === TRUE ) {
							// If ad is set to show to non-mobile only, and this is a mobile device, skip the output of this ad
							continue;
						}

						$adsense .= ' else if ( adWidth >= '.$size1.' ) {
						if (document.querySelectorAll(".'.$type.'").length > 2 ) {
							google_ad_slot	 = "0";
							adUnit.style.display = "none";
						} else {
							adcount = document.querySelectorAll(".'.$type.'").length;
							tag = "'.$tag.'_"+adcount;
							google_ad_width = "'.$size1.'";
							google_ad_height = "'.$size2.'";
							google_ad_format = "'.$size1.'x'.$size2.$format_extension.'";
							'.$google_ad_type.'
							google_ad_channel = "";
						}
					}';

					}

				$adsense .= ' else {
					google_ad_slot	 = "0";
					adUnit.style.display = "none";
				}
				adUnit.className = adUnit.className + " '.$type.' " + tag;
				google_ad_client = "'.$id.'";
				adUnit.style.cssFloat  = "'.$float.'";
				adUnit.style.styleFloat  = "'.$float.'";
				adUnit.style.margin = "'.$margin.'";
				adUnit.style.textAlign = "'.$text.'";
				google_color_border = "'.$google_color_border.'";
				google_color_bg = "'.$google_color_bg.'";
				google_color_link = "'.$google_color_link.'";
				google_color_url = "'.$google_color_url.'";
				google_color_text = "'.$google_color_text.'";
				google_ui_features = "rc:'.$google_ui_features.'";
				</script>
				<script  src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
				</div>';

			}

		# SET UP STYLE
			if ( file_exists( dirname(__FILE__) .'gard_custom.css') ) {				
				wp_register_style(  'gard_ad_style', plugins_url( '/gard_custom.css', __FILE__ ) );
				wp_enqueue_style(   'gard_ad_style' );
			}

		if (!isset($_GET['GARD_DEBUG'])) 
			$adsense = str_replace(array("\n","\t"), "", $adsense);

		return $adsense;
	}

	add_shortcode( 'GARD', '_GARD' );
	add_shortcode( 'gard', '_GARD' );
}
?>
