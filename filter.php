<?php

add_filter('body_class', 'geoip_add_body_classes');
function geoip_add_body_classes($classes) {
	if (!get_option('geoip-detect-set_css_country'))
		return $classes;
	
	$info = geoip_detect_get_info_from_current_ip();
	if (!$info)
		return $classes;
	
	$classes[] = 'geoip-country-' . $info->country_code;
	$classes[] = 'geoip-continent-' . $info->continent_code;

	return $classes;
}

add_filter('geoip_detect2_locales', 'geoip_detect2_add_default_locales');

function geoip_detect2_add_default_locales($locales) {
	if (is_null($locales)) {
		$locales = array();
		
		$site_locale = get_locale();
		if ($site_locale)
			$locales[] = substr($site_locale, 0, 2);
		$locales[] = 'en';
	}
	return $locales;
}