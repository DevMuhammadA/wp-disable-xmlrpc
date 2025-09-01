<?php
/**
 * Plugin Name: Disable XML-RPC
 * Description: Disables XML-RPC endpoints to reduce brute-force and pingback abuse.
 * Version: 1.0.0
 * Author: Muhammad Ahmed
 * License: GPL-2.0-or-later
 * Text Domain: wp-disable-xmlrpc
 */

if (!defined('ABSPATH')) exit;

add_filter('xmlrpc_enabled', '__return_false');

add_action('init', function () {
    if (strpos($_SERVER['REQUEST_URI'] ?? '', 'xmlrpc.php') !== false) {
        status_header(403);
        exit('XML-RPC disabled.');
    }
});
