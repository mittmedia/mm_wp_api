<?php
/*
Plugin Name: Mittmedia Wordpress API
Plugin URI: https://github.com/mittmedia/mm_wp_api
Description: Adds user meta with users topic of choice.
Version: 1.0.0
Author: Fredrik Sundström
Author URI: https://github.com/fredriksundstrom
License: MIT
*/

/*
Copyright (c) 2012 Fredrik Sundström

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/

require_once( 'wp_mvc/init.php' );

$mm_wp_api_app = new \WpMvc\Application();

$mm_wp_api_app->init( 'MmWpApi', WP_PLUGIN_DIR . '/mm_wp_api' );

// WP: Add pages
add_action( 'network_admin_menu', 'mm_wp_api_add_pages' );
function mm_wp_api_add_pages()
{
  add_submenu_page( 'settings.php', 'Mittmedia Wordpress API', 'Mittmedia Wordpress API', 'manage_network', 'mm_wp_api', 'mm_wp_api_settings_page');
}

function mm_wp_api_settings_page()
{
  global $mm_wp_api_app;
  global $current_site;

  $mm_wp_api_app->mm_wp_api_controller->index();
}
