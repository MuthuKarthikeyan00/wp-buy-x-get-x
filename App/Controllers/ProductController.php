<?php

namespace App\Controllers;

class ProductController
{

    public function addProductOptions()
    {
        woocommerce_wp_checkbox(array(
            'id' => 'buyxgetx',
            'label' => 'Buy X Get X',
            'description' => 'Check this box to enable Buy X Get X for this product.',
            'desc_tip' => true,
        ));
    }

    public function buyxGetxOptionSave($post_id)
    {
        $buyxgetx = isset($_POST['buyxgetx']) ? 'yes' : 'no';
        update_post_meta($post_id, 'buyxgetx', $buyxgetx);
    }
}

?>