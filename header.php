<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sembia
 */
global $post;
$background_class = "default-background";
$background_url = '';

if(has_post_thumbnail($post->ID)){
    // Set the background to the featured image;
    $background_class = "featured-background";
    $image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $background_url = !empty($image_arr[0]) ? $image_arr[0] : '';
} elseif ( get_header_image() ) {
    $background_class = "featured-background";
    $background_url = !empty(get_header_image()) ? get_header_image() : '';
    //$background_url = header_image();
}

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
<div id="page" class="site background-image <?php echo $background_class; ?>" <?php if(!empty($background_url)){ echo 'style="background-image:url(' . $background_url . ')"'; } ?>>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
            <?php if ($site_logo) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php echo $site_logo; ?>" />
                </a>
            <?php } ?>

			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title <?php echo $title_class; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title <?php echo $title_class; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description <?php echo $title_class; ?>"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
