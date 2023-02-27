<?php
/*
Plugin Name: WooCommerce Buy X Get X
Plugin URI: https://yourpluginurl.com
Description: Buy X Get X free for Product A.
Version: 1.0
Author: Your Name
Author URI: https://yourwebsite.com
*/





defined('ABSPATH') or die('not access');

defined('ABSPATH') or die('not access');

defined('PLUGIN_PATH') or define('PLUGIN_PATH',plugin_dir_path(__FILE__));
defined('PLUGIN_URL') or define('PLUGIN_URL',plugin_dir_url(__FILE__));
defined('PLUGIN') or define('PLUGIN',plugin_basename(__FILE__));


if(file_exists( PLUGIN_PATH.'/vendor/autoload.php' )){
    require_once PLUGIN_PATH.'/vendor/autoload.php';
}else{
    die();
}

if(class_exists('App\\Router')){
    $router =  new App\Router();
    $router->register();
}else{
    die();
}