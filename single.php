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

    <div class="single-post-content">
        <?php
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <div class="single-post-data">
                    <div class="single-post-title">
                        <h1><?php the_title();?></h1>
                    </div>
                    <div class="single-post-thumbnail">
                        <?php  
                            $attachment_page_url = '';
                            $attachment_page_url = get_attachment_link( get_post_thumbnail_id() ); ?>
                        <a href="<?php echo $attachment_page_url; ?>" class="featured-image">
                            <?php the_post_thumbnail('category-thumb'); ?>
                        </a>
                    </div>
                    <div class="single-post-meta">
                        <p>Posted by: <?php the_author_posts_link(); ?> | <?php the_date(); ?> 
                    </div>
                    <div class="single-post-data-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="single-post-category-list">
                        <?php
                            $taxonomy = 'category';
                            // get the term IDs assigned to post.
                            $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
                            // separator between links
                            $separator = ', ';

                            if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

                            $term_ids = implode( ',' , $post_terms );
                            $terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
                            $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
                            // display post categories
                            ?> Categories: <?php echo  $terms;
                            }
                        ?>
                    </div>
                </div>
                    <?php
                }
            }
        ?>
    </div>

<?php get_footer(); ?>