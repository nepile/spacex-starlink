<?php
/*
// . Supported Fields : text, number, textarea, textarea_html, select, icon_select, checkbox, multi_select, multi_checkbox, radio, image, gallery, file, color_picker, date_picker, time_picker, time_picker_24
// . Supported Params : label, type, value, desc
// . Special Fields   : header, group, repeater
// . Special Params   : button(repeater)
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RT_Postmeta_Fields' ) ) {

	class RT_Postmeta_Fields {

		public function display_fields( $fields, $post_id ) {
			echo '<table class="rt-postmeta-container">';

			foreach ( $fields as $key => $field ) {
				// Display group field
				if ( $field['type'] == 'group' ) {
					// $parent_key = $key. "['$key']";
					foreach ( $field['value'] as $key2 => $field2 ) {
						$parent_key = $key . "[$key2]";
						$default    = get_post_meta( $post_id, $key, true );
						$default    = empty( $default[ $key2 ] ) ? false : $default[ $key2 ];
						$this->display_single_field( $parent_key, $field2, $post_id, $default );
					}
				} // Display repeater field
				elseif ( $field['type'] == 'repeater' ) {
					$this->display_repeater_field( $key, $field, $post_id );
				} // Display single field
				else {
					$this->display_single_field( $key, $field, $post_id );
				}
			}

			echo '</table>';
		}

		private function display_repeater_field( $key, $field, $post_id ) {
			$meta = get_post_meta( $post_id, $key, true );

			if ( empty( $meta ) ) {
				$meta = [];
			}
			$count = count( $meta );

			echo ! empty( $field['label'] ) ? '<tr><th colspan="2">' . esc_html( $field['label'] ) . ':</th></tr>' : '';
			echo '<tr><td colspan="2" class="rt-postmeta-repeater-wrap" data-num="' . $count . '" data-fieldname="' . esc_attr( $key ) . '">';

			// First Hidden Item
			echo '<table class="rt-postmeta-repeater repeater-init">';
			foreach ( $field['value'] as $key2 => $field2 ) {
				$parent_key = $key . "[hidden][$key2]";
				$this->display_single_field( $parent_key, $field2, $post_id, '' );
			}
			echo '</table>';

			// repeatative items
			if ( ! empty( $meta ) ) {
				foreach ( $meta as $item => $itemvalue ) {
					echo '<table class="rt-postmeta-repeater">';

					foreach ( $field['value'] as $repkey => $repvalue ) {
						$display_key = $key . "[$item]" . "[$repkey]";
						$fieldvalue  = isset( $itemvalue[ $repkey ] ) ? $itemvalue[ $repkey ] : false;
						$this->display_single_field( $display_key, $repvalue, $post_id, $fieldvalue );
					}

					echo '</table>';
				}
			}

			$buttontext = empty( $field['button'] ) ? esc_html__( 'Add More', 'rt-framework' ) : $field['button'];
			echo '<div class="rt-postmeta-repeater-addmore"><button>' . $buttontext . '</button></div></td></tr>';
		}

		private function display_single_field( $key, $field, $post_id, $default = false ) {
			$tr_class = str_replace( '[', '-', rtrim( $key, ']' ) );

			// Set default value
			if ( ! $default ) {
				$default = get_post_meta( $post_id, $key, true );
			}

			if ( $field['type'] != 'multi_checkbox' && empty( $default ) && ! empty( $field['default'] ) ) {
				$default = $field['default'];
			}

			$desc = '';
			if ( ! empty( $field['desc'] ) ) {
				$desc = '<div class="rt-postmeta-desc">' . wp_kses_post( $field['desc'] ) . '</div>';
			}

			$container_attr = '';
			if ( ! empty( $field['required'] ) ) {
				$container_attr .= ' class="rt-postmeta-dependent"';
				$container_attr .= ' data-required="' . esc_attr( $field['required'][0] ) . '"';
				$container_attr .= ' data-required-value="' . esc_attr( $field['required'][1] ) . '"';
			}

			// Display Title
			if ( $field['type'] == 'header' ) {
				$default = empty( $field['default'] ) ? 'h1' : $field['default'];
				echo '<tr class="' . esc_attr( $tr_class ) . '"' . $container_attr . '><td colspan="2"><' . esc_html( $default ) . '>' . esc_html( $field['label'] ) . '</' . esc_html( $default ) . '>' . $desc;
			} elseif ( empty( $field['label'] ) ) {
				echo '<tr class="' . esc_attr( $tr_class ) . '"' . $container_attr . '><td colspan="2">';
			} else {
				echo '<tr class="' . esc_attr( $tr_class ) . '"' . $container_attr . '><th><label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
			}

			// class
			if ( ! empty( $field['class'] ) ) {
				$class = 'rtfm-meta-field ' . esc_attr( $field['class'] );
			} else {
				$class = 'rtfm-meta-field';
			}

			$field['post_id'] = $post_id;
			// Display input
			if ( method_exists( $this, $field['type'] ) ) {
				$this->{$field['type']}( $key, $field, $default, $class );
				echo $desc;
			}

			echo '</td></tr>';
		}

		public function text( $key, $field, $default, $class ) {
			echo '<input type="text" class="' . $class . '" name="' . esc_attr( $key ) . '"' .
				 ' id="' . esc_attr( $key ) . '"' .
				 ' value="' . esc_attr( $default ) . '' .
				 '" />';
		}

		public function number( $key, $field, $default, $class ) {
			echo '<input type="number" class="' . $class . '" name="' . esc_attr( $key ) . '"' .
				 ' id="' . esc_attr( $key ) . '"' .
				 ' value="' . esc_attr( $default ) . '"' .
				 ' step="any"' .
				 ' />';
		}

		public function textarea( $key, $field, $default, $class ) {
			echo '<textarea class="' . $class . '" name="' . esc_attr( $key ) . '"' .
				 ' id="' . esc_attr( $key ) . '"' .
				 '>' .
				 esc_textarea( $default ) .
				 '</textarea>';
		}

		public function textarea_html( $key, $field, $default, $class ) {
			echo '<textarea class="' . $class . '" name="' . esc_attr( $key ) . '"' .
				 ' id="' . esc_attr( $key ) . '"' .
				 '>' .
				 $default .
				 '</textarea>';
		}

		public function select( $key, $field, $default, $class ) {
			echo '<select name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" class="' . $class . '">';
			foreach ( $field['options'] as $key => $value ) {
				echo '<option',
				$default == $key ? ' selected="selected"' : '',
					' value="' . esc_attr( $key ) . '"' .
					'>' .
					esc_html( $value ) .
					'</option>';
			}
			echo '</select>';
		}


		public function icon_select( $key, $field, $default, $class ) {
			echo '<select class="select2_font_awesome ' . $class . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '">';
			foreach ( $field['options'] as $key => $value ) {
				echo '<option',
				$default == $key ? ' selected="selected"' : '',
					' value="' . esc_attr( $key ) . '"' .
					' data-icon="' . esc_attr( $key ) . '"' .
					'>' .
					esc_html( $value ) .
					'</option>';
			}
			echo '</select>';
		}

		public function checkbox( $key, $field, $default, $class ) {
			echo '<input type="checkbox"' .
				 ' name="' . esc_attr( $key ) . '"' .
				 ' id="' . esc_attr( $key ) . '"',
			$default ? ' checked="checked"' : '',
			'/>';
		}

		public function multi_select( $key, $field, $default, $class ) {
			if ( empty( $default ) ) {
				$default = [];
			}
			echo '<select class="rt-multi-select ' . $class . '" data-placeholder=" ' . esc_attr__( 'Click here to select options', 'rt-framework' ) . '" multiple="multiple"' .
				 ' name="' . esc_attr( $key ) . '[]"' .
				 ' id="' . esc_attr( $key ) . '">';
			foreach ( $field['options'] as $key => $value ) {
				echo '<option',
				in_array( $key, $default ) ? ' selected="selected"' : '',
					' value="' . esc_attr( $key ) . '"' .
					'>' .
					esc_html( $value ) .
					'</option>';
			}
			echo '</select>';
		}

		public function multi_select2( $key, $field, $default, $class ) {
			if ( empty( $default ) ) {
				$default = [];
			}

			echo '<select class="rt-multi-select ' . $class . '" data-placeholder=" ' . esc_attr__( 'Click here to select options', 'rt-framework' ) . '" multiple="multiple"' .
				 ' name="' . esc_attr( $key ) . '[]"' .
				 ' id="' . esc_attr( $key ) . '">';

			$options = $field['options'];
			foreach ( $options as $key => $option ) {

				$label = $option['label'] ?? '';
				echo '<optgroup label="' . esc_html( $label ) . '" data-select2-id="select2-data-' . $key . '">';

				foreach ( $option['value'] as $key2 => $value ) {
					if ( is_array( $default ) ) {
						$selected = in_array( $key2, $default ) ? 'selected="selected"' : '';
					} else {
						$selected = $key2 == $default ? 'selected="selected"' : '';
					}
					?>
					<option
						<?php echo esc_attr( $selected ); ?>
							value="<?php echo esc_attr( $key2 ); ?>"
							data-select2-id="<?php echo esc_attr( $key2 ); ?>"
					>
						<?php echo esc_html( $value ); ?>
					</option>
					<?php
				}

				echo ' </optgroup>';
			}
			echo '</select>';
		}

		public function ajax_select( $key, $field, $default, $class ) {
			if ( empty( $default ) ) {
				$default = [];
			}
			$class = 'rt-multiple-select2-ajax ' . esc_attr( $class );
			?>
			<label>
				<select
						name="<?php echo esc_attr( $key ); ?>[]"
						id="<?php echo esc_attr( $key ); ?>"
						class="<?php echo esc_attr( $class ); ?>"
						multiple="multiple"
						style="width:400px;">
					<?php
					if ( ! empty( $default ) ) {
						foreach ( $default as $item ) {
							$p = get_the_title( $item );
							echo "<option value='$item' selected> $p </option>";
						}
					}
					?>
				</select>
			</label>
			<?php
		}

		public function multi_checkbox( $key, $field, $default, $class ) {
			if ( empty( $default ) ) {
				$default = [];
			}

			foreach ( $field['options'] as $value => $title ) {
				$id = $key . '_' . $value;

				echo '<span class="rt-postmeta-radio"><input type="checkbox" class="' . $class . '" name="' . esc_attr( $key ) . '[]"' .
					 ' id="' . esc_attr( $id ) . '"' .
					 ' value="' . esc_attr( $value ) . '"',
				in_array( $value, $default ) ? ' checked="checked"' : '',
					' /> ' .
					'<label ' .
					'for="' . esc_attr( $id ) . '">' .
					esc_html( $title ) .
					'</label></span>';
			}
		}

		public function radio( $key, $field, $default, $class ) {
			foreach ( $field['options'] as $value => $title ) {
				$id = $key . '_' . $value;

				echo '<span class="rt-postmeta-radio"><input type="radio" class="' . $class . '" name="' . esc_attr( $key ) . '"' .
					 ' id="' . esc_attr( $id ) . '"' .
					 ' value="' . esc_attr( $value ) . '"',
				$default == $value ? ' checked="checked"' : '',
					' /> ' .
					'<label ' .
					'for="' . esc_attr( $id ) . '">' .
					esc_html( $title ) .
					'</label></span>';
			}
		}

		public function image( $key, $field, $default, $class ) {
			$image    = '';
			$disstyle = '';

			if ( $default ) {
				$image = wp_get_attachment_image_src( $default, 'medium' );
				$image = $image[0];
			} else {
				$disstyle = 'display:none;';
			}

			echo '
			<div class="rt_metabox_image">
				<input name="' . esc_attr( $key ) . '" type="hidden" class="custom_upload_image" value="' . esc_attr( $default ) . '" />
				<img src="' . esc_url( $image ) . '" class="custom_preview_image" style="' . esc_attr( $disstyle ) . '" alt="" />
				<input class="rt_upload_image upload_button_' . esc_attr( $key ) . ' button-primary" type="button" value="' . esc_attr__( 'Choose Image', 'rt-framework' ) . '" />
				<div class="rt_remove_image_wrap" style="' . esc_attr( $disstyle ) . '"><a href="#" class="rt_remove_image button" >' . esc_html__( 'Remove Image', 'rt-framework' ) . '</a></div>
			</div>
			';
		}

		/**
         * Gallery field
		 * @param $key
		 * @param $field
		 * @param $default
		 * @param $class
		 *
		 * @return void
		 */
		public function gallery( $key, $field, $default, $class ) {
			$disstyle = $img_html = ''; // phpcs:ignore Squiz.PHP.DisallowMultipleAssignments.Found

			if ( $default ) {
				$img_ids = explode( ',', $default );
				foreach ( $img_ids as $img_id ) {
					if ( ! ( $img_id > 0 ) ) {
						continue;
					}
					$image     = wp_get_attachment_image_src( $img_id, 'medium' );
					$image     = $image[0];
					$img_html .= '<img src="' . esc_url( $image ) . '" alt="" />';
				}
			} else {
				$disstyle = 'display:none;';
			}

			echo '
			<div class="rt_metabox_gallery">
				<input name="' . esc_attr( $key ) . '" type="hidden" class="custom_upload_image" value="' . esc_attr( $default ) . '" />
				<div class="custom_preview_images">' . $img_html . '</div>
				<div class="rt_metabox_gallery_buttons">
					<input class="rt_upload_gallery upload_button_' . esc_attr( $key ) . ' button-primary" type="button" value="' . esc_attr__( 'Add/Edit Gallery Images', 'rt-framework' ) . '" />
					<a href="#" style="' . esc_attr( $disstyle ) . '" class="rt_remove_gallery button" >' . esc_html__( 'Remove All Images', 'rt-framework' ) . '</a>
				</div>
			</div>
			';
		}

		public function file( $key, $field, $default, $class ) {
			$file_url   = '#';
			$file_title = '';
			$disstyle   = '';

			if ( $default ) {
				$file_url   = wp_get_attachment_url( $default );
				$file_title = get_the_title( $default );
			} else {
				$disstyle = 'display:none;';
			}

			echo '
			<div class="rt_metabox_file">
				<input name="' . esc_attr( $key ) . '" type="hidden" class="custom_upload_file" value="' . esc_attr( $default ) . '" />
				<input class="rt_upload_file upload_button_' . esc_attr( $key ) . ' button-primary" type="button" value="' . esc_attr__( 'Choose File', 'rt-framework' ) . '" />
				<div class="rt_remove_file_wrap" style="' . esc_attr( $disstyle ) . '"><a href="#" class="rt_remove_file button" >' . esc_html__( 'Remove File', 'rt-framework' ) . '</a></div>
				<a class="custom_preview_file" href="' . esc_url( $file_url ) . '" style="' . esc_attr( $disstyle ) . '">' . esc_html( $file_title ) . ' </a>
			</div>
			';
		}

		public function color_picker( $key, $field, $default, $class ) {
			echo '<input type="text" class="rt-metabox-picker rt-metabox-colorpicker" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

		public function date_picker( $key, $field, $default, $class ) {
			$format = isset( $field['format'] ) ? $field['format'] : 'MM dd, yy';
			echo '<input type="text" data-format="' . $format . '" class="rt-metabox-picker rt-metabox-datepicker" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

		public function time_picker( $key, $field, $default, $class ) {
			echo '<input type="text" class="rt-metabox-picker rt-metabox-timepicker" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}

		public function time_picker_24( $key, $field, $default, $class ) {
			echo '<input type="text" class="rt-metabox-picker rt-metabox-timepicker-24" name="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" value="' . esc_attr( $default ) . '" />';
		}
	}
}