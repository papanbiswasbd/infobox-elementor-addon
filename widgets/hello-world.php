<?php
/**
 * Elementor Hello World Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Hello_World_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Hello World widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Hello World';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Hello World widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Hello World', 'infobox-elementor-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Hello World widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-bullhorn';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Hello World widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'papanbiswasbd' ];
	}

	/**
	 * Register Hello World widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'infobox-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text To Display', 'infobox-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Hello World', 'infobox-elementor-addon' ),
			]
        );
        
        $this->add_control(
			'text_heading_type',
			[
				'label' => __( 'Heading Type', 'infobox-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'H2',
				'options' => [
                    'p' => __( 'p', 'infobox-elementor-addon'),
					'H1' => __( 'H1', 'infobox-elementor-addon'),
					'H2' => __( 'H2', 'infobox-elementor-addon'),
					'H3' => __( 'H3', 'infobox-elementor-addon'),
					'H4' => __( 'H4', 'infobox-elementor-addon'),
					'H5' => __( 'H5', 'infobox-elementor-addon'),
					'H6' => __( 'H6', 'infobox-elementor-addon'),
				]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Hello World widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<div class="hello-world-elementor-widget">';

		echo '<' . $settings['text_heading_type'] . '>';
            echo $settings['text'];
        echo '</' . $settings['text_heading_type'] . '>';

		echo '</div>';

	}

}