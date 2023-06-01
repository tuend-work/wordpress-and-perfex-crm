<?php
/**
 * Plugin Name: aSync Data Between Wordpress And Perfex CRM
 * Plugin URI: https://wpcenter.vn/perfex-crm-sync
 * Description: Sync between WordPress and Perfex CRM.
 * Version: 1.0.0
 * Author: TUEND
 * Author URI: ttps://wpcenter.vn/tuend
 * Prefix: pfcrm
 */

function pfcrms_load_textdomain() {
    load_plugin_textdomain( 'wordpress-and-perfex-crm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'pfcrms_load_textdomain' );


// Register the activation hook
register_activation_hook( __FILE__, 'pfcrms_plugin_activation' );

function pfcrms_plugin_activation() {
    // Add your code to run on activation here
}

// Register the deactivation hook
register_deactivation_hook( __FILE__, 'pfcrms_plugin_deactivation' );

function my_perfeccrm_plugin_deactivation() {
    // Add your code to run on deactivation here
}

























// Register the woocommerce_new_order hook
add_action( 'woocommerce_new_order', 'my_perfeccrm_plugin_update_order_to_perfeccrm', 10, 2 );

function my_perfeccrm_plugin_update_order_to_perfeccrm( $order_id, $order ) {
	//var_dump($order);
	//error_log(json_encode($order));
}

//add_action( 'woocommerce_checkout_order_processed', 'create_invoice_for_wc_order',  1, 1  );
function create_invoice_for_wc_order($order_id) {
$order = new WC_Order( $order_id );
error_log("ORDER: ".json_encode($order));
print_r($order);
//order items
$items = $order->get_items();
print_r($items);
error_log("ITEM: ".json_encode($items));
}