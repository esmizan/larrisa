<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !class_exists( 'RDTheme_VC_Award_Box' ) ) {

	class RDTheme_VC_Award_Box extends RDTheme_VC_Modules {

		public function __construct(){
			$this->name = __( "Miako: Award Box", 'miako-core' );
			$this->base = 'miako-vc-awardbox';
			parent::__construct();
		}

		public function fields(){
			$fields = array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon Type", 'miako-core' ),
					"param_name" => "icontype",
					'value' => array( 
						__( 'FlatIcon', 'miako-core' )     => 'flaticon',
						__( 'FontAwesome', 'miako-core' )  => 'fontawesome',
						__( 'Custom Image', 'miako-core' ) => 'image',
						),
					),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Flaticon', 'miako-core' ),
					'param_name' => 'icon_flat',
					"value" => 'flaticon-custom-target',
					'settings' => array(
						'emptyIcon' => false,
						'type' => 'flaticon',
						'iconsPerPage' => 160,
						),
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon' ),
						),
					),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'FontAwesome Icon', 'miako-core' ),
					'param_name' => 'icon_fa',
					"value" => 'fa fa-bar-chart',
					'settings' => array(
						'emptyIcon' => false,
						'iconsPerPage' => 160,
						),
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'fontawesome' ),
						),
					),
				array(
					"type" => "attach_image",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Upload icon image", 'miako-core' ),
					"param_name" => "image",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'image' ),
						),
					),
				array(
					"type" => "colorpicker",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon color", 'miako-core' ),
					"param_name" => "color",
					"value" => "#222222",
					'dependency' => array(
						'element' => 'icontype',
						'value'   => array( 'flaticon', 'fontawesome' ),
						),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon size", 'miako-core' ),
					"param_name" => "size",
					'description' => __( 'Icon size in px eg. 30', 'miako-core' ),
					"value" => 30,
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Icon padding", 'miako-core' ),
					"param_name" => "icon_padding",
					'description' => __( "Icon padding in px eg. 15. Doesn't work on custom image" , 'miako-core' ),
					"value" => 30,
					),
				array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content", 'miako-core' ),
					"param_name" => "content",
					"value" => __( 'I am Info Text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Font Size", 'miako-core' ),
					"param_name" => "content_size",
					'description' => __( 'Content font size in px eg. 15. If not defined, default body font size will be used', 'miako-core' ),
					),
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Content Width", 'miako-core' ),
					"param_name" => "width",
					'description' => __( "Content maximum width in px eg 360. Keep this field empty if you want full width", 'miako-core' ),
					),
				array(
					'type' => 'css_editor',
					'heading' => __( 'Css', 'miako-core' ),
					'param_name' => 'css',
					'group' => __( 'Design options', 'miako-core' ),
					),
				);
			return $fields;
		}

		public function shortcode( $atts, $content = '' ){
			extract( shortcode_atts( array(
				'icontype'       	=> 'flaticon',
				'icon_flat'      	=> 'flaticon-custom-target',
				'icon_fa'        	=> 'fa fa-bar-chart',
				'color'          	=> '#222222',
				'image'          	=> '',
				'size'           	=> 30,
				'icon_padding'   	=> 30,
				'content_size'   	=> '',
				'width'          	=> '',
				'css'            	=> '',
				), $atts ) );

			// validation
			$size  		   = intval( $size );
			$icon_pad  = intval( $icon_padding );
			$icon  		   = ( $icontype == 'flaticon' ) ? $icon_flat : $icon_fa;

			if ( $icontype == 'flaticon' ) {
				vc_icon_element_fonts_enqueue( $icon );
			}
			
			$template = 'award-box';

			return $this->template( $template, get_defined_vars() );
		}
	}
}

new RDTheme_VC_Award_Box;