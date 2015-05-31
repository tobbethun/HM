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
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<ul id="filters">
    			<li><a href="#" data-filter="*" class="selected">Everything</a></li>
					<?php 
						$terms = get_terms("category"); // get all categories, but you can use any taxonomy
						$count = count($terms); //How many are they?
							if ( $count > 0 ){  //If there are more than 0 terms
							foreach ( $terms as $term ) {  //for each term:
							echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
							//create a list item with the current term slug for sorting, and name for label
							}
						} 
					?>
			</ul>
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
			<?php $the_query = new WP_Query( 'posts_per_page=50' ); //Check the WP_Query docs to see how you can limit which posts to display ?>
			<?php if ( $the_query->have_posts() ) : ?>
    		<div id="isotope-list">
    			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
					$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
					$termsString = ""; //initialize the string that will contain the terms
						foreach ( $termsArray as $term ) { // for each term 
						$termsString .= $term->slug.' '; //create a string that has all the slugs 
					}
				?> 
				<div class="<?php echo $termsString; ?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
					<h3><?php the_title(); ?></h3>
	        		<?php if ( has_post_thumbnail() ) { 
                    	the_post_thumbnail();
                		} 
                	?>
				</div> <!-- end item -->
    			<?php endwhile;  ?>
    		</div> <!-- end isotope-list -->
			<?php endif; ?>
		</div>
    </div>

<?php get_footer(); ?>