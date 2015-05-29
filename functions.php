<?php
register_sidebar(array( // gör så att sidebar för cpts funkar
	'id' => 'sidebar-frontpage',
	'name' => __('Sidebar', 'hm'),
	'desc' => 'Sidebar för index'
	));

add_theme_support( 'post-thumbnails' ); // sätter storlekarna bilder som används på sidan.
add_image_size( 'mobile-thumb', 300, 500, false); //true = beskärs false = skalas

?>	