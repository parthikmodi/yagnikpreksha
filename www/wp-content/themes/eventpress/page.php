<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
		<?php 
			echo '<div class="col-lg-'.( !is_active_sidebar( "sidebar-primary" ) ?"12" :"8" ).'">';
		?>
		<div class="site-content">
			<?php 
				if( have_posts()) :  the_post();
				the_content(); 
				endif;
				if( $post->comment_status == 'open' ) { 
					comments_template( '', true ); // show comments 
				}
			?>
		</div>			
	</div>	
	<div class="col-lg-4 col-md-12 order-lg-2">
		<section class="sidebar">
			<?php get_sidebar(); ?>
		 </section>
	</div>	 			
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<?php get_footer(); ?>

