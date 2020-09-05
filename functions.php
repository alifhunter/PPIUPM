<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

function get_breadcrumb(){
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

add_action('wp_ajax_pesan', 'pesan_form');
add_action('wp_ajax_nopriv_pesan', 'pesan_form');

function pesan_form(){

    //nonces
    if(!wp_verify_nonce($_POST['nonces'], 'ajax-nonce')){
        wp_send_json_error('Nonce is incorrect', 401);
        die();
    }

    $formData = [];
    wp_parse_str($_POST['pesan'], $formData);
    // admin email
    $adminEmail = get_option('admin_email');
    // email headers
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: PPIUPM <' . $adminEmail . '>';
    $headers[] = 'Reply-to:' . $formData['email'];
    // send email to
    $sendTo = $adminEmail;
    // subject
    $subject = 'PPIUPM - Saran dari ' . $formData['name'];
    // message
    $message = '';

    foreach($formData as $index => $field){
        $message .= '<strong>' . $index . '</strong>: ' . $field . '<br/>';
    }

    // send
    try{
        if(wp_mail($sendTo, $subject, $message, $headers)){
            wp_send_json_success('Email sent!');
        } else {
            wp_send_json_error('Email not sent!');
        }
    } catch(Exception $e) {
        wp_send_json_error($e->getMessage());
    }

}

function get_images_from_media_library() {
    $args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'image',
        'post_status' => 'inherit',
        'posts_per_page' => 5,
        'orderby' => 'desc'
    );
    $query_images = new WP_Query( $args );
    $images = array();
    foreach ( $query_images->posts as $image) {
        $images[]= $image->guid;
    }
    return $images;
}

function display_images_from_media_library() {

    $imgs = get_images_from_media_library();
    
    $html = '<div id="media-gallery" class="card-deck mt-4">';
    foreach($imgs as $img) {    
        $html .= '<div class="card border-0 shadow"><img class="card-img" src="' . $img . '" alt="" /></div>';
    }
    $html .= '</div>';
    
    

    return $html;
}

?>