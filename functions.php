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

add_theme_support( 'post-thumbnails' ); // sätter storlekarna bilder som används på sidan. Name, width, height
add_image_size( 'mobile-thumb', 800, 800, false); //true = beskärs false = skalas
add_image_size( 'ipad', 1024, 768, false); //HM prod bilder
add_image_size( 'big', 600, 800, true); //HM prod bilder
add_image_size( 'spel', 500, 667, true); //HM prod bilder



// //////////////METABOX////////////////////
function add_about_meta_box() {
    add_meta_box(
        'about_meta_box', // id
        __('Price', 'hm'), // titel som skrivs ut i admin
        'show_about_meta_box', 
        'post', // att den hamnar på posts
        'normal', 
        'core'); 
}
add_action('add_meta_boxes', 'add_about_meta_box');

function show_about_meta_box() { // funktion för att visa metabox i admin när man gör en page
    global $post;  
        $meta = get_post_meta($post->ID, 'about_meta_box', true);  
     
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   
   echo '<table class="form-table">';   
        echo '<tr>
            <th><label for="about_meta_box">' . _e('Product price', 'tobtheme') . '</label></th>
            <td><input name="about_meta_box" id="about_meta_box">'.$meta.'</input><br/></td>
            </tr>';          
    echo '</table>';
}

// *************************************************************************
//             Sparar informationen i metaboxen
//  *************************************************************************
// function save_about_meta($post_id) {   
   
//     if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
//         return $post_id;
        
//     // autosave
//     if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
//         return $post_id;
        
    
//     if ('page' == $_POST['post_type']) {
//         if (!current_user_can('edit_page', $post_id))
//             return $post_id;
//         } elseif (!current_user_can('edit_post', $post_id)) {
//             return $post_id;
//     }  
    
//     $old = get_post_meta($post_id, "about_meta_box", true);
    
//     $new = $_POST["about_meta_box"];
    
//     if ($new && $new != $old) {
//         update_post_meta($post_id, "about_meta_box", $new);
//     } elseif ('' == $new && $old) {
//         delete_post_meta($post_id, "about_meta_box", $old);
//     }
// }

// add_action('save_post', 'save_about_meta');


function add_text_meta_box() {
    add_meta_box(
        'text_meta_box', // id
        __('Price', 'hm'), // titel som skrivs ut i admin
        'show_text_meta_box', 
        'post', // att den hamnar på posts
        'normal', 
        'core'); 
}
add_action('add_meta_boxes', 'add_text_meta_box');

function show_text_meta_box() { // funktion för att visa metabox i admin när man gör en page
    global $post;  
        $meta = get_post_meta($post->ID, 'text_meta_box', true);  
     
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
   
   echo '<table class="form-table">';   
        echo '<tr>
            <th><label for="text_meta_box">' . _e('Product text', 'tobtheme') . '</label></th>
            <td><input name="text_meta_box" id="text_meta_box">'.$meta.'</input><br/></td>
            </tr>';          
    echo '</table>';
}

// *************************************************************************
//             Sparar informationen i metaboxen
//  *************************************************************************
function save_text_meta($post_id) {   
   
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
        
    // autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
        
    
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }  
    
    $old = get_post_meta($post_id, "text_meta_box", true);
    
    $new = $_POST["text_meta_box"];
    
    if ($new && $new != $old) {
        update_post_meta($post_id, "text_meta_box", $new);
    } elseif ('' == $new && $old) {
        delete_post_meta($post_id, "text_meta_box", $old);
    }
}

add_action('save_post', 'save_text_meta');

// //////////////METABOX////////////////////


function hm_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'hm_remove_gallery_css' );




//Ladda css och js den rätta vägen.
function load_hm_scripts() {

wp_enqueue_style('hm_style', get_template_directory_uri() . '/css/style.css');
wp_enqueue_style('hm_isotope', get_template_directory_uri() . '/css/isotope.css');
wp_enqueue_script( 'jquery', 'http://code.jquery.com/jquery-1.11.3.min.js', array(), false, true );
wp_enqueue_script( 'simplemodal-js', get_bloginfo('template_directory') . '/js/jquery.simplemodal-1.4.4.js', array(), false, true );
wp_enqueue_script( 'bpopup', get_bloginfo('template_directory') . '/js/jquery.bpopup.min.js', array(), false, true );
wp_enqueue_script( 'mousewheel', get_bloginfo('template_directory') . '/js/jquery.mousewheel.min.js', array(), false, true );
wp_enqueue_script( 'isotope', get_bloginfo('template_directory') . '/js/isotope.pkgd.min.js', array(), false, true );
wp_enqueue_script( 'horizontal', get_bloginfo('template_directory') . '/js/horizontal.js', array(), false, true );
wp_enqueue_script( 'hm_script', get_bloginfo('template_directory') . '/js/main.js', array('jquery') );
/*wp_enqueue_script( 'gsap-js', get_bloginfo('template_directory') . '/js/SplitText.js', array(), false, true );*/
}

add_action('wp_enqueue_scripts', 'load_hm_scripts');

?>	