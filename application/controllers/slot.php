<?php
class Slot extends CI_Controller {

	public function crear() {
		$mes = date ( 'n' );
		$anyo = date ( 'Y' );
		$datos ['body'] ['curso'] = $mes < 7 ? $anyo - 1 : $anyo;
		if (isset ( $_GET ['numSlots'] )) {
			$datos ['body'] ['numSlots'] = $_GET ['numSlots'];
			enmarcar ( $this, 'slot/crear', $datos );
		} else {
			enmarcar ( $this, 'slot/getNumero', $datos );
		}
	}

	public function crearPost() { // Sólo AJAX
		$this->load->model ( 'slot_model' );
		$curso = date('n') < 7 ? date('Y') - 1 : date('Y');
		$datos ['body'] ['status'] = $this->slot_model->crear ($curso, $_POST);
		$datos ['body'] ['anyoIni'] = $curso;
		$this->load->view ( 'slot/XcrearPost', $datos );
	}
}