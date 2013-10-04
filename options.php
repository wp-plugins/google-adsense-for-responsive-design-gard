<?php
wp_enqueue_script('jquery');
wp_enqueue_script("jquery-effects-core");

$pluginurl = plugin_dir_url(__FILE__);

include('adsizes.php');    
krsort($adsizes);
if( function_exists(_procheck) ) {  
    $variable = _procheck();
    $var = _procheck(TRUE);
}
?>
<style type="text/css">
	.hiddenfields, .hidechild {display:none;}
	.smallgray {
		font-size: 12px;
		color: #757575;
		margin-left: 23px;
		list-style-type: square;
	}
</style>
<div class="wrap">
	<?php screen_icon('plugins'); ?>
	
	<form method="post" action="options.php" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">
	
	<?php settings_fields($plugin_id.'_options'); ?>
	
	<h2>Google Adsense for Responsive Design &raquo; Settings</h2>
	<table >
		<tr>
		<td style="vertical-align:top;">
			<table class="widefat" style="max-width:444px">
				<thead>
				   <tr>
					 <th colspan="2"><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
				   </tr>
				</thead>
				<tbody>
				   <tr>
					 <td style="vertical-align:middle;">
						 <label for="GARD_ID">
							 Google Adsense Publisher ID:
						 </label>
					 </td>
					 <td  style="vertical-align:middle;text-align:right;">
						ca-pub-<input type="text" name="GARD_ID" value="<?php echo get_option('GARD_ID'); ?>" style="padding:5px;" />
					</td>
				   </tr>
					 <td style="vertical-align:top;width:215px">
						 <label for="GARD_ASYNC">
						Asynchronous AdSense <span style="color:orange">[BETA]</span>
						</label>
						<br/>
						<span class="smallgray" style="margin:0;font-size:11px;">BETA FEATURE: <a href='http://thedigitalhippies.com/pluginsupport' target='_blank' title='Report issues here.' style='text-decoration:underline'>Report issues here</a>.</span>
						<br/>
						<span class="smallgray" style="margin:0;font-size:11px;">KNOWN ISSUES: <a href='#' target='_blank' title='Show Known Issues' style='text-decoration:underline' class="hideparent">Show Known Issues</a>.</span>
						<br/>
						<ul class="hidechild smallgray" style="margin:7px 0 0 0;font-size:11px;">
							<li>Does not work for widgets in GARD Pro.</li>
							<li>Does not work with any other async AdSense. Must be the only async AdSense on the page.</li>
							<li>Infrequently only 2 of 3 ads might load.</li>
						</ul>

					 </td>
					 <td style="text-align:left;padding-left: 66px;vertical-align: top;">
						<input type="checkbox" name="GARD_ASYNC" value="1" <? if(get_option('GARD_ASYNC') == 1) echo "checked"; ?> style="padding:5px;" />
					</td>
				   </tr>

				   <?php
						$finalvalue = '';
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
							}
							echo '<tr '.$highlight.' '.$hidden.'>
									 <td style="vertical-align:middle;'.$fade.'" >
										 <label for="GARD_'.$size.'">
											<span style="width:50px;display:inline-block;">'.$size.'</span> | <b>'.$key.'</b>
										 </label>
									 </td>
									 <td style="vertical-align:middle;text-align:right;">
										<input type="text" name="GARD_'.$size.'" value="'.$value.'" style="padding:5px;" />';

								if ($error == "count") {
									echo '<br/><b>Invalid number of digits.</b><br/>
									<span style="font-size:11px;">Ad slot code should be 10 digits.<br/>
									Your code contains <b>'.$vallen.'</b> digits.</span>';
							   } 
                               if ($error == "numeric") {
									echo '<br/><b>Invalid characters.</b><br/>
									<span style="font-size:11px;">Ad slot code should be 10 digits only.';
							   }

							   echo '</td>
								   </tr>';
						    unset($error);
					   }
				   ?>
				</tbody>
				<tfoot>
				   <tr>
					 <th><input id="submit" type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
					 <th style="text-align:right;"><input id="hidebutton" type="button" name="toggle" value="Show Unused Sizes" class="button-secondary" /></th>
				   </tr>
				</tfoot>
			</table>
			
	<?php

		if(strlen($finalvalue) == "0") {
			echo '<style type="text/css">.hiddenfields {display:table-row;}</style>';
		}

		if( $variable !== 'not installed' && $variable !== 'unactivated') {
			if (function_exists(gard_check_license)) {
				if(gard_check_license() == TRUE) {
					// echo "gard_check_license Passed <br/>";				
					echo gard_check_license(TRUE);
				} elseif(gard_check_license() == FALSE) {
					echo "<br/><b>GARD Pro installed, but no valid license found. <a href='admin.php?page=gard-pro'>Activate your license.</a></b><br/>";	
				}
			}
		} elseif ( $variable == "unactivated" ) {
			echo "<br/>GARD Pro installed, but not the plugin isn't activated. <a href='plugins.php'>Activate GARD Pro</a>.";
		} else {
			echo "<br/><br/><b>Upgrade to <a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'>GARD Pro</a> today</b>:
			<ul style='list-style: disc;margin-left:50px;width: 360px;'>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Custom Shortcode</b></a> - You can pick any shortcode you'd like to display your ads.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Auto Insert GARD</b></a> - Automatically insert ads in ALL old posts after X number of paragraphs.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>GARD Widget</b></a> - Use responsive ads where ever you can use a widget! Also show to guests only, or everyone!</li>
			</ul>";
		}
	?>
		</td>
		<td style="vertical-align:top; padding-left:15px;padding-top: 15px;">
       			<?php if(!$var) { ?>
       				<a href="http://thedigitalhippies.com/gardpro" style='text-align: center;width: 100%;display: block;font-size: 20px;margin-top: 28px;color: #c00;font-weight: bold;'>Upgrade to GARD Pro Today!<br/><img src="<?php echo $pluginurl; ?>pro.png" style="margin: 17px 0 0 4px"/></a>
    				<h2><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'>Upgrade to GARD Pro!</a></h2>
			<ul style='list-style: disc;margin-left:50px;width: 360px;'>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Custom Shortcode</b></a> - You can pick any shortcode you'd like to display your ads.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Auto Insert GARD</b></a> - Automatically insert ads in ALL old posts after X number of paragraphs.</li>
				<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>GARD Widget</b></a> - Use responsive ads where ever you can use a widget! Also show to guests only, or everyone!</li>
			</ul>
				<?php } ?>
    			<a style="display: initial !important;" href="http://secure.hostgator.com/~affiliat/cgi-bin/affiliates/clickthru.cgi?id=416BC-">
    				<h3>WordPress Hosting - Starting @ $3.96</h3></a>
    				<ul class="smallgray">
    					<li>Unlimited Blogs.</li>
    					<li>1 Click Auto Installs.</li>
    				</ul>
    		<? /*
    			<a style="display: initial !important;" href="https://managewp.com/?utm_source=A&utm_medium=Link&utm_campaign=A&utm_mrl=876">
    				<h3>ManageWP</h3></a>
    				<ul class="smallgray">
    					<li>The easiest way to manage all of your WordPress sites.</li>
    					<li>Access, manage, update, and backup all your WordPress sites from one powerful dashboard.</li>
    				</ul>

    			<a style="display: initial !important;" href='http://premium.wpmudev.org?ref=416bc-17527'>
    				<h3>WPMUDEV</h3></a>
    				<ul class="smallgray">
    					<li>There´s a WPMU DEV plugin for everything your clients can dream up</li>
						<li>Hundreds of amazing WordPress plugins and themes you'll love starting at just $9.</li>
					</ul>

    			<a style="display: initial !important;" href='http://www.amazon.com/gp/product/0615684742/ref=as_li_ss_tl?ie=UTF8&camp=1789&creative=390957&tag=tdhplugin-20&creativeASIN=0615684742&linkCode=as2'>
    				<h3>WordPress Revealed</h3></a>
    				<ul class="smallgray">
    					<li>How to Build a Website, Get Visitors and Make Money</li>
						<li>#1 Bestseller on Amazon!</li>
					</ul>
			*/ ?>
		</td>
		</tr>
	</table>
	</form>	
</div>
<script type="text/javascript">
	jQuery(function ($) {
		$('#hidebutton').click(
			function() {
				hidden = $('.hideoptions');
				hidden.toggle();
			    
			    if ($(this).val() == 'Show Unused Sizes') {
			        $(this).val('Hide Unused Sizes');
			    } else if ($(this).val() == 'Hide Unused Sizes') {
			        $(this).val('Show Unused Sizes');
			    }

			    return false;
		});



		$(document).keydown(function(event) {
			if (!( String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19)) return true;
			$("#submit").click();
			event.preventDefault();
			return false;
		});




		$('.hideparent').click(
			function() {
				$(this).closest('td').find('.hidechild').slideToggle('slow');
			    
			    if ($(this).html() == 'Show Known Issues') {
			        $(this).html('Hide Known Issues');
			    } else if ($(this).html() == 'Hide Known Issues') {
			        $(this).html('Show Known Issues');
			    }

			    if ($(this).text() == 'Show Examples & Tips') {
			        $(this).text('Hide Examples & Tips');
			    } else if ($(this).text() == 'Hide Examples & Tips') {
			        $(this).text('Show Examples & Tips');
			    }

			    return false;

		});

		temp = $("input[name='GARD_AUTO_INSERT']").val();
		if (temp == 'random') {
			$("#GARD_AUTO_INSERT_COUNT").css('display','table-row');
		}


		$("input[name='GARD_AUTO_INSERT']").keyup(function(){
			val = $(this).val();


			if (val == 'random') {
			   $("#GARD_AUTO_INSERT_COUNT").fadeIn('slow');
			   // $("#GARD_AUTO_INSERT_COUNT").css('display','table-row');
			} else {
			   $("#GARD_AUTO_INSERT_COUNT").fadeOut('slow');
			   // $("#GARD_AUTO_INSERT_COUNT").css('display','none');
			}
			return false;
		});


	});
</script>