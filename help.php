<?php 
	wp_enqueue_script('jquery');

#

	if(get_option('GARD_HELP')) {
		$GARD_HELP = "checked"; 
		$permission = TRUE;
	} else {
		$GARD_HELP = "";
	}

#		

	$opt_name = 'GARD_HELP';
	$hidden_field_name = '_wp_http_referer';
	$data_field_name = 'GARD_HELP';
	$opt_val = get_option( $opt_name );

	if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {

		$checked = $_POST[ $opt_name ];

		if( $checked == 1 ) {
			$GARD_HELP = "checked"; 
			$permission = TRUE;
		} else {
			$GARD_HELP = "";
			$permission = 0;
		}

	    // Read their posted value
	    $opt_val = $_POST[ $data_field_name ];

	    // Save the posted value in the database
	    update_option( $opt_name, $opt_val );
	}
?>

<div class="wrap">
	<?php screen_icon('plugins'); ?>
	<h2>Google Adsense for Responsive Design &raquo; Help</h2>


	<form method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form" class="help_page">
		<?php settings_fields($plugin_id.'_options'); ?>

				<table class="widefat" style="width:420px;margin: 15px 0;">
					<thead>
						<tr>
							<th colspan="2"><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								Video:
							</td>
							<td style="vertical-align:middle;">
								<a href="https://www.youtube.com/watch?v=occtczPSx1g" target="_blank">Google AdSense for Responsive Design - GARD Overview</a>
							</td>
						</tr>
						<tr>
							<td>
								Support:
							</td>
							<td style="vertical-align:middle;">
								<a href='http://thedigitalhippies.com/pluginsupport' title='The Digital Hippies Plugin Support Forums' target='_blank'>The Digital Hippies Plugin Support Forums</a>
							</td>
						</tr>
						<tr>
							<td>
								Instructions:
							</td>
							<td style="vertical-align:middle;">
								<ol>
									<li>Install and activate the plugin. <span style="color:green">[DONE]</span]</li>
									<li>Configure the settings <a href='admin.php?page=GARD'><b>here</b></a>.</li>
									<li>Place the shortcode [GARD] in your posts or pages.</li>
									<li>Profit!!!!</li>
								</ol>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="vertical-align:middle;">
								<input type='checkbox' name='GARD_HELP' value='1' <?php echo $GARD_HELP; ?> /> Want to watch the training video here?
								<br/><b>You must grant permission to view videos embeded on this page.</b>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2"><input type="submit" name="submit" value="Save Settings" class="button-primary" /></th>
						</tr>
					</tfoot>
				</table>
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
	</form>

		<?php
			if($permission) { ?>
				<div style="border: 1px solid gray;width:800px;margin: 15px 0 10px 0;">
					<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;"><h2>Google AdSense for Responsive Design - GARD Overview</h2></span>
					<iframe width="800" height="600" src="//www.youtube.com/embed/occtczPSx1g?rel=0" frameborder="0" allowfullscreen></iframe><br/>
					<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;margin-top: -4px;">This video covers everything from initial installation, to inserting the shortcode into your posts.</span>
				</div>
		<?	} ?>

	<? if( function_exists(gard_check_license) && !gard_check_license()) { ?>

		<?php screen_icon('themes'); ?>
		<a href="http://thedigitalhippies.com/gardpro" target="_blank"><h2>Click Here to Check Out GARD Pro</h2></a>
		<a href="http://thedigitalhippies.com/gardpro" target="_blank"><img src="<?php echo plugin_dir_url(__FILE__); ?>pro.png" style="margin: 17px 0 0 75px"/></a><br/>
		<ul style='list-style: disc;margin-left:50px;width: 360px;'>
			<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Custom Shortcode</b></a> - You can pick any shortcode you'd like to display your ads.</li>
			<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>Auto Insert GARD</b></a> - Automatically insert ads in ALL old posts after X number of paragraphs.</li>
			<li><a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro'><b>GARD Widget</b></a> - Use responsive ads where ever you can use a widget! Also show to guests only, or everyone!</li>
		</ul>
		<a href='http://thedigitalhippies.com/gardpro' target='_blank' title='GARD Pro' class="button-primary" style="margin: 0 0 0 50px">GO PRO!</a>

	<?	} ?>
