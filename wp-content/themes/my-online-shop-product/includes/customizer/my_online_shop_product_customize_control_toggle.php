<?php

/**
 * Toggle Customizer Control
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if WP_Customize_Control does not exsist.
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * This class is for the toggle control in the Customizer.
 *
 * @access public
 */


class My_Online_Shop_Product_Toggle_Button_Control extends WP_Customize_Control {

	/**
	 * The type of customize control.
	 *
	 */
	public $type = 'toggle';

	public function enqueue() {
        wp_enqueue_style( 'my_online_shop_product_toggle_button_css', get_template_directory_uri()."/assets/css/customizer/my_online_shop_product_toggle_button.css", array(), "1.0.0", "all" );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 */
	public function to_json() {
		parent::to_json();

		// The setting value.
		$this->json['id']           = $this->id;
		$this->json['value']        = $this->value();
		$this->json['link']         = $this->get_link();
		$this->json['defaultValue'] = $this->setting->default;
	}

	/**
	 * Don't render the content via PHP.  This control is handled with a JS template.
	 *
	 */
	public function render_content() {}

	/**
	 * An Underscore (JS) template for this control's content.
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 */
	protected function content_template() {
		?>
            
            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>
			<div class="my_online_shop_product_toggle_switch">
                <label class="switch">
                    <input id="toggle-{{ data.id }}" type="checkbox" class="toggle--input" value="{{ data.value }}" {{{ data.link }}} <# if ( data.value ) { #> checked="checked" <# } #> />
                    <span class="slider round"></span>
                </label>
			</div> 
            <# if ( data.description ) { #>
				<span class="description customize-control-description">{{ data.description }}</span>
			<# } #>
          
			  
		<?php

	}
}
