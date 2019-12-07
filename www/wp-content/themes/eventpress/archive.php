<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eventpress
 */

get_header();
?>

<section class="section-padding page-s">
		<div class="separator"><img src="<?php echo get_template_directory_uri(); ?>/images/shape/shape01.png" alt=""></div>
        <div class="container">
            <div class="row">	
			
			<!--Blog Detail-->
			<div class="col-lg-8 order-lg-1 col-md-12 mb-5 mb-lg-0">
					
					<?php if( have_posts() ): ?>
						<div class="row">
							<?php while( have_posts() ): the_post(); ?>
							
								<?php get_template_part('template-parts/content','page'); ?>
						
							<?php endwhile; ?>
						</div>
						
					<?php else: ?>
						
						<?php get_template_part('template-parts/content','none'); ?>
						
					<?php endif; ?>
			
			</div>
			<!--/End of Blog Detail-->
			<div class="col-lg-4 col-md-12 order-lg-2">
				<section class="sidebar">
					<?php get_sidebar(); ?>
				 </section>
			</div>	
		</div>	
	</div>
</section>

<?php get_footer(); ?>
