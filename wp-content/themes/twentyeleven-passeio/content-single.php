<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php edit_post_link( 'Editar', '<span class="edit-link">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		/**
		 * Dados do cliente
		 * 
		 */
		// donos
		$metas = get_post_custom($post->ID);
		echo '<h1>Cliente</h1>';
		echo '<div class="info_block">';
		echo '<h2>Donos</h2>';
		if( isset($metas['_thumbnail_id'][0]) ){
			$src = wp_get_attachment_image_src($metas['_thumbnail_id'][0], 'thumbnail');
			echo "<img src='{$src[0]}' class='thumbnail' alt='' />";
		}
		echo '<dl class="info_list">';
		foreach( maybe_unserialize($metas['donos'][0]) as $dono ){
			echo "<dt>{$dono['nome']}</dt>";
			echo "<dd><a href='mailto:{$dono['email']}'>{$dono['email']}</a></dd>";
			passeio_meta_or($dono, 'email', '<dd><a href="mailto:%1$s" target="_blank">%1$s</a></dd>');
			passeio_meta_or($dono, 'instagram', '<dd>Instagram: %s</dd>');
			passeio_meta_or($dono, 'facebook', '<dd><a href="%s" target="_blank">Facebook</a></dd>');
		}
		echo '</dl>';
		echo '</div>';
		
		// relatório de visittas
		$noticias = array(
			'email_sempre' => 'Receber e-mail com fotos a cada visita',
			'email_periodo' => 'Receber e-mail de tempos em tempos para saber se está tudo bem',
			'relatorio_site' => 'Ver relatório de visita com fotos no site',
			'permite_publicar' => 'Permito publicar foto no Instagram e Facebook da Passeio e Companhia',
			'whatsapp' => 'Receber notícia por WhatsApp a cada visita',
		);
		echo '<div class="info_block">';
		echo '<h2>Relatório de visitas</h2>';
		echo '<dl class="info_list">';
		passeio_meta_or($metas, 'hashtag', '<dd>Hashtag: %s</dd>');
		echo '<dt>Como desejam receber notícias das visitas?</dt>';
		if( isset($metas['noticias']) ){
			foreach( maybe_unserialize($metas['noticias'][0]) as $metodo ){
				echo "<dd>&#10003; {$noticias[$metodo]}</dd>";
			}
		}
		echo '</dl>';
		echo '</div>';
		
		// contato na cidade
		echo '<div class="info_block">';
		echo '<h2>Contato na cidade (para emergências)</h2>';
		echo '<dl class="info_list">';
		echo '<dt>Contato</dt>';
		passeio_meta_or($metas, 'contato_emergencia_nome', '<dd>Nome: %s</dd>');
		passeio_meta_or($metas, 'contato_emergencia_telefone', '<dd>Telefone: %s</dd>');
		passeio_meta_or($metas, 'contato_emergencia_parentesco', '<dd>Parentesco: %s</dd>');
		echo '<dt>Clínicas ou veterinários para entrar em contato em caso de emergência:</dt>';
		foreach( maybe_unserialize($metas['clinicas'][0]) as $clinica ){
			echo "<dd>&#10003; <strong>{$clinica['local']}</strong>";
			echo "<br />Endereço: {$clinica['endereco']}";
			echo "<br />Telefone: {$clinica['telefone']}";
			echo "<br />Veterinário: {$clinica['veterinario']}<br />";
			echo (isset($clinica['24horas']) and ($clinica['24horas'] == true)) ? '24 horas? Sim' : '24 horas? Não';
			echo '</dd>';
		}
		echo '</dl>';
		echo '</div>';
		
		// sobre a residência
		$chaves = array(
			'portaria_cada_visita' => 'Chaves na portaria ao entrar e sair em cada visita',
			'portaria_primeira_devolver_ultima' => 'Pegar na portaria na primeira visita e deixar na última',
			'sem_porteiro_combinar' => 'Prédio sem porteiro, combinar com a pet sitter',
		);
		echo '<div class="info_block">';
		echo '<h2>Sobre a residência</h2>';
		echo '<dl class="info_list">';
		passeio_meta_or($metas, 'endereco', '<dd>Endereço: %s</dd>');
		passeio_meta_or($metas, 'bairro', '<dd>Bairro: %s</dd>');
		passeio_meta_or($metas, 'cep', '<dd>CEP: %s</dd>');
		passeio_meta_or($metas, 'telefone', '<dd>Telefone: %s</dd>');
		passeio_meta_or($metas, 'map', '<dd><a href="%s" target="_blank">Ver mapa</a></dd>');
		echo '<dt>Como prefere lidar com as chaves?</dt>';
		foreach( maybe_unserialize($metas['chaves'][0]) as $metodo ){
			if( !empty($chaves[$metodo]) ){
				echo "<dd>&#10003; {$chaves[$metodo]}</dd>";
			}
			elseif( !empty($metodo) ){
				echo "<dd>&#10003; {$metodo}</dd>";
			}
		}
		echo '</dl>';
		echo '</div>';
		
		// limpeza
		echo '<div class="info_block">';
		echo '<h2>Limpeza</h2>';
		echo '<dl class="info_list">';
		passeio_meta_or($metas, 'limpeza_materiais', '<dt>Quais materiais de limpeza podem ser usados para limpar a casa e onde eles ficam? <br /><small>Jornais, sacolinhas plásticas, panos, etc</small></dt><dd>%s</dd>');
		passeio_meta_or($metas, 'limpeza_local_lixo_descartar', '<dt>Onde o lixo pode ser descartado? Tem horário específico?</dt><dd>%s</dd>');
		passeio_meta_or($metas, 'limpeza_local_areia_gatos', '<dt>Onde fica a areia higiência para reposição? <br /><small>Apenas para gatos</small></dt><dd>%s</dd>');
		passeio_meta_or($metas, 'limpeza_local_limpeza_caixas', '<dt>Como prefere que seja a limpeza das caixinhas? <br /><small>Apenas catar as cacas, trocar completamente, raspar o fundo, etc</small></dt><dd>%s</dd>');
		echo '</dl>';
		echo '</div>';
		
		// alimentação
		echo '<div class="info_block">';
		echo '<h2>Alimentação</h2>';
		echo '<dl class="info_list">';
		passeio_meta_or($metas, 'alimentacao_local_comedouros', '<dt>Onde ficam os comedouros dos bichinhos?</dt><dd>%s</dd>');
		passeio_meta_or($metas, 'alimentacao_local_estoque_racao', '<dt>Onde ficam os estoques de ração?</dt><dd>%s</dd>');
		passeio_meta_or($metas, 'alimentacao_local_racao_quantidade', '<dt>Qual é a quantidade de ração por dia para cada bichinho (ou todos)?</dt><dd>%s</dd>');
		passeio_meta_or($metas, 'alimentacao_local_racao_agua', '<dt>Usar água filtrada ou normal?</dt><dd>%s</dd>');
		echo '</dl>';
		echo '</div>';
		
		// alimentação
		echo '<div class="info_block">';
		echo '<h2>Recomendações gerais</h2>';
		echo '<dl class="info_list">';
		passeio_meta_or($metas, 'geral_obs', '<dt>Tem alguma observação a fazer sobre a casa?<br /><small>Fechar registro ao sair, manter determinadas portas fechadas, deixar alguma luz acesa, molhar as plantas etc</small></dt><dd>%s</dd>');
		passeio_meta_or($metas, 'geral_fechaduras', '<dt>Alguma recomendação para usar as fechaduras? <br /><small>Tipo não dar duas voltas, forçar um pouquinho para cima e empurrar, usar a chave ao contrário etc</small></dt><dd>%s</dd>');
		echo '</dl>';
		echo '</div>';
		?>
		
		<?php
		$temperamento = array(
			'docil' => 'Dócil - Gosta de carinho e não tem histórico de agressão',
			'timido' => 'Tímido - Não é agressivo, mas prefere evitar contato',
			'antissocial' => 'Antissocial - Pode ser agressivo em algumas situações',
		);
		$passeio = array(
			'evitar_criancas' => 'Evitar contato com crianças',
			'evitar_pessoas' => 'Evitar contato com qualquer pessoa',
			'evitar_animais' => 'Evitar contato com outros animais',
		);
		echo '<h1>Pets</h1>';
		foreach( $post->pets as $post ){
			setup_postdata( $post );
			$pet_metas = get_post_custom($post->ID);
			//pre($pet_metas);
			echo '<div class="info_block">';
			echo "<h2>{$post->post_title}</h2>";
			if( isset($pet_metas['_thumbnail_id'][0]) ){
				$src = wp_get_attachment_image_src($pet_metas['_thumbnail_id'][0], 'thumbnail');
				echo "<img src='{$src[0]}' class='thumbnail' alt='' />";
			}
			echo '<dl class="info_list">';
			echo "<dt>Informações</dt>";
			$animal = maybe_unserialize($pet_metas['animal'][0]);
			echo !empty($animal[1]) ? "<dd>Animal: {$animal[1]}</dd>" : "<dd>Animal: {$animal[0]}</dd>";
			passeio_meta_or( $pet_metas, 'raca', '<dd>Raça: %s</dd>' );
			passeio_meta_or( $pet_metas, 'idade', '<dd>Idade: %s</dd>' );
			echo ($pet_metas['sexo'][0] == 'macho') ? '<dd>Sexo: macho</dd>' : '<dd>Sexo: fêmea</dd>';
			echo ($pet_metas['castrado'][0] == 'sim') ? '<dd>Castrado: Sim</dd>' : '<dd>Sexo: Não</dd>';
			if( isset($pet_metas['temperamento'][0]) ){
				echo "<dt>Temperamento</dt><dd>&#10003; {$temperamento[$pet_metas['temperamento'][0]]}</dd>";
			}
			if( isset($pet_metas['durante_passeio'][0]) ){
				echo '<dt>Durante o passeio.. (para cães)</dt>';
				foreach( maybe_unserialize($pet_metas['durante_passeio'][0]) as $metodo ){
					echo "<dd>&#10003; {$passeio[$metodo]}</dd>";
				}
			}
			passeio_meta_or( $pet_metas, 'intolerancia', '<dt>Tem alguma coisa que ele não tolera e a pet sitter deve evitar fazer? <br /><small>Tipo fazer carinho na barriga, tocar no rabo, pegar no colo, etc</small></dt><dd>%s</dd>' );
			passeio_meta_or( $pet_metas, 'obs', '<dt>Observações</dt><dd>%s</dd>' );
			
			passeio_meta_or( $pet_metas, 'doenca_cronica', '<dt>Tem alguma doença crônica?</dt><dd>%s</dd>' );
			passeio_meta_or( $pet_metas, 'problema_durante_visita', '<dt>Estará com algum problema de saúde durante a visita?</dt><dd>%s</dd>' );
			passeio_meta_or( $pet_metas, 'medicacao', '<dt>Toma alguma medicação?</dt><dd>%s</dd>' );
			passeio_meta_or( $pet_metas, 'medicacao_procedimento', '<dt>Em caso afirmativo, como a pet sitter deve proceder? <br /><small>Use esse espaço para explicar se tem algum procedimento para dar remédio, ajudar a fazer xixi, limpar curativos, etc</small></dt><dd>%s</dd>' );
			echo ($pet_metas['vacinas'][0] == 'sim') ? '<dt>Vacinas em dia?</dt><dd>Sim</dd>' : '<dt>Vacinas em dia?</dt><dd>Não</dd>';
			echo '</dl>';
			echo '</div>';
		}
		wp_reset_postdata(); 
		?>
		
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
