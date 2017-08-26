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

<script src="https://use.typekit.net/umq8lex.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="header-nav" class="site-header navbar navbar-expand-sm sembia-header">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php
                wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'ul',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'navbar-collapse-primary',
                    'menu_class'        => 'nav navbar-nav'
                )); ?>
            </div>
            <a class="navbar-brand pull-right" href="<?php echo esc_url( home_url( '/' ) );?>">
            <?php if ($site_logo) { ?>
                <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $site_logo; ?>">
            <?php } else { ?>
                <?php get_template_part('inc/svg/logo.svg'); ?>
                <h1 class="sr-only">Sembia</h1>
            <?php } ?>
            </a>

        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
