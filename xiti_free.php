<?php
/*
Plugin Name: Xiti free
Plugin URI: http://vm.damota.net/category/xiti-free/
Description: Xiti free Plugin for Wordpress
Author: vilain_mamuth
Version: 0.4
*/
require_once realpath(dirname(__file__) . '/lib/config_xiti_free.php');
require_once realpath(dirname(__file__) . '/lib/functions.inc.php');		
add_action('wp_footer', 'vmxf_print');
?>
