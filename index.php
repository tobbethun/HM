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

	<div class="top-left">
		<a href="index.php?page_id=42"><img src="<?php echo get_template_directory_uri(); ?>/img/dude.jpeg" alt="dude"></a>
	</div>
	<div class="bottom-right">
		<a href="index.php?page_id=40"><img src="<?php echo get_template_directory_uri(); ?>/img/old-lady.png" alt="old-lady"></a>
	</div>

<?php get_footer(); ?>