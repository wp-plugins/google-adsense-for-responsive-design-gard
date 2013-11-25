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
	.hiddenfields, .hidechild {display:none;}
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
	
	<h2>Google Adsense for Responsive Design v<?php echo GARDPLUGINOPTIONS_VER ?> &raquo; Settings</h2>
	<table >
		<tr>
		<td style="vertical-align:top;">
			<table class="widefat">
				<thead>
				   <tr>
					 <th colspan="2"><input type="submit" name="submit" value="Save Settings" class="button-primary" /><a href="<?php echo GARD_PLUGIN_SUPPORT_URL; ?>" style="float:right;font-family: arial;font-weight: bold;margin-top: 5px;color: #d54e21;" target="_blank">GARD SUPPORT FORUM</a></span></th>
				   </tr>
				</thead>
				<tbody>
				   <tr>
					 <td style="vertical-align:middle;">
						 <label for="GARD_ID" style="width: 270px; display:block;">
							 Google Adsense Publisher ID:
						 </label>
					 </td>
					 <td  style="vertical-align:middle;text-align:right;">
						ca-pub-<input type="text" name="GARD_ID" value="<?php echo get_option('GARD_ID'); ?>" style="padding:5px;" />
					</td>
				   </tr>

				   <tr>
					 <td style="vertical-align:middle;">
						 <label for="GARD_YELLOW">
							 Hide Yellow Background on Placeholder:
						 </label>
					 </td>
					 <td style="vertical-align:middle;text-align:right;">
						<input type="checkbox" name="GARD_YELLOW" id="GARD_YELLOW" value="1" <?php echo $GARD_YELLOW ?> />
					</td>
				</tr>

				<tr>
					<td style='vertical-align:top;min-width:255px;' colspan='2'>
						<label for='GARD_CSS'>
							Custom CSS for GARD:
						</label><br/><br/>
						.GARD {<br/>
						<textarea style='margin-left:20px' name='GARD_CSS' cols='85' rows='10'><?php echo $GARD_CSS; ?></textarea>
						<br/>
						}
						</td>
					 </td>
				 </tr>

				   <tr>
					 <td style="vertical-align:top;">
						 <label for="GARD_ADVANCED_MODE">
							 AdSense Setup Mode:
						 </label>
					 </td>
					 <td style="vertical-align:top;text-align:right;min-width:265px;">
						<input type="button" name="submit" id="basic_mode" value="BASIC MODE" class="button-<?php echo $basic ?>" /> 
						<input type="button" name="submit" id="advanced_mode" value="ADVANCED MODE" class="button-<?php echo $advanced ?>" />
						<input type="checkbox" name="GARD_ADVANCED_MODE" id="GARD_ADVANCED_MODE" value="1" <?php echo $GARD_ADVANCED ?> hidden />
						<div class="group_basic" style="width:222px;text-align:justify;margin: 10px 0 10px 42px;">
							<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don\'t care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
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

				$output .= '
							<tr class="group_basic">
								<td style="vertical-align:middle;" >
									<label for="GARD_'.$size.'_BASIC">
										<span style="width:50px;display:inline-block;">'.$size.'</span> | <b>'.$key.'</b>'.$suggested.'
									</label>
								</td>
								<td style="vertical-align:middle;text-align:right;">
									<input type="checkbox" name="GARD_'.$size.'_BASIC" value="1" '.$checked.' style="padding:5px;" />
				';

				if ($size == '320x50') {
					$GARD_MOBILE_BASIC = get_option('GARD_MOBILE_BASIC');
					if($GARD_MOBILE_BASIC == 1) { $GARD_MOBILE_BASIC = 'checked';}
					$output .= '<br><input type="checkbox" name="GARD_MOBILE_BASIC" value="1" '.$GARD_MOBILE_BASIC.'> Show to mobile only.';
				}

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
						Asynchronous AdSense <span style="color:orange">[BETA]</span>
						</label>
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

				$output .= '
							<tr class="group_advanced" '.$highlight.' '.$hidden.'>
								<td style="vertical-align:middle;'.$fade.'" >
									<label for="GARD_'.$size.'">
										<span style="width:50px;display:inline-block;">'.$size.'</span> | <b>'.$key.'</b>'.$suggested.'
									</label>
								</td>
								<td style="vertical-align:middle;text-align:right;">
									<input type="text" name="GARD_'.$size.'" value="'.$value.'" style="padding:5px;" />
				';

				if ($size == '320x50') {
					$GARD_MOBILE_ADVANCED = get_option('GARD_MOBILE_ADVANCED');
					if($GARD_MOBILE_ADVANCED == 1) { $GARD_MOBILE_ADVANCED = 'checked';}
					$output .= '<br><input type="checkbox" name="GARD_MOBILE_ADVANCED" value="1" '.$GARD_MOBILE_ADVANCED.'> Show to mobile only.';
				}

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
				$('#GARD_ADVANCED_MODE').attr('checked',true);

				$(this).removeClass('button-secondary');
				$('#basic_mode').removeClass('button-primary');

				$(this).addClass('button-primary');
				$('#basic_mode').addClass('button-secondary');

				$('.group_basic').hide();
				$('.group_advanced').fadeIn( "slow" );
			});
			
			$('#basic_mode').click(function(){
				$('#GARD_ADVANCED_MODE').attr('checked',false);

				$(this).removeClass('button-secondary');
				$('#advanced_mode').removeClass('button-primary');
				
				$(this).addClass('button-primary');
				$('#advanced_mode').addClass('button-secondary');

				$('.group_advanced').hide();
				$('.group_basic').fadeIn( "slow" );
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

		});
	});
</script>