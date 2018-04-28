<?php 
    
    /**
     * The template for displaying search results pages.
     *
     *
     */

    get_header();

    get_template_part('templates/page/page', 'logo');
     
?>
 

	
    <?php global $wp_query; $total_results = $wp_query->found_posts; ?>
    
    <!-- Content Section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-<?php if (is_active_sidebar('sidebar')) : ?>9<?php else : ?>12<?php endif; ?>">
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="section-heading">
                
                        <?php 

                            // get the number of search results. If 1, use singular 'result'. Else use plural 'results'
                            global $wp_query; 
                            if ($wp_query->found_posts == 1) {
                                echo $wp_query->found_posts . ' Result Found';
                            } else {
                                echo $wp_query->found_posts . ' Results Found';
                            }
                            
                        ?>
                        
                        </h1>
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?><br>
                        <span class="search-post-title"><?php the_title('<h3>','</h3>'); ?></span>
                        <span class="search-post-excerpt"><?php the_excerpt(); ?></span>
                        <span class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span><br>
                        <?php endwhile; ?>
                    </div>    
				</div><!-- col -->

				<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->

<?php get_footer(); ?>