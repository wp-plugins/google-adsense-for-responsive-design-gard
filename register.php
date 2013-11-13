<?php
# GLOBAL

	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_ID');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_UNINSTALL');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_HELP');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_YELLOW');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_CSS');

# ADVANCED

	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_ASYNC');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_MOBILE_ADVANCED');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_ADVANCED_MODE');

# BASIC

	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_TYPE');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_RADIUS');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_BORDER');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_TITLE');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_BACKGROUND');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_TEXT');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_AD_URL');
	register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_MOBILE_BASIC');

# AD SIZES
	
	global $adsizes;
	foreach($adsizes as $size => $key) {
		register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_'.$size);
		register_setting(GARDPLUGINOPTIONS_ID.'_options', 'GARD_'.$size.'_BASIC');
	}