<?php
/**
 * ==================================================
 * POSTS 2 POSTS ====================================
 * ==================================================
 * Relacionamentos entre post-types
 * 
 * 
 */

add_action( 'p2p_init', 'custom_connection_types' );
function custom_connection_types() {
	
	p2p_register_connection_type(
		array(
			'name' => 'pets_to_clientes',
			'from' => 'pet',
			'to' => 'cliente',
			'cardinality' => 'many-to-one',
			'from_labels' => array(
				'singular_name' => 'Pets deste cliente',
				'search_items' => 'Buscar pets',
				'not_found' => 'Nenhuma encontrado',
				'create' => 'Conectar com um pet',
			),
			'to_labels' => array(
				'singular_name' => 'Dono deste pet',
				'search_items' => 'Buscar clientes',
				'not_found' => 'Nenhum encontrado',
				'create' => 'Conectar com um cliente',
			),
		)
	);
	
	p2p_register_connection_type(
		array(
			'name' => 'visitas_to_clientes',
			'from' => 'visita',
			'to' => 'cliente',
			'cardinality' => 'many-to-one',
			'from_labels' => array(
				'singular_name' => 'Visitas realizadas',
				'search_items' => 'Buscar visitas',
				'not_found' => 'Nenhuma encontrada',
				'create' => 'Conectar com uma visita',
			),
			'to_labels' => array(
				'singular_name' => 'Cliente desta visita',
				'search_items' => 'Buscar cliente',
				'not_found' => 'Nenhum encontrado',
				'create' => 'Conectar com um cliente',
			),
		)
	);
}



