<?php
/**
 * The single post template
 *
 * @author Grupp Delta
 * @package Grupp Delta H&M projekt
 * @subpackage H&M
 * @since H&M V1.0
 *
 **/
?>

<?php get_header(); ?>
    <?php
        $post = get_post($_POST['id']);
    ?>
    <div id="single-post post-<?php the_ID(); ?>">
 
    <?php while (have_posts()) : the_post(); ?>
 
                <?php if ( has_post_thumbnail() ) { 
                    	the_post_thumbnail("big");
                		} 
                	?>
                    <?php the_content();?>
                <h1><?php the_title();?></h1>
                <div class="pris">
                <?php
                $key_1_value = get_post_meta( get_the_ID(), 'about_meta_box', true );
                // check if the custom field has a value
                if( ! empty( $key_1_value ) ) {
                  echo $key_1_value;
                } 
                ?>
                </div>
                
 
    <?php endwhile;?> 
 
    </div>

<?php get_footer(); ?>