
jQuery(document).ready(function($){

	/**
	 * TABS
	 * 
	 * 
	 */
	$('.tab_box .tab_content:gt(0)').hide();
	$tabs = $('.tab_box .tabs a');
	$tabs.first().addClass('active');
	
	$tabs.click(function(){
		change_tab( $(this).attr('href') );
		return false;
	});
	
	$('.aba_proxima').click(function(){
		var next = $(this).parent().next().attr('id');
		if( next == undefined ){
			next = $( '.tab_content:first', $(this).closest('.tab_box') ).attr('id');
		}
		change_tab( '#'+next );
	});
	
	function change_tab( id ){
		$tabs.attr('class', ''); // Remover class 'active' de todas as abas
		$button = $(id + '_anchor');
		$button.addClass('active'); // Atribuir 'active' ao link clicado
		$('.tab_box .tab_content').hide();
		$(id).show(); // Mostrar conteúdo da aba requisitada
	}
});