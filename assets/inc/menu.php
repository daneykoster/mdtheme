<?php

// This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'mdtheme' ),
            'menu-2' => esc_html__( 'Mobile options', 'mdtheme' ),
        ) );


 
// The Top Menu
function top_nav() {
     wp_nav_menu(array(
        'container' => false,
        'theme_location' => 'menu-1', 
        'menu_class' => 'menu side-nav mobile-demo', 
        'menu_id' => 'mobile-nav-top',
        'items_wrap' => '<ul id="%1$s" class="right hide-on-med-and-down"><li></li>%3$s</ul>',
    ));
} 

// Side-nav mobile
function mobile_nav() {
     wp_nav_menu(array(
        'container' => false,
        'theme_location' => 'menu-1', 
        'menu_class' => 'menu',
        'menu_id' => 'mobile-nav',
        'items_wrap' => '%3$s',
    ));
} 

// Mobile options menu
function mobile_options_nav() {
     wp_nav_menu(array(
        'container' => false,
        'theme_location' => 'menu-2', 
        'menu_class' => 'dropdown-content', 
        'menu_id' => 'dropdown1',            
        'items_wrap' => '<ul id="%1$s" class="dropdown-content">%3$s</ul>',
    ));
} 

// Add active class to current menu item
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}