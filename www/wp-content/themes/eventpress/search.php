<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Eventpress
 */

get_header();
?>


<section class="section-padding page">
	<div class="separator"><img src="<?php echo get_template_directory_uri(); ?>/shape/shape01.png" alt=""></div>
	<div class="container">
		<div class="row padding-top-60 padding-bottom-60">
			<div class="col-lg-8 order-lg-1 col-md-12 mb-5 mb-lg-0">
				<?php
				if ( have_posts() ) :
				
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<div class="col-lg-4 col-md-12 order-lg-2">
				<section class="sidebar">
					<?php get_sidebar(); ?>
				</section>
			</div>
		</div>
	</div>
</section>

<?php
	get_footer();
?>