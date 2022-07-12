<?php
get_header();
?>

<?php the_content(); ?>

	<div class="container-fluid">
		<div class="container">
			<h1> Heading 1</h1>
			<h1 class="h1-alt">Heading 1 ALT</h1>
			<h2> Heading 2</h2>
			<h3> Heading 3</h3>
			<h4> Heading 4</h4>
			<h5> Heading 5</h5>
			<h6> Heading 6</h6>

			<br>
			<br>
			<h3>Paragraph Regular</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, aperiam, cum doloribus ducimus error
				id inventore ipsam iusto, libero magni maiores natus non reprehenderit unde ut voluptatem voluptatum!
				Animi doloremque dolores id iure obcaecati rem voluptate? Alias atque dignissimos eaque numquam! Animi
				asperiores aut consequatur culpa fuga, labore laboriosam, laudantium molestiae officia officiis, optio
				pariatur quibusdam quis rerum sapiente? A architecto consequatur consequuntur delectus doloribus dolorum
				earum eius excepturi fuga id laudantium, natus nulla omnis provident quas rem repudiandae soluta totam
				ut vero. Ad amet consequatur corporis deleniti deserunt dolore facere fuga illo iusto magni possimus
				quasi quis, quos veniam!</p>


			<br>
			<br>
			<h3>Paragraph Large</h3>
			<p class="p-large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus aspernatur dicta,
				earum eligendi esse eum eveniet expedita laudantium minima minus molestiae nam, nesciunt nostrum
				officiis, quo ratione recusandae repellendus sapiente sit suscipit totam vel voluptatibus. A ab amet
				aperiam, blanditiis commodi consequuntur culpa doloremque eaque error et eum ex facere facilis fugit id
				labore laboriosam magni minus mollitia natus nemo nulla officia placeat praesentium provident quam quia
				quisquam quod quos recusandae saepe sed sequi soluta sunt tenetur veniam vero. Doloremque ex nemo
				nostrum odio reiciendis saepe voluptas! Eaque, eius, itaque. Animi architecto nam reiciendis repellendus
				similique suscipit velit vitae.</p>
			<br/>
			<input type="text" placeholder="Name" class="input input--start">
			<input type="email" placeholder="Email" class="input input--start">
			<input type="number" placeholder="Phone" class="input input--start">
			<textarea class="input input--message input--start" placeholder="Message"></textarea>

			<br/>

			<div class="form-select">
				<div class="form-select-box">
					<div class="form-options-container">
						<div class="form-option radio__container">
							<input type="radio"
								class="input__radio input__radio--filters"
								id="news"
								value="News"
								name="property"/>
							<label for="news" class="p">
								News
							</label>
						</div>
						<div class="form-option radio__container">
							<input type="radio" class="input__radio input__radio--filters"
								id="caseStudies"
								value="Case Studies"
								name="property"/>
							<label for="caseStudies" class="p">
								Case Studies
							</label>
						</div>
						<div class="form-option radio__container">
							<input type="radio"
								class="input__radio input__radio--filters"
								id="press"
								value="Press"
								name="property"/>
							<label for="press" class="p">
								Press
							</label>
						</div>
						<div class="form-option radio__container">
							<input type="radio"
								class="input__radio input__radio--filters"
								id="events"
								value="Events"
								name="property"/>
							<label for="contentType" class="p">
								Events
							</label>
						</div>
						<div class="form-option radio__container">
							<input type="radio"
								class="input__radio input__radio--filters"
								id="other"
								value="Other"
								name="property"/>
							<label for="other" class="p">
								Other
							</label>
						</div>
					</div>
					<div class="form-select--selected h4">
						Select Property
					</div>
				</div>
			</div>
			<br/>

			<h4>Product Category</h4>

			<div class="radio__container">
				<input type="radio"
					class="input__radio input__radio--filters"
					id="erp"
					value="ERP"
					name="ProductCategory"/>
				<label for="erp">
					<p>ERP</p>
				</label>
			</div>
			<div class="radio__container">
				<input type="radio"
					class="input__radio input__radio--filters"
					id="commerceEDI"
					value="E-Commerce EDI"
					name="ProductCategory"/>
				<label for="commerceEDI">
					<p>E-Commerce EDI</p>
				</label>
			</div>
			<div class="radio__container">
				<input type="radio"
					class="input__radio input__radio--filters"
					id="processAutomation"
					value="Process Automation"
					name="ProductCategory"/>
				<label for="processAutomation">
					<p>Process Automation</p>
				</label>
			</div>
			<div class="radio__container">
				<input type="radio"
					class="input__radio input__radio--filters"
					id="mes"
					value="MES"
					name="ProductCategory"/>
				<label for="mes">
					<p>MES</p>
				</label>
			</div>
			<div class="radio__container">
				<input type="radio"
					class="input__radio input__radio--filters"
					id="wms"
					value="WMS"
					name="ProductCategory"/>
				<label for="wms">
					<p>WMS</p>
				</label>
			</div>
			<div class="radio__container">
				<input type="radio"
					class="input__radio input__radio--filters"
					id="other"
					value="Other"
					name="ProductCategory"/>
				<label for="other">
					<p>Other</p>
				</label>
			</div>

			<br>

			<div class="form__product-detail">
				<h1>Ponderosa ERP</h1>
				<div class="form-select">
					<div class="form-select-box">
						<div class="form-options-container">
							<div class="form-option radio__container">
								<label class="p-large label-modules">
									Millwork Solutions
								</label>
							</div>
							<div class="form-option radio__container">
								<label class="p-large label-modules">
									LBM Software
								</label>
							</div>
							<div class="form-option radio__container">
								<label class="p-large label-modules">
									Lumber Processing
								</label>
							</div>
						</div>
						<div class="form-select--selected h4">
							Modules
						</div>
					</div>
				</div>
				<div class="input-form">
					<input type="text" placeholder="Name" class="input">
					<input type="email" placeholder="Email" class="input">
					<input type="number" placeholder="Phone" class="input">
				</div>
				<a href="" class="button p">Schedule A Demo</a>
			</div>

			<br>
			<br>
			<br>
			<br>

				<div class="form-select-box form-select-box--faq">
					<div class="form-options-container">
						<div class="form-option form-option-faq">
							<label class="p label-faq">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, aperiam, cum doloribus ducimus error
								id inventore ipsam iusto, libero magni maiores natus non reprehenderit unde ut voluptatem voluptatum!
								Animi doloremque dolores id iure obcaecati rem voluptate? Alias atque dignissimos eaque numquam! Animi
								asperiores aut consequatur culpa fuga, labore laboriosam, laudantium molestiae officia officiis, optio
								pariatur quibusdam quis rerum sapiente? A architecto consequatur consequuntur delectus doloribus dolorum
								earum eius excepturi fuga id laudantium, natus nulla omnis provident quas rem repudiandae soluta totam
								ut vero. Ad amet consequatur corporis deleniti deserunt dolore facere fuga illo iusto magni possimus
								quasi quis, quos veniam!
							</label>
						</div>
					</div>
					<div class="form-select--selected h4">
						FAQ One
					</div>
				</div>


			<br>
			<br>

				<div class="form-select-box form-select-box--faq">
					<div class="form-options-container">
						<div class="form-option form-option-faq">
							<label class="p label-faq">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, aperiam, cum doloribus ducimus error
								id inventore ipsam iusto, libero magni maiores natus non reprehenderit unde ut voluptatem voluptatum!
								Animi doloremque dolores id iure obcaecati rem voluptate? Alias atque dignissimos eaque numquam! Animi
								asperiores aut consequatur culpa fuga, labore laboriosam, laudantium molestiae officia officiis, optio
								pariatur quibusdam quis rerum sapiente? A architecto consequatur consequuntur delectus doloribus dolorum
								earum eius excepturi fuga id laudantium, natus nulla omnis provident quas rem repudiandae soluta totam
								ut vero. Ad amet consequatur corporis deleniti deserunt dolore facere fuga illo iusto magni possimus
								quasi quis, quos veniam!
							</label>
						</div>
					</div>
					<div class="form-select--selected h4">
						FAQ Two
					</div>
				</div>

			<br>
			<br>

				<div class="form-select-box form-select-box--faq">
					<div class="form-options-container">
						<div class="form-option form-option-faq">
							<label class="p label-faq">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, aperiam, cum doloribus ducimus error
								id inventore ipsam iusto, libero magni maiores natus non reprehenderit unde ut voluptatem voluptatum!
								Animi doloremque dolores id iure obcaecati rem voluptate? Alias atque dignissimos eaque numquam! Animi
								asperiores aut consequatur culpa fuga, labore laboriosam, laudantium molestiae officia officiis, optio
								pariatur quibusdam quis rerum sapiente? A architecto consequatur consequuntur delectus doloribus dolorum
								earum eius excepturi fuga id laudantium, natus nulla omnis provident quas rem repudiandae soluta totam
								ut vero. Ad amet consequatur corporis deleniti deserunt dolore facere fuga illo iusto magni possimus
								quasi quis, quos veniam!
							</label>
						</div>
					</div>
					<div class="form-select--selected h4">
						FAQ Three
					</div>
				</div>

			<br>
			<br>
			<div class="buttons">
				<div class="buttons--grey">
					<a href="" class="button button--white button--white-blue p">Submit</a> <br> <br>
					<a href="" class="button p">See All News</a> <br> <br>
					<a href="" class="button button--orange p">ERP</a> <br> <br>
					<a href="" class="button button--dark-pink p">E-Commerce EDI</a> <br> <br>
					<a href="" class="button button--wms p">WMS</a> <br> <br>
					<a href="" class="button button--light-pink p">MES</a> <br> <br>
					<a href="" class="button button--blue-border p">Choose file</a> <br> <br>
					<a href="" class="button button--footer h6">Live Chat</a> <br> <br>
				</div>
				<div class="buttons--white">
					<a href="" class="button button--white button--white-blue p">Submit</a> <br> <br>
					<a href="" class="button p">See All News</a> <br> <br>
					<a href="" class="button button--orange p">ERP</a> <br> <br>
					<a href="" class="button button--dark-pink p">E-Commerce EDI</a> <br> <br>
					<a href="" class="button button--wms p">WMS</a> <br> <br>
					<a href="" class="button button--light-pink p">MES</a> <br> <br>
					<a href="" class="button button--blue-border p">Choose file</a> <br> <br>
					<a href="" class="button button--footer h6">Live Chat</a> <br> <br>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>

		</div>
	</div>


<?php
get_footer();
