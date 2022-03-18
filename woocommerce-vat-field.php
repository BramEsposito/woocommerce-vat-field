<?php
/*
Plugin Name: WooCommerce VAT Field
Plugin URI: http://bramesposito.com/plugins/
Description: Add a VAT field to your Woocommerce checkout
Author: Bram Esposito
Author URI: http://bramesposito.com
Version: 0.1
Text Domain: woocommerce-vat-field
License: MIT License
*/

defined( 'ABSPATH' ) || exit;

require __DIR__ . '/lib/autoload.php';

use B35\WoocommerceVatField\VatField;

$vat_field = new VatField();

/**
 * @param array      $array
 * @param int|string $position
 * @param mixed      $insert
 */
function array_insert($array, $length, $insert)
{
    return array_merge(array_slice($array, 0, $length), $insert, array_slice($array, $length, count($array)-$length));
}
