<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sembia
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
            Copyright &copy; <?php echo date("Y"); ?>. <?php printf( esc_html__( '%1$s by %2$s.', 'sembia' ), 'sembia', '<a href="https://sembia.studio/theme/" rel="designer">Sembia Studio</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
