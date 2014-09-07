<?php
/*
 * PLUGIN SETTINGS LINK
 * Link de opções na listagem de plugins
 * 
 */
add_filter( 'plugin_action_links_boros_base/boros_base.php', 'my_add_settings_link', 10, 2 );
function my_add_settings_link($links, $file){
	$settings_link = sprintf( '<a href="admin.php?page=%s">%s</a>', 'section_general', __('Settings') );
	array_unshift( $links, $settings_link );
	return $links;
}



/**
 * ==================================================
 * WORK CSS/JS ======================================
 * ==================================================
 * CSS e JS para o admin do trabalho.
 * NÃO ESQUECER A CONSTANTE DE CAMINHO!!!
 * 
 */
add_filter( 'admin_head', 'custom_admin_head' );
function custom_admin_head(){
	/**
	 * DatePicker
	 * No jquery-ui-classic.css foi modificado o active para o azul escuro de links do WordPress.
	 * 
	 * @link http://www.renegadetechconsulting.com/tutorials/jquery-datepicker-and-wordpress-i18n
	 * @link https://github.com/helenhousandi/wp-admin-jquery-ui
	 */
	global $wp_locale;
	wp_enqueue_script( 'jquery-ui-datepicker', array( 'jquery' ) );
	wp_enqueue_style( 'jquery-ui', PASSEIO_URL . '/css/jquery-ui-demo.css');
	wp_enqueue_style( 'jquery-ui-classic', PASSEIO_URL . '/css/jquery-ui-classic.css');
	$locale_arrays = array(
		'month',
		'month_abbrev',
		'weekday',
		'weekday_abbrev',
		'weekday_initial',
	);
	$locale_strings = array();
	foreach( $locale_arrays as $a ){
		$result = array();
		foreach( $wp_locale->$a as $strs ) {
			$result[] =  $strs;
		}
		$locale_strings[$a] = $result;
	}
	$aryArgs = array(
		'closeText'         => 'Fechar',
		'currentText'       => 'Hoje',
		'monthNames'        => $locale_strings['month'],
		'monthNamesShort'   => $locale_strings['month_abbrev'],
		'monthStatus'       => 'Mostrar um mês diferente',
		'dayNames'          => $locale_strings['weekday'],
		'dayNamesShort'     => $locale_strings['weekday_abbrev'],
		'dayNamesMin'       => $locale_strings['weekday_initial'],
		'firstDay'          => get_option( 'start_of_week' ),
	);
	wp_localize_script( 'jquery-ui-datepicker', 'datepickerL10n', $aryArgs );
	
	wp_enqueue_script( 'custom_admin_scripts', PASSEIO_URL . 'js/work.js', array('jquery') );
	wp_enqueue_style( 'custom_admin_styles', PASSEIO_URL . 'css/work.css' );
}