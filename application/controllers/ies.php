<?php
class Ies extends CI_Controller {
	public function modificarCiclos() {
		if (session_status () == PHP_SESSION_NONE) {session_start ();}
		$this->load->model('ciclo_model');
		$this->load->model('ies_model');
		$datos['body']['ciclos'] = $this->ciclo_model->recuperarTodos();
		$datos['body']['seleccionados'] = $this->ies_model->obtenerIdCiclosSeleccionados($_SESSION['idIes']);
		enmarcar($this,'ies/modificarCiclos',$datos);
	}
	
	public function modificarCiclosPost() { //AJAX
		if (session_status () == PHP_SESSION_NONE) {session_start ();}
		$this->load->model('ies_model');
		$datos['body']['status'] = $this->ies_model->modificarListaCiclos($_SESSION ['idIes'], isset($_POST['idCiclos'])?$_POST['idCiclos']:[]);
		$this->load->view('ies/XmodificarCiclosPost',$datos);
	}
}