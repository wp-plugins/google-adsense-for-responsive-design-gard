<style type="text/css">

	<?php 
		if( get_option('GARD_ADVANCED_MODE') == 1 ) {} else {
			?>
				.advanced {display:none;}
			<?php
		}
	?>
	.smallgray {
		font-size: 12px;
		color: #757575;
		margin-left: 23px;
		list-style-type: square;
	}
	.container {
		clear:both;
		width:100%; 
		text-align:left;
	}
	.container h2 { margin-left: 15px;  margin-right: 15px;  margin-bottom: 10px; color: #21759b; }
	.container p { margin-left: 15px; margin-right: 15px;  margin-top: 10px; margin-bottom: 10px; line-height: 1.3; font-size: small; }
	.container ul { margin-left: 25px; font-size: small; line-height: 1.4; list-style-type: disc; }
	.container li { padding-bottom: 5px; margin-left: 5px;}
	.welcome-panel .welcome-panel-column { width: initial ;}
	.videobutton {opacity: .4;vertical-align: middle}
	.videobutton:hover {opacity: .6;}
	
	.fullcolor {
		 -khtml-opacity:1.0; 
		 -moz-opacity:1.0; 
		 -ms-filter:"alpha(opacity=100)";
		  filter:alpha(opacity=100);
		  filter: progid:DXImageTransform.Microsoft.Alpha(opacity=1.0);
		  opacity:1.0; 		
	}
	.content_tag {
		color: #EEEEEE;
		font-size: 10px;
		background: #4DC24D;
		padding: 1px 3px;
		border-radius: 4px;
	}
	.sidebar_tag {
		color: #EEEEEE;
		font-size: 10px;
		background: #4D8FC2;
		padding: 1px 3px;
		border-radius: 4px;
	}
	.header_tag {
		color: #EEEEEE;
		font-size: 10px;
		background: #C2B94D;
		padding: 1px 3px;
		border-radius: 4px;
	}
	.wp-core-ui .button-red.hover, .wp-core-ui .button-red:hover, .wp-core-ui .button-red.focus, .wp-core-ui .button-red:focus {
		background-color: #B72727;
		background-image: -webkit-gradient(linear,left top,left bottom,from(#D22E2E),to(#9B2121));
		background-image: -webkit-linear-gradient(top,#D22E2E,#9B2121);
		background-image: -moz-linear-gradient(top,#D22E2E,#9B2121);
		background-image: -ms-linear-gradient(top,#D22E2E,#9B2121);
		background-image: -o-linear-gradient(top,#D22E2E,#9B2121);
		background-image: linear-gradient(to bottom,#D22E2E,#9B2121);
		border-color: #7F1B1B;
		-webkit-box-shadow: inset 0 1px 0 rgba(230, 120, 120, 0.6);
		box-shadow: inset 0 1px 0 rgba(230, 120, 120, 0.6);
		color: #fff;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
	}
	.wp-core-ui .button-red {
		background-color: #9B2121;
		background-image: -webkit-gradient(linear,left top,left bottom,from(#C52A2A),to(#9B2121));
		background-image: -webkit-linear-gradient(top,#C52A2A,#9B2121);
		background-image: -moz-linear-gradient(top,#C52A2A,#9B2121);
		background-image: -ms-linear-gradient(top,#C52A2A,#9B2121);
		background-image: -o-linear-gradient(top,#C52A2A,#9B2121);
		background-image: linear-gradient(to bottom,#C52A2A,#9B2121);
		border-color: #9B2121;
		border-bottom-color: #8D1E1E;
		-webkit-box-shadow: inset 0 1px 0 rgba(230, 120, 120, 0.5);
		box-shadow: inset 0 1px 0 rgba(230, 120, 120, 0.5);
		color: #fff;
		text-decoration: none;
		text-shadow: 0 1px 0 rgba(0,0,0,0.1);
	}
	#adoptions, .samplediv {display:none;}

	#adoptions td {border:none;}
	
	.samplediv {
		/*
		float: right;
		margin-top: -35px;
		*/
		margin-bottom: 7px;
	}
	.hiddenfields, .hidechild, .hidden {display:none !important;}
	.smallgray {
		font-size: 12px;
		color: #757575;
		margin-left: 23px;
		list-style-type: square;
	}
</style>
<?php
wp_enqueue_script('jquery');
wp_enqueue_script("jquery-effects-core");

wp_register_style( 'maa-lightbox-style', plugins_url( 'css/popup.css', __FILE__ ) );
wp_enqueue_style(  'maa-lightbox-style' );

wp_register_script( 'maa-lightbox-js', plugins_url( 'js/popup.js', __FILE__ ) );
wp_enqueue_script( 'maa-lightbox-js' );


$pluginurl = plugin_dir_url(__FILE__);

# WRITE CSS FILES
				

	if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == true ) {
		$custom_css = '';

		$thiscss = get_option( 'GARD_CSS' );
		if ( strlen($thiscss) >= 3 && strpos($thiscss, ":") ) {
			$thiscss = str_replace("\n", "\n\t", $thiscss);
			$custom_css .= ".GARD {\n";
			$custom_css .= "\t".$thiscss;
			$custom_css .= "\n}\n\n";
		}


		if ( get_option('GARD_YELLOW') == 1) {
			$custom_css .= ".GARD ins {background-color:initial;}";
		}

		$file = dirname(__FILE__) .'/gard_custom.css'; 
		$fh = fopen($file, 'w') or $style_file = "failed";
		fwrite($fh, $custom_css);
		fclose($fh);
	}


include('adsizes.php');    
krsort($adsizes);

if(get_option('GARD_ADVANCED_MODE', '1') == 1) {
	$GARD_ADVANCED = 'checked';
	$basic = "secondary";
	$advanced = "primary";
	?>
	<style type="text/css">
		.group_basic {display:none;}
	</style>
	<?php
} else {
	$GARD_ADVANCED = '';
	$advanced = "secondary";
	$basic = "primary";

	?>
		<style type="text/css">
		.group_advanced {display:none;}
	</style>
	<?php
}
$GARD_YELLOW = '';
if(get_option('GARD_YELLOW') == 1) {
	$GARD_YELLOW = 'checked';
}

$GARD_CSS = get_option('GARD_CSS');

?>

<div class="wrap">
	<?php screen_icon('plugins'); ?>
	
	<form method="post" action="options.php" id="<?php echo GARDPLUGINOPTIONS_ID; ?>_options_form" name="<?php echo GARDPLUGINOPTIONS_ID; ?>_options_form">
	
	<?php settings_fields(GARDPLUGINOPTIONS_ID.'_options'); ?>
	
	<h2>Google AdSense for Responsive Design v<?php echo GARDPLUGINOPTIONS_VER ?> &raquo; Settings</h2>
	<a href='http://consultingwp.com?so=gard_pro' target="_blank"><span style='background-color:yellow;  padding: 5px 15px;margin-top: 10px;display: inline-block;border: 1px solid yellowgreen;color:black;font-weight:bold'>Need a WordPress coder?</span></a> <a href='http://consultingwp.com?so=gard_pro' target="_blank">Contact <span style="color:#d54e21">Consulting WP</span> about custom wordpress projects or error fixes.</a><br>

	<table >
		<tr>
		<td style="vertical-align:top;">
			<table class="widefat">
				<thead>
				   <tr>
					 <th colspan="2"><input type="submit" name="submit" value="Save Settings" class="button-primary" /><a href="<?php echo GARD_PLUGIN_SUPPORT_URL; ?>" style="float:right;font-family: arial;font-weight: bold;margin-top: 5px;color: #FF0000;" target="_blank">100% FREE GARD SUPPORT FORUM</a></span>
					</th>
				   </tr>
				</thead>
				<tbody>
				   <tr>
					 <td style="vertical-align:middle;">
						 <label for="GARD_ID" style="width: 270px; display:block;">
							<a href='#GARD_ID' class='popup-with-zoom-anim'><?php _e('Google AdSense Publisher ID:'); ?></a>
						 </label>
						<div class='zoom-anim-dialog mfp-hide help_content' id='GARD_ID'>
							<h2><?php _e('Google AdSense Publisher ID:'); ?></h2>
							<p><?php _e('Please use only the numbers from your publisher ID and paste them into the field here.'); ?></p>
							<p><?php _e('Some publisher ID\'s start with <b>ca-pub-</b> and others just <b>pub-</b> but both will work fine if you remove everything other than the numbers.'); ?></p>
						</div>
					 </td>
					 <td  style="vertical-align:middle;text-align:right;">
						ca-pub-<input type="text" name="GARD_ID" value="<?php echo get_option('GARD_ID'); ?>" style="padding:5px;" />
					</td>
				   </tr>

				   <tr>
					 <td style="vertical-align:middle;">
						 <label for="GARD_YELLOW">
							<a href='#GARD_YELLOW' class='popup-with-zoom-anim'><?php _e('Hide Yellow Background on Placeholder:'); ?></a>
						 </label>
						<div class='zoom-anim-dialog mfp-hide help_content' id='GARD_YELLOW'>
							<h2><?php _e('Hide Yellow Background on Placeholder:'); ?></h2>
							<p><?php _e('Usually by default, if you have a new account, or Google can\'t find the right size ad for you, they display a box where the ad should go. This box often has a light yellow background.'); ?></p>
							<p><?php _e('If you prefer to not have a light yellow background on this placeholder box, then check this checkbox.'); ?></p>
						</div>
					 </td>
					 <td style="vertical-align:middle;text-align:right;">
						<input type="checkbox" name="GARD_YELLOW" id="GARD_YELLOW" value="1" <?php echo $GARD_YELLOW ?> />
					</td>
				</tr>

				<tr>
					<td style='vertical-align:top;min-width:255px;' colspan='2'>
						<label for="GARD_CSS">
							<a href='#GARD_CSS' class='popup-with-zoom-anim'><?php _e('Custom CSS for GARD:'); ?></a>
						 </label>
						<div class='zoom-anim-dialog mfp-hide help_content' id='GARD_CSS'>
							<h2><?php _e('Custom CSS for GARD:'); ?></h2>
							<p><?php _e('Enter custom CSS styling here for all of your GARD ads.'); ?></p>
							<p><?php _e('Do not enter any other classes here. Only enter CSS styling as though you were styling inline.'); ?></p>
							<p><?php _e('Example:'); ?></p>
							<p><textarea style="width:420px;height:300px;"><?php _e('border: 1px solid #000; float:right;'); ?></textarea></p>
						</div>
						<br/><br/>
						.GARD {<br/>
						<textarea style='margin-left:20px;width:90%' name='GARD_CSS'rows='10'><?php echo $GARD_CSS; ?></textarea>
						<br/>
						}
						</td>
					 </td>
				 </tr>

				   <tr>
					 <td style="vertical-align:top;">
						<label for="GARD_ADVANCED_MODE">
							<a href='#GARD_ADVANCED_MODE' class='popup-with-zoom-anim'><?php _e('AdSense Setup Mode:'); ?></a>
						 </label>
						<div class='zoom-anim-dialog mfp-hide help_content' id='GARD_ADVANCED_MODE'>
							<h2><?php _e('AdSense Setup Mode:'); ?></h2>
							<p><h3><?php _e('Overview'); ?></h3></p>
							<p><?php _e('The way GARD functions is this: When the page loads, it determines the width of the area for the ad. Then it picks the LARGEST ad from your available ad sizes to display.'); ?></p>
							<p><?php _e('So, if you only select large ads, but you try to use GARD in a small area, like a widget, then no ads will be displayed.'); ?></p>
							<p><h3><?php _e('Basic Mode'); ?></h3></p>
							<p><?php _e('The fastest and easiest way to get going with AdSense is to choose Basic Mode.'); ?></p>
							<p><?php _e('Basic mode allows you to simply check the boxes next to the ad sizes that you are OK with showing on your pages.'); ?></p>
							<p><?php _e('For example, you might want one wide banner, one square, and one skyscraper. You should check the boxes next to the sizes that you want.'); ?></p>
							<p><?php _e('Basic mode does NOT offer any sort of performance tracking on your AdSense account page. It\'s simply designed to make things easier.'); ?></p>
							<p><h3><?php _e('Advanced Mode'); ?></h3></p>
							<p><?php _e('With Advanced mode, you have the option to insert your own Ad Slot ID. This allows you to then track that ad\'s performance on your AdSense Dashboard.'); ?></p>
							<p><?php _e('Advanced mode also gives you the option to use Asynchronous AdSense for improved performance.'); ?></p>
						</div>
					 </td>
					 <td style="vertical-align:top;text-align:right;min-width:265px;">
						<input type="button" name="submit" id="basic_mode" value="BASIC MODE" class="button-<?php echo $basic ?>" /> 
						<input type="button" name="submit" id="advanced_mode" value="ADVANCED MODE" class="button-<?php echo $advanced ?>" />
						<input type="checkbox" name="GARD_ADVANCED_MODE" id="GARD_ADVANCED_MODE_CHECKBOX" value="1" <?php echo $GARD_ADVANCED ?> class='hidden' />
						<div class="group_basic" style="width:222px;text-align:justify;margin: 10px 0 10px 42px;">
							<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don't care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
						</div>
					 </td>
				   </tr>


<?php ####################### BASIC MODE SETTINGS ####################### ?>
<?php 
			$adtype = get_option('GARD_AD_TYPE', 'text_image');
			
			if($adtype == 'text_image') {
				$ad_text_image = "selected";
			} elseif ($adtype == 'image') {
				$ad_image = "selected";
			} elseif ($adtype == 'text') {
				$ad_text = "selected";
			} elseif ($adtype == 'link') {
				$ad_link = "selected";
			}


			$border = get_option( 'GARD_AD_BORDER', '#FFFFFF' ) ; if ($border == '') { $border = '#FFFFFF';}
			$title = get_option( 'GARD_AD_TITLE', 'blue' ) ; if ($title == '') { $title = 'blue';}
			$background = get_option( 'GARD_AD_BACKGROUND', '#FFFFFF' ) ; if ($background == '') { $background = '#FFFFFF';}
			$text = get_option( 'GARD_AD_TEXT', '#000000' ) ; if ($text == '') { $text = '#000000';}
			$url = get_option( 'GARD_AD_URL', '#008000' ) ; if ($url == '') { $url = '#008000';}

			$square = get_option( 'GARD_AD_RADIUS', '0' ) ; if ($square == '0') { $square = 'selected'; $radius = '0';}
			$slightly = get_option( 'GARD_AD_RADIUS', '6' ) ; if ($slightly == '6') { $slightly = 'selected'; $radius = '6';}
			$rounded = get_option( 'GARD_AD_RADIUS', '10' ) ; if ($rounded == '10') { $rounded = 'selected'; $radius = '10';}


			echo "<tr class='group_basic'  style='text-align:center;'>
						 <td style='vertical-align:top;min-width:255px;' colspan='2'>
								 <table id='adoptions'>
									<tr>
										<td style='display:none'>Ad Type</td>
										<td>Border</td>
										<td>Title</td>
										<td>Background</td>
										<td>Text</td>
										<td>URL</td>
									</tr>
									<tr>";
/*
			echo "	
										<td>
											<select name='GARD_AD_TYPE' >
												<option ".$ad_text_image." value='text_image'>Text/Image</option>
												<option ".$ad_image." value='image'>Image</option>
												<option ".$ad_text." value='text'>Text</option>
												<option ".$ad_link." value='link'>Links</option>
											</select>";
			echo "							<br>
											Rounded Corners<br>
											<select id='ad_radius' name='GARD_AD_RADIUS' >
												<option ".$square." value='0'>Square</option>
												<option ".$slightly." value='6'>Slightly Rounded</option>
												<option ".$rounded." value='10'>Very Rounded</option>
											</select>
										</td>";
*/
			if (empty($radius)) {
				$radius = '0';
			}
			echo "							
										<td><input type='text' id='ad_border' value='". $border ."' name='GARD_AD_BORDER'/></td>
										<td><input type='text' id='ad_title' value='". $title ."' name='GARD_AD_TITLE'/></td>
										<td><input type='text' id='ad_background' value='". $background ."' name='GARD_AD_BACKGROUND'/></td>
										<td><input type='text' id='ad_text' value='". $text ."' name='GARD_AD_TEXT'/></td>
										<td><input type='text' id='ad_url' value='". $url ."' name='GARD_AD_URL'/></td>
									</tr>
								 </table>
								 <style>
									#sample_ad {
										width:226px;
										height:50px;
										padding: 3px;
										overflow:hidden;
										margin: 0 auto;
										text-align: left;
										border: 1px solid ". $border .";
										background-color: ". $background .";
										border-radius: ". $radius ."px;
									}
									

									#sample_ad img {
										border: 0;
										cursor: pointer;
										height: 16px;
										margin-right: 3px;
										vertical-align: middle;
										width: 16px;
									}
									#sample_ad_title {
										color: ". $title .";
										font-size: 13px;
										font-weight: bold;
										text-decoration: underline;
										line-height: 1.2;
									}								
									
									#sample_ad_text {
										color: ". $text .";
										font-size: 12px;
										line-height: 1.2;
									}
									
									#sample_ad_url {
										color: ". $url .";
										font-size: 10px;
										line-height: 1.2;
										white-space: nowrap;
									}
								</style>
								<div class='samplediv'>
									Sample Ad:<br>
									 <div id='sample_ad'>
										<div>
											<a id='sample_ad_title' href='#' onclick='return false;'>Ad Title</a>
										</div>
										<div>
											<img src='https://s2.googleusercontent.com/s2/favicons'>
											<span id='sample_ad_url'>www.ad-url.com</span>
										</div>
										<div>
											<span id='sample_ad_text'>Ad Text</span>
										</div>
									</div>
								</div>

						 </td>
					 </td>
					 </tr>";

					 $finalvalue = '';
			global $adsizes;
			global $has_ads;
			$output = '';

			foreach($adsizes as $size => $key) {

				if (get_option('GARD_'.$size.'_BASIC') == 1) {
					$checked = "checked";
				} else {
					$checked = '';
				}

				$content = array('468x60','300x250','200x200');
				$header  = array('970x90','728x90','468x60','320x50');
				$sidebar = array('300x250','200x200','160x600','125x125');

				$suggested = '';
				if ( in_array($size, $content) ) {
					$suggested .= " <span class='content_tag'>Content</span>";
				} 
				if ( in_array($size, $header) ) {
					$suggested .= " <span class='header_tag'>Header</span>";
				} 
				if ( in_array($size, $sidebar) ) {
					$suggested .= " <span class='sidebar_tag'>Sidebar</span>";
				}

				if ($size == '320x50' && get_option('GARD_MOBILE_BASIC', 0) == 1 && 'empty' == get_option('GARD_MOBILE_BASIC_'.$size, 'empty')) {
					update_option('GARD_MOBILE_BASIC_'.$size, 1);
					echo "<script>alert('Updated!')</script>";
				} 


				$help = "<a href='#help_{$size}_basic' class='popup-with-zoom-anim'>".__("<b>$key</b>")."</a>
						<div class='zoom-anim-dialog mfp-hide help_content' id='help_{$size}_basic'>
							<h2>".__("$size | $key $suggested")."</h2>
							<p>If you would like to display a $size ad on your page, then click the checkbox to the far right of the setting.</p>
							<p>If you want to filter for mobile or non mobile devices, use the dropdown menu located immediately to the left of the checkbox.</p>
							<p><span class='content_tag'>Content</span> If you see this label next to this ad size, it means this is a suggested size for the Content area of your blog.</p>
							<p><span class='header_tag'>Header</span> If you see this label next to this ad size, it means this is a suggested size for the Header area of your blog.</p>
							<p><span class='sidebar_tag'>Sidebar</span> If you see this label next to this ad size, it means this is a suggested size for the Sidebar area of your blog.</p>
						</div>";
				$output .= '
							<tr class="group_basic">
								<td style="vertical-align:middle;" >
									<label for="GARD_'.$size.'_BASIC">
										<span style="width:60px;display:inline-block;">'.$size.'</span> | '.$help.' '.$suggested.'
									</label>
								</td>
								<td style="vertical-align:middle;text-align:right;">
								<select name="GARD_MOBILE_BASIC_'.$size.'">
									<option value="0" '.selected( get_option('GARD_MOBILE_BASIC_'.$size, 0), 0,false).' >'.__('Show to All').'</option>
									<option value="1" '.selected( get_option('GARD_MOBILE_BASIC_'.$size, 0), 1,false).' >'.__('Show to Mobile Only').'</option>
									<option value="2" '.selected( get_option('GARD_MOBILE_BASIC_'.$size, 0), 2,false).' >'.__('Show to Non-Mobile Only').'</option>
								</select> &nbsp;
									<input type="checkbox" name="GARD_'.$size.'_BASIC" value="1" '.$checked.' style="padding:5px;" />
				';


			   $output .= '</td>
				  </tr>';
			}

			echo $output;

?>

<?php ####################### BASIC MODE SETTINGS END ####################### ?>

<?php ####################### ADVANCED MODE SETTINGS ####################### ?>

				   <tr class="group_advanced" >
					 <td style="vertical-align:top;">
						 <label for="GARD_ASYNC">
							<a href='#GARD_ASYNC' class='popup-with-zoom-anim'><?php _e('Asynchronous AdSense'); ?></a><span style="color:orange">[BETA]</span>
						 </label>
						<div class='zoom-anim-dialog mfp-hide help_content' id='GARD_ASYNC'>
							<h2><?php _e('Asynchronous AdSense <span style="color:orange">[BETA]</span>'); ?></h2>
							<p><?php _e('This can speed up loading of ads on your website by requesting all ads at one time rather than one by one.'); ?></p>
							<p><?php _e('Asynchronous mode is still in BETA mode, and if you run across issues, please let us know in our <a href="http://thepluginfactory.co/community/forum/plugin-specific/gard-google-adsense-for-responsive-design/" target="_blank">support forums</a>.'); ?></p>
						</div>						 
						<br/>
						<span class="smallgray" style="margin:0;font-size:11px;">BETA FEATURE: <?php echo GARD_PLUGIN_SUPPORT_LINK; ?>.</span>
						<br/>
						<span class="smallgray" style="margin:0;font-size:11px;">KNOWN ISSUES:</span>
						<br/>
						<span class="smallgray" style="margin:0;font-size: 11px;line-height: 11px;margin-left: 10px;display: block;">
							Does not work with any other async AdSense.<br>
							Must be the only async AdSense on the page.<br>
							Very infrequently only 2 of 3 ads might load.
						</span>

					 </td>
					 <td style="text-align:left;padding-left: 66px;vertical-align: top;">
						<input type="checkbox" name="GARD_ASYNC" value="1" <?php if(get_option('GARD_ASYNC') == 1) echo "checked"; ?> style="padding:5px;" />
					</td>
				   </tr>

				   <?php
						$finalvalue = '';
			global $adsizes;
			global $has_ads;
			$output = '';
			$adcount = 1;
			foreach($adsizes as $size => $key) {

				$value = get_option('GARD_'.$size);
				$finalvalue .= $value;
				$vallen = strlen($value);
				if ($vallen != 10 && $vallen != 0 && is_numeric($value) ) {
					$highlight = 'style="background: yellow;" ';
					$hidden = '';
					$error = "count";
				} elseif ( !is_numeric($value) && $vallen != 0 ) {
					$highlight = 'style="background: yellow;" ';
					$hidden = '';
					$error = "numeric";
				} elseif ($vallen == "0") {
					$highlight = '';
					$fade = "color:#AAA;"; 
					$hidden = "class='hideoptions hiddenfields'";
				} else {
					$highlight = '';
					$fade = '';
					$hidden = '';
					$adcount++;
					// $output .= "$adcount,";
				}

				$content = array('468x60','300x250','200x200');
				$header  = array('970x90','728x90','468x60','320x50');
				$sidebar = array('300x250','200x200','160x600','125x125');

				$suggested = '';
				if ( in_array($size, $content) ) {
					$suggested .= " <span class='content_tag'>Content</span>";
				} 
				if ( in_array($size, $header) ) {
					$suggested .= " <span class='header_tag'>Header</span>";
				} 
				if ( in_array($size, $sidebar) ) {
					$suggested .= " <span class='sidebar_tag'>Sidebar</span>";
				}
				
				if ($size == '320x50' && get_option('GARD_MOBILE_ADVANCED', 0) == 1 && 'empty' == get_option('GARD_MOBILE_ADVANCED_'.$size, 'empty')) {
					update_option('GARD_MOBILE_ADVANCED_'.$size, 1);
					echo "<script>alert('Updated!')</script>";
				} 

				$size_arr = explode("x", $size);

				$help = "<a href='#help_{$size}_advanced' class='popup-with-zoom-anim'>".__("<b>$key</b>")."</a>
						<div class='zoom-anim-dialog mfp-hide help_content' id='help_{$size}_advanced'>
							<h2>".__("$size | $key $suggested")."</h2>
							<p>If you would like to display a $size ad on your page, please get your ad slot ID from your current AdSense code.</p>
							<p><b>Below you will find examples of where to find your Slot ID</p>
							<p>Standard Code:<br><span style='padding-left: 45px;display: block;'>
							".nl2br(htmlentities('
							<script type="text/javascript"><!--
								google_ad_client = "ca-pub-1186984593972216";
								/* Top '.$size_arr[0].'x'.$size_arr[1].' */
								google_ad_slot = "')).'<b style="font-size: 20px;color: #000;background: lightyellow;padding: 3px;">2388600169</b>'.nl2br(htmlentities('";
								google_ad_width = '.$size_arr[0].';
								google_ad_height = '.$size_arr[1].';
								//-->
								</script>
								<script type="text/javascript"
								src="//pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>'))."</span>
							</p><p>Async Code:<br><span style='padding-left: 45px;display: block;'>
								".nl2br(htmlentities('<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- Top '.$size_arr[0].'x'.$size_arr[1].' -->
								<ins class="adsbygoogle"
								     style="display:inline-block;width:'.$size_arr[0].'px;height:'.$size_arr[1].'px"
								     data-ad-client="ca-pub-1186984593972216"
								     data-ad-slot="')).'<b style="font-size: 20px;color: #000;background: lightyellow;padding: 3px;">2388600169</b>'.nl2br(htmlentities('"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>'))."</span>
							</p>
							<p><span class='content_tag'>Content</span> If you see this label next to this ad size, it means this is a suggested size for the Content area of your blog.</p>
							<p><span class='header_tag'>Header</span> If you see this label next to this ad size, it means this is a suggested size for the Header area of your blog.</p>
							<p><span class='sidebar_tag'>Sidebar</span> If you see this label next to this ad size, it means this is a suggested size for the Sidebar area of your blog.</p>
						</div>";
				$output .= '
							<tr class="group_advanced" '.$highlight.' '.$hidden.'>
								<td style="vertical-align:middle;'.$fade.'" >
									<label for="GARD_'.$size.'">
										<span style="width:60px;display:inline-block;">'.$size.'</span> | '.$help.' '.$suggested.'
									</label>
								</td>
								<td style="vertical-align:middle;text-align:right;">
									<input type="text" name="GARD_'.$size.'" value="'.$value.'" style="padding:5px;" />
									<select name="GARD_MOBILE_ADVANCED_'.$size.'">
										<option value="0" '.selected( get_option('GARD_MOBILE_ADVANCED_'.$size, 0), 0,false).' >'.__('Show to All').'</option>
										<option value="1" '.selected( get_option('GARD_MOBILE_ADVANCED_'.$size, 0), 1,false).' >'.__('Show to Mobile Only').'</option>
										<option value="2" '.selected( get_option('GARD_MOBILE_ADVANCED_'.$size, 0), 2,false).' >'.__('Show to Non-Mobile Only').'</option>
									</select>
				';

				if (isset($error) && $error == "count") {
					$output .= '<br/><b>Invalid number of digits.</b><br/>
					<span style="font-size:11px;">Ad slot code should be 10 digits.<br/>
					Your code contains <b>'.$vallen.'</b> digits.</span>';
				} 
				if (isset($error) && $error == "numeric") {
					$output .= '<br/><b>Invalid characters.</b><br/>
					<span style="font-size:11px;">Ad slot code should be 10 digits only.';
			   }

					   $output .= '</td>
						  </tr>';
					unset($error);
			}

			echo $output;

				   ?>
<?php ####################### ADVANCED MODE SETTINGS END ####################### ?>

				</tbody>
				<tfoot>
				   <tr>
					 <th colspan="2"><input id="submit" type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
					 
				   </tr>
				</tfoot>
			</table>
		</td>
		<td style="vertical-align:top; padding-left:15px;padding-top: 15px; max-width:350px;">
			<?php include( GARD_FOLDER.'/sidebar.php') ?>
		</td>
		</tr>
	</table>
	</form>	
</div>

<?php
	$border = get_option( 'GARD_AD_BORDER', '#FFFFFF' ) ; 
	if ($border == '') { 
		$border = '#FFFFFF'; 
		$string .= " 
		$('#ad_border').val('#FFFFFF'); 
		";
	}

	$title = get_option( 'GARD_AD_TITLE', 'blue' ) ; if ($title == '') { $title = 'blue';}
	$background = get_option( 'GARD_AD_BACKGROUND', '#FFFFFF' ) ; if ($background == '') { $background = '#FFFFFF';}
	$text = get_option( 'GARD_AD_TEXT', '#000000' ) ; if ($text == '') { $text = '#000000';}
	$url = get_option( 'GARD_AD_URL', '#008000' ) ; if ($url == '') { $url = '#008000';}

## INITIAL SETUP COMPLETE ##
?>
<script type="text/javascript">
	jQuery(function ($) {
		$(document).ready(function() {
			
			$(document).keydown(function(event) {
				if (!( String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19)) return true;
				$("#submit").click();
				event.preventDefault();
				return false;
			});

			$('#advanced_mode').click(function(){

				$(this).removeClass('button-secondary');
				$('#basic_mode').removeClass('button-primary');

				$(this).addClass('button-primary');
				$('#basic_mode').addClass('button-secondary');

				$('.group_basic').hide();
				$('.group_advanced').fadeIn( "slow" );
				$('#GARD_ADVANCED_MODE_CHECKBOX').attr('checked', true);
			});
			
			$('#basic_mode').click(function(){

				$(this).removeClass('button-secondary');
				$('#advanced_mode').removeClass('button-primary');
				
				$(this).addClass('button-primary');
				$('#advanced_mode').addClass('button-secondary');

				$('.group_advanced').hide();
				$('.group_basic').fadeIn( "slow" );
				$('#GARD_ADVANCED_MODE_CHECKBOX').attr('checked',false);
			});


			$('#ad_border').spectrum({
				color: '<?php  echo $border; ?>',
				clickoutFiresChange: true,
				showInput: true,
				preferredFormat: 'hex'
			});


			$('#ad_title').spectrum({
				color: '<?php echo $title; ?>',
				clickoutFiresChange: true,
				showInput: true,
				preferredFormat: 'hex'
			});
			$('#ad_background').spectrum({
				color: '<?php echo $background; ?>',
				clickoutFiresChange: true,
				showInput: true,
				preferredFormat: 'hex'
			});
			$('#ad_text').spectrum({
				color: '<?php echo $text; ?>',
				clickoutFiresChange: true,
				showInput: true,
				preferredFormat: 'hex'
			});
			$('#ad_url').spectrum({
				color: '<?php echo $url; ?>',
				clickoutFiresChange: true,
				showInput: true,
				preferredFormat: 'hex'
			});


			$('#ad_border').change(function(){
				var textcolor = $(this).val();
				$('#sample_ad').css('border', '1px '+textcolor+' solid');
			});
			$('#ad_title').change(function(){
				var textcolor = $(this).val();
				$('#sample_ad_title').css('color', textcolor);
			});
			$('#ad_background').change(function(){
				var textcolor = $(this).val();
				if ( textcolor == '') { var textcolor = '#ff0'; }
				$('#sample_ad').css('background-color', textcolor);
			});
			$('#ad_text').change(function(){
				var textcolor = $(this).val();
				$('#sample_ad_text').css('color', textcolor);
			});
			$('#ad_url').change(function(){
				var textcolor = $(this).val();
				$('#sample_ad_url').css('color', textcolor);
			});

			$('#ad_radius').change(function(){
				var radius = $(this).val();
				$('#sample_ad').css('border-radius', radius+'px');
			});

			$('#adoptions').show();
			$('.samplediv').show();

			// Popup settings
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',

						fixedContentPos: false,
						fixedBgPos: true,

						overflowY: 'auto',

						closeBtnInside: true,
						preloader: false,

						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});
				});
		});
	});
</script>