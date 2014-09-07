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
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'functions', get_stylesheet_directory_uri() . '/js/functions.js', 'jquery', '1', true );
}

