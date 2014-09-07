<?php
/**
 * AÇÔES EXTRAS ON SAVE
 * Gravar dados adicionais e actions extras
 * 
 * 
 * 
 */



add_action( 'save_post', 'excs_apply_custom_product_title', 20, 2 );
function excs_apply_custom_product_title( $post_id, $post ){
	if( $post->post_type == 'visita' ){
		$cliente = p2p_type( 'visitas_to_clientes' )->set_direction( 'to' )->get_related( $post );
		$date = get_post_meta($post_id, 'data', true);
		$d = mysql2date('d\/m\/Y', $date);
		$pet_sitter = get_post_meta($post_id, 'pet_sitter', true);
		$visita_title = "{$cliente->post->post_title} - {$d} - {$pet_sitter}";
		
		global $wpdb;
		$wpdb->update(
			$wpdb->posts,
			array(
				'post_title' => $visita_title,
				'post_name' => $post_id,
				'post_password' => $cliente->post->post_password,
			),
			array( 'ID' => $post_id )
		);
	}
	elseif( $post->post_type == 'cliente' ){
		$visitas = p2p_type( 'visitas_to_clientes' )->get_connected( $post );
		foreach( $visitas->posts as $v ){
			do_action( 'save_post', $v->ID, $v );
		}
	}
}