<div>
	<?php
	printf(
		__( 'Posted by %s on %s in %s', 'nuplo' ),
		get_the_author_posts_link(),
		get_the_time('d-m-Y'),
		get_the_category_list(', ')
	);
	?>
</div>
