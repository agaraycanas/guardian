<?php
class Asignatura extends CI_Controller {

	function crear() {
		$this->load->model ( 'departamento_model' );
		$datos ['body'] ['dptoOptions'] = crearDatosOption ( $this->departamento_model->recuperarTodos (), 'id', 'nombre' );
		
		$this->load->model ( 'ciclo_model' );
		$datos ['body'] ['cicloOptions'] = crearDatosOption ( $this->ciclo_model->recuperarTodos (), 'id', 'alias', 'nombre' );
		
		enmarcar ( $this, 'asignatura/crear', $datos );
	}

	function crearPost() {
		extract ( $_POST );
		$this->load->model ( 'asignatura_model' );
		$datos['body']['status'] = $this->asignatura_model->crear ( $nombre, $alias, $nivel, $departamento_id, $ciclo_id );
		$datos['body']['alias'] = $alias;
		$datos['body']['nivel'] = $nivel;
		$this->load->view('asignatura/crearPost',$datos);
	}
	
	function getAsignaturasAgrupadas() {
		if (session_status () == PHP_SESSION_NONE) {session_start ();}
		$dptoId = $_GET['id'];
		$this->load->model('asignatura_model');
		$this->load->model('ies_model');
		$idCiclosImpartidos = $this->ies_model->obtenerIdCiclosSeleccionados($_SESSION['idIes']);
		$datos['asignaturas']=$this->asignatura_model->recuperarPorDptoIdAgrupadaPorCursos($dptoId,$idCiclosImpartidos);
		$this->load->view('asignatura/XasignaturasAgrupadas',$datos);
	}
}