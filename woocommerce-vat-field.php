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

var_dump(__DIR__ );

$data = require __DIR__ . '/lib/composer/autoload_psr4.php';

var_dump($data);

use B35\WoocommerceVatField\VatField;

if ( ! class_exists('VatField'))
    die('There is no hope!');

die('there is actually HOPE!');

$vat_field = new VatField();
