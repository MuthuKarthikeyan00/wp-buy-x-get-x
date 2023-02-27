<?php

namespace App\Controllers;

class AddFreeProducts
{


    public function add($cart)
    {
            remove_action('woocommerce_before_calculate_totals', array($this ,'add'), 10);

            $product_ids = array();

            foreach ($cart->get_cart() as  $cart_item) {
                if (!array_key_exists("free_pro", $cart_item)) {
                    $temp_ids = get_post_meta($cart_item['product_id']);
                    if ($temp_ids['buyxgetx'][0] == "yes") {
                        $product_ids[] = $cart_item['product_id'];
                    }
                }else{
                    WC()->cart->remove_cart_item($cart_item['key']);
                }

            }

            foreach ($product_ids as $product_id) {

                $cart_item_data = array(
                    'free_pro' => 1,
                );

                foreach ($cart->get_cart() as  $cart_item) {
                    if (!array_key_exists("free_pro", $cart_item) && $cart_item['product_id'] == $product_id ) {
                        $free_pro_qty = $cart_item['quantity'];
                        WC()->cart->add_to_cart($product_id, $free_pro_qty, 0, array(), $cart_item_data);
                    }
                }

                foreach ($cart->get_cart() as  $cart_item) {

                    if (array_key_exists("free_pro", $cart_item)) {
                        $cart_item['data']->set_price(0);
                    }
                }
            }


    }

}

?>