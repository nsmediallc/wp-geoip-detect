Tests: [![Build Status](https://travis-ci.org/yellowtree/wp-geoip-detect.png?branch=master)](https://travis-ci.org/yellowtree/wp-geoip-detect)

# GeoIP Detection #

* **Contributors:** [benjaminpick] (http://profiles.wordpress.org/benjaminpick)

* **License:** [GPL v3 or later] (http://www.gnu.org/licenses/gpl-3.0.html)

Retrieving Geo-Information using the Maxmind GeoIP2 (Lite or Commercial) Database.

== Description ==

Provides geographic information detected by an IP adress. This can be used in themes or other plugins, as a shortcode, or via CSS body classes.

= Features: =

* Provides 3 functions: 
  * `geoip_detect2_get_info_from_ip($ip, $locales = array('en'))`: Lookup Geo-Information of the specified IP 
  * `geoip_detect2_get_info_from_current_ip($locales = array('en'))`: Lookup Geo-Information of the current website user
  * `geoip_detect2_get_external_ip_adress()`: Fetch the internet adress of the webserver
* You can use one of these data sources:
  * Free: [GeoIP2 Lite City](http://dev.maxmind.com/geoip/geoip2/geolite2/), automatically updated every month (licensed CC BY-SA. See FAQ.)
  * Commercial: [GeoIP2 City](https://www.maxmind.com/en/geoip2-country-database) or [GeoIP2 Country](https://www.maxmind.com/en/geoip2-city)
  * Soon: API: [GeoIP2 Precision: City](https://www.maxmind.com/en/geoip2-precision-city-service)
  * Free (default source): [HostIP.info](http://www.hostip.info/) (English only)
* For the property names, see the results of a specific IP in the wordpress backend (under *Tools > GeoIP Detection*).
* You can include these properties into your posts and pages by using the shortcode `[geoip_detect2 property="country.name" default="(country could not be detected)" lang="en"]` (where 'country.name' can be one of the other property names as well, and 'default' and 'lang' are optional).
* When enabled on the plugin page, it adds CSS classes to the body tag such as `geoip-country-DE` and `geoip-continent-EU`.
* When enabled on the plugin page, the client IP respects a reverse proxy of the server.

See [API Documentation](https://github.com/yellowtree/wp-geoip-detect/wiki/API-Documentation) for more info.

= How can I use these functions? =

* You could choose the currency of the store based on the country name
* You could suggest an timezone to use when displaying dates
* You could show the store nearest to your customer
* You show or hide content specific to a geographic target group
* Etc. ... You tell me! I'm rather curious what you'll do with this plugin!

**System Requirements**: You will need at least PHP 5.3.1.

*This product can provide GeoLite2 data created by MaxMind, available from http://www.maxmind.com.*

== Installation ==

* Install the plugin
* Go to the plugin page (under Tools) and choose a data source.
* Test it by clicking on "Lookup".

== Frequently Asked Questions ==

= How exact is this data? =

Think of it as an "educated guess": IP adresses and their allocation change on a frequent basis.
If you need more reliable data, consider purchasing the [commercial version of the data](https://www.maxmind.com/en/geoip2-city).
See [accuracy stats per country](https://www.maxmind.com/en/geoip2-city-database-accuracy).

= Technically speaking, how could I verify if my visitor comes from Germany? =

Put this code somewhere in your template files:

    $userInfo = geoip_detect2_get_info_from_current_ip();
    if ($userInfo->country->isoCode == 'de')
        echo 'Hallo! Schön dass Sie hier sind!';

To see which property names are supported, refer to the [Plugin Backend](http://wordpress.org/plugins/geoip-detect/screenshots/).

Or, add the plugin shortcode somewhere in the page or post content:

    Wie ist das Wetter in [geoip_detect2 property="country.name" lang="de" default="ihrem Land"] ?

For more information, check the [API Documentation](https://github.com/yellowtree/wp-geoip-detect/wiki/API-Documentation).  

= The Maxmind Lite databases are licensed Creative Commons ShareAlike-Attribution. When do I need to give attribution? =

Maxmind is writing:

    "In most cases, a Wordpress site or other site that auto-detects
    a default location/currency/language is not providing the GeoLite data
    to others so they do not need to attribute. In contrast, a site that
    allows users to look-up their own or other IP addresses would not 
    to attribute since the data is being provided to others. ...

    Please take a look at the following FAQ:
    https://wiki.creativecommons.org/FAQ#Do_I_always_have_to_attribute_the_creator_of_the_licensed_material.3F "

= Does this plugin work in a MultiSite-Network environment? =

Maybe. I haven't tested it.

== Screenshots ==

1. Backend page (under Tools > GeoIP Detection)

= 2.3.1 =

The plugin was down for licensing issues.
All users must now opt in to use the database because it is licensed CC BY-SA.
Otherwise, the Web-API of HostIP.info is used. 

= 2.3.0 =

The plugin was down for licensing issues.
All users must now opt in to use the database because it is licensed CC BY-SA.
Otherwise, the Web-API of HostIP.info is used. 

= 2.1.1 =

Update to v2.x is a major update.
At least PHP 5.3.1 is required now.
See Migration Guide at https://github.com/yellowtree/wp-geoip-detect/wiki/How-to-migrate-from-v1-to-v2

= 2.0.1 =

This major update uses the new Maxmind API (v2). 
At least PHP 5.3.1 is required now.
See Migration Guide at https://github.com/yellowtree/wp-geoip-detect/wiki/How-to-migrate-from-v1-to-v2

= 1.7.1 =

Cron update was broken again ...

= 1.6 =

Automatic weekly update didn't work in all installations.

= 1.5 =

Fixing automatic weekly updates.


== Changelog ==

= 2.3.1 =
* NEW: API function geoip_detect2_get_current_source_description() (as there are different sources to choose from now)
* FIX: Show error message if PHP < 5.3 (instead of fatal error)

= 2.3.0 =
* NEW: Add HostIP.info-Support

= 2.2.0 =
* FIX: Update Maxmind Reader to 1.0.3 (fixing issues when the PHP extension mbstring was not installed)
* NEW: Commercial databass are now supported. You can specify a file path in the options.
* NEW: A country database (lite or commercial) database now works as well.

= 2.1.2 =
* FIX: Show error message if PHP < 5.3 (instead of fatal error)
* FIX: Support multiple proxies (but currently only one reverse proxy)

= 2.1.1 =
* FIX: Notice "Database missing" should not show during/right after database update.

= 2.1.0 =
* NEW: A nagging admin notice shows up on every wp-admin page when no database is installed (yet).

= 2.0.1 =
* NEW: Using v2 version of the API.
See Migration Guide at [Github](https://github.com/yellowtree/wp-geoip-detect/wiki/How-to-migrate-from-v1-to-v2)

Other changes:

* NEW: The v2-functions now support location names in other locales. By default, they return the current site language if possible.
* NEW: The new shortcode [geoip_detect2 ...] also supports a "lang"-Attribute.
* NEW: IPv6 addresses are now supported as well.
* Legacy function names and shortcode should work in most cases. For details check the guide above.

= 2.0.0 =

(Was not released on wordpress.org to make sure that development releases get this update as well.)

= 1.8 =
* NEW: Support reverse proxies (you have to enable it in the plugin options.)
* NEW: Shortcode now has a default value when no information for this IP found.

= 1.7.1 =
* FIX: Fatal error on cron run

= 1.7 =
* FIX: Schedule Database update to do in background immediately after plugin installation/re-activation.
* FIX: Longitude can be smaller than -90

= 1.6 =
* NEW: Can add a country- and continent-specific class on the body tag. You need to activate this in the options.
* FIX: Automatic weekly update. (Didn't work on all installations).
* FIX: Do not include Maxmind Libraries again if already included by another plugin/theme

= 1.5 =
* FIX: Automatic weekly update. Go to the plugin page (Tools menu) to verify that an update is planned.

= 1.4 =
* Feature: Add shortcode [geoip_detect property="(property name)"] for direct use in posts/pages

= 1.3 =
* FIX: Manual install works again (was broken since 1.2)

= 1.2 =
* FIX: property region_name is now filled again (was broken since 1.1) 

= 1.1 =
* Add function `geoip_detect_get_external_ip_adress()`: Ask a webservice to tell me the external IP of the webserver.
* New filter: When developing locally, the external IP is used to determine the geographic location.

= 1.0 =
* First working release.
