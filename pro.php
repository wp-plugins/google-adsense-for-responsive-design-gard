<?php 
wp_enqueue_script( 'jquery' );

	function _import_gard_settings(){
		global $adsizes;
		global $wpdb;

		$GARD_ID = $wpdb->get_results("SELECT  `option_value` FROM  $wpdb->options WHERE  `option_name` =  'GARD_ID' LIMIT 0 , 30 "); 
		$GARD_ID = $GARD_ID[0]->option_value;

		foreach ($adsizes as $key => $size) {
			$result = $wpdb->get_results("SELECT  `option_value` FROM  `wp_options` WHERE  `option_name` = 'GARD_{$key}' ");
			$GARD_[$key] = $result[0]->option_value; 
			update_option('GARD_PRO_DEMO_GROUP_5_'.$key, $result[0]->option_value);

		}

		update_option('GARD_PRO_DEMO_GROUP_5_NAME', "Imported Settings");
		update_option('GARD_PRO_DEMO_GROUP_5_SC', "");
		update_option('GARD_PRO_DEMO_GROUP_5_ID', $GARD_ID);

		if (isset($_GET['debug'])) {
			echo "Debug, settings dump:<br>GARD_ID: $GARD_ID <br> Ad Settings: <pre>".print_r($GARD_, true)."</pre>";
		}
		echo "done.";
	}

if (isset($_GET['_import_gard_settings'])) {
	_import_gard_settings();
}
?>
<div id="Demo">
	<h1>WORKING DEMO</h1>
	<h3>All changes will not be saved</h3>

	<?php 

	echo get_option('GARD_PRO_DEMO_AUTO_INSERT_1'); 

	// '\), "(5)" \); \> value="(.*?)"

	?>

	
	<form method="post" action="options.php" id="<?php echo $MAA_vars['OPTIONS_ID']; ?>_options_form" name="<?php echo $MAA_vars['OPTIONS_ID']; ?>_options_form">
	
	<?php settings_fields(GARDPLUGINOPTIONS_ID.'_options'); ?>

	<div id="wpbody-content" aria-label="Main content" tabindex="0">
			<div id="screen-meta" class="metabox-prefs">

				<div id="contextual-help-wrap" class="hidden no-sidebar" tabindex="-1" aria-label="Contextual Help Tab">
					<div id="contextual-help-back"></div>
					<div id="contextual-help-columns">
						<div class="contextual-help-tabs">
							<ul>
													</ul>
						</div>

						
						<div class="contextual-help-tabs-wrap">
												</div>
					</div>
				</div>
			</div>
	<style type="text/css">
		/* #GARD_WINDOW {display: none;} */
		/* .hiddenfields {display:none;} REMOVED ABILITY TO HIDE AD SIZES */
			td.indented {
			padding-left:20px;
		}
		.smallgray {
			font-size: 12px;
			color: #757575;
			margin-left: 23px;
			list-style-type: square;
		}
		#GARD_PRO_DEMO_tabs {
			width: 100%;
			padding-right: 2px;
			padding-left: 10px;
		}

		#GARD_PRO_DEMO_tabs li {
			float:left; 
			list-style:none; 
			border-top:1px solid #ccc; 
			border-left:1px solid #ccc; 
			border-right:1px solid #ccc; 
			margin-right:5px; 
			border-top-left-radius:3px;  
			border-top-right-radius:3px;
			outline:none;
			margin-bottom: -1px;
			cursor: pointer;
			width: 77px;
			text-align: center;
			height: 43px;
			overflow: hidden;
		}

		#GARD_PRO_DEMO_tabs li a {

			font-family:Arial, Helvetica, sans-serif; 
			font-size: small;
			font-weight: bold; 
			color: #21759b;;
			padding-top: 5px;
			padding-left: 7px;
			padding-right: 7px;
			padding-bottom: 8px; 
			display:block; 
			background: #FFF;
			border-top-left-radius:3px; 
			border-top-right-radius:3px; 
			text-decoration:none;
			outline:none;

		}

		#GARD_PRO_DEMO_tabs li a.inactive{
			padding-top:5px;
			padding-bottom:8px;
			padding-left: 8px;
			padding-right: 8px;
			color:#666666;
			background: #EEE;
			outline:none;
			border-bottom: solid 1px #CCC;

		}

		#GARD_PRO_DEMO_tabs li a:hover, #GARD_PRO_DEMO_tabs li a.inactive:hover {
			color: #21759b;
			outline:none;
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

		.video16 {
			background: url('http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png') no-repeat;
			padding-left: 29px;
			 -khtml-opacity:.40; 
			 -moz-opacity:.40; 
			 -ms-filter:"alpha(opacity=40)";
			  filter:alpha(opacity=40);
			  filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.4);
			  opacity:.40; 
		}
		.fullcolor {
			 -khtml-opacity:1.0; 
			 -moz-opacity:1.0; 
			 -ms-filter:"alpha(opacity=100)";
			  filter:alpha(opacity=100);
			  filter: progid:DXImageTransform.Microsoft.Alpha(opacity=1.0);
			  opacity:1.0; 		
		}

		.grouptitle {
			font-size: 10px;
			color: gray;
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

		#adoptions td {border:none;}
		
		.samplediv {
			/*
			float: right;
			margin-top: -35px;
			*/
			margin-bottom: 7px;
		}
		.hidden {display: none !important;}
	</style>
	<div class="wrap">
		<div id="icon-plugins" class="icon32"><br></div>	
		
		<h2>GARD Pro v2.3.1 » Settings</h2>

		<div id="GARD_WINDOW">
			<table>
			<tbody><tr>
			<td style="vertical-align:top;min-width: 535px;">
				<ul id="GARD_PRO_DEMO_tabs">
					<li><a rel="GLOBAL" id="global" class="active">Global Settings</a></li>
					<li><a rel="1" id="group1" class="inactive">Group 1 <br><span class="grouptitle">&nbsp;</span></a></li>
					<li><a rel="2" id="group2" class="inactive">Group 2 <br><span class="grouptitle">&nbsp;</span></a></li>
					<li><a rel="3" id="group3" class="inactive">Group 3 <br><span class="grouptitle">&nbsp;</span></a></li>
					<li><a rel="4" id="group4" class="inactive">Group 4 <br><span class="grouptitle">&nbsp;</span></a></li>
					<li><a rel="5" id="group5" class="inactive">Group 5 <br><span class="grouptitle">&nbsp;</span></a></li>
				</ul>
				<div class="container" id="globalC" style="display: block;"><table class="widefat" style="margin-bottom: 20px;">
					<thead>
							<tr><th><input type="submit" name="submit" value="Save Settings" class="button-primary"></th>
							<th colspan="2" style="text-align:right">Global Settings</th>
					   </tr>
					</thead>
					<tbody>


					   <tr>
						 <td style="vertical-align:middle;">
							 <label for="GARD_PRO_DEMO_GROUP__CLONE">
								 Global Settings Mode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<input type="button" name="submit" id="basic_mode" value="BASIC MODE" class="button-secondary"> 
							<input type="button" name="submit" id="advanced_mode" value="ADVANCED MODE" class="button-primary">
							<input type="checkbox" value="1" name="GARD_PRO_DEMO_ADVANCED_MODE"  <?php checked( get_option('GARD_PRO_DEMO_ADVANCED_MODE'), 1 ); ?>   id="GARD_PRO_DEMO_ADVANCED_MODE" class="hidden">
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr>


					   <tr>
						 <td style="vertical-align:middle;">
							 <label for="GARD_PRO_DEMO_GROUP__CLONE">
								 Clone Ad Group Settings:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<select id="clonefrom">
								<option value="1">Group 1</option>
								<option value="2">Group 2</option>
								<option value="3">Group 3 </option>
								<option value="4">Group 4</option>
								<option value="5">Group 5</option>
							</select>
							 to 
							<select id="cloneto">
								<option value="1">Group 1</option>
								<option value="2">Group 2</option>
								<option value="3">Group 3 </option>
								<option value="4">Group 4</option>
								<option value="5">Group 5</option>
							</select>

							<input type="submit" name="submit" id="clone" value="CLONE NOW" class="button-primary">
						 </td>
						 
					   </tr>
					<tr>
							 <td style="vertical-align:middle;">
								Auto insert
							</td>
							 <td style="vertical-align:middle;min-width: 290px;">Insert
								<select name="GARD_PRO_DEMO_AUTO_INSERT_1">
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), '' ); ?>>Select</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), "random" ); ?> value="random">Random</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), "1" ); ?> value="1">Group 1</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), "2" ); ?> value="2">Group 2</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), "3" ); ?> value="3">Group 3</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), "4" ); ?> value="4">Group 4</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1'), "5" ); ?> value="5">Group 5</option>
								</select> 
							
							<select name="GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH">
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "" ); ?>>Select</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "random" ); ?> value="random">Random</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "0" ); ?> value="0">before the first paragraph</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "1" ); ?> value="1">after paragraph 1</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "2" ); ?> value="2">after paragraph 2</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "3" ); ?> value="3">after paragraph 3</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "4" ); ?> value="4">after paragraph 4</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "5" ); ?> value="5">after paragraph 5</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "6" ); ?> value="6">after paragraph 6</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "7" ); ?> value="7">after paragraph 7</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "8" ); ?> value="8">after paragraph 8</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "9" ); ?> value="9">after paragraph 9</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "10" ); ?> value="10">after paragraph 10</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "11" ); ?> value="11">after paragraph 11</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "12" ); ?> value="12">after paragraph 12</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "13" ); ?> value="13">after paragraph 13</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "14" ); ?> value="14">after paragraph 14</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "15" ); ?> value="15">after paragraph 15</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "16" ); ?> value="16">after paragraph 16</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "17" ); ?> value="17">after paragraph 17</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "18" ); ?> value="18">after paragraph 18</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "19" ); ?> value="19">after paragraph 19</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "20" ); ?> value="20">after paragraph 20</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "21" ); ?> value="21">after paragraph 21</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "22" ); ?> value="22">after paragraph 22</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "23" ); ?> value="23">after paragraph 23</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "24" ); ?> value="24">after paragraph 24</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "25" ); ?> value="25">after paragraph 25</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_1_PARAGRAPH'), "last" ); ?> value="last">after the last paragraph</option>
							</select><br>Insert
								<select name="GARD_PRO_DEMO_AUTO_INSERT_2">
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "" ); ?>>Select</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "random" ); ?> value="random">Random</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "1" ); ?> value="1">Group 1</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "2" ); ?> value="2">Group 2</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "3" ); ?> value="3">Group 3</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "4" ); ?> value="4">Group 4</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2'), "5" ); ?> value="5">Group 5</option>
								</select> 
							
							<select name="GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH">
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "" ); ?>>Select</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "random" ); ?> value="random">Random</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "0" ); ?> value="0">before the first paragraph</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "1" ); ?> value="1">after paragraph 1</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "2" ); ?> value="2">after paragraph 2</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "3" ); ?> value="3">after paragraph 3</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "4" ); ?> value="4">after paragraph 4</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "5" ); ?> value="5">after paragraph 5</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "6" ); ?> value="6">after paragraph 6</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "7" ); ?> value="7">after paragraph 7</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "8" ); ?> value="8">after paragraph 8</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "9" ); ?> value="9">after paragraph 9</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "10" ); ?> value="10">after paragraph 10</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "11" ); ?> value="11">after paragraph 11</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "12" ); ?> value="12">after paragraph 12</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "13" ); ?> value="13">after paragraph 13</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "14" ); ?> value="14">after paragraph 14</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "15" ); ?> value="15">after paragraph 15</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "16" ); ?> value="16">after paragraph 16</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "17" ); ?> value="17">after paragraph 17</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "18" ); ?> value="18">after paragraph 18</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "19" ); ?> value="19">after paragraph 19</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "20" ); ?> value="20">after paragraph 20</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "21" ); ?> value="21">after paragraph 21</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "22" ); ?> value="22">after paragraph 22</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "23" ); ?> value="23">after paragraph 23</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "24" ); ?> value="24">after paragraph 24</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "25" ); ?> value="25">after paragraph 25</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_2_PARAGRAPH'), "last" ); ?> value="last">after the last paragraph</option>
							</select><br>Insert
								<select name="GARD_PRO_DEMO_AUTO_INSERT_3">
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "" ); ?>>Select</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "random" ); ?> value="random">Random</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "1" ); ?> value="1">Group 1</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "2" ); ?> value="2">Group 2</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "3" ); ?> value="3">Group 3</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "4" ); ?> value="4">Group 4</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3'), "5" ); ?> value="5">Group 5</option>
								</select> 
							
							<select name="GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH">
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "" ); ?>>Select</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "random" ); ?> value="random">Random</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "0" ); ?> value="0">before the first paragraph</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "1" ); ?> value="1">after paragraph 1</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "2" ); ?> value="2">after paragraph 2</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "3" ); ?> value="3">after paragraph 3</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "4" ); ?> value="4">after paragraph 4</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "5" ); ?> value="5">after paragraph 5</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "6" ); ?> value="6">after paragraph 6</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "7" ); ?> value="7">after paragraph 7</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "8" ); ?> value="8">after paragraph 8</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "9" ); ?> value="9">after paragraph 9</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "10" ); ?> value="10">after paragraph 10</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "11" ); ?> value="11">after paragraph 11</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "12" ); ?> value="12">after paragraph 12</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "13" ); ?> value="13">after paragraph 13</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "14" ); ?> value="14">after paragraph 14</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "15" ); ?> value="15">after paragraph 15</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "16" ); ?> value="16">after paragraph 16</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "17" ); ?> value="17">after paragraph 17</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "18" ); ?> value="18">after paragraph 18</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "19" ); ?> value="19">after paragraph 19</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "20" ); ?> value="20">after paragraph 20</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "21" ); ?> value="21">after paragraph 21</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "22" ); ?> value="22">after paragraph 22</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "23" ); ?> value="23">after paragraph 23</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "24" ); ?> value="24">after paragraph 24</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "25" ); ?> value="25">after paragraph 25</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_3_PARAGRAPH'), "last" ); ?> value="last">after the last paragraph</option>
							</select><br>Insert
								<select name="GARD_PRO_DEMO_AUTO_INSERT_4">
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "" ); ?>>Select</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "random" ); ?> value="random">Random</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "1" ); ?> value="1">Group 1</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "2" ); ?> value="2">Group 2</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "3" ); ?> value="3">Group 3</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "4" ); ?> value="4">Group 4</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4'), "5" ); ?> value="5">Group 5</option>
								</select> 
							
							<select name="GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH">
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "" ); ?>>Select</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "random" ); ?> value="random">Random</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "0" ); ?> value="0">before the first paragraph</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "1" ); ?> value="1">after paragraph 1</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "2" ); ?> value="2">after paragraph 2</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "3" ); ?> value="3">after paragraph 3</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "4" ); ?> value="4">after paragraph 4</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "5" ); ?> value="5">after paragraph 5</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "6" ); ?> value="6">after paragraph 6</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "7" ); ?> value="7">after paragraph 7</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "8" ); ?> value="8">after paragraph 8</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "9" ); ?> value="9">after paragraph 9</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "10" ); ?> value="10">after paragraph 10</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "11" ); ?> value="11">after paragraph 11</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "12" ); ?> value="12">after paragraph 12</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "13" ); ?> value="13">after paragraph 13</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "14" ); ?> value="14">after paragraph 14</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "15" ); ?> value="15">after paragraph 15</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "16" ); ?> value="16">after paragraph 16</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "17" ); ?> value="17">after paragraph 17</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "18" ); ?> value="18">after paragraph 18</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "19" ); ?> value="19">after paragraph 19</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "20" ); ?> value="20">after paragraph 20</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "21" ); ?> value="21">after paragraph 21</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "22" ); ?> value="22">after paragraph 22</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "23" ); ?> value="23">after paragraph 23</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "24" ); ?> value="24">after paragraph 24</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "25" ); ?> value="25">after paragraph 25</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_4_PARAGRAPH'), "last" ); ?> value="last">after the last paragraph</option>
							</select><br>Insert
								<select name="GARD_PRO_DEMO_AUTO_INSERT_5">
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "" ); ?>>Select</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "random" ); ?> value="random">Random</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "1" ); ?> value="1">Group 1</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "2" ); ?> value="2">Group 2</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "3" ); ?> value="3">Group 3</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "4" ); ?> value="4">Group 4</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5'), "5" ); ?> value="5">Group 5</option>
								</select> 
							
							<select name="GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH">
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "" ); ?>>Select</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "random" ); ?> value="random">Random</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "0" ); ?> value="0">before the first paragraph</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "1" ); ?> value="1">after paragraph 1</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "2" ); ?> value="2">after paragraph 2</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "3" ); ?> value="3">after paragraph 3</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "4" ); ?> value="4">after paragraph 4</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "5" ); ?> value="5">after paragraph 5</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "6" ); ?> value="6">after paragraph 6</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "7" ); ?> value="7">after paragraph 7</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "8" ); ?> value="8">after paragraph 8</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "9" ); ?> value="9">after paragraph 9</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "10" ); ?> value="10">after paragraph 10</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "11" ); ?> value="11">after paragraph 11</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "12" ); ?> value="12">after paragraph 12</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "13" ); ?> value="13">after paragraph 13</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "14" ); ?> value="14">after paragraph 14</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "15" ); ?> value="15">after paragraph 15</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "16" ); ?> value="16">after paragraph 16</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "17" ); ?> value="17">after paragraph 17</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "18" ); ?> value="18">after paragraph 18</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "19" ); ?> value="19">after paragraph 19</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "20" ); ?> value="20">after paragraph 20</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "21" ); ?> value="21">after paragraph 21</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "22" ); ?> value="22">after paragraph 22</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "23" ); ?> value="23">after paragraph 23</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "24" ); ?> value="24">after paragraph 24</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "25" ); ?> value="25">after paragraph 25</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_5_PARAGRAPH'), "last" ); ?> value="last">after the last paragraph</option>
							</select><br>Insert
								<select name="GARD_PRO_DEMO_AUTO_INSERT_6">
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "" ); ?>>Select</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "random" ); ?> value="random">Random</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "1" ); ?> value="1">Group 1</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "2" ); ?> value="2">Group 2</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "3" ); ?> value="3">Group 3</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "4" ); ?> value="4">Group 4</option>
									<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6'), "5" ); ?> value="5">Group 5</option>
								</select> 
							
							<select name="GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH">
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "" ); ?>>Select</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "random" ); ?> value="random">Random</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "0" ); ?> value="0">before the first paragraph</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "1" ); ?> value="1">after paragraph 1</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "2" ); ?> value="2">after paragraph 2</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "3" ); ?> value="3">after paragraph 3</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "4" ); ?> value="4">after paragraph 4</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "5" ); ?> value="5">after paragraph 5</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "6" ); ?> value="6">after paragraph 6</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "7" ); ?> value="7">after paragraph 7</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "8" ); ?> value="8">after paragraph 8</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "9" ); ?> value="9">after paragraph 9</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "10" ); ?> value="10">after paragraph 10</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "11" ); ?> value="11">after paragraph 11</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "12" ); ?> value="12">after paragraph 12</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "13" ); ?> value="13">after paragraph 13</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "14" ); ?> value="14">after paragraph 14</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "15" ); ?> value="15">after paragraph 15</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "16" ); ?> value="16">after paragraph 16</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "17" ); ?> value="17">after paragraph 17</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "18" ); ?> value="18">after paragraph 18</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "19" ); ?> value="19">after paragraph 19</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "20" ); ?> value="20">after paragraph 20</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "21" ); ?> value="21">after paragraph 21</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "22" ); ?> value="22">after paragraph 22</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "23" ); ?> value="23">after paragraph 23</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "24" ); ?> value="24">after paragraph 24</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "25" ); ?> value="25">after paragraph 25</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_AUTO_INSERT_6_PARAGRAPH'), "last" ); ?> value="last">after the last paragraph</option>
							</select><br>
											<a href="#" class="hideparent" style="font-size:11px;padding-right: 5px;">Show Examples &amp; Tips</a>
											<br><span class="hidechild" style="width:300px;float: left;text-align: left;font-size:11px;padding-right: 5px;display:none">
												Selecting paragraph 0 (Zero) will insert an ad BEFORE the first paragraph.<br>
												Leave all options set to 'Select' to not insert any ads.</span>
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
											<a class="fancybox-media hoverZoomLink" href="http://youtu.be/ddU4MCJW7Ug" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
										 </td>
									   </tr>

									   <tr>
										 <td style="vertical-align:middle;">
											 <label>
												 Auto insert into which post type(s):
											 </label>
										 </td>
										 <td style="vertical-align:middle;">
											  <input type="checkbox" value="1" name="GARD_PRO_DEMO_AUTO_INSERT_POST"  <?php checked( get_option('GARD_PRO_DEMO_AUTO_INSERT_POST'), 1 ); ?>     > Post<br>
											  <input type="checkbox" value="1" name="GARD_PRO_DEMO_AUTO_INSERT_PAGE"  <?php checked( get_option('GARD_PRO_DEMO_AUTO_INSERT_PAGE'), 1 ); ?>     > Page
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
											<a class="fancybox-media hoverZoomLink" href="http://youtu.be/uhUKKvf9gnE" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;">
											 <label>
												 Remove yellow background?:
											 </label>
										 </td>
										 <td style="vertical-align:middle;">
											<input type="checkbox" value="1" name="GARD_PRO_DEMO_CLEAR_INS"  <?php checked( get_option('GARD_PRO_DEMO_CLEAR_INS'), 1 ); ?>     > Remove yellow background from placeholders.
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;">
											 <label>Asynchronous AdSense <span style="color:orange">[BETA]</span>:
											 </label>
										 </td>
										 <td style="vertical-align:middle;">
											<input type="checkbox" value="1" name="GARD_PRO_DEMO_ASYNC"  <?php checked( get_option('GARD_PRO_DEMO_ASYNC'), 1 ); ?>     > Enable Asynchronous AdSense.
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;">
											 <label>Disable ad count policy enforcement?
											 </label>
										 </td>
										 <td style="vertical-align:middle;">
											<input type="checkbox" value="1" name="GARD_PRO_DEMO_DISABLE_GARD_CHECK"  <?php checked( get_option('GARD_PRO_DEMO_DISABLE_GARD_CHECK'), 1 ); ?>     > Yes, I will manage my own ad count per page.
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;">
											 <label>Disable GARD Pro CSS file generation?
											 </label>
										 </td>
										 <td style="vertical-align:middle;">
											<input type="checkbox" value="1" name="GARD_PRO_DEMO_DISABLE_CUSTOM_CSS"  <?php checked( get_option('GARD_PRO_DEMO_DISABLE_CUSTOM_CSS'), 1 ); ?>      > Yes, do not create  any additional CSS files.
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;">
											 <label>Define custom paragraph separators?
											 </label>
										 </td>
										 <td style="vertical-align:middle;">
											Yes, use <input type="textbox" name="GARD_PRO_DEMO_CUSTOM_DELIMITER"   value="<?php echo get_option('GARD_PRO_DEMO_CUSTOM_DELIMITER'); ?>" maxlength="15" style="width:60px;"> to define my paragraphs.
											<br>Enter the tag only, and not the brackets.
											<br>For example &lt;h2&gt; becomes just h2
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;min-width:255px;" colspan="2">
											 <label for="GARD_PRO_DEMO_CSE">
												 Google Custom Search Engine (CSE):
											 </label><br><br>
											 If you have created a custom Google Search Engine and would like to display it
											 <br>in a widget, please paste your code from Google into the box below<br>
											<textarea style="margin-left:20px" name="GARD_PRO_DEMO_CSE" cols="85" rows="3"><?php echo get_option('GARD_PRO_DEMO_CSE'); ?></textarea>
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;min-width:255px;" colspan="2">
											 <label for="GARD_PRO_DEMO_FILTER_COUNT">
												 Post Filtering:
											 </label><br><br>
											 Don't show ads if any of the below words appear 
											 <select name="GARD_PRO_DEMO_FILTER_COUNT">
												<option <?php selected( get_option('GARD_PRO_DEMO_FILTER_COUNT'), "0" ); ?> value="0">Select</option>
												<option <?php selected( get_option('GARD_PRO_DEMO_FILTER_COUNT'), "1" ); ?> value="1">1 time</option>
												<option <?php selected( get_option('GARD_PRO_DEMO_FILTER_COUNT'), "2" ); ?> value="2">2 times</option>
												<option <?php selected( get_option('GARD_PRO_DEMO_FILTER_COUNT'), "3" ); ?> value="3">3 times</option>
												<option <?php selected( get_option('GARD_PRO_DEMO_FILTER_COUNT'), "4" ); ?> value="4">4 times</option>
												<option <?php selected( get_option('GARD_PRO_DEMO_FILTER_COUNT'), "5" ); ?> value="5">5 times</option>
											</select>
											   or more in a post.<br>
											<textarea style="margin-left:20px" name="GARD_PRO_DEMO_FILTER_WORDS" cols="85" rows="3"><?php echo get_option('GARD_PRO_DEMO_FILTER_WORDS'); ?></textarea>
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
											<a class="fancybox-media hoverZoomLink" href="http://youtu.be/HEmvrl7An2I" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;min-width:255px;" colspan="2">
											 <label for="GARD_PRO_DEMO_FILTER_IP">
												 IP Address / Referral Filtering:
											 </label><br><br>
											 Don't show ads if any of the traffic is from any source below: 
											 <br>
											<textarea style="margin-left:20px" name="GARD_PRO_DEMO_FILTER_IP" cols="85" rows="7"><?php echo get_option('GARD_PRO_DEMO_FILTER_IP'); ?></textarea>
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
											<a class="fancybox-media hoverZoomLink" href="http://youtu.be/0QBr0sLHSYw" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;min-width:255px;" colspan="2">
											 <label for="GARD_PRO_DEMO_EXPORT">
												 Export All Settings:
											 </label><br><br>
											 Copy the following text to your clipboard, and paste it into the import box on your new website: 
											 <br>
											<textarea style="margin-left:20px" name="GARD_PRO_DEMO_EXPORT" cols="85" rows="7"><?php echo get_option('GARD_PRO_DEMO_EXPORT'); ?></textarea>
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>

									   <tr class="advanced">
										 <td style="vertical-align:middle;min-width:255px;" colspan="2">
											 <label for="GARD_PRO_DEMO_IMPORT">
												 Import &amp; <b>OVERWRITE</b> All Settings:
											 </label><br><br>
											 Get the export text from your other website, and paste it into the box below.<br>
											 This <b>OVERWRITES ALL YOUR CURRENT SETTINGS. <span style="color:red">USE WITH CAUTION</span></b>: 
											 <br>
											<textarea style="margin-left:20px" name="GARD_PRO_DEMO_IMPORT" id="GARD_PRO_DEMO_IMPORT" cols="85" rows="7"><?php echo get_option('GARD_PRO_DEMO_IMPORT'); ?></textarea><br>
											<span style="display:block;text-align:center;"><input disabled="" type="submit" id="submit" value="IMPORT NOW" class="button-primary button-red"></span>
										 </td>
										 <td style="vertical-align:middle;text-align:right;"> 
										 </td>
									   </tr>


									</tbody>
									<tfoot>
									   <tr>
										 <th colspan="3"><input type="submit" name="submit" value="Save Settings" class="button-primary"></th>
									   </tr>
									</tfoot>
									</table>
						   </div>
				<div class="container" id="group1C" style="display: none;"><style> .group_1_basic { display:none; } </style>
				<table class="widefat" style="margin-bottom: 20px;">
					<thead>
							<tr><th style="min-width:265px;"><input id="main_submit" type="submit" name="submit" value="Save Settings" class="button-primary">
								<input id="cleargroup1" class=".button button-secondary" style="width: 143px;" value="Clear Group Settings">
								<a class="fancybox-media hoverZoomLink" href="http://youtu.be/mHP-PBDGf0g" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
							</th>
							<th style="text-align:right" colspan="2"></th>
					   </tr>
					</thead>
					<tbody><tr>
							<td style="vertical-align:middle;" colspan="3">
								<b>General Settings For Group 1</b>
							</td>
						</tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_1_ID">
								 Google Adsense Publisher ID: <strong style="color:red;">* Required</strong>
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							pub-<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_ID"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_ID'); ?>" style="padding:5px;">
						 </td>
						 
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_1_NAME">
								 Group Name:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right; min-width:225px;">
							<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_NAME"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_NAME'); ?>" style="padding:5px;">
						 </td>
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_1_MEMBERS_TOO">
								 Show group 1 to logged in users too?
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_MEMBERS_TOO"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_MEMBERS_TOO'), 1 ); ?>      > Yes, show ads to everyone.
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr id="GARD_PRO_DEMO_DEFAULT_FLOAT_1">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_DEFAULT_FLOAT_1">
								 Default Positioning for Group 1:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<select name="GARD_PRO_DEMO_DEFAULT_FLOAT_1" style="margin-left: 15px;">
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_1'), "none" ); ?> value="none">None</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_1'), "left" ); ?> value="left">Aligned Left</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_1'), "center" ); ?> value="center">Centered</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_1'), "right" ); ?> value="right">Aligned Right</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_1'), "random" ); ?> value="random">Random from Above Choices</option>
							</select>
						 </td>
						 </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_1_CLONE">
								 AdSense Setup Mode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<input type="button" name="submit" id="basic_1_mode" value="BASIC MODE" class="button-secondary"> 
							<input type="button" name="submit" id="advanced_1_mode" value="ADVANCED MODE" class="button-primary">
							<input type="checkbox" value="1" name="GARD_PRO_DEMO_ADVANCED_1_MODE"  <?php checked( get_option('GARD_PRO_DEMO_ADVANCED_1_MODE'), 1 ); ?>   id="GARD_PRO_DEMO_ADVANCED_1_MODE"  class="hidden">
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr>
							<td style="vertical-align:middle;" colspan="3" class="group_1_advanced">
								<b>Advanced Settings<b>
							</b></b></td>
						</tr><tr class="group_1_advanced" style="height:70px;">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_1_SC">
								 Group Shortcode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	Default: <input type="textbox" disabled="disabled" value="[gard group='1']"><br>
							Custom: <input type="textbox" name="GARD_PRO_DEMO_GROUP_1_SC"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_SC'); ?>">
							<span class="schide1" style="display:none;width:100%">
							No spaces allowed.<br>
							No brackets [ ] allowed.<br>
							</span>
						 </td>
						 
					   </tr><tr class="group_1_advanced">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_970x90">
												<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_970x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_970x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_728x90">
												<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_728x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_728x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_468x60">
												<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_468x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_468x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_336x280">
												<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_336x280"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_336x280'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_320x50">
												<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_320x50"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_320x50'); ?>" style="padding:5px;">
						<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_300x600">
												<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_300x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_300x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_300x250">
												<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_300x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_300x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_250x250">
												<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_250x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_250x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_234x60">
												<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_234x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_234x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_200x200">
												<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_200x200"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_200x200'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_180x150">
												<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_180x150"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_180x150'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_160x600">
												<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_160x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_160x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_125x125">
												<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_125x125"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_125x125'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_120x600">
												<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_120x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_120x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_120x240">
												<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_120x240"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_120x240'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_728x15">
												<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_728x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_728x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_468x15">
												<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_468x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_468x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_200x90">
												<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_200x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_200x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_180x90">
												<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_180x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_180x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_160x90">
												<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_160x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_160x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_1_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_1_120x90">
												<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_1_120x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_1_120x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr><tr class="group_1_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Basic Settings<b>
							</b></b></td>
						</tr><tr class="group_1_basic" style="height:70px;">
							<td style="vertical-align:middle;" colspan="3">
								<div class="group_1_basic" style="width: 519px;padding-left:15px;text-align:justify;">
								<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don't care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
							</div>
							</td>
						</tr><tr class="group_1_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_970x90_BASIC">
											<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_970x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_970x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_728x90_BASIC">
											<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_728x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_728x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_468x60_BASIC">
											<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_468x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_468x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_336x280_BASIC">
											<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_336x280_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_336x280_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_320x50_BASIC">
											<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_320x50_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_320x50_BASIC'), 1 ); ?>    style="padding:5px;">
					<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_300x600_BASIC">
											<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_300x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_300x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_300x250_BASIC">
											<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_300x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_300x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_250x250_BASIC">
											<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_250x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_250x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_234x60_BASIC">
											<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_234x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_234x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_200x200_BASIC">
											<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_200x200_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_200x200_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_180x150_BASIC">
											<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_180x150_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_180x150_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_160x600_BASIC">
											<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_160x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_160x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_125x125_BASIC">
											<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_125x125_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_125x125_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_120x600_BASIC">
											<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_120x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_120x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_120x240_BASIC">
											<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_120x240_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_120x240_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_728x15_BASIC">
											<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_728x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_728x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_468x15_BASIC">
											<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_468x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_468x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_200x90_BASIC">
											<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_200x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_200x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_180x90_BASIC">
											<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_180x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_180x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_160x90_BASIC">
											<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_160x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_160x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_1_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_1_120x90_BASIC">
											<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_1_120x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_1_120x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
					</tbody>
					<tfoot>
					  <tr>
						<th><input type="submit" id="submit" name="submit" value="Save Settings" class="button-primary"></th>
						<th colspan="2" style="text-align:right;">
						<!-- <input id="hidebutton1" type="button" name="toggle" value="Show Unused Sizes" class="button-secondary" /> -->
						</th>
					  </tr>
					</tfoot>
				</table></div>
				<div class="container" id="group2C" style="display: none;"><style> .group_2_basic { display:none; } </style>
				<table class="widefat" style="margin-bottom: 20px;">
					<thead>
							<tr><th style="min-width:265px;"><input id="main_submit" type="submit" name="submit" value="Save Settings" class="button-primary">
								<input id="cleargroup2" class=".button button-secondary" style="width: 143px;" value="Clear Group Settings">
								<a class="fancybox-media hoverZoomLink" href="http://youtu.be/mHP-PBDGf0g" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
							</th>
							<th style="text-align:right" colspan="2"></th>
					   </tr>
					</thead>
					<tbody><tr>
							<td style="vertical-align:middle;" colspan="3">
								<b>General Settings For Group 2</b>
							</td>
						</tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_2_ID">
								 Google Adsense Publisher ID: <strong style="color:red;">* Required</strong>
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							pub-<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_ID"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_ID'); ?>" style="padding:5px;">
						 </td>
						 
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_2_NAME">
								 Group Name:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right; min-width:225px;">
							<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_NAME"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_NAME'); ?>" style="padding:5px;">
						 </td>
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_2_MEMBERS_TOO">
								 Show group 2 to logged in users too?
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_MEMBERS_TOO"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_MEMBERS_TOO'), 1 ); ?>    > Yes, show ads to everyone.
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr id="GARD_PRO_DEMO_DEFAULT_FLOAT_2">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_DEFAULT_FLOAT_2">
								 Default Positioning for Group 2:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<select name="GARD_PRO_DEMO_DEFAULT_FLOAT_2" style="margin-left: 15px;">
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_2'), "none" ); ?> value="none">None</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_2'), "left" ); ?> value="left">Aligned Left</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_2'), "center" ); ?> value="center">Centered</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_2'), "right" ); ?> value="right">Aligned Right</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_2'), "random" ); ?> value="random">Random from Above Choices</option>
							</select>
						 </td>
						 
						 </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_2_CLONE">
								 AdSense Setup Mode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<input type="button" name="submit" id="basic_2_mode" value="BASIC MODE" class="button-secondary"> 
							<input type="button" name="submit" id="advanced_2_mode" value="ADVANCED MODE" class="button-primary">
							<input type="checkbox" value="1" name="GARD_PRO_DEMO_ADVANCED_2_MODE"  <?php checked( get_option('GARD_PRO_DEMO_ADVANCED_2_MODE'), 1 ); ?>   id="GARD_PRO_DEMO_ADVANCED_2_MODE"  class="hidden">
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr>
							<td style="vertical-align:middle;" colspan="3" class="group_2_advanced">
								<b>Advanced Settings<b>
							</b></b></td>
						</tr><tr class="group_2_advanced" style="height:70px;">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_2_SC">
								 Group Shortcode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	Default: <input type="textbox" disabled="disabled" value="[gard group='2']"><br>
							Custom: <input type="textbox" name="GARD_PRO_DEMO_GROUP_2_SC"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_SC'); ?>">
							<span class="schide2" style="display:none;width:100%">
							No spaces allowed.<br>
							No brackets [ ] allowed.<br>
							</span>
						 </td>
						 
					   </tr><tr class="group_2_advanced">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_970x90">
												<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_970x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_970x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_728x90">
												<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_728x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_728x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_468x60">
												<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_468x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_468x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_336x280">
												<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_336x280"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_336x280'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_320x50">
												<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_320x50"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_320x50'); ?>" style="padding:5px;">
						<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_300x600">
												<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_300x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_300x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_300x250">
												<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_300x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_300x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_250x250">
												<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_250x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_250x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_234x60">
												<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_234x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_234x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_200x200">
												<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_200x200"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_200x200'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_180x150">
												<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_180x150"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_180x150'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_160x600">
												<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_160x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_160x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_125x125">
												<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_125x125"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_125x125'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_120x600">
												<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_120x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_120x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_120x240">
												<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_120x240"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_120x240'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_728x15">
												<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_728x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_728x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_468x15">
												<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_468x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_468x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_200x90">
												<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_200x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_200x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_180x90">
												<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_180x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_180x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_160x90">
												<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_160x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_160x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_2_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_2_120x90">
												<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_2_120x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_2_120x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr><tr class="group_2_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Basic Settings<b>
							</b></b></td>
						</tr><tr class="group_2_basic" style="height:70px;">
							<td style="vertical-align:middle;" colspan="3">
								<div class="group_2_basic" style="width: 519px;padding-left:15px;text-align:justify;">
								<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don't care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
							</div>
							</td>
						</tr><tr class="group_2_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_970x90_BASIC">
											<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_970x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_970x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_728x90_BASIC">
											<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_728x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_728x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_468x60_BASIC">
											<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_468x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_468x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_336x280_BASIC">
											<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_336x280_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_336x280_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_320x50_BASIC">
											<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_320x50_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_320x50_BASIC'), 1 ); ?>    style="padding:5px;">
					<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_300x600_BASIC">
											<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_300x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_300x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_300x250_BASIC">
											<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_300x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_300x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_250x250_BASIC">
											<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_250x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_250x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_234x60_BASIC">
											<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_234x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_234x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_200x200_BASIC">
											<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_200x200_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_200x200_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_180x150_BASIC">
											<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_180x150_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_180x150_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_160x600_BASIC">
											<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_160x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_160x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_125x125_BASIC">
											<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_125x125_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_125x125_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_120x600_BASIC">
											<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_120x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_120x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_120x240_BASIC">
											<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_120x240_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_120x240_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_728x15_BASIC">
											<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_728x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_728x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_468x15_BASIC">
											<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_468x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_468x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_200x90_BASIC">
											<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_200x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_200x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_180x90_BASIC">
											<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_180x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_180x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_160x90_BASIC">
											<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_160x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_160x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_2_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_2_120x90_BASIC">
											<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_2_120x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_2_120x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
					</tbody>
					<tfoot>
					  <tr>
						<th><input type="submit" id="submit" name="submit" value="Save Settings" class="button-primary"></th>
						<th colspan="2" style="text-align:right;">
						<!-- <input id="hidebutton2" type="button" name="toggle" value="Show Unused Sizes" class="button-secondary" /> -->
						</th>
					  </tr>
					</tfoot>
				</table></div>
				<div class="container" id="group3C" style="display: none;"><style> .group_3_basic { display:none; } </style>
				<table class="widefat" style="margin-bottom: 20px;">
					<thead>
							<tr><th style="min-width:265px;"><input id="main_submit" type="submit" name="submit" value="Save Settings" class="button-primary">
								<input id="cleargroup3" class=".button button-secondary" style="width: 143px;" value="Clear Group Settings">
								<a class="fancybox-media hoverZoomLink" href="http://youtu.be/mHP-PBDGf0g" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
							</th>
							<th style="text-align:right" colspan="2"></th>
					   </tr>
					</thead>
					<tbody><tr>
							<td style="vertical-align:middle;" colspan="3">
								<b>General Settings For Group 3</b>
							</td>
						</tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_3_ID">
								 Google Adsense Publisher ID: <strong style="color:red;">* Required</strong>
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							pub-<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_ID"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_ID'); ?>" style="padding:5px;">
						 </td>
						 
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_3_NAME">
								 Group Name:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right; min-width:225px;">
							<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_NAME"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_NAME'); ?>" style="padding:5px;">
						 </td>
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_3_MEMBERS_TOO">
								 Show group 3 to logged in users too?
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_MEMBERS_TOO"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_MEMBERS_TOO'), 1 ); ?>    > Yes, show ads to everyone.
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr id="GARD_PRO_DEMO_DEFAULT_FLOAT_3">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_DEFAULT_FLOAT_3">
								 Default Positioning for Group 3:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<select name="GARD_PRO_DEMO_DEFAULT_FLOAT_3" style="margin-left: 15px;">
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_3'), "none" ); ?> value="none">None</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_3'), "left" ); ?> value="left">Aligned Left</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_3'), "center" ); ?> value="center">Centered</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_3'), "right" ); ?> value="right">Aligned Right</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_3'), "random" ); ?> value="random">Random from Above Choices</option>
							</select>
						 </td>
						 
						 </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_3_CLONE">
								 AdSense Setup Mode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<input type="button" name="submit" id="basic_3_mode" value="BASIC MODE" class="button-secondary"> 
							<input type="button" name="submit" id="advanced_3_mode" value="ADVANCED MODE" class="button-primary">
							<input type="checkbox" value="1" name="GARD_PRO_DEMO_ADVANCED_3_MODE"  <?php checked( get_option('GARD_PRO_DEMO_ADVANCED_3_MODE'), 1 ); ?>   id="GARD_PRO_DEMO_ADVANCED_3_MODE"  class="hidden">
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr>
							<td style="vertical-align:middle;" colspan="3" class="group_3_advanced">
								<b>Advanced Settings<b>
							</b></b></td>
						</tr><tr class="group_3_advanced" style="height:70px;">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_3_SC">
								 Group Shortcode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	Default: <input type="textbox" disabled="disabled" value="[gard group='3']"><br>
							Custom: <input type="textbox" name="GARD_PRO_DEMO_GROUP_3_SC"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_SC'); ?>">
							<span class="schide3" style="display:none;width:100%">
							No spaces allowed.<br>
							No brackets [ ] allowed.<br>
							</span>
						 </td>
						 
					   </tr><tr class="group_3_advanced">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_970x90">
												<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_970x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_970x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_728x90">
												<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_728x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_728x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_468x60">
												<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_468x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_468x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_336x280">
												<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_336x280"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_336x280'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_320x50">
												<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_320x50"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_320x50'); ?>" style="padding:5px;">
						<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_300x600">
												<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_300x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_300x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_300x250">
												<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_300x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_300x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_250x250">
												<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_250x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_250x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_234x60">
												<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_234x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_234x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_200x200">
												<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_200x200"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_200x200'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_180x150">
												<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_180x150"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_180x150'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_160x600">
												<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_160x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_160x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_125x125">
												<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_125x125"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_125x125'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_120x600">
												<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_120x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_120x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_120x240">
												<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_120x240"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_120x240'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_728x15">
												<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_728x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_728x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_468x15">
												<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_468x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_468x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_200x90">
												<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_200x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_200x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_180x90">
												<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_180x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_180x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_160x90">
												<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_160x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_160x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_3_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_3_120x90">
												<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_3_120x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_3_120x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr><tr class="group_3_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Basic Settings<b>
							</b></b></td>
						</tr><tr class="group_3_basic" style="height:70px;">
							<td style="vertical-align:middle;" colspan="3">
								<div class="group_3_basic" style="width: 519px;padding-left:15px;text-align:justify;">
								<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don't care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
							</div>
							</td>
						</tr><tr class="group_3_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_970x90_BASIC">
											<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_970x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_970x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_728x90_BASIC">
											<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_728x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_728x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_468x60_BASIC">
											<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_468x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_468x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_336x280_BASIC">
											<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_336x280_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_336x280_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_320x50_BASIC">
											<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_320x50_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_320x50_BASIC'), 1 ); ?>    style="padding:5px;">
					<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_300x600_BASIC">
											<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_300x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_300x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_300x250_BASIC">
											<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_300x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_300x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_250x250_BASIC">
											<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_250x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_250x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_234x60_BASIC">
											<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_234x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_234x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_200x200_BASIC">
											<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_200x200_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_200x200_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_180x150_BASIC">
											<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_180x150_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_180x150_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_160x600_BASIC">
											<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_160x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_160x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_125x125_BASIC">
											<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_125x125_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_125x125_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_120x600_BASIC">
											<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_120x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_120x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_120x240_BASIC">
											<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_120x240_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_120x240_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_728x15_BASIC">
											<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_728x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_728x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_468x15_BASIC">
											<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_468x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_468x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_200x90_BASIC">
											<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_200x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_200x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_180x90_BASIC">
											<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_180x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_180x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_160x90_BASIC">
											<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_160x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_160x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_3_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_3_120x90_BASIC">
											<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_3_120x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_3_120x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
					</tbody>
					<tfoot>
					  <tr>
						<th><input type="submit" id="submit" name="submit" value="Save Settings" class="button-primary"></th>
						<th colspan="2" style="text-align:right;">
						<!-- <input id="hidebutton3" type="button" name="toggle" value="Show Unused Sizes" class="button-secondary" /> -->
						</th>
					  </tr>
					</tfoot>
				</table></div>
				<div class="container" id="group4C" style="display: none;"><style> .group_4_basic { display:none; } </style>
				<table class="widefat" style="margin-bottom: 20px;">
					<thead>
							<tr><th style="min-width:265px;"><input id="main_submit" type="submit" name="submit" value="Save Settings" class="button-primary">
								<input id="cleargroup4" class=".button button-secondary" style="width: 143px;" value="Clear Group Settings">
								<a class="fancybox-media hoverZoomLink" href="http://youtu.be/mHP-PBDGf0g" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
							</th>
							<th style="text-align:right" colspan="2"></th>
					   </tr>
					</thead>
					<tbody><tr>
							<td style="vertical-align:middle;" colspan="3">
								<b>General Settings For Group 4</b>
							</td>
						</tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_4_ID">
								 Google Adsense Publisher ID: <strong style="color:red;">* Required</strong>
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							pub-<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_ID"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_ID'); ?>" style="padding:5px;">
						 </td>
						 
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_4_NAME">
								 Group Name:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right; min-width:225px;">
							<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_NAME"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_NAME'); ?>" style="padding:5px;">
						 </td>
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_4_MEMBERS_TOO">
								 Show group 4 to logged in users too?
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_MEMBERS_TOO"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_MEMBERS_TOO'), 1 ); ?>   > Yes, show ads to everyone.
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr id="GARD_PRO_DEMO_DEFAULT_FLOAT_4">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_DEFAULT_FLOAT_4">
								 Default Positioning for Group 4:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<select name="GARD_PRO_DEMO_DEFAULT_FLOAT_4" style="margin-left: 15px;">
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_4'), "none" ); ?> value="none">None</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_4'), "left" ); ?> value="left">Aligned Left</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_4'), "center" ); ?> value="center">Centered</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_4'), "right" ); ?> value="right">Aligned Right</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_4'), "random" ); ?> value="random">Random from Above Choices</option>
							</select>
						 </td>
						 
						 </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_4_CLONE">
								 AdSense Setup Mode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<input type="button" name="submit" id="basic_4_mode" value="BASIC MODE" class="button-secondary"> 
							<input type="button" name="submit" id="advanced_4_mode" value="ADVANCED MODE" class="button-primary">
							<input type="checkbox" value="1" name="GARD_PRO_DEMO_ADVANCED_4_MODE"  <?php checked( get_option('GARD_PRO_DEMO_ADVANCED_4_MODE'), 1 ); ?>   id="GARD_PRO_DEMO_ADVANCED_4_MODE"  class="hidden">
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr>
							<td style="vertical-align:middle;" colspan="3" class="group_4_advanced">
								<b>Advanced Settings<b>
							</b></b></td>
						</tr><tr class="group_4_advanced" style="height:70px;">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_4_SC">
								 Group Shortcode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	Default: <input type="textbox" disabled="disabled" value="[gard group='4']"><br>
							Custom: <input type="textbox" name="GARD_PRO_DEMO_GROUP_4_SC"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_SC'); ?>">
							<span class="schide4" style="display:none;width:100%">
							No spaces allowed.<br>
							No brackets [ ] allowed.<br>
							</span>
						 </td>
						 
					   </tr><tr class="group_4_advanced">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_970x90">
												<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_970x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_970x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_728x90">
												<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_728x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_728x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_468x60">
												<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_468x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_468x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_336x280">
												<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_336x280"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_336x280'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_320x50">
												<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_320x50"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_320x50'); ?>" style="padding:5px;">
						<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_300x600">
												<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_300x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_300x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_300x250">
												<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_300x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_300x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_250x250">
												<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_250x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_250x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_234x60">
												<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_234x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_234x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_200x200">
												<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_200x200"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_200x200'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_180x150">
												<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_180x150"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_180x150'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_160x600">
												<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_160x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_160x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_125x125">
												<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_125x125"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_125x125'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_120x600">
												<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_120x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_120x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_120x240">
												<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_120x240"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_120x240'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_728x15">
												<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_728x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_728x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_468x15">
												<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_468x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_468x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_200x90">
												<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_200x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_200x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_180x90">
												<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_180x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_180x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_160x90">
												<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_160x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_160x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_4_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_4_120x90">
												<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_4_120x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_4_120x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr><tr class="group_4_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Basic Settings<b>
							</b></b></td>
						</tr><tr class="group_4_basic" style="height:70px;">
							<td style="vertical-align:middle;" colspan="3">
								<div class="group_4_basic" style="width: 519px;padding-left:15px;text-align:justify;">
								<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don't care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
							</div>
							</td>
						</tr><tr class="group_4_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_970x90_BASIC">
											<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_970x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_970x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_728x90_BASIC">
											<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_728x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_728x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_468x60_BASIC">
											<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_468x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_468x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_336x280_BASIC">
											<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_336x280_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_336x280_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_320x50_BASIC">
											<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_320x50_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_320x50_BASIC'), 1 ); ?>    style="padding:5px;">
					<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_300x600_BASIC">
											<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_300x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_300x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_300x250_BASIC">
											<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_300x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_300x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_250x250_BASIC">
											<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_250x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_250x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_234x60_BASIC">
											<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_234x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_234x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_200x200_BASIC">
											<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_200x200_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_200x200_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_180x150_BASIC">
											<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_180x150_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_180x150_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_160x600_BASIC">
											<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_160x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_160x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_125x125_BASIC">
											<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_125x125_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_125x125_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_120x600_BASIC">
											<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_120x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_120x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_120x240_BASIC">
											<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_120x240_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_120x240_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_728x15_BASIC">
											<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_728x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_728x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_468x15_BASIC">
											<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_468x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_468x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_200x90_BASIC">
											<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_200x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_200x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_180x90_BASIC">
											<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_180x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_180x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_160x90_BASIC">
											<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_160x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_160x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_4_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_4_120x90_BASIC">
											<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_4_120x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_4_120x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
					</tbody>
					<tfoot>
					  <tr>
						<th><input type="submit" id="submit" name="submit" value="Save Settings" class="button-primary"></th>
						<th colspan="2" style="text-align:right;">
						<!-- <input id="hidebutton4" type="button" name="toggle" value="Show Unused Sizes" class="button-secondary" /> -->
						</th>
					  </tr>
					</tfoot>
				</table></div>
				<div class="container" id="group5C" style="display: none;"><style> .group_5_basic { display:none; } </style>
				<table class="widefat" style="margin-bottom: 20px;">
					<thead>
							<tr><th style="min-width:265px;"><input id="main_submit" type="submit" name="submit" value="Save Settings" class="button-primary">
								<input id="cleargroup5" class=".button button-secondary" style="width: 143px;" value="Clear Group Settings">
								<a class="fancybox-media hoverZoomLink" href="http://youtu.be/mHP-PBDGf0g" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a>
							</th>
							<th style="text-align:right" colspan="2"></th>
					   </tr>
					</thead>
					<tbody><tr>
							<td style="vertical-align:middle;" colspan="3">
								<b>General Settings For Group 5</b>
							</td>
						</tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_5_ID">
								 Google Adsense Publisher ID: <strong style="color:red;">* Required</strong>
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							pub-<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_ID"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_ID'); ?>" style="padding:5px;">
						 </td>
						 
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_5_NAME">
								 Group Name:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right; min-width:225px;">
							<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_NAME"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_NAME'); ?>" style="padding:5px;">
						 </td>
						 
					   </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_5_MEMBERS_TOO">
								 Show group 5 to logged in users too?
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_MEMBERS_TOO"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_MEMBERS_TOO'), 1 ); ?>    > Yes, show ads to everyone.
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr id="GARD_PRO_DEMO_DEFAULT_FLOAT_5">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_DEFAULT_FLOAT_5">
								 Default Positioning for Group 5:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<select name="GARD_PRO_DEMO_DEFAULT_FLOAT_5" style="margin-left: 15px;">
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_5'), "none" ); ?> value="none">None</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_5'), "left" ); ?> value="left">Aligned Left</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_5'), "center" ); ?> value="center">Centered</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_5'), "right" ); ?> value="right">Aligned Right</option>
								<option <?php selected( get_option('GARD_PRO_DEMO_DEFAULT_FLOAT_5'), "random" ); ?> value="random">Random from Above Choices</option>
							</select>
						 </td>
						 
						 </tr><tr>
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_5_CLONE">
								 AdSense Setup Mode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
							<input type="button" name="submit" id="basic_5_mode" value="BASIC MODE" class="button-secondary"> 
							<input type="button" name="submit" id="advanced_5_mode" value="ADVANCED MODE" class="button-primary">
							<input type="checkbox" value="1" name="GARD_PRO_DEMO_ADVANCED_5_MODE"  <?php checked( get_option('GARD_PRO_DEMO_ADVANCED_5_MODE'), 1 ); ?>   id="GARD_PRO_DEMO_ADVANCED_5_MODE"  class="hidden">
						 </td>
						 <td style="vertical-align:middle;text-align:right;"> 
						 </td>
					   </tr><tr>
							<td style="vertical-align:middle;" colspan="3" class="group_5_advanced">
								<b>Advanced Settings<b>
							</b></b></td>
						</tr><tr class="group_5_advanced" style="height:70px;">
						 <td style="vertical-align:middle;" class="indented">
							 <label for="GARD_PRO_DEMO_GROUP_5_SC">
								 Group Shortcode:
							 </label>
						 </td>
						 <td style="vertical-align:middle;text-align:right;">
						 	Default: <input type="textbox" disabled="disabled" value="[gard group='5']"><br>
							Custom: <input type="textbox" name="GARD_PRO_DEMO_GROUP_5_SC"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_SC'); ?>">
							<span class="schide5" style="display:none;width:100%">
							No spaces allowed.<br>
							No brackets [ ] allowed.<br>
							</span>
						 </td>
						 
					   </tr><tr class="group_5_advanced">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_970x90">
												<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_970x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_970x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_728x90">
												<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_728x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_728x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_468x60">
												<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_468x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_468x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_336x280">
												<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_336x280"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_336x280'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_320x50">
												<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_320x50"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_320x50'); ?>" style="padding:5px;">
						<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_300x600">
												<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_300x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_300x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_300x250">
												<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_300x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_300x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_250x250">
												<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_250x250"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_250x250'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_234x60">
												<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_234x60"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_234x60'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_200x200">
												<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_200x200"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_200x200'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_180x150">
												<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_180x150"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_180x150'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_160x600">
												<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_160x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_160x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_125x125">
												<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_125x125"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_125x125'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_120x600">
												<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_120x600"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_120x600'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_120x240">
												<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_120x240"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_120x240'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_728x15">
												<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_728x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_728x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_468x15">
												<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_468x15"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_468x15'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_200x90">
												<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_200x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_200x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_180x90">
												<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_180x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_180x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_160x90">
												<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_160x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_160x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr>
									<tr class="group_5_advanced advancedhiddenfields ">
										<td style="vertical-align:middle;color:#AAA;" class="indented">
											<label for="GARD_PRO_DEMO_GROUP_5_120x90">
												<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
											</label>
										</td>
										<td style="vertical-align:middle;text-align:right;">
											<input type="textbox" name="GARD_PRO_DEMO_GROUP_5_120x90"   value="<?php echo get_option('GARD_PRO_DEMO_GROUP_5_120x90'); ?>" style="padding:5px;">
						</td>
								 
								  </tr><tr class="group_5_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Basic Settings<b>
							</b></b></td>
						</tr><tr class="group_5_basic" style="height:70px;">
							<td style="vertical-align:middle;" colspan="3">
								<div class="group_5_basic" style="width: 519px;padding-left:15px;text-align:justify;">
								<b style="color:red;">NOTICE PLEASE READ</b>: Basic mode is for users who don't care about ad tracking. Basic mode makes it super simple to set up any ad configuration that you want. The only drawback to basic mode is that you can not track your ad performance.
							</div>
							</td>
						</tr><tr class="group_5_basic">
							<td style="vertical-align:middle;" colspan="3">
								<b>Setup Ad Sizes</b>
							</td>
						</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_970x90_BASIC">
											<span style="width:50px;display:inline-block;">970x90</span> | <b>Large Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_970x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_970x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_728x90_BASIC">
											<span style="width:50px;display:inline-block;">728x90</span> | <b>Leaderboard</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_728x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_728x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_468x60_BASIC">
											<span style="width:50px;display:inline-block;">468x60</span> | <b>Banner </b> <span class="content_tag">Content</span> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_468x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_468x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_336x280_BASIC">
											<span style="width:50px;display:inline-block;">336x280</span> | <b>Large Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_336x280_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_336x280_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_320x50_BASIC">
											<span style="width:50px;display:inline-block;">320x50</span> | <b>Mobile Banner</b> <span class="header_tag">Header</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_320x50_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_320x50_BASIC'), 1 ); ?>    style="padding:5px;">
					<br><input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_MOBILE"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_MOBILE'), 1 ); ?>   > Show to mobile only.</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_300x600_BASIC">
											<span style="width:50px;display:inline-block;">300x600</span> | <b>Large Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_300x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_300x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_300x250_BASIC">
											<span style="width:50px;display:inline-block;">300x250</span> | <b>Medium Rectangle</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_300x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_300x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_250x250_BASIC">
											<span style="width:50px;display:inline-block;">250x250</span> | <b>Square </b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_250x250_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_250x250_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_234x60_BASIC">
											<span style="width:50px;display:inline-block;">234x60</span> | <b>Half Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_234x60_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_234x60_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_200x200_BASIC">
											<span style="width:50px;display:inline-block;">200x200</span> | <b>Small Square</b> <span class="content_tag">Content</span> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_200x200_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_200x200_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_180x150_BASIC">
											<span style="width:50px;display:inline-block;">180x150</span> | <b>Small Rectangle</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_180x150_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_180x150_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_160x600_BASIC">
											<span style="width:50px;display:inline-block;">160x600</span> | <b>Wide Skyscraper</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_160x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_160x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_125x125_BASIC">
											<span style="width:50px;display:inline-block;">125x125</span> | <b>Button</b> <span class="sidebar_tag">Sidebar</span>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_125x125_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_125x125_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_120x600_BASIC">
											<span style="width:50px;display:inline-block;">120x600</span> | <b>Skyscraper</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_120x600_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_120x600_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_120x240_BASIC">
											<span style="width:50px;display:inline-block;">120x240</span> | <b>Vertical Banner</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_120x240_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_120x240_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_728x15_BASIC">
											<span style="width:50px;display:inline-block;">728x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_728x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_728x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_468x15_BASIC">
											<span style="width:50px;display:inline-block;">468x15</span> | <b>Displays 4 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_468x15_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_468x15_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_200x90_BASIC">
											<span style="width:50px;display:inline-block;">200x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_200x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_200x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_180x90_BASIC">
											<span style="width:50px;display:inline-block;">180x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_180x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_180x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_160x90_BASIC">
											<span style="width:50px;display:inline-block;">160x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_160x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_160x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
								<tr class="group_5_basic basichiddenfields">
									<td style="vertical-align:middle;color:#AAA;" class="indented">
										<label for="GARD_PRO_DEMO_GROUP_5_120x90_BASIC">
											<span style="width:50px;display:inline-block;">120x90</span> | <b>Displays 3 links</b>
										</label>
									</td>
									<td style="vertical-align:middle;text-align:right;">
										<input type="checkbox" value="1" name="GARD_PRO_DEMO_GROUP_5_120x90_BASIC"  <?php checked( get_option('GARD_PRO_DEMO_GROUP_5_120x90_BASIC'), 1 ); ?>    style="padding:5px;">
					</td>
					 <td style="vertical-align:middle;text-align:right;">					
					 </td>
					</tr>
					</tbody>
					<tfoot>
					  <tr>
						<th><input type="submit" id="submit" name="submit" value="Save Settings" class="button-primary"></th>
						<th colspan="2" style="text-align:right;">
						<!-- <input id="hidebutton5" type="button" name="toggle" value="Show Unused Sizes" class="button-secondary" /> -->
						</th>
					  </tr>
					</tfoot>
				</table></div>
						</td>
					<td style="vertical-align:top; padding-left:15px;margin-top: -3px;display:block;max-width: 500px;">

<a href="http://thepluginfactory.co/warehouse/gard-pro/?so=gard_belcher_gp_demo" target='_blank'>
	<img src="<?php echo plugin_dir_url(__FILE__) ?>images/gp1.png" style="width:100%" >
</a>

				<div id="welcome-panel" class="welcome-panel">
					<div class="welcome-panel-content" style="margin-right: 13px;">
						<h3>Welcome to GARD Pro!</h3>
						<p class="about-description">We've assembled some links to get you started:</p>
						<div class="welcome-panel-column-container">
							<div class="welcome-panel-column">
								<h4>GARD Pro</h4>
									Thank you for your purchase!<br>
									<a href="http://thepluginfactory.co/community/forum/plugin-specific/gard-pro/" target="_blank" title="GARD Pro Support Forums">The GARD Pro Support Forums</a>				
							</div>
							<div class="welcome-panel-column">
								<h4>Next Steps</h4>
								<ul>
									<li><span class="welcome-icon welcome-edit-page">Input Publisher ID <span style="color:orange">[PENDING]</span></span></li>
									<li><span class="welcome-icon welcome-add-page">Input ad slugs <span style="color:orange">[PENDING]</span></span></li>
								</ul>
							</div>
							<div class="welcome-panel-column welcome-panel-last">
								<h4>GARD Pro Help, Tips &amp; Tricks</h4>
								<ul>
									<li><span class="video16"></span>
										<span class="fullcolor">Help Videos Throughout</span>
									</li>
										<ul class="smallgray" style="margin-left:30px;">
											<li>Click this icon anywhere you see it next to a setting. It will launch a training video for that specific option! And yes, the video is responsive, just like GARD!</li>
										</ul>
									<li><span class="welcome-icon welcome-widgets-menus"><a class="fancybox-media hoverZoomLink" href="http://youtu.be/kKL7QefKNkw" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a> Control-S to save!</span></li>
										<ul class="smallgray" style="margin-left:30px;">
											<li>Simply press and hold down the control key, and tap the letter s on your keyboard to save your settings anytime!</li>
										</ul>
									<li><span class="welcome-icon welcome-comments"><a class="fancybox-media hoverZoomLink" href="http://youtu.be/0o4EN8iZ34Y" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a> Import ad settings from old versions of GARD or GARD Pro?</span></li>

																		<ul class="smallgray" style="margin-left:30px;">
											<li>We have detected settings stored in your database from an old version of GARD or GARD Pro.</li>
											<li>If you choose to import these settings, they will overwrite the settings for group 5. Once they are in group 5, you can clone them to any group you'd like, or simply use them in group 5.</li>
											<li><input type="submit" name="submit" value="Import Old Settings" class="button-secondary" id="importold"> <input type="submit" name="submit" value="Permanently Delete Old Settings" class="button-secondary" id="deleteold"></li>
										</ul>
										
									<li><span class="welcome-icon welcome-learn-more"><a class="fancybox-media hoverZoomLink" href="http://youtu.be/E4xhEXb_mzY" rel="media-gallery"><img class="videobutton" src="http://dev.thepluginfactory.co/wp-content/plugins/gard-pro/video16.png"></a> Use this tool to magically get your ad code.</span></li>
										<ul class="smallgray" style="margin-left:30px;">
											<li></li>
											<li><table>
													<tbody><tr>
														<td>AdSense Publisher ID:</td><td><input tyle="textbox" id="adsenseparseid"></td>
													</tr>
													<tr>
														<td>Ad Slot / Slug:</td><td><input tyle="textbox" id="adsenseparseslug"></td>
													</tr>
													<tr>
														<td>Ad Size:</td><td><input tyle="textbox" id="adsenseparsesize"></td>
													</tr>
													<tr>
														<td colspan="2">Paste your AdSense embed code here:<br>
															<textarea id="adsenseparse" style="width:100%" rows="12"></textarea><br>
															<input type="button" name="insert_ad_slug" id="insert_ad_slug" value="Insert Into Group 1" class="button-primary" style="display: none;"><br>
															<div id="insert_result"></div>
														</td>
													</tr>

											</tbody></table></li><li>
										</li></ul>
								</ul>			    			
							</div>
						</div>
					</div>
				</div>    			
			</td>
			</tr>
		</tbody></table>
	</div>


		<script type="text/javascript">

			jQuery(function ($) {
				$(document).ready(function() {
					$('#GARD_WINDOW').show();

					$(document).keydown(function(event) {
						//19 for Mac Command+S
						if (!( String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19)) return true;
						$("#main_submit").click();
						event.preventDefault();
						return false;
					});

					$('#GARD_PRO_DEMO_tabs li a:not(:first)').addClass('inactive');
					$('.container').hide();
					$('.container:first').show();
					$("#insert_ad_slug").hide();

					$('#advanced_mode').click(function(){
						$('#GARD_PRO_DEMO_ADVANCED_MODE').attr('checked',true);

						$(this).removeClass('button-secondary');
						$('#basic_mode').removeClass('button-primary');

						$(this).addClass('button-primary');
						$('#basic_mode').addClass('button-secondary');

						$('.advanced').fadeIn( "slow" );
					});
					
					$('#basic_mode').click(function(){
						$('#GARD_PRO_DEMO_ADVANCED_MODE').attr('checked',false);

						$(this).removeClass('button-secondary');
						$('#advanced_mode').removeClass('button-primary');
						
						$(this).addClass('button-primary');
						$('#advanced_mode').addClass('button-secondary');

						
						$('.advanced').fadeOut( "slow" );
					});

					$('#GARD_PRO_DEMO_tabs li a').click(function(){
						var t = $(this).attr('id');
						if($(this).hasClass('inactive')){ 
							$('#GARD_PRO_DEMO_tabs li a').addClass('inactive');           
							$('#GARD_PRO_DEMO_tabs li a').removeClass('active');           
							$(this).removeClass('inactive');
							$(this).addClass('active');
							
							$('.container').hide();
							$('#'+ t + 'C').show();
						}
						// Save tab data to a the current session's store
						sessionStorage.setItem("tab", "#" + t);

						var rel = $(this).attr('rel');

						if (rel == 'GLOBAL') {
							$("#insert_ad_slug").hide();
						} else {
							$("#insert_ad_slug").show();
							$("#insert_ad_slug").attr("value","Insert Into Group "+rel);
						}


						return false;
					});

					$('#import_full').click(function(){
						var imp = $('#GARD_PRO_DEMO_IMPORT').val();
						window.location.replace('admin.php?page=gard-pro-info&import&imp='+imp);
						return false;
					});

					$('#importold').click(function(){
						if (confirm('Are you sure that you want to import your old GARD settings and overwrite the Group 5 settings?\n\nThis is non reversable, and all settings currently in Group 5 will be erased.')) {
							window.location.replace('admin.php?page=gard-pro-info&_import_gard_settings');
						} 
						return false;
					});

					$('#deleteold').click(function(){
						if (confirm('Are you sure that you want to delete your old GARD settings?\n\nThis is non reversable, and all settings will be erased.')) {
							window.location.replace('admin.php?page=gard-pro-info&confirmed&_delete_gard_settings');

						} 
						return false;
					});

					$("input[name='GARD_PRO_DEMO_AUTO_INSERT']").keyup(function(){
						val = $(this).val();


						if (val == 'random') {
						   $("#GARD_PRO_DEMO_AUTO_INSERT_COUNT").fadeIn('slow');
						   // $("#GARD_PRO_DEMO_AUTO_INSERT_COUNT").css('display','table-row');
						} else {
						   $("#GARD_PRO_DEMO_AUTO_INSERT_COUNT").fadeOut('slow');
						   // $("#GARD_PRO_DEMO_AUTO_INSERT_COUNT").css('display','none');
						}
						return false;
					});

					// Re open last open tab
					var lasttab = sessionStorage.getItem("tab"); 
					$( lasttab ).click();

					
					$("#adsenseparse").bind('keyup mouseup change blur',function(e){
						val = $(this).val();

						if (val !== '') {


							if (/google_ad_channel/i.test(val)) {
								var slug = val.split('google_ad_channel = "');
								var slug = slug[1].split('";');

								var width = val.split('google_ad_width = ');
								var width = width[1].split(';');

								var height = val.split('google_ad_height = ');
								var height = height[1].split(';');

								var size = width[0]+"x"+height[0];


							} else if (/google_ad_slot/i.test(val)) {
								var slug = val.split('google_ad_slot = "');
								var slug = slug[1].split('";');

								var width = val.split('google_ad_width = ');
								var width = width[1].split(';');

								var height = val.split('google_ad_height = ');
								var height = height[1].split(';');
								
								var size = width[0]+"x"+height[0];
							} else if (/data-ad-slot/i.test(val)) {
								var slug = val.split('data-ad-slot="');
								var slug = slug[1].split('"');

								var width = val.split('width:');
								var width = width[1].split('px');

								var height = val.split('height:');
								var height = height[1].split('px');
								
								var size = width[0]+"x"+height[0];
							}

							var id = val.split('pub-');
							var id = id[1].split('"');
							var rel = $('#GARD_PRO_DEMO_tabs li .active').attr('rel');

							$("#adsenseparseid").val(id[0]);
							$("#adsenseparsesize").val(size);
							$("#adsenseparseslug").val(slug[0]);
							$("#insert_ad_slug").attr("value","Insert Into Group "+rel);

							// $('[name="GARD_PRO_DEMO_'+ rel +'_'+ size +'').val(slug[0]);
						}

						
						return false;
					});

					$('#insert_ad_slug').click(function(){			
						var rel = $('#GARD_PRO_DEMO_tabs li .active').attr('rel'); // alert( rel );
						var size = $("#adsenseparsesize").val(); // alert( size );
						var slug = $("#adsenseparseslug").val(); // alert( slug );
						var tar = '[name="GARD_PRO_DEMO_GROUP_'+ rel +'_'+ size +'"]'; // alert( tar );
						$(tar).val(slug);
						$('#insert_result').html('Slug was inserted in the slot for the ad size '+ size +'.<br><b>Remember to save your settings</b> when you\'re done adding sizes.');
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

					$('#clone').click(
						function() {
							var from = $('#clonefrom').val();
							var to   = $('#cloneto').val();
							if (confirm('DEMO NOTICE: CHANGES ARE NOT APPLIED!\n\nNOTHING WILL BE CLONED!\n\nAre you sure that you want to clone the Group '+from+' settings to Group '+to+'? \n\nThis is non reversable, and all settings currently the receiving group will be erased.')) {
							} 
							return false;
					});

					

								/* GROUP 1 SETTINGS */
									$('#cleargroup1').click(
										function() {
											if (confirm('Are you sure that you want to clear GROUP 1 settings?\n\nThis is non reversable, and all settings currently in GROUP 1 will be erased.')) {
												$(this).parents('table').each(function() {
													$('input[type=textbox]').val("");
													$('input[type=checkbox]').prop("checked",false);
													$('select').val('none');
													$('#main_submit').click();
												});
											} 
											return false;
									});


									$('#hidebutton1').click(
										function() {
										hidden = $('.hideoptions1');
										hidden.toggle();
										
										if ($(this).val() == 'Show Unused Sizes') {
											$(this).val('Hide Unused Sizes');
										} else {
											$(this).val('Show Unused Sizes');
										}

										return false;
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_1_SC"]').on({
											keydown: function(e) {
												if (e.which === 32)
												  return false;
												},
												change: function() {
												this.value = this.value.replace(/\s/g, '');
												}
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_1_SC"]').on({
											focus: function(e) {
												$('.schide1').css('display','block');
												$('.schide1').fadeIn('slow');
											},
											blur: function(e) {
												$('.schide1').fadeOut('slow');
											}
									});


									$('#advanced_1_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_1_MODE').attr('checked',true);

										$(this).removeClass('button-secondary');
										$('#basic_1_mode').removeClass('button-primary');

										$(this).addClass('button-primary');
										$('#basic_1_mode').addClass('button-secondary');

										$('.group_1_basic').hide();
										$('.group_1_advanced').fadeIn( 'slow' );


									});
									
									$('#basic_1_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_1_MODE').attr('checked',false);

										$(this).removeClass('button-secondary');
										$('#advanced_1_mode').removeClass('button-primary');
										
										$(this).addClass('button-primary');
										$('#advanced_1_mode').addClass('button-secondary');

										$('.group_1_advanced').hide();
										$('.group_1_basic').fadeIn( 'slow' );

									});
									

									$('#ad_1_border').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_1_title').spectrum({
										color: 'blue',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_1_background').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_1_text').spectrum({
										color: '#000000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_1_url').spectrum({
										color: '#008000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});



									$('#ad_1_border').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_1').css('border', '1px '+textcolor+' solid');
									});
									$('#ad_1_title').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_title_1').css('color', textcolor);
									});
									$('#ad_1_background').change(function(){
										var textcolor = $(this).val();
										if ( textcolor == '') { var textcolor = '#ff0'; }
										$('#sample_ad_1').css('background-color', textcolor);
									});
									$('#ad_1_text').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_text_1').css('color', textcolor);
									});
									$('#ad_1_url').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_url_1').css('color', textcolor);
									});

									$('#ad_1_radius').change(function(){
										var radius = $(this).val();
										$('#sample_ad_1').css('border-radius', radius+'px');
									});

									$('input[name="GARD_PRO_DEMO_GROUP_1_SC"]').keyup(function() {
										var raw_text =  jQuery(this).val();
										var return_text = raw_text.replace(/[^a-zA-Z0-9_]/g,'');
										jQuery(this).val(return_text);
									});

									

								/* GROUP 2 SETTINGS */
									$('#cleargroup2').click(
										function() {
											if (confirm('Are you sure that you want to clear GROUP 2 settings?\n\nThis is non reversable, and all settings currently in GROUP 2 will be erased.')) {
											$(this).parents('table').each(function() {
													$('input[type=textbox]').val("");
													$('input[type=checkbox]').prop("checked",false);
													$('select').val('none');
													$('#main_submit').click();
												});
											} 
											return false;
									});


									$('#hidebutton2').click(
										function() {
										hidden = $('.hideoptions2');
										hidden.toggle();
										
										if ($(this).val() == 'Show Unused Sizes') {
											$(this).val('Hide Unused Sizes');
										} else {
											$(this).val('Show Unused Sizes');
										}

										return false;
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_2_SC"]').on({
											keydown: function(e) {
												if (e.which === 32)
												  return false;
												},
												change: function() {
												this.value = this.value.replace(/\s/g, '');
												}
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_2_SC"]').on({
											focus: function(e) {
												$('.schide2').css('display','block');
												$('.schide2').fadeIn('slow');
											},
											blur: function(e) {
												$('.schide2').fadeOut('slow');
											}
									});


									$('#advanced_2_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_2_MODE').attr('checked',true);

										$(this).removeClass('button-secondary');
										$('#basic_2_mode').removeClass('button-primary');

										$(this).addClass('button-primary');
										$('#basic_2_mode').addClass('button-secondary');

										$('.group_2_basic').hide();
										$('.group_2_advanced').fadeIn( 'slow' );


									});
									
									$('#basic_2_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_2_MODE').attr('checked',false);

										$(this).removeClass('button-secondary');
										$('#advanced_2_mode').removeClass('button-primary');
										
										$(this).addClass('button-primary');
										$('#advanced_2_mode').addClass('button-secondary');

										$('.group_2_advanced').hide();
										$('.group_2_basic').fadeIn( 'slow' );

									});
									

									$('#ad_2_border').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_2_title').spectrum({
										color: 'blue',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_2_background').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_2_text').spectrum({
										color: '#000000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_2_url').spectrum({
										color: '#008000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});



									$('#ad_2_border').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_2').css('border', '1px '+textcolor+' solid');
									});
									$('#ad_2_title').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_title_2').css('color', textcolor);
									});
									$('#ad_2_background').change(function(){
										var textcolor = $(this).val();
										if ( textcolor == '') { var textcolor = '#ff0'; }
										$('#sample_ad_2').css('background-color', textcolor);
									});
									$('#ad_2_text').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_text_2').css('color', textcolor);
									});
									$('#ad_2_url').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_url_2').css('color', textcolor);
									});

									$('#ad_2_radius').change(function(){
										var radius = $(this).val();
										$('#sample_ad_2').css('border-radius', radius+'px');
									});

									$('input[name="GARD_PRO_DEMO_GROUP_2_SC"]').keyup(function() {
										var raw_text =  jQuery(this).val();
										var return_text = raw_text.replace(/[^a-zA-Z0-9_]/g,'');
										jQuery(this).val(return_text);
									});

									

								/* GROUP 3 SETTINGS */
									$('#cleargroup3').click(
										function() {
											if (confirm('Are you sure that you want to clear GROUP 3 settings?\n\nThis is non reversable, and all settings currently in GROUP 3 will be erased.')) {
											$(this).parents('table').each(function() {
													$('input[type=textbox]').val("");
													$('input[type=checkbox]').prop("checked",false);
													$('select').val('none');
													$('#main_submit').click();
												});
											} 
											return false;
									});


									$('#hidebutton3').click(
										function() {
										hidden = $('.hideoptions3');
										hidden.toggle();
										
										if ($(this).val() == 'Show Unused Sizes') {
											$(this).val('Hide Unused Sizes');
										} else {
											$(this).val('Show Unused Sizes');
										}

										return false;
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_3_SC"]').on({
											keydown: function(e) {
												if (e.which === 32)
												  return false;
												},
												change: function() {
												this.value = this.value.replace(/\s/g, '');
												}
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_3_SC"]').on({
											focus: function(e) {
												$('.schide3').css('display','block');
												$('.schide3').fadeIn('slow');
											},
											blur: function(e) {
												$('.schide3').fadeOut('slow');
											}
									});


									$('#advanced_3_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_3_MODE').attr('checked',true);

										$(this).removeClass('button-secondary');
										$('#basic_3_mode').removeClass('button-primary');

										$(this).addClass('button-primary');
										$('#basic_3_mode').addClass('button-secondary');

										$('.group_3_basic').hide();
										$('.group_3_advanced').fadeIn( 'slow' );



									});
									
									$('#basic_3_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_3_MODE').attr('checked',false);

										$(this).removeClass('button-secondary');
										$('#advanced_3_mode').removeClass('button-primary');
										
										$(this).addClass('button-primary');
										$('#advanced_3_mode').addClass('button-secondary');

										$('.group_3_advanced').hide();
										$('.group_3_basic').fadeIn( 'slow' );
									});

								

									$('#ad_3_border').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_3_title').spectrum({
										color: 'blue',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_3_background').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_3_text').spectrum({
										color: '#000000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_3_url').spectrum({
										color: '#008000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});



									$('#ad_3_border').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_3').css('border', '1px '+textcolor+' solid');
									});
									$('#ad_3_title').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_title_3').css('color', textcolor);
									});
									$('#ad_3_background').change(function(){
										var textcolor = $(this).val();
										if ( textcolor == '') { var textcolor = '#ff0'; }
										$('#sample_ad_3').css('background-color', textcolor);
									});
									$('#ad_3_text').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_text_3').css('color', textcolor);
									});
									$('#ad_3_url').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_url_3').css('color', textcolor);
									});

									$('#ad_3_radius').change(function(){
										var radius = $(this).val();
										$('#sample_ad_3').css('border-radius', radius+'px');
									});

									$('input[name="GARD_PRO_DEMO_GROUP_3_SC"]').keyup(function() {
										var raw_text =  jQuery(this).val();
										var return_text = raw_text.replace(/[^a-zA-Z0-9_]/g,'');
										jQuery(this).val(return_text);
									});

									

								/* GROUP 4 SETTINGS */
									$('#cleargroup4').click(
										function() {
											if (confirm('Are you sure that you want to clear GROUP 4 settings?\n\nThis is non reversable, and all settings currently in GROUP 4 will be erased.')) {
											$(this).parents('table').each(function() {
													$('input[type=textbox]').val("");
													$('input[type=checkbox]').prop("checked",false);
													$('select').val('none');
													$('#main_submit').click();
												});
											} 
											return false;
									});


									$('#hidebutton4').click(
										function() {
										hidden = $('.hideoptions4');
										hidden.toggle();
										
										if ($(this).val() == 'Show Unused Sizes') {
											$(this).val('Hide Unused Sizes');
										} else {
											$(this).val('Show Unused Sizes');
										}

										return false;
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_4_SC"]').on({
											keydown: function(e) {
												if (e.which === 32)
												  return false;
												},
												change: function() {
												this.value = this.value.replace(/\s/g, '');
												}
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_4_SC"]').on({
											focus: function(e) {
												$('.schide4').css('display','block');
												$('.schide4').fadeIn('slow');
											},
											blur: function(e) {
												$('.schide4').fadeOut('slow');
											}
									});


									$('#advanced_4_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_4_MODE').attr('checked',true);

										$(this).removeClass('button-secondary');
										$('#basic_4_mode').removeClass('button-primary');

										$(this).addClass('button-primary');
										$('#basic_4_mode').addClass('button-secondary');

										$('.group_4_basic').hide();
										$('.group_4_advanced').fadeIn( 'slow' );


									});
									
									$('#basic_4_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_4_MODE').attr('checked',false);

										$(this).removeClass('button-secondary');
										$('#advanced_4_mode').removeClass('button-primary');
										
										$(this).addClass('button-primary');
										$('#advanced_4_mode').addClass('button-secondary');

										$('.group_4_advanced').hide();
										$('.group_4_basic').fadeIn( 'slow' );

									});


									$('#ad_4_border').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_4_title').spectrum({
										color: 'blue',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_4_background').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_4_text').spectrum({
										color: '#000000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_4_url').spectrum({
										color: '#008000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});



									$('#ad_4_border').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_4').css('border', '1px '+textcolor+' solid');
									});
									$('#ad_4_title').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_title_4').css('color', textcolor);
									});
									$('#ad_4_background').change(function(){
										var textcolor = $(this).val();
										if ( textcolor == '') { var textcolor = '#ff0'; }
										$('#sample_ad_4').css('background-color', textcolor);
									});
									$('#ad_4_text').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_text_4').css('color', textcolor);
									});
									$('#ad_4_url').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_url_4').css('color', textcolor);
									});

									$('#ad_4_radius').change(function(){
										var radius = $(this).val();
										$('#sample_ad_4').css('border-radius', radius+'px');
									});

									$('input[name="GARD_PRO_DEMO_GROUP_4_SC"]').keyup(function() {
										var raw_text =  jQuery(this).val();
										var return_text = raw_text.replace(/[^a-zA-Z0-9_]/g,'');
										jQuery(this).val(return_text);
									});

									

								/* GROUP 5 SETTINGS */
									$('#cleargroup5').click(
										function() {
											if (confirm('Are you sure that you want to clear GROUP 5 settings?\n\nThis is non reversable, and all settings currently in GROUP 5 will be erased.')) {
											$(this).parents('table').each(function() {
													$('input[type=textbox]').val("");
													$('input[type=checkbox]').prop("checked",false);
													$('select').val('none');
													$('#main_submit').click();
												});
											} 
											return false;
									});


									$('#hidebutton5').click(
										function() {
										hidden = $('.hideoptions5');
										hidden.toggle();
										
										if ($(this).val() == 'Show Unused Sizes') {
											$(this).val('Hide Unused Sizes');
										} else {
											$(this).val('Show Unused Sizes');
										}

										return false;
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_5_SC"]').on({
											keydown: function(e) {
												if (e.which === 32)
												  return false;
												},
												change: function() {
												this.value = this.value.replace(/\s/g, '');
												}
									});
									
									$('input[name="GARD_PRO_DEMO_GROUP_5_SC"]').on({
											focus: function(e) {
												$('.schide5').css('display','block');
												$('.schide5').fadeIn('slow');
											},
											blur: function(e) {
												$('.schide5').fadeOut('slow');
											}
									});


									$('#advanced_5_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_5_MODE').attr('checked',true);

										$(this).removeClass('button-secondary');
										$('#basic_5_mode').removeClass('button-primary');

										$(this).addClass('button-primary');
										$('#basic_5_mode').addClass('button-secondary');

										$('.group_5_basic').hide();
										$('.group_5_advanced').fadeIn( 'slow' );


									});
									
									$('#basic_5_mode').click(function(){
										$('#GARD_PRO_DEMO_ADVANCED_5_MODE').attr('checked',false);

										$(this).removeClass('button-secondary');
										$('#advanced_5_mode').removeClass('button-primary');
										
										$(this).addClass('button-primary');
										$('#advanced_5_mode').addClass('button-secondary');

										$('.group_5_advanced').hide();
										$('.group_5_basic').fadeIn( 'slow' );
									});



									$('#ad_5_border').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_5_title').spectrum({
										color: 'blue',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_5_background').spectrum({
										color: '#FFFFFF',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_5_text').spectrum({
										color: '#000000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});
									$('#ad_5_url').spectrum({
										color: '#008000',
										clickoutFiresChange: true,
										showInput: true,
										preferredFormat: 'hex'
									});



									$('#ad_5_border').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_5').css('border', '1px '+textcolor+' solid');
									});
									$('#ad_5_title').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_title_5').css('color', textcolor);
									});
									$('#ad_5_background').change(function(){
										var textcolor = $(this).val();
										if ( textcolor == '') { var textcolor = '#ff0'; }
										$('#sample_ad_5').css('background-color', textcolor);
									});
									$('#ad_5_text').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_text_5').css('color', textcolor);
									});
									$('#ad_5_url').change(function(){
										var textcolor = $(this).val();
										$('#sample_ad_url_5').css('color', textcolor);
									});

									$('#ad_5_radius').change(function(){
										var radius = $(this).val();
										$('#sample_ad_5').css('border-radius', radius+'px');
									});

									$('input[name="GARD_PRO_DEMO_GROUP_5_SC"]').keyup(function() {
										var raw_text =  jQuery(this).val();
										var return_text = raw_text.replace(/[^a-zA-Z0-9_]/g,'');
										jQuery(this).val(return_text);
									});

												});
			});

		</script>
		
	</div><!-- wpbody-content -->
	</div>
	</form>
</div> 

<h1><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page_top' target='_blank' title='GARD Pro Official Website'>GET GARD PRO TODAY</a></h1>
<b>Upgrade to <a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank'>GARD Pro</a> today</b>

<ul style='list-style: disc;margin-left:50px;'>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>100% MONEY BACK GUARANTEE</b></a> - 180 day money back guarantee! If at anytime in the first 180 days after your purchase of GARD Pro, you decide that you want a refund, just ask! No questions asked, 100% money back guarantee. We want you to be satisfied, with our product. If you want features added, please ask!</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>WORKS ON ALL DEVICES</b></a> - The driving force behind GARD Pro is that it works on any device. No matter how your website visitors choose to access your website, rest assured that GARD Pro will serve up the right sized AdSense ad.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>FREE UPGRADES FOR LIFE</b></a> - Anytime we have an upgraded version of GARD Pro available, you’ll get it free! Forever! Updating is super easy. Update GARD Pro as you do any other WordPress plugin, right in your WordPress dashboard.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>5 AD WIDGETS INCLUDED</b></a> - GARD Pro includes 5 custom ad widgets! One for each custom group. You can have a widget for responsive banners, one for responsive skyscrapers, one for responsive squares, one for responsive rectangles, and one for link units.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>ADSENSE POLICY COMPLIANT</b></a> - GARD Pro enforces Google AdSense policies. We limit image ads to 3 per page, text ads to 3 per page, and 300×600 ads to one per page. Never worry about being banned for misuse of AdSense!</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>5 AD GROUPS</b></a> - Create ad groups. This allows you to have groups specific to links, banners, skyscrapers, etc.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>CUSTOM SHORTCODE</b></a> - Define a custom shortcode for inserting each group into the content.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>AUTO INSERT</b></a> - Auto insert responsive AdSense ads into user specified content types.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>MAGIC TOOL INCLUDED</b></a> - With our Magic tool, you can simply paste your current AdSense code, and click a single button to insert it into the GARD Pro settings page.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>PERFECT FOR BEGINNERS AND ADVANCED USERS</b></a> - Every GARD Pro config page has two modes, BASIC and ADVANCED. Basic mode provides faster and easier setup, while Advanced mode offers better ad tracking, and more flexible styling.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>EASILY CLONE AD GROUPS</b></a> - Every ad group has the ability to be cloned for ease of setup. Set up all your ads once, then clone that group for different styling, or anything else you can imagine!</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>FILTER OUT BAD THINGS</b></a> - Have an article on gambling that you don’t want ads on? No problem. What about a website linking to you that you don’t want to show ads to the visitors of? Piece of cake. Want to block ads to your work and home computers? Easy peasy.</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>SUGGESTED SIZES</b></a> - We label ad sizes which are best for certain areas, such as your sidebar, or header. If you use the Basic Group Settings mode, then all you have to do is check the boxes next to the size you want!</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>SETS UP IN UNDER 2 MINUTES</b></a> - With GARD Pro, you can easily set up AdSense that fits every screen size possible. Just drop in your publisher ID, check a few boxes, and you can be up and running in less than 2 minutes!</li>
	<li><a href='<?php echo GARD_PRO_LINK ?>?so=GARD_PRO_DEMO_page' target='_blank' title='GARD Pro Official Website'><b>ANYTIME UPGRADE</b></a> - You can upgrade anytime with NO PENALTY. Just post in our support forums letting us know that you want to upgrade your license. We’ll send you a coupon good for the purchase price of your initial purchase. You can use this discount towards any package above the level you previously purchased.</li>
</ul>