<?php
/**
 *  $lat
 *  $lng
 */


if ( ! empty( $block['id'] ) ) {
	extract( get_fields( $block['id'] ) );
} else {
	extract( $block['data'] );
}
?>
<div
		class="container-fluid cai-map"
		id="caiMap"
		data-lat="<?= esc_attr( $lat ); ?>"
		data-lng="<?= esc_attr( $lng ); ?>"
></div>
