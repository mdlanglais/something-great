<?php

	/**
	 * The main page template file duplicated for woocommerce content
	 *
	 * Page template file for <Enter Site Name>
	 *
	 * @Author: Michael Langlais
	 * @Date: Month, Day Year
	 * 
	 */

	get_header(); 

	get_template_part('templates/page/page', 'logo');

?>

	<!-- Content Section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-<?php if (is_active_sidebar('sidebar')) : ?>9<?php else : ?>12<?php endif; ?>">
					<?php woocommerce_content(); ?>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

<?php get_footer(); ?>