<div id="header">
		<div class="top-nav">
		</div>
		<div class="main-top-nav">
			<img src="<?php echo get_template_directory_uri(); ?>/img/hm-logotype.png" alt="HM-Logo">
			<div class="filters">
				<div class="ui-group">
					<h3>Typ	</h3>
					<div class="button-group js-radio-button-group" data-filter-group="color">
						<button class="button is-checked" data-filter="">Alla</button>
						<button class="button" data-filter=".byxor">Byxor</button>
						<button class="button" data-filter=".toppar">Toppar</button>
						<button class="button" data-filter=".kjolar">Kjolar</button>
					</div>
				</div>

				<div class="ui-group">
					<h3>Storlek</h3>
					<div class="button-group js-radio-button-group" data-filter-group="size">
						<button class="button is-checked" data-filter="">Alla</button>
						<button class="button" data-filter=".small">Small</button>
						<button class="button" data-filter=".medium">Medium</button>
						<button class="button" data-filter=".large">Large</button>
					</div>
				</div>

				<div class="ui-group">
					<h3>Färg</h3>
					<div class="button-group js-radio-button-group" data-filter-group="shape">
						<button class="button is-checked" data-filter="">Alla</button>
						<button class="button" data-filter=".vit">Vit</button>
						<button class="button" data-filter=".rod">Röd</button>
						<button class="button" data-filter=".bla">Blå</button>
						<button class="button" data-filter=".svart">Svart</button>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="sidebar">
		<?php 
		if(is_active_sidebar('sidebar-frontpage')) {
				dynamic_sidebar('sidebar-frontpage');
		}?>
	</div>
	<div class="content">
		<div class="single-post-container"></div>
		<div class="posts-content">
			<?php $the_query = new WP_Query( 'posts_per_page=50' ); //Check the WP_Query docs to see how you can limit which posts to display ?>
			<?php if ( $the_query->have_posts() ) : ?>
    			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
					$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
					$termsString = ""; //initialize the string that will contain the terms
						foreach ( $termsArray as $term ) { // for each term 
						$termsString .= $term->slug.' '; //create a string that has all the slugs 
					}
				?> 
				<div class="<?php echo $termsString; ?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
 					<a class="post-link" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
	        		<?php if ( has_post_thumbnail() ) { 
                    	the_post_thumbnail("mobile-thumb");
                		} 
                	?>
                	<div class="boxOnTop">
                		<h3><?php the_title()?></h3>
                		<p><?php
                		$key_1_value = get_post_meta( get_the_ID(), 'text_meta_box', true );
                		// check if the custom field has a value
                		if( ! empty( $key_1_value ) ) {
                			echo $key_1_value;
                		} 
                		?></p>
                	</div>
                	</a>
				</div> <!-- end item -->
    			<?php endwhile;  ?>
			<?php endif; ?>
		</div>
    </div>