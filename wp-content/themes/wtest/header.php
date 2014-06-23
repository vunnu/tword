<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wtest
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/superglobal.css' ?>" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="container">
	<header id="masthead" class="site-header" role="banner">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse collapse" id=main>
                    <?php wp_nav_menu( array( 'theme_location' => 'main_top_menu', 'container' => '', 'menu_class' => 'nav navbar-nav' ) ); ?>
                </div>
            </div>
		</div><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="row">
        <div class="container">
            <div class="navbar row" id="main-page-menu-container" role="navigation">
                <div class="container">
                    <button type="button" class="navbar-toggle" id="main-page-menu-toggle" data-toggle="collapse" data-target="#navbar-page-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar-page-collapse">
                        <?php wp_nav_menu( array( 'theme_location' => 'main_page_menu', 'container' => '', 'menu_class' => 'nav navbar-nav' ) ); ?>
                    </div>
                </div>
            </div><!-- #site-navigation -->
            <div class="row">
                <?php
                    echo do_shortcode("[metaslider id=16]");
                ?>
            </div>
