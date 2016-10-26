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
		$this->asignatura_model->crear ( $nombre, $alias, $nivel, $departamento_id, $ciclo_id );
	}
}