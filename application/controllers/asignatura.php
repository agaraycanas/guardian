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
		$id = $_GET['id'];
		$this->load->model('asignatura_model');
		$datos['asignaturas']=$this->asignatura_model->recuperarPorDptoIdAgrupadaPorCursos($id);
		$this->load->view('asignatura/XasignaturasAgrupadas',$datos);
	}
}