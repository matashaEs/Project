<?php
$data = get_fields( $block['id'] );

$title       = $data['title'] ?? '';
$description = $data['description'] ?? '';
?>

<section>
	<?php
	if ( $title !== '' ) {
		?>
        <h1><?php echo $title; ?></h1>
		<?php
	}
	?>

	<?php
	if ( $description !== '' ) {
		?>
        <div><?php echo $description; ?></div>
		<?php
	}
	?>
</section>
