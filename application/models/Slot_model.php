<?php
class Slot_model extends CI_Model {

	public function crear($anyoIni, $datos) {
		$status = 0;
		
		$cursos = R::find ( 'curso', 'anyo_ini = ?', [ $anyoIni ] );
		
		if (count ( $cursos ) != 0) {
			$curso = $cursos [0];
			
			for($i = 1; $i <= $numSlots; $i ++) {
				for($dia = 1; $dia <= 7; $dia ++) {
					$slot = R::dispense ( 'slot' );
					
					$slot->dia = $dia;
					$slot->orden = $i;
					$slot->h_ini = $datos['hIni'.$i];
					$slot->h_fin = $datos['hFin'.$i];
					$slot->es_recreo = isset($datos['esRecreo'.$i]);
					$slot->curso = $curso;
					
					R::store($slot);
				}
			}
		} else {
			$status = - 1;
		}
		R::close ();
		
		return ($status);
	}
}