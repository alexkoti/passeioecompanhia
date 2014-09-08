<?php
/**
 * CONFIGURAÇÔES DE ADMIN: TINYMCE
 * Configurações para o editor de texto padrão de postagem (the_content). Não é válido para os outros tinymces
 * 
 * 
 * 
 */



/* ========================================================================== */
/* EDITOR DE TEXTO TINYMCE ================================================== */
/* ========================================================================== */
/**
 * Adiciona estilos css ao editor de texto do admin
 * O css adicionado é baseado no WYMeditor, com auxílos visuais presentes apenas na tela de postagem.
 */
add_filter( 'mce_css', 'edit_mce_css' );
function edit_mce_css($mce_css){
	$mce_css = get_bloginfo('template_url') . '/css/site.css, ' . $mce_css;
	return $mce_css;
}

add_filter( 'tiny_mce_before_init', 'set_the_editor_class' );
function set_the_editor_class( $init ){
	global $post;
	if( isset($post->post_type) )
		$init['body_class'] = "hentry hentry-{$post->post_type}";
	else
		$init['body_class'] = "hentry hentry-undefined";
	return $init;
}

/**
 * Configurar editor principal
 */
add_filter( 'mce_buttons', 'custom_editor_buttons' );
function custom_editor_buttons( $buttons ){
	/**/
	$buttons = array(
		'bold', 
		'italic', 
		'link', 
		'unlink', 
		'separator', 
		'cleanup', 
		'undo', 
		'redo', 
	);
	/**/
	//array_insert( $buttons, array( 'separator', 'code', 'charmap', 'separator' ), count($buttons) - 1 );
	return $buttons;
}