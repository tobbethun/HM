<?php
//Lägger till så att man kan använda sig av menyer ( baserat på kategorier för oss )

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

register_nav_menu( 'primary', __( 'Main Menu', 'Single Page Menu', 'hm' ) );

register_sidebar(array( // gör så att sidebar funkar
	'id' => 'sidebar-frontpage',
	'name' => __('Sidebar', 'hm'),
	'desc' => 'Sidebar för index'
	));

add_theme_support( 'post-thumbnails' ); // sätter storlekarna bilder som används på sidan.
add_image_size( 'mobile-thumb', 300, 500, false); //true = beskärs false = skalas

//Ladda css och js den rätta vägen.

function load_hm_scripts() {

wp_enqueue_style('hm_style', get_template_directory_uri() . '/css/style.css');
wp_enqueue_style('hm_isotope', get_template_directory_uri() . '/css/isotope.css');
wp_enqueue_script( 'jquery', 'http://code.jquery.com/jquery-1.11.3.min.js', array(), false, true );
wp_enqueue_script( 'simplemodal-js', get_bloginfo('template_directory') . '/js/jquery.simplemodal-1.4.4.js', array(), false, true );
wp_enqueue_script( 'isotope', get_bloginfo('template_directory') . '/js/isotope.pkgd.min.js', array(), false, true );
wp_enqueue_script( 'hm_script', get_bloginfo('template_directory') . '/js/main.js', array('jquery') );
/*wp_enqueue_script( 'gsap-js', get_bloginfo('template_directory') . '/js/SplitText.js', array(), false, true );*/
}

add_action('wp_enqueue_scripts', 'load_hm_scripts');

?>	