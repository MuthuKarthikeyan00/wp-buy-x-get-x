<?php
namespace App;

use \App\Controllers\ProductController;
use \App\Controllers\AddFreeProducts;




class Router
{
    public static $product_controller,$add_free_products;


    public function register()
    {
        self::$product_controller = empty( self::$product_controller) ?  new ProductController() : self::$product_controller;
        self::$add_free_products = empty( self::$add_free_products) ?  new AddFreeProducts() : self::$add_free_products;

        add_filter('woocommerce_product_options_pricing', array(self::$product_controller ,'addProductOptions'));
        add_action('woocommerce_process_product_meta', array(self::$product_controller ,'buyxGetxOptionSave'));
        add_action('woocommerce_before_calculate_totals', array(self::$add_free_products ,'add'),10,1);

    }

}


