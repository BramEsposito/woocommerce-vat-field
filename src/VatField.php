<?php

namespace B35\WoocommerceVatField;

class VatField {

	public function __construct() {
        add_filter( 'woocommerce_default_address_fields' , array($this, 'add_vat_checkout_field'), 9999 );

        add_action( 'admin_menu', array($this,'add_reusable_blocks_admin_menu' ));
	}

    function add_reusable_blocks_admin_menu() {
        add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
    }

    function add_vat_checkout_field( $address_fields ) {
        $address_fields['vat']['placeholder'] = __('VAT Number',"woocommerce-vat-field");
        $address_fields['vat']['label'] = __('VAT Number',"woocommerce-vat-field");
        $address_fields['vat']['label'] = __('VAT Number',"woocommerce-vat-field");
        $address_fields['vat']['required']  = false;
        $address_fields['vat']['class']     = array('form-row-last');
        $address_fields['vat']['clear']     = true;
        $address_fields['vat']['priority']  = 30;
        $address_fields['vat']['autocomplete']  = "null";
        return $address_fields;
    }
}
