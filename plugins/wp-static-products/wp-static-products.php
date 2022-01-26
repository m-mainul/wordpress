<?php

/**
 * Plugin Name: WP Static Products
 * Plugin URI: https://github.com/m-mainul/wordpress
 * Description: Display list of static products.
 * Version: 0.1
 * Author: Mainul Hasan (moh.mainul.hasan@gmail.com)
 * Author URI: https://github.com/m-mainul
 */

add_action( 'admin_menu', 'wp_fedex_static_products' );

function wp_fedex_static_products() {
    add_menu_page(
        'Static Products',
        'Static Products',
        'manage_options',
        'wp-static-products',
        'wp_fedex_static_products_view',
        'dashicons-buddicons-groups'
    );
}

function wp_fedex_static_products_view() {
    require_once __DIR__ . '/static-products-view.php';
}