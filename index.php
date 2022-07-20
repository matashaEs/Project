<?php
get_header();

the_content();
$pages_data = apply_filters( 'cai_get_sidebar_and_content_data', null );
get_template_part( 'template-parts/sidebar-and-content', null, $pages_data[1] );

get_footer();
