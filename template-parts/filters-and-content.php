<?php

extract( $args );

if ( 'industry' === $browse_by ) {
	$list_title = __( 'Browse by Industry', 'nuplo' );
	$items      = apply_filters( 'cai_get_industries', null );
} else {
	$list_title = __( 'Browse by Product', 'nuplo' );
	$items      = apply_filters( 'cai_get_products', null );
}

$select_array_1 = [
	'title'   => 'Industry',
	'name'    => 'industry',
	'options' => [
		[
			'id'    => '1',
			'value' => 'Oil and Gas',
		],
		[
			'id'    => '2',
			'value' => 'Aerospace and Defense',
		],
		[
			'id'    => '3',
			'value' => 'Food and Beverage',
		],
		[
			'id'    => '4',
			'value' => 'Lumber and Millwork',
		],
		[
			'id'    => '5',
			'value' => 'Industrial',
		],
		[
			'id'    => '6',
			'value' => 'Medical Equipment and Pharma',
		],
		[
			'id'    => '7',
			'value' => 'Metal Manufacturing and Fabrication',
		],
		[
			'id'    => '8',
			'value' => 'Auto and Transportation',
		],
		[
			'id'    => '9',
			'value' => 'Precious Metals Management',
		],
	],
];

$select_array_2 = [
	'title'   => 'Industry Type',
	'name'    => 'industry-type',
	'options' => [
		[
			'id'    => '10',
			'value' => 'Manufacturing',
		],
		[
			'id'    => '11',
			'value' => 'Food and Beverage',
		],
	],
];

$radios = [
	'title'   => 'Product Category',
	'name'    => 'productCategory',
	'options' => [
		[
			'id'   => 'erp',
			'name' => 'ERP',
		],
		[
			'id'   => 'E-CommerceEDI',
			'name' => 'E-Commerce EDI',
		],
		[
			'id'   => 'processAutomation',
			'name' => 'Process Automation',
		],
		[
			'id'   => 'MES',
			'name' => 'MES',
		],
		[
			'id'   => 'WMS',
			'name' => 'WMS',
		],
		[
			'id'   => 'Other',
			'name' => 'Other',
		],
	],
]

?>

<section class="container-fluid filters-and-content">
	<div class="container">
		<div class="col filters-and-content__col filters-and-content__col-filters">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="filters-and-content__title filters-and-content__title--desktop">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>
			<h3 class="filters-and-content__filters-title">
				<?= esc_html__( 'Filters', 'nuplo' ) ?>
					<?= get_svg( 'down-arrow', 'filters-and-content__filters-title-arrow' ) ?>
			</h3>
			<div class="filters-and-content__filters-container">
				<div class="filters-and-content__filters">
					<?php get_template_part( 'template-parts/form-select', null, $select_array_1 ); ?>
					<?php get_template_part( 'template-parts/form-select', null, $select_array_2 ); ?>
					<?php if ( ! empty( $radios ) ) : ?>
						<h4 class="filters-and-content__filters-subtitle">
							<?= esc_html( $radios['title'] ) ?>
						</h4>
						<?php foreach ( $radios['options'] as $radio ) : ?>
							<div class="radio__container">
								<input type="radio"
										class="input__radio input__radio--filters"
										id="<?= esc_attr( $radio['id'] ) ?>"
										value="<?= esc_attr( $radio['name'] ) ?>"
										name="<?= esc_attr( $radios['name'] ) ?>"/>
								<label class="h4" for="<?= esc_attr( $radio['id'] ) ?>">
									<?= esc_html( $radio['name'] ) ?>
								</label>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col filters-and-content__col filters-and-content__col-content">
			<?php if ( ! empty( $title ) ) : ?>
				<h1 class="filters-and-content__title filters-and-content__title--mobile">
					<?= esc_html( $title ) ?>
				</h1>
			<?php endif; ?>
			<?php if ( ! empty( $items ) ) : ?>
				<div class="filters-and-content__content-container">
					<?php foreach ( $items as $item ) : ?>
						<div class="filters-and-content__item">
							<div class="filters-and-content__item-image-container">
								<?php if ( ! empty( $item ['category'] ) ) : ?>
									<div class="filters-and-content__item-image"
											style="background-image: url('<?= esc_html( $item['background'] ); ?>');"></div>
									<div class="button button--orange filters-and-content__item-category">
										<?= esc_html( $item ['category'] ) ?>
									</div>
								<?php endif; ?>
							</div>
							<?php if ( ! empty( $item ['name'] ) ) : ?>
								<h3 class="filters-and-content__item-title"><?= esc_html( $item ['name'] ) ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $item ['tags'] ) ) : ?>
								<p class="filters-and-content__item-tags">
									<?= esc_html( implode( ', ', $item ['tags'] ) ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>

			<?php endif; ?>

			<?php // the_content(); ?>
		</div>
	</div>
</section>
