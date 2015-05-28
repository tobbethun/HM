<?php
/**
 * The header template of our theme
 *
 * Displays all of the <head> section and everything down to <div id="wrapper">
 *
 * @author Grupp Delta
 * @package Grupp Delta H&M projekt
 * @subpackage H&M
 * @since H&M V1.0
 *
 **/
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width,height=device-height">
	<title><?php bloginfo('name'); ?> <?php wp_title( '|', true, 'left' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">