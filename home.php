<?php
get_header();

$index       = 3;
$news_events = [
	[
		'date'    => 'January 11, 2022',
		'title'   => 'CAI Software Announces Majority Investment by Symphony Technology Group (STG)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => 'ShopVue MES Now Available in the Microsoft Azure Marketplace',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => 'ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '4ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '5ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '6ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '7ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '8ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '9ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
	[
		'date'    => 'January 11, 2022',
		'title'   => '10ShopVue Expands MES Offering to Include Warehouse Management (WMS)',
		'link'    => 'https://cai-staging.developress.io/cai-software-announces-majority-investment-by-symphony-technology-group-stg/',
		'content' => 'Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical, production-oriented software to the manufacturing and distribution sectors globally, announced today it has received a majority investment...Smithfield, Rhode Island, December 13, 2021 – CAI Software, LLC (“CAI”), a leading software vendor of mission critical,',
		'image'   => 'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
	],
];
$breadcrumbs = [
	[
		'name' => __( 'Home', 'nuplo' ),
		'url'  => get_home_url(),
	],
	[
		'name' => __( 'Products', 'nuplo' ),
		'url'  => '#',
	],
];

$quick_links = [
	'container_class' => 'news__sidebar',
	'title'           => __( 'Resources', 'nuplo' ),
	'sidebar'         => [
		'mobileName' => __( 'Filters', 'nuplo' ),
		'blocks'     => [
			'selects' => [
				[
					'title'          => __( 'Industry', 'nuplo' ),
					'name'           => 'industry',
					'options'        => apply_filters( 'cai_get_industries', null ),
					'button_classes' => 'button button--off-white news__button',
				],
				[
					'title'          => 'Product',
					'name'           => 'product',
					'options'        => apply_filters( 'cai_get_products_category', null ),
					'button_classes' => 'button button--off-white news__button',
				],
				[
					'title'          => 'Content Type',
					'name'           => 'contentType',
					'options'        => apply_filters( 'cai_get_products_category', null ),
					'button_classes' => 'button button--off-white news__button',
				],
			],
		],
	],
];

$news_events_count = count( $news_events );
$two_posts         = ( 2 == $news_events_count ) ? 'news__two-posts' : 'nie';

?>

<div class="container-fluid news <?= esc_html( $two_posts ) ?>">
	<div class="container">
		<div class="row news__row">
			<?php if ( ! empty( $news_events[0] ) ) : ?>
				<div class="news__section">
					<div class="news__image-section">
						<a href="<?= esc_url( $news_events[0]['link'] ) ?>" class="news__a">
							<div
								class="news__image"
								style="background-image: url(<?= esc_html( $news_events[0]['image'] ) ?>)"></div>
						</a>
					</div>
					<div class="news__content">
						<div class="news__content--top">
							<div class="news__date p"><?= esc_html( $news_events[0]['date'] ) ?></div>
							<div class="news__categories">
								<div class="news__category news__category--dark-pink"></div>
								<div class="news__category news__category--erp"></div>
								<div class="news__category news__category--wms"></div>
								<div class="news__category news__category--light-pink"></div>
							</div>
						</div>
						<div class="h4 news__title news__title--first"><?= esc_html( $news_events[0]['title'] ) ?></div>
						<div class="p news__text"><?= esc_html( $news_events[0]['content'] ) ?></div>
						<?php if ( ! empty( $news_events[0]['link'] ) ) : ?>
							<a href="<?= esc_url( $news_events[0]['link'] ) ?>" class="news__a">
								<div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
								</div>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="news__section-two-news">
				<?php if ( ! empty( $news_events[1] ) ) : ?>
					<div class="news__content">
						<div class="news__content--top">
							<div class="news__date p"><?= esc_html( $news_events[1]['date'] ) ?></div>
							<div class="news__categories">
								<div class="news__category news__category--light-pink"></div>
							</div>
						</div>
						<div class="h4 news__title"><?= esc_html( $news_events[1]['title'] ) ?></div>
						<div class="p news__text"><?= esc_html( $news_events[1]['content'] ) ?></div>
						<?php if ( ! empty( $news_events[1]['link'] ) ) : ?>
							<a href="<?= esc_url( $news_events[1]['link'] )?>" class="news__a">
								<div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
								</div>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $news_events[2] ) ) : ?>
					<div class="news__content">
						<div class="news__content--top">
							<div class="news__date p"><?= esc_html( $news_events[2]['date'] ) ?></div>
							<div class="news__categories">
								<div class="news__category news__category--wms"></div>
							</div>
						</div>
						<div class="h4 news__title"><?= esc_html( $news_events[2]['title'] ) ?></div>
						<div class="p news__text"><?= esc_html( $news_events[2]['content'] ) ?></div>
						<?php if ( ! empty( $news_events[2]['link'] ) ) : ?>
							<a href="<?= esc_url( $news_events[2]['link'] ) ?>" class="news__a">
								<div class="news__read-more">
									<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
								</div>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php foreach ( $news_events as $index => $news ) : ?>
				<?php if ( $index > 2 ) : ?>

					<div class="news__section news__section--small">
						<div class="news__image-section">
							<div class="news__image" style="background-image: url(<?= esc_html( $news['image'] )?>)">
							</div>
						</div>
						<div class="news__content">
							<div class="news__content--top">
								<div class="news__date p"><?= esc_html( $news['date'] ) ?></div>
								<div class="news__categories">
									<div class="news__category news__category--green"></div>
									<div class="news__category news__category--yellow"></div>
								</div>
							</div>
							<div class="h4 news__title"><?= esc_html( $news['title'] ) ?></div>
							<?php if ( ! empty( $news['link'] ) ) : ?>
								<a href="<?= esc_url( $news['link'] ) ?>" class="news__a">
									<div class="news__read-more">
										<?= esc_html( __( 'Read More', 'nuplo' ) ) ?>
									</div>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>