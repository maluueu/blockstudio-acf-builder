<?php


	namespace Inc\Api;

	use StoutLogic\AcfBuilder\FieldsBuilder as FieldBuilder;

	/**
	 * Class BlockStudioApo
	 *
	 * @package Inc\Api
	 */
	class BlockStudioApi {
		
		
		// just included one function, but you can spin them up for every field type if you want. 
		public static function text ( string $name, string $label  , $default = '', $max = '', $instructions = ''  ) {

			$text = new FieldBuilder( $name );
			$text->addText( $name, [

				'label'                 => $label,
				'default_value'         => $default,
				'maxlength'            => $max,
				'instructions'          => $instructions,
				'instruction_placement' => 'tooltip',
				'wrapper'               => [
					'width' => '100%',
					'class' => 'snicco-field snicco-text',

				],

			] );

			return $text->build()['fields'];

		}


		public static function sanitize( array $field, string $type ) {


			$field= get_field($field[0]['name']);

			// Bail if field is not found.
			if(!$field) return;

			switch ($type) {

				case 'html':

				return esc_html($field);
				break;

				case 'attr':

				return esc_attr($field);
				break;

				case 'url':

				return esc_url($field);
				break;

				case 'urlraw':

				return esc_url_raw($field);
				break;

				case 'js':

				return esc_js($field);
				break;



			}

		}



	}
