<?php 
wp_enqueue_script('jquery');

if(get_option('GARD_HELP')) {
	$GARD_HELP = "checked"; 
	$permission = TRUE;
} else {
	$GARD_HELP = "";
}

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

if(strlen(get_option('GARD_ID')) <= 0) {
	$step1 = "<span style='color:orange'>[PENDING]</span>";
} else {
	$step1 = "<span style='color:green'>[DONE]</span>";
}
?>
<div class="wrap">
	<?php screen_icon('plugins'); ?>
	<h2>Google Adsense for Responsive Design v<?php echo GARDPLUGINOPTIONS_VER ?> &raquo; Help</h2>
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content" style="margin-right: 13px;">
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column" style="width: 100%;">
					<table>
					<tbody>
					<tr style="vertical-align:top; width:100px;">
						<td>
							Installation:
						</td>
						<td style="vertical-align:middle;">
							 Install and activate the plugin. <span style="color:green">[DONE]</span><br/>
							<a href='admin.php?page=gard'>Configure the settings here</a>. <?php echo $step1; ?>
							<br/>
							Place the shortcode [GARD] in your posts or pages.<br/>
							Profit!!!
						</td>
					</tr>
					<tr style="vertical-align:top; width:100px;">
						<td>
							Usage:
						</td>
						<td style="vertical-align:middle;">
							<b>Basic Usage</b><br/>
							Simply type the text [GARD] in your content anywhere you would like an ad to appear. (Assuming of course you've configured GARD properly)<br/>
							<b>Aligning Ads</b><br/>
							If you would like your ads to align left, use the shortcode [GARD align="left"]. The same is true for center and right.<br/>
							Samples:<br/>
							[GARD] will not center or wrap text.<br/>
							[GARD align="left"] will make your ad align left and text wrap around it.<br/>
							[GARD align="center"] will make your ad centered and text wrap NOT around it.<br/>
							[GARD align="right"] will make your ad align right and text wrap around it.<br/>
						</td>
					</tr>
					<tr style="vertical-align:top; width:100px;">
						<td>
							Support:
						</td>
						<td style="vertical-align:middle;">
							<?php echo GARD_PLUGIN_SUPPORT_LINK; ?>
						</td>
					</tr>
					<tr style="vertical-align:top; width:100px;display:none">
						<td>
							Videos:
						</td>
						<td style="vertical-align:middle;">
							<a href="https://www.youtube.com/watch?v=occtczPSx1g" target="_blank">Google AdSense for Responsive Design - GARD Overview</a><br/><br/>
							<form method="post" id="<?php echo $plugin_id; ?>
								_options_form" name="<?php echo $plugin_id; ?>
								_options_form" class="help_page"> <?php settings_fields($plugin_id.'_options'); ?>
								<input type='checkbox' name='GARD_HELP' class='GARD_HELP' value='1' <?php echo $gard_help; ?> /> Want to watch the training videos here? <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
							</form>
						</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php
if( isset($permission) && $permission ) { ?>
	<div style="border: 1px solid gray;width:800px;margin: 15px 0 10px 0;">
		<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;">
		<h2>Google AdSense for Responsive Design - GARD Overview</h2>
		</span>
		<iframe width="800" height="600" src="//www.youtube.com/embed/occtczPSx1g?rel=0" frameborder="0" allowfullscreen>
		</iframe>
		<br/>
		<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;margin-top: -4px;">This video covers everything from initial installation, to inserting the shortcode into your posts.</span>
	</div>
	<br/>
	<div style="border: 1px solid gray;width:800px;margin: 15px 0 10px 0;">
		<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;">
		<h2>GARD Pro WordPress Plugin Version 1.0 Overview</h2>
		</span>
		<iframe width="800" height="600" src="//www.youtube.com/embed/BXV1RZrgkBQ?rel=0" frameborder="0" allowfullscreen>
		</iframe>
		<br/>
		<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;margin-top: -4px;">This video covers GARD Pro, it's features and usage instructions.</span>
	</div>
	<br/>
	<div style="border: 1px solid gray;width:800px;margin: 15px 0 10px 0;">
		<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;">
		<h2>Google AdSense for Responsive Design - GARD Overview</h2>
		</span>
		<iframe width="800" height="600" src="//www.youtube.com/embed/_Ub3PqpLgf4?rel=0" frameborder="0" allowfullscreen>
		</iframe>
		<br/>
		<span style="width:800px;text-align:center;display: block;font-weight: bold;font-size: 13px;background: lightblue;padding: 20px 0;margin-top: -4px;">This video covers troubleshooting. You will find out what to do if your ads don't resize properly, and which plugin might be causing it.</span>
	</div>
	<br/>
	<?php
} ?>
	
</div>
<script type="text/javascript">
jQuery(function ($) {
$('.GARD_HELP').mouseup(function() {
setTimeout(function (){
$('.help_page').submit();
         }, 125);
});
});</script>