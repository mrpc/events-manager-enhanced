<?php

/*
  Plugin Name: Events Manager Enhanced
  Version: 0.1
  Plugin URI: http://wp-events-plugin.com
  Description: Enhancements on Events Manager plugin. Adds support for qTranslate.
  Author: Pramnnos Hosting Ltd.
  Author URI: http://www.pramhost.com
 */


if (!function_exists('add_action')) {
    echo "Oooops...";
    exit;
}
if (!defined('SP')) {
    define('SP', true);
}


add_action('plugins_loaded', 'emeInit', 0);

function emeInit()
{
    /**
     * Check if Events Manager is active
     * */
    if (in_array('events-manager/events-manager.php',
                    apply_filters('active_plugins',
                            get_option('active_plugins')))) {
        require_once dirname(__FILE__) . '/plugin.php';
    }
}
