<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Springfield ACTS Community Outreach Website">
    <meta name="author" content="https://matthewsmart.tech">

    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Springfield ACTS, community outreach, non-profit, charity, volunteering, support">
    <meta name="subject" content="Community Outreach and Support">
    <meta name="language" content="en">
    <meta property="og:title" content="Springfield ACTS">
    <meta property="og:description" content="Join Springfield ACTS in supporting our community through various outreach programs and events.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/social-share.jpg">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Springfield ACTS">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/asset/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/asset/images/favicon.ico" type="image/x-icon">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Springfield ACTS">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/asset/images/apple-touch-icon.png">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:;">
    <meta name="theme-color" content="#5291c1">

    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper" id="wrapper">

        <header class="mobile-header">
            <div class="mobile-header-container">
                <div class="mobile-logo">
                    <a href="<?php echo home_url(); ?>">
                        <p>SPRINGFIELD ACTS</p>
                    </a>
                    <!-- <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo">
                    </a> -->
                </div>
                <div class="mobile-menu-toggle" id="mobile-menu-toggle">
                    <span class="mobile-menu-icon">&#9776;</span>
                </div>
            </div>
            <div class="mobile-menu" id="mobile-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'mobile-menu-list',
                ));
                ?>
            </div>
        </header>

        <header class="main-header">
            <div class="icon-container">
                <div class="icon">
                    <!-- <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assest/img/tempicon.png" alt="Logo">
                    </a> -->
                    <a href="<?php echo home_url(); ?>">
                        <p>SPRINGFIELD ACTS</p>
                    </a>
                </div>
            </div>

            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'menu_class' => 'link-list', 'container' => 'nav')) ?>
        </header>