<?php
$adsizes = array(
    #	Google Adsense Display and Text Unit Sizes
		'970x90'  => 'Large Leaderboard', 
		'728x90'  => 'Leaderboard',
		'468x60'  => 'Banner ',
		'336x280' => 'Large Rectangle',
		'300x250' => 'Medium Rectangle',
		'250x250' => 'Square ',
		'234x60'  => 'Half Banner',
		'125x125' => 'Button',
		'120x600' => 'Skyscraper',
		'160x600' => 'Wide Skyscraper',
		'180x150' => 'Small Rectangle',
		'120x240' => 'Vertical Banner',
		'200x200' => 'Small Square',
		'200x200' => 'Small Square',

	#	Google Adsense Link Unit Sizes
		'120x90'  => 'Displays 3 links',
		'160x90'  => 'Displays 3 links',
		'180x90'  => 'Displays 3 links',
		'200x90'  => 'Displays 3 links',
		'468x15'  => 'Displays 4 links',
		'728x15'  => 'Displays 4 links',

);	
if (!function_exists('_procheck')) {
	function _procheck($valid = FALSE, $echo = FALSE, $state = FALSE) {
		# CHECK IF GARD PRO EXISTS #
			if (file_exists(dirname(dirname(__FILE__)).'/gard-pro/index.php')) {
				if(!function_exists(is_plugin_active)) { include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }
				if( is_plugin_active('gard-pro/index.php')) { 
					$state = TRUE; 

		# IF WE WANT TO RETURN THE VALIDITY OF THE LICENSE RATHER THAN THE STATUS OF IT'S INSTALLATION #
					if($valid == TRUE) {
						$lic = gard_check_license();
						if($lic == 'valid') {
							$state = TRUE;
						}
					}
				}
			}


		# OUTPUT THE RESULTS #
			if($echo == TRUE) {
				echo $state;
			} else {
				return $state;
			}
	}
}
