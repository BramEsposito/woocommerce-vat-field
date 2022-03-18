<?php

namespace B35\WoocommerceVatField;

class VatField {

	public function __construct() {
        add_filter( 'woocommerce_default_address_fields', array($this, 'add_vat_checkout_field'), 99999 );
        add_filter( 'woocommerce_customer_meta_fields', array($this, 'misha_admin_address_field') );
        add_filter( 'woocommerce_order_get_formatted_billing_address', array($this, 'order_details_billing_add_vat_field'), 10, 3 );
        add_filter( 'woocommerce_order_get_formatted_shipping_address', array($this, 'order_details_shipping_add_vat_field'), 10, 3 );
        add_filter( 'woocommerce_admin_billing_fields', array($this, 'order_edit_shipping_info_form_add_vat_field'), 10, 1 );
        add_action( 'woocommerce_admin_order_data_after_order_details', array($this, "add_edit_order_css"));

        add_action( 'admin_menu', array($this,'add_reusable_blocks_admin_menu' ));
	}

    function add_reusable_blocks_admin_menu() {
        add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
    }


    function add_edit_order_css(  ) {
        print "<style>
#order_data .order_data_column ._billing_company_field {
    width: 48%;
    clear: left;
}
#order_data .order_data_column ._billing_vat_field {
    float: right;
    clear: right;
}
</style>
        ";
    }


    function order_edit_shipping_info_form_add_vat_field( $fields ) {
        $fields['company']['class'] = array('form-row-wide');
        return $this->array_insert_value_at_index($fields, ['vat' => $this->get_vat_field()], 3);
    }


    function order_details_billing_add_vat_field( $address, $raw_address, $order ) {
        $a = $raw_address['company']."<br>";
        if  ($order->get_meta('_billing_vat') != "") {
            $a .= $order->get_meta('_billing_vat')."<br>";
        }
        $a .= $raw_address['first_name']." ".$raw_address['last_name']."<br>";
        $a .= $raw_address['address_1']."<br>";
        if  ($raw_address['address_2'] != "") {
            $a .= $raw_address['address_2']."<br>";
        }
        $a .= $raw_address['postcode']." ".$raw_address['city']."<br>";
        if  ($raw_address['state'] != "") {
            $a .= $raw_address['state']."<br>";
        }

        return $a;
    }

    function order_details_shipping_add_vat_field( $address, $raw_address, $order ) {
        $a = $raw_address['company']."<br>";
        if  ($order->get_meta('_shipping_vat') != "") {
            $a .= $order->get_meta('_shipping_vat')."<br>";
        }
        $a .= $raw_address['first_name']." ".$raw_address['last_name']."<br>";
        $a .= $raw_address['address_1']."<br>";
        if  ($raw_address['address_2'] != "") {
            $a .= $raw_address['address_2']."<br>";
        }
        $a .= $raw_address['postcode']." ".$raw_address['city']."<br>";
        if  ($raw_address['state'] != "") {
            $a .= $raw_address['state']."<br>";
        }

        return $a;
    }


    function misha_admin_address_field( $admin_fields ) {

        $admin_fields['billing']['fields'] =  $this->array_insert_value_at_index(
            $admin_fields['billing']['fields'],
            ["billing_vat" => $this->get_admin_vat_field()],
            3
        );

        $admin_fields['shipping']['fields'] =  $this->array_insert_value_at_index(
            $admin_fields['shipping']['fields'],
            ["shipping_vat" => $this->get_admin_vat_field()],
            4
        );

        return $admin_fields;
    }

    function get_admin_vat_field() {
        $field = $this->get_vat_field();

        $field['class'] = 'regular-text';
        return $field;
    }

    function get_vat_field() {
        // TODO: make required if logged-in
        return [
            'placeholder' => __('VAT Number',"woocommerce-vat-field"),
            'label' => __('VAT Number',"woocommerce-vat-field"),
            'required'  => false,
            'class'     => array('form-row-wide'),
            'clear'     => true,
            'priority'  => 31,
            'autocomplete'  => "null"
        ];
    }

    function add_vat_checkout_field( $address_fields ) {
        return $this->array_insert_value_at_index($address_fields, ["vat" => $this->get_vat_field()], 2 );
    }


    function array_insert_value_at_index( $array, $value, $pos ) {
        return array_merge(array_slice($array, 0, $pos), $value, array_slice($array, $pos));
    }
}
