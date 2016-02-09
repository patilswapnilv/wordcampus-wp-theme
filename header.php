<?php

$blog_url = get_bloginfo('url');
$stylesheet_dir = get_stylesheet_directory_uri();
$is_front_page = is_front_page();
$is_events_page = is_post_type_archive('tribe_events') || is_singular('tribe_events');

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '-', true, 'left' ); ?></title>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    <a href="#wpcampus-main" id="skip-to-content">Skip to Content</a>

    <div id="wpcampus-banner">
        <ul class="menu">
            <li class="icon home<?php echo $is_front_page ? ' current' : null; ?>"><a href="<?php echo $blog_url; ?>"><img src="<?php echo $stylesheet_dir; ?>/images/home-white.svg" alt="Visit the WPCampus home page" /></a></li>
            <li<?php echo is_page( 'get-involved' ) ? ' class="current"' : null; ?>><a href="<?php echo $blog_url; ?>/get-involved/">Get Involved</a></li>
            <li<?php echo $is_events_page ? ' class="current"' : null; ?>><a href="<?php echo $blog_url; ?>/events/">Events</a></li>
            <li<?php echo is_page( 'contact' ) ? ' class="current"' : null; ?>><a href="<?php echo $blog_url; ?>/contact/">Contact Us</a></li>
            <li class="icon twitter"><a href="https://twitter.com/wpcampusorg"><img src="<?php echo $stylesheet_dir; ?>/images/twitter-white.svg" alt="Follow WPCampus on Twitter" /></a></li>
        </ul>
    </div> <!-- #wpcampus-banner -->

    <div id="wpcampus-hero">
        <div class="row">
            <div class="small-12 columns">
                <div class="wpcampus-header"><?php

                    // If home, add a <h1>
                    echo $is_front_page ? '<h1>' : null;

                    ?><a class="wpcampus-logo" href="<?php echo $blog_url; ?>">
                        <span class="screen-reader-text">WPCampus</span>
                        <img src="<?php echo $stylesheet_dir; ?>/images/wpcampus-white.svg" alt="" />
                        <span class="wpcampus-tagline">Where WordPress Meets Higher Education</span>
                    </a><?php

                    // If home, close the <h1>
                    echo $is_front_page ? '</h1>' : null;

                    if ( ! is_page( 'get-involved' ) ) {
                        ?><a href="<?php echo $blog_url; ?>/get-involved/" class="button royal-blue">Get Involved With WPCampus</a><?php
                    }

                ?></div> <!-- .wpcampus-header -->
            </div>
        </div>
    </div><?php

    if ( ! $is_front_page ) {
        ?><div id="wpcampus-main-page-title">
            <h1><?php

                // For 404s
                if ( is_404() ) {
                    echo 'Page Not Found';
                }

                // Had to write in because events plugin was overwriting the 'post_type_archive_title' filter
                else if ( $is_events_page ) {
                    echo 'Events';
                }

                else {
                    the_title();
                }

            ?></h1><?php

            // Include breadcrumbs
            if ( $breadcrumbs_html = wpcampus_get_breadcrumbs_html() ) {
                echo $breadcrumbs_html;
            }

        ?></div><?php

    }

    ?><div id="wpcampus-main">
        <div class="row">
            <div class="small-12 columns">