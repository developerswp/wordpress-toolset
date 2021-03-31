<?php
/*
Plugin Name: Wordpress Toolset
Plugin URI:  https://profiles.wordpress.org/rishijadaun/
Description: Wordpress Toolset is powerful and easy to use plugin that canimproves WordPress & Custom Fields and Custom Post and intuitive fields. This plugin aims to provide a powerful administration framework with a wide range of improvements & optimizations.
Version:     3.3.4
Author:      Rishikesh Singh
Author URI:  http://rishi.joomla.com
License:     GPL2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wordpress-toolset

Wordpress Toolset is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Wordpress Toolset is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Post Toolset. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/



// abort if called directly
if ( ! function_exists( 'add_action' ) ) {
	die( 'Wordpress Toolset is a WordPress plugin and can not be called directly.' );
}

// version
if( ! defined( 'TYPES_VERSION' ) ) {
	define( 'TYPES_VERSION', '3.3.4' );
}

// backward compatibility
if ( ! defined( 'WPCF_VERSION' ) ) {
	define( 'WPCF_VERSION', TYPES_VERSION );
}

/*
 * Path Constants
 */
if ( ! defined( 'TYPES_ABSPATH' ) ) {
	define( 'TYPES_ABSPATH', dirname( __FILE__ ) );
}


if ( ! defined( 'TYPES_RELPATH' ) ) {
	define( 'TYPES_RELPATH', plugins_url() . '/' . basename( TYPES_ABSPATH ) );
}

if ( ! defined( 'TYPES_DATA' ) ) {
	define( 'TYPES_DATA', dirname( __FILE__ ) . '/application/data' );
}

if ( ! defined( 'TYPES_TEMPLATES' ) ) {
	define( 'TYPES_TEMPLATES', dirname( __FILE__ ) . '/application/views' );
}

/*
 * Bootstrap Types
 */
require_once( dirname( __FILE__ ) . '/application/bootstrap.php' );

/*
 * Compatibilities Switches
 */
add_action( 'plugins_loaded', function() {
	if( ! defined( 'TOOLSET_TYPES_YOAST' ) ) {
		// Yoast Compatibility
		define( 'TOOLSET_TYPES_YOAST', defined( 'WPSEO_VERSION' ) );
	}
} );

//
// Activation and deactivation hooks must be defined in the main file.
//
register_deactivation_hook( __FILE__, 'wpcf_deactivation_hook' );
register_activation_hook( __FILE__, 'wpcf_activation_hook' );

