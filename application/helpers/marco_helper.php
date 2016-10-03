<?php

function enmarcar($controlador, $rutaVista, $datos = []) {
	$controlador->load->view ( 'templates/head' );
	
	if (session_status () == PHP_SESSION_NONE) {
		session_start ();
	}
	if (isset ( $_SESSION ['idUsuario'] )) {
		$datos ['header'] ['usuario'] ['nombre'] = $_SESSION ['nombreUsuario'];
		$datos ['header'] ['usuario'] ['apellido1'] = $_SESSION ['apellido1Usuario'];
	}
	if (isset ( $_SESSION ['idIes'] )) {
		$datos ['header'] ['ies'] ['nombre'] = $_SESSION ['nombreIes'];
	}
	
	$controlador->load->view ( 'templates/header', $datos );
	
	$controlador->load->model ( 'menu_model', '', true );
	$datos ['menu'] = $controlador->menu_model->leerTodos ();
	$controlador->load->view ( 'templates/nav', $datos );
	
	$controlador->load->view ( $rutaVista, $datos );
	$controlador->load->view ( 'templates/footer' );
	$controlador->load->view ( 'templates/end' );
}
?>