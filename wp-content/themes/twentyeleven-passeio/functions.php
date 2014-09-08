<?php

function passeio_meta_or( $metas, $key, $holder ){
	if( isset($metas[$key]) ){
		if( is_array($metas[$key]) ){
			printf($holder, $metas[$key][0]);
		}
		else{
			printf($holder, trim($metas[$key]));
		}
	}
}

// JAVASCRIPTS - todos os scripts serão adicionados ao wp_footer() por padrão;
add_action( 'wp_enqueue_scripts', 'add_frontend_scripts' );
function add_frontend_scripts(){
	wp_enqueue_style( 'photoswipe', get_stylesheet_directory_uri() . '/css/photoswipe.css', false, false, 'all' );
	
	//wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-theme', get_stylesheet_directory_uri() . '/js/jquery-1.9.1.min.js', false, false, true );
	wp_enqueue_script( 'klass', get_stylesheet_directory_uri() . '/js/klass.min.js', 'jquery-theme', '1', true );
	wp_enqueue_script( 'photoswipe', get_stylesheet_directory_uri() . '/js/code.photoswipe-3.0.5.min.js', 'jquery-theme', '1', true );
	wp_enqueue_script( 'functions', get_stylesheet_directory_uri() . '/js/functions.js', 'jquery-theme', '1', true );
}

