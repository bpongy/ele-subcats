<?php
namespace ElementorSubCats\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Hello_World extends Widget_Base {
	public function get_name() {
		return 'ele-subcats';
	}
	public function get_title() {
		return 'Sub Cats';
	}
	public function get_icon() {
		return 'eicon-archive-posts';
	}
	public function get_keywords() {
		return [ 'subcategories', 'sub', 'categories', 'list' ];
	}
	public function get_categories() {
		return [ 'general' ];
	}

	public function get_script_depends() {
		return [ 'ele-subcats' ];
	}



	protected function _register_controls() {
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'elementor-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'columns',
			[
				'label' => __( 'Columns', 'elementor-pro' ),
				'type' => Controls_Manager::NUMBER,
				'prefix_class' => 'elementor-grid%s-',
				'default' => 4,
				'min' => 1,
				'max' => 6,
			]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Categories Count', 'elementor-pro' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '-1',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_filter',
			[
				'label' => __( 'Query', 'elementor-pro' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'name',
				'options' => [
					'name' => __( 'Name', 'elementor-pro' ),
					'slug' => __( 'Slug', 'elementor-pro' ),
					'count' => 'Compteur',
					'number' => 'N° position',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc' => __( 'ASC', 'elementor-pro' ),
					'desc' => __( 'DESC', 'elementor-pro' ),
				],
			]
		);

		$this->add_control(
			'hide_empty',
			[
				'label' => __( 'Hide empty', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_taxo_style',
			[
				'label' => __( 'Layout', 'elementor-pro' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subcats_class',
			[
				'type' => Controls_Manager::HIDDEN,
				'default' => 'ele-subcats',
				'prefix_class' => 'bp-ele-subcats ',
				'selectors' => [
					'{{WRAPPER}}.ele-subcats .elementor-grid-item' => 'position: relative',
					'{{WRAPPER}}.ele-subcats .elementor-grid a' => 'text-decoration: none; display: block; background-repeat: no-repeat; background-position: 50% 50%; background-size: cover',
					'{{WRAPPER}}.ele-subcats .elementor-grid a > div' => 'position: relative; height: 0; padding-bottom: 100%',
					'{{WRAPPER}}.ele-subcats .elementor-grid a > div > div' => 'position: absolute; left: 0; right: 0; bottom: 0;',
				]
			]
		);

		$this->add_control(
			'column_gap',
			[
				'label'     => __( 'Columns Gap', 'elementor-pro' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 20,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.ele-subcats .elementor-grid' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'row_gap',
			[
				'label'     => __( 'Rows Gap', 'elementor-pro' ),
				'type'      => Controls_Manager::SLIDER,
				'default'   => [
					'size' => 40,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.ele-subcats .elementor-grid' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'     => __( 'Alignment', 'elementor-pro' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'elementor-pro' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-grid-item' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-grid-item a > div > div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'elementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'thumbnail_slug',
			[
				'label' => __( 'Thumbnail name', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => 'thumbnail',
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __( 'Image size', 'elementor-pro' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'medium',
				'options' => [
					'thumbnail' => __( 'Small', 'elementor-pro' ),
					'medium' => __( 'Medium', 'elementor-pro' ),
					'large' => __( 'Large', 'elementor-pro' ),
					'full' => __( 'Full', 'elementor-pro' )
				],
			]
		);


		// overlay normal / hover
		$this->start_controls_tabs( 'tabs_overlay_style' );

		$this->start_controls_tab(
			'tab_overlay_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);
		$this->add_control(
			'overlay',
			[
				'label'     => __( 'Overlay', 'elementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a > div' => 'transition: background 0.2s; background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_overlay_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'overlay_hover',
			[
				'label'     => __( 'Overlay', 'elementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a:hover > div' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		// end overlay



		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_count',
			[
				'label' => __( 'Count', 'elementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'display_count',
			[
				'label' => __( 'Display number', 'elementor-pro' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'txt_count',
			[
				'label' => __( 'Post(s) name', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
				'condition' => [
					'display_count' => 'yes',
				],
				'placeholder' => 'post(s)',
			]
		);

		$this->add_control(
			'count_color',
			[
				'label'     => __( 'Color', 'elementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'display_count' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .ele-subcats__count' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'count_typography',
				'scheme'   => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ele-subcats__count',
				'separator' => 'after',
				'condition' => [
					'display_count' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_title',
			[
				'label' => __( 'Title', 'elementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'header_size',
			[
				'label' => __( 'HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ele-subcats__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; margin: 0;',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Color', 'elementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .ele-subcats__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'scheme'   => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ele-subcats__title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_read',
			[
				'label' => __( 'Read more', 'elementor-pro' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'read_text',
			[
				'label' => __( 'Read more text', 'elementor-pro' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => 'Read more...',
			]
		);

		// link normal / hover
		$this->start_controls_tabs( 'tabs_read_style' );

		$this->start_controls_tab(
			'tab_read_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'read_color',
			[
				'label' => __( 'Read more Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} a .read-more span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_read_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_read_color',
			[
				'label' => __( 'Read more Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a:hover .read-more span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		// fin hover

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$curr_id = get_queried_object_id();
		$term = get_term($curr_id);

//		echo '<div><pre>';
//		var_dump($settings);
//		echo '</pre></div>';

		if (!$term)
			return '';

		$taxo_name = $term->taxonomy;

		$hide_empty = false;
		if ($settings['hide_empty']=='yes')
			$hide_empty = true;

		$kids = get_terms( $taxo_name, array(
			'parent' => $curr_id,
			'order' => $settings['order'],
			'orderby' => $settings['orderby'],
			'hide_empty' => $hide_empty,
			'number' => $settings['number']
		));
		if (is_array($kids) && $kids) {

			// cas particulier : order by champ ACF
			if ($settings['orderby']=='number') {

				$kids_temp = array();
				foreach ($kids as $child) {
					$num = get_field( 'order', $child );
					$k = str_pad($num, 10, '0', STR_PAD_LEFT) . '_' . $child->term_id;
					$kids_temp[$k] = $child;
				}
				if ($settings['order']=='asc')
					ksort( $kids_temp );
				if ($settings['order']=='desc')
					krsort( $kids_temp );

				$kids = $kids_temp;
			}

			echo '<div class="elementor-grid">';
			foreach ($kids as $child) {

				$bg_image = '';
				$bg_url = '';
				$acf_bg = get_field($settings['thumbnail_slug'], $taxo_name . '_' . $child->term_id);
				if (is_array($acf_bg)) {
					$bg_url = $acf_bg['sizes'][$settings['image_size']];
				}

				if ($bg_url)
					$bg_image = ' style="background-image: url(' . $bg_url . ');"';

				$btn_text = $settings['read_text'];
				?>
				<div class="elementor-grid-item">
				<?php
				echo '<a href="' . get_term_link($child) . '"' . $bg_image . '>';
					echo '<div>';
					echo '<div>';
						if ($settings['display_count']=='yes' && $child->count) {
							echo '<div class="ele-subcats__count">' . $child->count . ' ' . $settings['txt_count'] . '</div>';
						}
						echo '<' . $settings['header_size'] . ' class="ele-subcats__title">' . $child->name . '</' . $settings['header_size'] . '>';
						if ($btn_text) {
							echo '<div class="read-more"><span>' . $btn_text . '</span></div>';
						}
					echo '</div>';
					echo '</div>';
				echo '</a>';
				?>
				</div>
				<?php
			}
			echo '</div>';
		}

	}
	protected function _content_template() {}
}



// child_posts
add_action( 'elementor/query/child_posts', function( $query ) {

	$curr_term = get_queried_object();
	if ($curr_term) {
		$query->set('tax_query', array(
			array(
				'taxonomy' => $curr_term->taxonomy,
				'field' => 'id',
				'include_children' => false,
				'terms' => $curr_term->term_id
			)
		));
	}
} );
