<?php
class Curso extends CI_Controller {

	public function crear() {
		enmarcar ( $this, 'curso/crear' );
	}

	public function crearPost() { // Sólo AJAX
		$this->load->model ( 'curso_model' );
		$datos ['body'] ['status'] = $this->curso_model->crear ( $_POST ['anyoIni'] , isset ( $_POST ['copiarSlots']) );
		$datos ['body'] ['anyoIni'] = $_POST ['anyoIni'];
		$this->load->view ( 'curso/XcrearPost', $datos );
	}
}