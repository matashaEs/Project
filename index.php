<?php
get_header();
?>

<?php the_content(); ?>

<?php
echo esc_html(get_template_part('template-parts/pagination', 'infinite-scroll'));
?>
	<div class="container-fluid">
		<div class="container">
			<input type="text" placeholder="Name" class="input--start">
			<input type="email" placeholder="Email" class="input--start">
			<input type="number" placeholder="Phone" class="input--start">
			<textarea class="input input--message input--start" placeholder="Message"></textarea>
<!--			<div class="radio__container">-->
<!--				<input type="radio"-->
<!--					   class="input__radio input__radio--filters"-->
<!--					   id="commercialProperty"-->
<!--					   value="Commercial Property"-->
<!--					   name="industry"/>-->
<!--				<label for="commercialProperty">-->
<!--					<p> Commercial Property </p>-->
<!--				</label>-->
<!--			</div>-->
<!--			<div class="radio__container">-->
<!--				<input type="radio"-->
<!--					   class="input__radio input__radio--filters"-->
<!--					   id="commercialProperty"-->
<!--					   value="Commercial Property"-->
<!--					   name="industry"/>-->
<!--				<label for="commercialProperty">-->
<!--					<p> Commercial Property </p>-->
<!--				</label>-->
<!--			</div>-->

			<div class="form-select">
				<p>Video</p>
				<div class="form-select-box">
					<div class="form-options-container">
						<div class="option radio__container">
							<input type="radio"
								   class="input__radio input__radio--filters"
								   id="commercialProperty1"
								   value="Commercial Property"
								   name="industry1"/>
							<label for="commercialProperty1" class="p">
								Commercial Property
							</label>
						</div>
						<div class="option radio__container">
							<input type="radio"
								   class="input__radio input__radio--filters"
								   id="commercialProperty2"
								   value="Commercial Property 1"
								   name="industry1"/>
							<label for="commercialProperty2" class="p">
								Commercial Property 1
							</label>
						</div>
						<div class="option radio__container">
							<input type="radio"
								   class="input__radio input__radio--filters"
								   id="commercialProperty3"
								   value="Commercial Property 2"
								   name="industry1"/>
							<label for="commercialProperty3" class="p">
								Commercial Property 2
							</label>
						</div>
					</div>
					<div class="form-select--selected p">
						Video Selected
					</div>
				</div>
			</div>

			<input type="text" placeholder="Name" class="input--start">
			<input type="email" placeholder="Email" class="input--start">
			<input type="number" placeholder="Phone" class="input--start">
			<textarea class="input input--message input--start" placeholder="Message"></textarea>

		</div>
	</div>
</div>

<?php
get_footer();
