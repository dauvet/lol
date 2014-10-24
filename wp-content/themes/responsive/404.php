<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package responsive
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="page-content">
					<p style="font-size: 30px;margin-top: 50px">
                        <?php _e( 'Trang này không tồn tại!', 'responsive' ); ?>
                    </p>



				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
