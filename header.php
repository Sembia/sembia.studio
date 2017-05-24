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

$site_logo = get_option('site_logo');
$title_class = '';
if(!empty($site_logo)){
    $title_class = 'sr-only';
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php echo get_option('extra_header_scripts'); ?>

<script src="https://use.typekit.net/psp6tnb.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="header-nav" class="navbar navbar-fixed-top site-header sembia-header">
        <div class="container">

            <div class="primary-navbar">
                <?php if ($site_logo) { ?>
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>">
                    <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $site_logo; ?>">
                </a>
                <?php } else { ?>
                    <a class="sembia-brand" href="https://sembia.studio">
                        <?php get_template_part('inc/svg/logo.svg'); ?>
                        <h1 class="sembia-title"><span>Sembia</span><span>Studio</span></h1>
                    </a>
                <?php } ?>
                <div class="navbar">
                    <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbar-collapse-primary',
                        'menu_class'        => 'nav navbar-nav'
                    )); ?>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
