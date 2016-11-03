<?php
class Curso_model extends CI_Model {
	public function crear($anyoIni) {
		$status = 0;
		
		$fallo = R::find( 'curso', 'anyo_ini = ?', [ $anyoIni ] );
		//var_dump($fallo); //DEBUG
		//die(); //DEBUG
		if (count($fallo) == 0) {
			$curso = R::dispense ( 'curso' );
			$curso->anyo_ini= $anyoIni;
			R::store ( $curso );
		}
		else {
			$status = -1;
		}
		R::close ();
		
		return ($status);	}
}