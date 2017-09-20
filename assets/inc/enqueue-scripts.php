<?php

// Enqueue scripts and styles.
 
function mdtheme_scripts() {
   
    wp_deregister_script( 'jquery' );
    
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', true );

    wp_enqueue_script( 'materialize-js', get_template_directory_uri() . '/vendor/materialize/js/materialize.min.js', array(), '', true );

    wp_enqueue_script( 'material-custom', get_template_directory_uri() . '/assets/js/material-custom-scripts.js', array(), '1.0', true ); 

    wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/css/mdtheme-main.css', array(), '', 'all' );


	wp_enqueue_script( 'mdtheme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mdtheme_scripts' );


// load css styles in footer if you don't like this you can copy this to mdtheme_scripts

function load_styles_in_footer() {

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,600', false ); 

    wp_enqueue_style( 'your-style-id', 'https://fonts.googleapis.com/icon?family=Material+Icons', false );
   
};
add_action( 'get_footer', 'load_styles_in_footer' );


