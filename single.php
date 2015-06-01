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
 
                <?php the_title();?>
 
                <?php the_content();?>
 
    <?php endwhile;?> 
 
    </div>

<?php get_footer(); ?>