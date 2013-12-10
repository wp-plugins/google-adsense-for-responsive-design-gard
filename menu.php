<?php

		$page_title = 'GARD - Google AdSense for Responsive Design';
		$menu_title = 'GARD';
		$capability = 'manage_options';
		$menu_slug = 'gard';
		$function = 'gard_options_page' ;
		$icon_url = plugins_url().'/google-adsense-for-responsive-design-gard/icon.png';
		$icon_url = plugin_dir_url( __FILE__ ).'icon.png';
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function , $icon_url ); 

    // HELP PAGE
		$parent_slug = 'gard';
		$page_title = 'GARD Help';
		$menu_title = 'GARD Help';
		$capability = 'manage_options';
		$menu_slug = 'gard-help';
		$function  = 'gard_help' ;
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

    // PRO PAGE
		$parent_slug = 'gard';
		$page_title = 'GARD Pro Demo';
		$menu_title = 'GARD Pro Demo';
		$capability = 'manage_options';
		$menu_slug = 'gard-pro-info';
		$function  = 'gard_pro_settings' ;
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );