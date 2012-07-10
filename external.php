<?php

define( 'WP_DEBUG', false );
ini_set( 'display_errors', 0 );

require_once('../../../wp-load.php');

require_once( 'wp_mvc/init.php' );

$mm_wp_api_app = new \WpMvc\Application();

$mm_wp_api_app->init( 'MmWpApi', '.' );

// WP: Add pages
//global $mm_wp_api_app;
//var_dump($mm_wp_api_app->mm_wp_api_controller);
$mm_wp_api_app->mm_wp_api_controller->api_call();
