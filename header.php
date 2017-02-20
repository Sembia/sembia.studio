<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sembia
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="header-nav" class="navbar navbar-fixed-top sembia-header">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>">
                    <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri() . '/dist/img/logo_small.png'; ?>">
                </a>
            </div>
            <div class="navbar-right">
                <?php
                wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
                ?>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
