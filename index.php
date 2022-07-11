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
			<div class="radio__container">
				<input type="radio"
					   class="input__radio input__radio--filters"
					   id="commercialProperty"
					   value="Commercial Property"
					   name="industry"/>
				<label for="commercialProperty">
					<p> Commercial Property </p>
				</label>
			</div>
			<div class="radio__container">
				<input type="radio"
					   class="input__radio input__radio--filters"
					   id="commercialProperty"
					   value="Commercial Property"
					   name="industry"/>
				<label for="commercialProperty">
					<p> Commercial Property </p>
				</label>
			</div>

			<div class="form-select">
				<h2>Video</h2>
				<div class="form-select-box">
					<div class="form-options-container">


						<div class="option radio__container">
							<input type="radio"
								   class="input__radio input__radio--filters"
								   id="commercialProperty1"
								   value="Commercial Property"
								   name="industry1"/>
							<label for="commercialProperty">
								<p> Commercial Property </p>
							</label>
						</div>
						<div class="option radio__container">
							<input type="radio"
								   class="input__radio input__radio--filters"
								   id="commercialProperty1"
								   value="Commercial Property 1"
								   name="industry1"/>
							<label for="commercialProperty">
								<p> Commercial Property 1</p>
							</label>
						</div>
						<div class="option radio__container">
							<input type="radio"
								   class="input__radio input__radio--filters"
								   id="commercialProperty1"
								   value="Commercial Property 2"
								   name="industry1"/>
							<label for="commercialProperty">
								<p> Commercial Property 2</p>
							</label>
						</div>
					</div>
					<div class="form-select--selected">
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

<?php
get_footer();
