<?php
/**
 * ==================================================
 * META BOXES CONFIGURAÇÂO ==========================
 * ==================================================
 * 
 */
add_action( 'admin_init', 'my_meta_boxes' );
function my_meta_boxes(){
	$meta_boxes = array();
	$meta_boxes[] = array(
		'id' => 'post_special_image_box', 
		'title' => 'Foto', 
		'post_type' => array('post', 'cliente', 'pet'), 
		'context' => 'side', 
		'priority' => 'default',
		'help' => 'Você poderá enviar uma nova imagem ou escolher entre as imagens deste post ou uma da biblioteca.',
		'itens' => array(
			array(
				'name' => '_thumbnail_id',
				'type' => 'special_image',
				'layout' => 'block',
				'options' => array(
					'layout' => 'compact',
					'width' => false,
				),
			),
		)
	);
	/**
	$meta_boxes[] = array(
		'id' => 'video_box', 
		'title' => 'Vídeo do post', 
		'post_type' => array('post'), 
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'video_url',
				'type' => 'text',
				'size' => 'full',
				'label' => 'Endereço do vídeo',
				'label_helper' => 'Vídeos privados não poderão ser exibidos',
				'input_helper' => '<br />Serviços suportados: YouTube, Vimeo, DailyMotion, blip.tv, Flickr(fotos e vídeo), Viddler, Hulu, Qik, Revision3, Scribd, Photobucket, PollDaddy',
			),
		)
	);
	/**/
	
	/**
	 * CLIENTES
	 * 
	 */
	$meta_boxes[] = array(
		'id' => 'donos_box', 
		'title' => 'Donos', 
		'post_type' => array('cliente'), 
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'donos',
				'type' => 'duplicate_group',
				'label' => '',
				'layout' => 'block',
				'options' => array(
					'compact_button' => false,
				),
				'group_itens' => array(
					array(
						'name' => 'nome',
						'type' => 'text',
						'size' => 'medium',
						'label' => 'Nome',
					),
					array(
						'name' => 'email',
						'type' => 'text',
						'size' => 'medium',
						'label' => 'Email',
					),
					array(
						'name' => 'instagram',
						'type' => 'text',
						'size' => 'medium',
						'label' => 'Usuário Instagram',
					),
					array(
						'name' => 'facebook',
						'type' => 'text',
						'size' => 'medium',
						'label' => 'Facebook',
					),
				)
			),
		)
	);
	$meta_boxes[] = array(
		'id' => 'noticias_box', 
		'title' => 'Relatórios de visitas', 
		'post_type' => array('cliente'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'hashtag',
				'type' => 'text',
				'size' => 'full',
				'label' => 'Hashtag',
			),
			array(
				'name' => 'noticias',
				'type' => 'checkbox_group',
				'label' => 'Como desejam receber notícias das visitas?',
				'options' => array(
					'values' => array(
						'email_sempre' => 'Receber e-mail com fotos a cada visita',
						'email_periodo' => 'Receber e-mail de tempos em tempos para saber se está tudo bem',
						'relatorio_site' => 'Ver relatório de visita com fotos no site',
						'permite_publicar' => 'Permito publicar foto no Instagram e Facebook da Passeio e Companhia',
						'whatsapp' => 'Receber notícia por WhatsApp a cada visita',
					),
				),
			),
		)
	);
	$meta_boxes[] = array(
		'id' => 'contato_emergencias_box', 
		'title' => 'Contato na cidade (para emergências)', 
		'post_type' => array('cliente'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'contato_emergencia_nome',
				'type' => 'text',
				'size' => 'medium',
				'label' => 'Nome',
			),
			array(
				'name' => 'contato_emergencia_telefone',
				'type' => 'text',
				'size' => 'small',
				'label' => 'Telefone',
			),
			array(
				'name' => 'contato_emergencia_parentesco',
				'type' => 'text',
				'size' => 'small',
				'label' => 'Parentesco (tipo de contato)',
			),
			array(
				'name' => 'clinicas',
				'type' => 'duplicate_group',
				'label' => 'Clínicas ou veterinários para entrar em contato em caso de emergência:',
				//'layout' => 'block',
				'options' => array(
					'compact_button' => false,
				),
				'group_itens' => array(
					array(
						'name' => 'local',
						'type' => 'text',
						'size' => 'full',
						'label' => 'Local',
					),
					array(
						'name' => 'endereco',
						'type' => 'text',
						'size' => 'full',
						'label' => 'Endereço',
					),
					array(
						'name' => 'telefone',
						'type' => 'text',
						'size' => 'small',
						'label' => 'Telefone',
					),
					array(
						'name' => 'veterinario',
						'type' => 'text',
						'size' => 'medium',
						'label' => 'Veterinário',
					),
					array(
						'name' => '24horas',
						'type' => 'radio',
						'label' => '24 horas?',
						'options' => array(
							'separator' => ' ',
							'values' => array(
								'sim' => 'Sim',
								'nao' => 'Não',
							),
						),
					),
				)
			),
		),
	);
	$meta_boxes[] = array(
		'id' => 'residenacia_box', 
		'title' => 'Sobre a residência', 
		'post_type' => array('cliente'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'endereco',
				'type' => 'text',
				'size' => 'full',
				'label' => 'Endereço',
			),
			array(
				'name' => 'bairro',
				'type' => 'text',
				'size' => 'small',
				'label' => 'Bairro',
			),
			array(
				'name' => 'cep',
				'type' => 'text',
				'size' => 'small',
				'label' => 'CEP',
			),
			array(
				'name' => 'telefone',
				'type' => 'text',
				'size' => 'small',
				'label' => 'Telefone',
			),
			array(
				'name' => 'map',
				'type' => 'text',
				'size' => 'large',
				'label' => 'Link do google maps',
				'input_helper' => '',
			),
			array(
				'name' => 'chaves',
				'type' => 'select',
				'label' => 'Como prefere lidar com as chaves',
				'options' => array(
					'values' => array(
						'' => 'Escolha',
						'portaria_cada_visita' => 'Chaves na portaria ao entrar e sair em cada visita',
						'portaria_primeira_devolver_ultima' => 'Pegar na portaria na primeira visita e deixar na última',
						'sem_porteiro_combinar' => 'Prédio sem porteiro, combinar com a pet sitter',
					),
					'other_field' => array(
						'attr' => array(
							'placeholder' => 'Outro',
							'class' => 'iptw_full',
						),
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id' => 'limpeza_box', 
		'title' => 'Limpeza', 
		'post_type' => array('cliente'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'limpeza_materiais',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Quais materiais de limpeza podem ser usados para limpar a casa e onde eles ficam?',
				'label_helper' => 'Jornais, sacolinhas plásticas, panos, etc',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'limpeza_local_lixo_descartar',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Onde o lixo pode ser descartado? Tem horário específico?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'limpeza_local_areia_gatos',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Onde fica a areia higiência para reposição?',
				'label_helper' => 'Apenas para gatos',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'limpeza_local_limpeza_caixas',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Como prefere que seja a limpeza das caixinhas?',
				'label_helper' => 'Apenas catar as cacas, trocar completamente, raspar o fundo, etc',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id' => 'alimentacao_box', 
		'title' => 'Alimentação', 
		'post_type' => array('cliente'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'alimentacao_local_comedouros',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Onde ficam os comedouros dos bichinhos?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'alimentacao_local_estoque_racao',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Onde ficam os estoques de ração?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'alimentacao_local_racao_quantidade',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Qual é a quantidade de ração por dia para cada bichinho (ou todos)?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'alimentacao_local_racao_agua',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Usar água filtrada ou normal?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id' => 'geral_box', 
		'title' => 'Recomendações gerais', 
		'post_type' => array('cliente'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'geral_obs',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Tem alguma observação a fazer sobre a casa?',
				'label_helper' => 'Fechar registro ao sair, manter determinadas portas fechadas, deixar alguma luz acesa, molhar as plantas etc',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'geral_fechaduras',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Alguma recomendação para usar as fechaduras?',
				'label_helper' => 'Tipo não dar duas voltas, forçar um pouquinho para cima e empurrar, usar a chave ao contrário etc',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
		),
	);
	
	/**
	 * PETS
	 * 
	 */
	$meta_boxes[] = array(
		'id' => 'info_box', 
		'title' => 'Informações', 
		'post_type' => array('pet'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			/**
			array(
				'name' => 'nome',
				'type' => 'text',
				'size' => 'medium',
				'label' => 'Nome',
			),
			/**/
			array(
				'name' => 'animal',
				'type' => 'select',
				'label' => 'Animal',
				'options' => array(
					'values' => array(
						'gato' => 'Gato',
						'cachorro' => 'Cachorro',
						'outro' => 'Outro',
					),
					'other_field' => array(
						'attr' => array(
							'placeholder' => 'Outro',
							'class' => 'iptw_small',
						),
					),
				),
			),
			array(
				'name' => 'raca',
				'type' => 'text',
				'size' => 'small',
				'label' => 'Raça',
			),
			array(
				'name' => 'idade',
				'type' => 'text',
				'size' => 'tiny',
				'label' => 'Idade',
			),
			array(
				'name' => 'sexo',
				'type' => 'radio',
				'std' => 'macho',
				'label' => 'Sexo',
				'options' => array(
					'separator' => ' ',
					'values' => array(
						'macho' => 'Macho',
						'femea' => 'Fêmea',
					),
				),
			),
			array(
				'name' => 'castrado',
				'type' => 'radio',
				'std' => 'nao',
				'label' => 'Castrado',
				'options' => array(
					'separator' => ' ',
					'values' => array(
						'sim' => 'Sim',
						'nao' => 'Não',
					),
				),
			),
		)
	);
	$meta_boxes[] = array(
		'id' => 'comportamento_box', 
		'title' => 'Comportamento', 
		'post_type' => array('pet'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'temperamento',
				'type' => 'radio',
				'label' => 'Temperamento',
				'options' => array(
					'values' => array(
						'docil' => 'Dócil - Gosta de carinho e não tem histórico de agressão',
						'timido' => 'Tímido - Não é agressivo, mas prefere evitar contato',
						'antissocial' => 'Antissocial - Pode ser agressivo em algumas situações',
					),
				),
			),
			array(
				'name' => 'durante_passeio',
				'type' => 'checkbox_group',
				'label' => 'Durante o passeio... (para cães)',
				'options' => array(
					'values' => array(
						'evitar_criancas' => 'Evitar contato com crianças',
						'evitar_pessoas' => 'Evitar contato com qualquer pessoa',
						'evitar_animais' => 'Evitar contato com outros animais',
					),
				),
			),
			array(
				'name' => 'intolerancia',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Tem alguma coisa que ele não tolera e a pet sitter deve evitar fazer?',
				'label_helper' => 'Tipo fazer carinho na barriga, tocar no rabo, pegar no colo, etc',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'obs',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Observações',
			),
		)
	);
	$meta_boxes[] = array(
		'id' => 'saude_box', 
		'title' => 'Saúde', 
		'post_type' => array('pet'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'doenca_cronica',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Tem alguma doença crônica?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'problema_durante_visita',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Estará com algum problema de saúde durante a visita?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'medicacao',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Toma alguma medicação?',
				'attr' => array(
					'class' => 'ipth_tiny',
				),
			),
			array(
				'name' => 'medicacao_procedimento',
				'type' => 'textarea',
				'size' => 'full',
				'label' => 'Em caso afirmativo, como a pet sitter deve proceder?',
				'label_helper' => 'Use esse espaço para explicar se tem algum procedimento para dar remédio, ajudar a fazer xixi, limpar curativos, etc',
			),
			array(
				'name' => 'vacinas',
				'type' => 'radio',
				'label' => 'Vacinas em dia?',
				'options' => array(
					'separator' => ' ',
					'values' => array(
						'sim' => 'Sim',
						'nao' => 'Não',
					),
				),
			),
		)
	);
	
	/**
	 * VISITA
	 * 
	 */
	$meta_boxes[] = array(
		'id' => 'visita_box', 
		'title' => 'Informações', 
		'post_type' => array('visita'), 
		'desc' => '',
		'context' => 'normal', 
		'priority' => 'default',
		'itens' => array(
			array(
				'name' => 'data',
				'type' => 'text',
				'size' => 'small',
				'label' => 'Data',
				'attr' => array(
					'class' => 'datepicker_input',
				),
			),
			array(
				'name' => 'pet_sitte',
				'type' => 'radio',
				'label' => 'Pet-sitter',
				'options' => array(
					
					'values' => array(
						'gabriela' => 'Gabriela',
						'cristiana' => 'Cristiana',
					),
				),
			),
		)
	);
	$my_meta_boxes = new BorosMetaBoxes( $meta_boxes );
}
add_filter( 'BFE_map_input_helper', 'passeio_maps', 10, 3 );
function passeio_maps( $input_helper, $data_value, $context ){
	//pre($input_helper, '$input_helper');
	//pre($data_value, '$data_value');
	//pre($context, '$context');
	if( !empty($data_value) ){
		return " <a href='{$data_value}' target='_blank'>ver mapa</a>";
	}
	return $input_helper;
}

/* ========================================================================== */
/* REMOVER META BOXES ======================================================= */
/* ========================================================================== */
/**
 * Remover meta_boxes das telas de edição. As custom taxonomies são removidas nessa função em vez da declaração 'show_ui' => false',
 * pois assim é exibida as páginas de controle das taxonomias no menu principal, mas removendo os controles de histórias 
 * das páginas de edição.
 * 
 * Padrão de nomenclatura:
 * Hierachical Taxonomy:		"{$tax-name}div"
 * Non-Hierachical Taxonomy:	"tagsdiv-{$tax-name}"
 */
add_action('do_meta_boxes', 'remove_custom_meta_boxes', 10, 3);
function remove_custom_meta_boxes( $post_type, $context, $post ){
	global $wp_meta_boxes, $post;
	//pre($wp_meta_boxes);
	
	$removes = array(
		'post' => array(
			'postimagediv',
			'categorydiv',
		),
		'cliente' => array(
			'postimagediv',
		),
		'pet' => array(
			'postimagediv',
		),
	);
	
	if( isset($removes[$post_type]) ){
		foreach( $removes[$post_type] as $box ){
			remove_meta_box( $box, $post_type, $context );
		}
	}
}

