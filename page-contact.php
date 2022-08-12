<?php
/** Template Name: Contact Page */

$marker_details = get_field( 'marker_on_the_map', 'options' );

get_header();
the_content();

the_static_acf_block( 'map', $marker_details );

get_footer();
