<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package Treville
 */

?>

	</div><!-- #content -->

	<?php do_action( 'treville_before_footer' ); ?>

	<div id="footer" class="footer-wrap">

		<footer id="colophon" class="site-footer container clearfix" role="contentinfo">

			<?php do_action( 'treville_footer_menu' ); ?>

			<div id="footer-text" class="site-info">
                            Direitos Reservados © 1999-<?php echo date('Y');?> Instituto de Geociências - Universidade de São Paulo :: <a href="/creditos">Créditos</a>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>