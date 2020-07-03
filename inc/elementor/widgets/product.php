<?php
/**
 * Product widgets
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Instock_Widget_Product extends Widget_Base {

	public function get_name() {
		return 'instock-product';
	}

	public function get_title() {
		return esc_html__( 'Product', 'instock' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_keywords() {
		return [ 'shop', 'product' ];
	}

	public function get_categories() {
		return [ 'instock_pro_elements' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_product',
			[
				'label' => esc_html__( 'Product', 'instock' ),
			]
		);

		$this->add_control(
			'count',
			[
				'label'         => esc_html__( 'Product Per Page', 'instock' ),
				'description'   => esc_html__( 'You can enter "-1" to display all items.', 'instock' ),
				'type'          => Controls_Manager::NUMBER,
				'default'       => 6,
				'step'          => 1,
				'min'           => 1,
				'max'           => '',
				'label_block'   => true,
			]
		);

		$this->add_control(
			'show',
			[
				'label'         => esc_html__( 'Show', 'instock' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''         => esc_html__( 'All products', 'instock' ),
					'featured' => esc_html__( 'Featured products', 'instock' ),
					'onsale'   => esc_html__( 'On-sale products', 'instock' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'         => esc_html__( 'Order By', 'instock' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'date',
				'options'       => [
					'date'  => __( 'Date', 'instock' ),
					'price' => __( 'Price', 'instock' ),
					'rand'  => __( 'Random', 'instock' ),
					'sales' => __( 'Sales', 'instock' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'         => esc_html__( 'Order', 'instock' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'desc',
				'options'       => [
					'desc'      => esc_html__( 'DESC', 'instock' ),
					'asc'       => esc_html__( 'ASC', 'instock' ),
				],
			]
		);

		$this->add_control(
			'columns',
			[
				'label'         => esc_html__( 'Columns', 'instock' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '3',
				'options'       => [
					'3' => esc_html__( '3 Columns', 'instock' ),
					'4' => esc_html__( '4 Columns', 'instock' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		global $woocommerce_loop;
		$settings = $this->get_settings();

		// Vars
		$count     = $settings['count'];
		$show      = $settings['show'];
		$orderby   = $settings['orderby'];
		$order     = $settings['order'];
		// $columns   = $settings['columns'];
		$product_visibility_term_ids = wc_get_product_visibility_term_ids();

		$query_args = array(
			'posts_per_page' => $count,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'no_found_rows'  => 1,
			'order'          => $order,
			'meta_query'     => array(),
			'tax_query'      => array(
				'relation' => 'AND',
			),
		);

		switch ( $show ) {
			case 'featured':
				$query_args['tax_query'][] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'term_taxonomy_id',
					'terms'    => $product_visibility_term_ids['featured'],
				);
				break;
			case 'onsale':
				$product_ids_on_sale    = wc_get_product_ids_on_sale();
				$product_ids_on_sale[]  = 0;
				$query_args['post__in'] = $product_ids_on_sale;
				break;
		}

		switch ( $orderby ) {
			case 'price':
				$query_args['meta_key'] = '_price'; // WPCS: slow query ok.
				$query_args['orderby']  = 'meta_value_num';
				break;
			case 'rand':
				$query_args['orderby'] = 'rand';
				break;
			case 'sales':
				$query_args['meta_key'] = 'total_sales'; // WPCS: slow query ok.
				$query_args['orderby']  = 'meta_value_num';
				break;
			default:
				$query_args['orderby'] = 'date';
		}

		// Build the WordPress query
		$product = new \WP_Query( $query_args );

		$columns = absint( $settings['columns'] );
    	$woocommerce_loop['columns'] = $columns;

		// Output posts
		if ( $product->have_posts() ) :

			// Wrapper classes
			$wrap_classes = array( 'products-wrapper', 'woocommerce' );
			$wrap_classes = implode( ' ', $wrap_classes );
			?>

			<div class="<?php echo esc_attr( $wrap_classes ); ?>">
				<ul class="products columns-<?php echo sanitize_html_class( $columns ); ?>">

				<?php

				// Start loop
				while ( $product->have_posts() ) : $product->the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php
				// End entry loop
				endwhile; ?>

				</ul>
			</div><!-- .products-wrapper -->

			<?php
			// Reset the post data to prevent conflicts with WP globals
			wp_reset_postdata();

		else : ?>

			<?php get_template_part( 'partials/content/content', 'none' ); ?>

		<?php endif; ?>

	<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Instock_Widget_Product() );
