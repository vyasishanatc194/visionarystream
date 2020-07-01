<?php
/**
 * Checkout Files Upload - Template Section Settings
 *
 * @version 1.3.0
 * @since   1.1.0
 * @author  Algoritmika Ltd.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Alg_WC_Checkout_Files_Upload_Settings_Template' ) ) :

class Alg_WC_Checkout_Files_Upload_Settings_Template extends Alg_WC_Checkout_Files_Upload_Settings_Section {

	/**
	 * Constructor.
	 *
	 * @version 1.1.0
	 * @since   1.1.0
	 */
	function __construct() {
		$this->id   = 'template';
		$this->desc = __( 'Template', 'checkout-files-upload-woocommerce' );
		parent::__construct();
	}

	/**
	 * get_settings.
	 *
	 * @version 1.3.0
	 * @since   1.1.0
	 */
	function get_settings() {
		$settings = array(
			array(
				'title'    => __( 'Form Template Options', 'checkout-files-upload-woocommerce' ),
				'type'     => 'title',
				'id'       => 'alg_checkout_files_upload_form_template_options',
			),
			array(
				'title'    => __( 'Before', 'checkout-files-upload-woocommerce' ),
				'id'       => 'alg_checkout_files_upload_form_template_before',
				'default'  => '<table>',
				'type'     => 'textarea',
				'css'      => 'width:100%;',
			),
			array(
				'title'    => __( 'Label', 'checkout-files-upload-woocommerce' ),
				'desc_tip' => __( 'Replaced values: %field_id%, %field_label%, %required_html%.', 'checkout-files-upload-woocommerce' ),
				'id'       => 'alg_checkout_files_upload_form_template_label',
				'default'  => '<tr><td colspan="2" style="text-align: left;"><label for="%field_id%">%field_label%</label>%required_html%</td></tr>',
				'type'     => 'textarea',
				'css'      => 'width:100%;',
			),
			array(
				'title'    => __( 'Field (Simple)', 'checkout-files-upload-woocommerce' ),
				'desc_tip' => __( 'Replaced values: %field_html%, %button_html%.', 'checkout-files-upload-woocommerce' ),
				'id'       => 'alg_checkout_files_upload_form_template_field',
				'default'  => '<tr><td style="width:50%;">%field_html%</td><td style="width:50%;">%button_html%</td></tr>',
				'type'     => 'textarea',
				'css'      => 'width:100%;',
			),
			array(
				'title'    => __( 'Field (AJAX)', 'checkout-files-upload-woocommerce' ),
				'desc_tip' => __( 'Replaced values: %field_html%, %button_html%.', 'checkout-files-upload-woocommerce' ),
				'id'       => 'alg_checkout_files_upload_form_template_field_ajax',
				'default'  => '<tr><td colspan="2" style="text-align: left;">%field_html%</td></tr>',
				'type'     => 'textarea',
				'css'      => 'width:100%;',
			),
			array(
				'title'    => __( 'After', 'checkout-files-upload-woocommerce' ),
				'id'       => 'alg_checkout_files_upload_form_template_after',
				'default'  => '</table>',
				'type'     => 'textarea',
				'css'      => 'width:100%;',
			),
			array(
				'type'     => 'sectionend',
				'id'       => 'alg_checkout_files_upload_form_template_options',
			),
			array(
				'title'    => __( 'Styling Options', 'checkout-files-upload-woocommerce' ),
				'type'     => 'title',
				'id'       => 'alg_checkout_files_upload_form_styling_options',
			),
			array(
				'title'    => __( 'AJAX "Delete" button style', 'checkout-files-upload-woocommerce' ),
				'id'       => 'alg_checkout_files_upload_form_style_ajax_delete',
				'default'  => 'color:red;',
				'type'     => 'text',
			),
			array(
				'type'     => 'sectionend',
				'id'       => 'alg_checkout_files_upload_form_styling_options',
			),
		);
		return $settings;
	}

}

endif;

return new Alg_WC_Checkout_Files_Upload_Settings_Template();
