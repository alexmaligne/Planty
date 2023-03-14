<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) {
    if (is_user_logged_in() && $args->menu == 5) {
        $items .= '<li><a href="'. get_permalink( get_option('http://localhost:81/Planty/wp-admin/users.php') ) .'">ADMIN</a></li>';
    }
    elseif (!is_user_logged_in() && $args->menu == 5) {
        $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Sign in  /  Register</a></li>';
    }
    return $items;
}

/*add_shortcode('bbwp_get_session', 'bbwp_get_session'); 

add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) {
	if (is_user_logged_in() && $args->menu === 'ast-hf-menu-1') {
		$items .= '<li class="wt_menu_item_user_avatar"><a href="http://localhost:81/Planty/wp-admin/users.php">' . get_avatar( $current_user->ID, 32 ) .'ADMIN</a></li>';
	}
	return $items;
}*/
?>