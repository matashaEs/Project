<div class="template-heading">
	<div class="template-heading__breadcrumbs">
		<?php
		echo esc_html( get_template_part( 'template-parts/breadcrumbs' ) );
		?>
	</div>
	<div class="template-heading__title h1">
		<?= esc_html( apply_filters( 'template_heading_title', get_the_title() ) ) ?>
	</div>
	<div class="template-heading__content p">
		<?php the_content(); ?>
	</div>
</div>
