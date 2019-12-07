<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Eventpress
 */

get_header();
?>

    <section id="page-404" class="section-padding page">
        <div class="separator"><img src="assets/img/shape/shape01.png" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="<?php echo esc_url(get_template_directory_uri()."/images/404-img.png"); ?>" alt="">
                    <h3><?php esc_html_e('Oops! That page can’t be found.','eventpress'); ?></h3> 
                    <p><?php esc_html_e( 'Ops! Something happened...', 'eventpress' ); ?></p>                   
                </div>

                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3 offset-0 pt-5">
                    <form id="searchform" class="subscription-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">                    
                        <div class="commingsoon-subscribe search-404 text-center input-wrapper">
                            <div class="input-effect">
                                <input class="effect-21" type="text" name="s" id="s" placeholder="">
                                <label><?php esc_html_e('Some Text here','eventpress'); ?></label>
                                <span class="focus-border">
                                    <i></i>
                                </span>
                            </div>
                            <div class="hover-effect">
                                <input type="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
	get_footer();
?>
