<?php
/**
 * CONFIGURAÇÔES DE ADMIN: TINYMCE
 * Configurações para o editor de texto padrão de postagem (the_content). Não é válido para os outros tinymces
 * 
 * 
 * 
 */

/* ========================================================================== */
/* ADD ACTIONS/FILTERS ====================================================== */
/* ========================================================================== */
//FIXOS
add_filter( 'mce_css', 'edit_mce_css' );
add_filter( 'tiny_mce_before_init', 'set_the_editor_class' );


/* ========================================================================== */
/* EDITOR DE TEXTO TINYMCE ================================================== */
/* ========================================================================== */
/**
 * Adiciona estilos css ao editor de texto do admin
 * O css adicionado é baseado no WYMeditor, com auxílos visuais presentes apenas na tela de postagem.
 */
function edit_mce_css($mce_css){
	$mce_css = get_bloginfo('template_url') . '/css/site.css, ' . $mce_css;
	return $mce_css;
}
function set_the_editor_class( $init ){
	global $post;
	if( isset($post->post_type) )
		$init['body_class'] = "hentry hentry-{$post->post_type}";
	else
		$init['body_class'] = "hentry hentry-undefined";
	return $init;
}

/**
 * ==================================================
 * INSERIR SCRIPTS APÓS OS PLUGINS DE TINYMCE =======
 * ==================================================
 * 
 */
// add_filter("mce_external_plugins", "add_myplugin_tinymce_plugin");
function add_myplugin_tinymce_plugin($plugin_array) {
   $plugin_array['dummy'] = FUNCTIONS . '/js/dummy.js");';
   return $plugin_array;
}