<?php
function enmarcar($controlador,$rutaVista,$datos=[]) {
	$controlador->load->view('templates/head');
	$controlador->load->view('templates/header');

	$controlador->load->model('menu_model','',true);
	$datos['menu']=$controlador->menu_model->leerTodos();
	$controlador->load->view('templates/nav',$datos);
	
	$controlador->load->view($rutaVista,$datos);
	$controlador->load->view('templates/footer');
	$controlador->load->view('templates/end');
}
?>