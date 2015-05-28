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

<?php get_header(); ?>

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