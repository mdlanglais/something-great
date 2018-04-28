<?php

	/**
	 * The main post template file
	 *
	 * Post template file for <Enter Site Name>
	 *
	 * @Author: Michael Langlais
	 * @Date: Month, Day Year
	 * 
	 */

	get_header(); 

	$tags = get_the_tags();

	get_template_part('templates/post/post', 'logo');

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

					<?php comments_template(); ?>
					<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>

				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

<?php get_footer(); ?>