<?php

// Add article meta after header.
add_action( 'wpcampus_after_article_header', 'wpcampus_print_article_meta', 5 );

get_header();

wpcampus_print_podcast_promo();

if ( ! have_posts() ) :
	wpcampus_print_404();
else :

	// Setup article arguments.
	$args = array(
		'header'        => 'h2',
		'print_content' => false,
	);

	// Print the articles.
	wpcampus_print_articles( $args );

	wpcampus_print_podcast_links();

endif;

get_footer();
