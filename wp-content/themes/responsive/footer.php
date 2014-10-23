<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package responsive
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="desktop">
			<span><?php echo home_settings_get('home_footer_text'); ?></span>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<div class="site-footer-bg"></div>
<a href="#" class="scrollToTop"></a>
<?php wp_footer(); ?>

</body>
</html>
