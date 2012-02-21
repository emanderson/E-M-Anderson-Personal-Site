<?php
/*
Plugin Name: Disable WordPress Plugin Updates
Description: Disables the plugin update checking and notification system.
Plugin URI:  http://lud.icro.us/disable-wordpress-plugin-updates/
Version:     1.0
Author:      John Blackbourn
Author URI:  http://johnblackbourn.com/

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/

add_action( 'admin_menu', create_function( '$a', "remove_action( 'load-plugins.php', 'wp_update_plugins' );") );
	# Why use admin_menu? It's the only hook available between the above hook being added and being applied
add_filter( 'pre_option_update_plugins', create_function( '$a', "return null;" ) );

?>