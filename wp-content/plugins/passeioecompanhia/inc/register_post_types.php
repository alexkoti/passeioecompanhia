<?php
/**
 * REGISTER POST TYPES
 * Configurações para adicionar custom post_types. Este arquivo trabalha em conjunto com o 'register_taxonomies.php'
 * 
 */

/**
 * ==================================================
 * ADICIONAR SUPORTE Á POST FORMATS =================
 * ==================================================
 * Isso irá permitir o tema usar post_formats para os 'posts' padrão do wordpress. Caso sej apreciso adicionar esse recurso a outros post_types, usar add_post_type_support()
 * Se for preciso adicionar post_formats a um post_type e ao mesmo tempo não dar suporte aos posts comnuns, é preciso primeiro habilitar os post_formats ao tema, usando
 * add_theme_support(), adicionar o suporte ao post_type desejado e só então desabilitar os formats para posts, com remove_post_type_support().
 */
//add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
//add_post_type_support( 'page', 'post-formats' );
//remove_post_type_support( 'post', 'post-formats' );

/**
 * ==================================================
 * REGISTER POST TYPES ==============================
 * ==================================================
 * 
 * 
 */
add_action( 'init', 'register_post_types' );
function register_post_types(){
	
	/**
	 * CLIENTES
	 * 
	 */
	$labels = array(
		'name' => 'Clientes',
		'singular_name' => 'Cliente',
		'menu_name' => 'Clientes',
		'add_new' => 'Novo Cliente',
		'add_new_item' => 'Adicionar Cliente',
		'edit_item' => 'Editar Cliente',
		'new_item' => 'Novo Cliente',
		'view_item' => 'Ver Cliente',
		'search_items' => 'Buscar Cliente',
		'not_found' =>  'Nenhum encontrado',
		'not_found_in_trash' => 'Nenhum encontrado na lixeira',
		'parent_item_colon' => '',
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Clientes',
		'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'capabilities' => array( 
			'edit_post' => 'edit_theme_options', 
			'read_post' => 'edit_theme_options', 
			'delete_post' => 'edit_theme_options', 
			'edit_posts' => 'edit_theme_options', 
			'edit_others_posts' => 'edit_theme_options' ,
			'publish_posts' => 'edit_theme_options' ,
			'read_private_posts' => 'edit_theme_options',
		), 
		'hierarchical' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-groups',
		//'show_in_menu' => 'edit.php?post_type=artigo',
		'supports' => array(
			'title',
		)
	); 
	register_post_type( 'cliente' , $args );
	$columns_config = array(
		'post_type' => 'cliente',
		'columns' => array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Nome',
			'date' => 'Data',
		)
	);
	new BorosPostTypeColumns( $columns_config );
	
	/**
	 * PETS
	 * 
	 */
	$labels = array(
		'name' => 'Pets',
		'singular_name' => 'Pet',
		'menu_name' => 'Pets',
		'add_new' => 'Novo Pet',
		'add_new_item' => 'Adicionar Pet',
		'edit_item' => 'Editar Pet',
		'new_item' => 'Novo Pet',
		'view_item' => 'Ver Pet',
		'search_items' => 'Buscar Pet',
		'not_found' =>  'Nenhum encontrado',
		'not_found_in_trash' => 'Nenhum encontrado na lixeira',
		'parent_item_colon' => '',
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Pets',
		'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'capabilities' => array( 
			'edit_post' => 'edit_theme_options', 
			'read_post' => 'edit_theme_options', 
			'delete_post' => 'edit_theme_options', 
			'edit_posts' => 'edit_theme_options', 
			'edit_others_posts' => 'edit_theme_options' ,
			'publish_posts' => 'edit_theme_options' ,
			'read_private_posts' => 'edit_theme_options',
		), 
		'hierarchical' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-nametag',
		//'show_in_menu' => 'edit.php?post_type=artigo',
		'supports' => array(
			'title',
			'thumbnail',
		)
	); 
	register_post_type( 'pet' , $args );
	$columns_config = array(
		'post_type' => 'pet',
		'columns' => array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Nome',
			'date' => 'Data',
		)
	);
	new BorosPostTypeColumns( $columns_config );
	
	/**
	 * Visitas
	 * 
	 */
	$labels = array(
		'name' => 'Visitas',
		'singular_name' => 'Visita',
		'menu_name' => 'Visitas',
		'add_new' => 'Nova Visita',
		'add_new_item' => 'Adicionar Visita',
		'edit_item' => 'Editar Visita',
		'new_item' => 'Nova Visita',
		'view_item' => 'Ver Visita',
		'search_items' => 'Buscar Visita',
		'not_found' =>  'Nenhum encontrada',
		'not_found_in_trash' => 'Nenhum encontrada na lixeira',
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Visitas',
		'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'capabilities' => array( 
			'edit_post' => 'edit_theme_options', 
			'read_post' => 'edit_theme_options', 
			'delete_post' => 'edit_theme_options', 
			'edit_posts' => 'edit_theme_options', 
			'edit_others_posts' => 'edit_theme_options' ,
			'publish_posts' => 'edit_theme_options' ,
			'read_private_posts' => 'edit_theme_options',
		), 
		'hierarchical' => false,
		'has_archive' => false,
		'menu_icon' => 'dashicons-backup',
		//'show_in_menu' => 'edit.php?post_type=artigo',
		'supports' => array(
			'title',
			'editor',
			'comments',
		)
	); 
	register_post_type( 'visita' , $args );
	$columns_config = array(
		'post_type' => 'visita',
		'columns' => array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Título',
			'date' => 'Data',
		)
	);
	new BorosPostTypeColumns( $columns_config );
}

/**
 * COLUNAS DE 'POSTS' e 'PAGES'
 * Configuração das colunas de listagem dos post_types core.
 * 
 */
//add_filter('manage_posts_columns', 'control_posts_columns');
function control_posts_columns( $posts_columns ){
	$posts_columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => 'Título',
		'author' => 'Autor',
		'categories' => 'Categorias',
		'tags' => 'Tags',
		'thumb' => 'Imagem de destaque',
		'comments' => '<div class="vers"><img alt="Comentários" title="Comentários" src="' . get_bloginfo('wpurl') . '/wp-admin/images/comment-grey-bubble.png"></div>',
		'date' => 'Data',
	);
	return $posts_columns;
}
//add_filter('manage_pages_columns', 'control_pages_columns');
function control_pages_columns( $posts_columns ){
	$posts_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Título",
		"thumb" => "Imagem de destaque",
		"date" => 'Data',
		"order" => 'Ordem',
	);
	return $posts_columns;
}


