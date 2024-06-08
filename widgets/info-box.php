<?php
/**
 * Elementor Info Box Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Info_Box_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Info Box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Info Box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Info Box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Info Box', 'boilerplate-elementor-extension' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Info Box widget icon.
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
	 * Retrieve the list of categories the Info Box widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'Boilerplate' ];
	}

	/**
	 * Register Info Box widget controls.
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
				'label' => __( 'Content', 'boilerplate-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'infobox-label',
			[
				'label' => esc_html__( 'Show Label', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'infobox-label-title',
			[
				'label' => esc_html__( 'Label Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'New', 'textdomain' ),
				'condition' => [
					'infobox-label' => 'yes',
				],
			]
		);


		$this->add_control(
			'infobox-icon-image',
			[
				'label' => esc_html__( 'Choose Option', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'none' => [
						'title' => esc_html__( 'None', 'textdomain' ),
						'icon' => 'eicon-ban',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'textdomain' ),
						'icon' => 'eicon-preview-medium',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'textdomain' ),
						'icon' => 'eicon-image-bold',
					],
				],
				'default' => 'icon',
				'toggle' => true,
			]
		);


		$this->add_control(
			'infobox-icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'condition' => [
					'infobox-icon-image' => 'icon',
				],
			]
		);
		$this->add_control(
			'infobox-image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'infobox-icon-image' => 'image',
				],
			]
		);

		$this->add_control(
			'infobox_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'This is Awesome', 'textdomain' ),
				'placeholder' => esc_html__( 'Type Info Box Title', 'textdomain' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'infobox_description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit corporis incidunt veritatis perspiciatis non aspernatur cum illum ipsum quam dignissimos!', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);
		$this->add_control(
			'infobox-button',
			[
				'label' => esc_html__( 'Enable Button', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'infobox-button-title',
			[
				'label' => esc_html__( 'Label Text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Learn More', 'textdomain' ),
				'condition' => [
					'infobox-button' => 'yes',
				],
			]
		);
		$this->add_control(
			'infobox_button_link',
			[
				'label' => esc_html__( 'Button Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
				'condition' => [
					'infobox-button' => 'yes',
				],
			]
		);


		$this->end_controls_section();



		$this->start_controls_section(
			'wrapper_style',
			[
				'label' => esc_html__( 'Infobox Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);
			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'textdomain' ),
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background',
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper',
				]
			);
			$this->add_control(
				'infobox-wrapper-padding',
				[
					'label' => esc_html__( 'Padding', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'default' => [
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .ee--image-icon-box-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'infobox_box_shadow',
					'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper',
				]
			);
			$this->add_control(
				'infobox_transition',
				[
					'label' => esc_html__( 'Transition', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 5,
					'step' => 0.1,
					'default' => 0.3,
					'selectors' => [
						'{{WRAPPER}} .ee--image-icon-main' => 'transition: {{UNIT}}s;',
					],
				]
				
			);
		$this->end_controls_tab();


		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'textdomain' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background-hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover',
			]
		);
		$this->add_control(
			'infobox-wrapper-padding-hover',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .ee--image-icon-box-wrapper:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border-hover',
				'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'infobox_box_shadow_hover',
				'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


		$this->start_controls_section(
			'infobox_label_style',
			[
				'label' => esc_html__( 'Label Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'infobox-label' => 'yes',
				],
			]
		);

		$this->add_control(
				'infobox-label-padding',
				[
					'label' => esc_html__( 'Padding', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'default' => [
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} span.ee--image-icon-box-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'infobox-label-margin',
				[
					'label' => esc_html__( 'Margin', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'default' => [
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} span.ee--image-icon-box-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'infobox_label_color',
				[
					'label' => esc_html__( 'Label Color', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} span.ee--image-icon-box-label' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'background_for_label',
					'types' => [ 'classic', 'gradient'],
					'selector' => '{{WRAPPER}} span.ee--image-icon-box-label',
					'exclude'	=> ['image'],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'infobox_label_border',
					'selector' => '{{WRAPPER}} span.ee--image-icon-box-label',
				]
			);
			$this->add_control(
				'infobox-label-border-radius',
				[
					'label' => esc_html__( 'Border Radius', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
					'default' => [
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} span.ee--image-icon-box-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);











		$this->end_controls_section();





		$this->start_controls_section(
			'infobox_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'infobox-icon-image' => 'icon',
				],
			]
		);
			$this->start_controls_tabs(
				'infobox_icon_normal'
			);

				$this->start_controls_tab(
					'infobox_icon_style_normal',
					[
						'label' => esc_html__( 'Normal', 'textdomain' ),
					]
				);
				$this->add_control(
					'infobox_icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em', 'rem' ],
						'range' => [
							'px' => [
								'min' => 20,
								'max' => 250,
								'step' => 1,
							],
							'em' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main svg' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'infobox-icon-padding',
					[
						'label' => esc_html__( 'Padding', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox-icon-margin',
					[
						'label' => esc_html__( 'Margin', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox_icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main' => 'color: {{VALUE}}',
							'{{WRAPPER}} .ee--image-icon-main' => 'fill: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_for_icon',
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .ee--image-icon-main',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'infobox_icon_border',
						'selector' => '{{WRAPPER}} .ee--image-icon-main',
					]
				);
				$this->add_control(
					'infobox-icon-border-radius',
					[
						'label' => esc_html__( 'Border Radius', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);





				$this->end_controls_tab();

				$this->start_controls_tab(
					'infobox_icon_hover',
					[
						'label' => esc_html__( 'Hover', 'textdomain' ),
					]
				);
				$this->add_control(
					'infobox_icon_size_hover',
					[
						'label' => esc_html__( 'Icon Size', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', 'em', 'rem' ],
						'range' => [
							'px' => [
								'min' => 20,
								'max' => 250,
								'step' => 1,
							],
							'em' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main svg' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox-icon-padding-hover',
					[
						'label' => esc_html__( 'Padding', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox_icon_color_hover',
					[
						'label' => esc_html__( 'Icon Color', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main' => 'color: {{VALUE}}',
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main' => 'fill: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_for_icon_hover',
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'infobox_icon_border_hover',
						'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main',
					]
				);
				$this->add_control(
					'infobox-icon-border-radius_hover',
					[
						'label' => esc_html__( 'Border Radius', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				$this->end_controls_tab();


			$this->end_controls_tabs();
		$this->end_controls_section();








		$this->start_controls_section(
			'infobox_image_style',
			[
				'label' => esc_html__( 'Image Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'infobox-icon-image' => 'image',
				],
			]
		);
			$this->start_controls_tabs(
				'infobox_image_normal'
			);

				$this->start_controls_tab(
					'infobox_image_style_normal',
					[
						'label' => esc_html__( 'Normal', 'textdomain' ),
					]
				);
				$this->add_control(
					'infobox_image_width',
					[
						'label' => esc_html__( 'Image Width', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 20,
								'max' => 500,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
							'em' => [
								'min' => 0,
								'max' => 100,
							],
							'default' => [
								'unit' => '%',
								'size' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main-image img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox_image_height',
					[
						'label' => esc_html__( 'Image Height', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 20,
								'max' => 500,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
							'em' => [
								'min' => 0,
								'max' => 100,
							],
							'default' => [
								'unit' => '%',
								'size' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main-image img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox-image-padding',
					[
						'label' => esc_html__( 'Padding', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_for_image',
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .ee--image-icon-main-image img',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'infobox_image_border',
						'selector' => '{{WRAPPER}} .ee--image-icon-main-image img',
					]
				);
				$this->add_control(
					'infobox-image-border-radius',
					[
						'label' => esc_html__( 'Border Radius', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-main-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);





				$this->end_controls_tab();

				$this->start_controls_tab(
					'infobox_image_hover',
					[
						'label' => esc_html__( 'Hover', 'textdomain' ),
					]
				);
				
				$this->add_control(
					'infobox_image_width_hover',
					[
						'label' => esc_html__( 'Image Width', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 20,
								'max' => 500,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
							'em' => [
								'min' => 0,
								'max' => 100,
							],
							'default' => [
								'unit' => '%',
								'size' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main-image img' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox_image_height_hover',
					[
						'label' => esc_html__( 'Image Height', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%', 'em' ],
						'range' => [
							'px' => [
								'min' => 20,
								'max' => 500,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
							'em' => [
								'min' => 0,
								'max' => 100,
							],
							'default' => [
								'unit' => '%',
								'size' => 100,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main-image img' => 'height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'infobox-image-padding-hover',
					[
						'label' => esc_html__( 'Padding', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'background_for_image_hover',
						'types' => [ 'classic', 'gradient'],
						'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main-image img',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'infobox_image_border_hover',
						'selector' => '{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main-image img',
					]
				);
				$this->add_control(
					'infobox-image-border-radius-hover',
					[
						'label' => esc_html__( 'Border Radius', 'textdomain' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
						'default' => [
							'isLinked' => true,
						],
						'selectors' => [
							'{{WRAPPER}} .ee--image-icon-box-wrapper:hover .ee--image-icon-main-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);



				$this->end_controls_tab();


			$this->end_controls_tabs();
		$this->end_controls_section();







	}

	/**
	 * Render Info Box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		


		?>

			<div class="ee--common-card ee--main ee--image-icon-box-wrapper">
				<?php	
					if ( 'yes' === $settings['infobox-label'] ) {
						echo '<span class="ee--image-icon-box-label">' . $settings['infobox-label-title'] . '</span>';
					}
				?>

				<?php	
					if ( 'icon' === $settings['infobox-icon-image'] ) {
						echo '<div class="ee--image-icon-main">'?> 
							<?php \Elementor\Icons_Manager::render_icon( $settings['infobox-icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php echo '</div>';
					}
					if ( 'image' === $settings['infobox-icon-image'] ) {
						echo '<div class="ee--image-icon-main-image"><img src="' . $settings['infobox-image']['url'] . '" alt=""></div>';
					}
					
				?>
				
                

                <div class="ee--image-icon-box-content-wrapper">
                    <h2 class="ee--image-icon-box-heading"><?php echo $settings['infobox_title']; ?></h2>
                    <p class="ee--image-icon-box-content"><?php echo $settings['infobox_description']; ?></p>
					<?php
						if ( ! empty( $settings['infobox_button_link']['url'] ) ) {
							$this->add_link_attributes( 'infobox_button_link', $settings['infobox_button_link'] );
						}
					?>
                    <a <?php $this->print_render_attribute_string( 'infobox_button_link' );?> class="ee-button ee--image-icon-box-button"><span class="ee--button-icon"><i class="fa-brands fa-facebook-f"></i></span><?php echo $settings['infobox-button-title']; ?></a>
                </div>
            </div>

		<?php

	}

}