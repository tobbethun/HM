<?php
/**
 * The index template
 *
 * @author Grupp Delta
 * @package Grupp Delta H&M projekt
 * @subpackage H&M
 * @since H&M V1.0
 *
 **/
?>

<?php get_header();?>
	<div id="header">
		<div class="top-nav">
		</div>
		<div class="main-top-nav">
			<img src="<?php echo get_template_directory_uri(); ?>/img/hm-logotype.png" alt="HM-Logo">
		</div>
	</div>

	<div class="sidebar">
		<?php 
		if(is_active_sidebar('sidebar-frontpage')) {
				dynamic_sidebar('sidebar-frontpage');
		}?>
	</div>
	<div class="content">
		<div class="posts-content">
			<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						?>
						<h1><?php the_title(); ?></h1>
						<?php
						the_content();
						if(has_post_thumbnail()) {
								the_post_thumbnail('mobile-thumb');
							}
			?>
			<div class="readmore">
        		<a href="<?php echo get_permalink(); ?>">Read more..</a>
        	</div>
        	<?php
						//
						// Post Content here
						//
					} // end while
				} // end if
			?>
		</div>
    </div>

<?php get_footer(); ?>