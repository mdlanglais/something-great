<?php

	/**
	 * The template for displaying 404 pages (not found)
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
				<div class="col-lg-12">
					<h1 class="section-heading">Page Not Found</h1>
					<p class="lead section-lead">:( It seems we cannot find what it is you are looking for.</p>
					<p><a href="/"><button type="button" class="btn btn-primary btn-lg">Go Home</button></a></p>
				</div><!-- col -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

<?php get_footer(); ?>