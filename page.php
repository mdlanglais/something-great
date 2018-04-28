<?php

	/**
	 * The main page template file
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
					<?php if (have_posts()) : while (have_posts()) : the_post();?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="section-heading"><?php the_title(); ?></h1>
							<p class="section-paragraph"><?php the_content(); ?></p>
						</div>    
					<?php endwhile; endif; ?>
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

<?php get_footer(); ?>