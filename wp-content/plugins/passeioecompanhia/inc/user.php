<?php
/**
 * CONFIGURAÇÔES DE USUÁRIOS
 * Configuração de novas funcionalidades para usuários
 * 
 * 
 * 
 */



/**
 * ==================================================
 * CONTACT METHODS ==================================
 * ==================================================
 * Para informações simples, que necessitem apenas de um text field sem necessidade de manipulação(validação, filtragem, etc)
 * Caso seja preciso usar campos mais complexos, usar os campos extras 'show_extra_profile_fields()'
 */
add_filter( 'user_contactmethods', 'custom_contact_methods' );
function custom_contact_methods( $contactmethods ){
	// adicionar
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['twitter']  = 'Twitter';
	$contactmethods['hangouts'] = 'Hangouts';
	$contactmethods['linkedin'] = 'LinkedIn';
	
	// remover
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	return $contactmethods;
}

/**
 * Filtrar o output da descrição de user ao editar com tinymce
 * 
 */
add_filter( 'pre_user_description', 'user_description_presave', 20 );
//remove_filter( 'pre_user_description', 'wp_filter_kses');
function user_description_presave( $value ){
	return format_to_post( $value);
}
