<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
// Add Alignment Feature on counter
 
// Add select dropdown control to button widget
add_action('elementor/element/heading/section_title_style/after_section_end', function ($element, $args) {
    // add a control
    $element->start_controls_section(
        'section_extra',
        [ 
            'label' => __('Easy Elements Extra', 'mas-addons'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]
    );

    $element->add_control(
        'show_title_span_style',
        [
            'label' => esc_html__( 'Span Tag Style', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'description' => esc_html__( 'If Used <span></span> Tag, Then it will be work.', 'textdomain' ),
            'label_on' => esc_html__( 'Show', 'textdomain' ),
            'label_off' => esc_html__( 'Hide', 'textdomain' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );
    $element->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .elementor-heading-title span',
            'condition' => [
                'show_title_span_style' => 'yes',
            ],
        ]
    );
    $element->add_control(
        'text_span_color',
        [
            'label' => esc_html__( 'Span Text Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .elementor-heading-title span' => 'color: {{VALUE}}',
            ],
            'condition' => [
                'show_title_span_style' => 'yes',
            ],
        ]
    );
    $element->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'text_span_background_color',
            'types' => [ 'classic', 'gradient' ],
            'exclude'   => ['image'],
            'selector' => '{{WRAPPER}} .elementor-heading-title span',
            'condition' => [
                'show_title_span_style' => 'yes',
            ],
        ]
    );
    $element->add_control(
        'text_span_pedding',
        [
            'label' => esc_html__( 'Pedding', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-heading-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'show_title_span_style' => 'yes',
            ],
        ]
    );
    $element->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'text_span_border',
            'selector' => '{{WRAPPER}} .elementor-heading-title span',
            'condition' => [
                'show_title_span_style' => 'yes',
            ],
        ]
    );
    
    $element->add_control(
        'text_span_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-heading-title span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'show_title_span_style' => 'yes',
            ],
        ]
    );








    $element->end_controls_section();

}, 10, 2);
