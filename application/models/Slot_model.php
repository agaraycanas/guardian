<?php
class Slot_model extends CI_Model {

	public function crear($anyoIni, $datos) {
		$status = 0;
		
		$curso = R::findOne( 'curso', 'anyo_ini = ?', [ $anyoIni ] );
		
		if ($curso != null) {
			
			for($i = 1; $i <= $datos['numSlots']; $i ++) {
				for($dia = 1; $dia <= 5; $dia ++) {
					$slot = R::dispense ( 'slot' );
					
					$slot->dia = $dia;
					$slot->orden = $i;
					$slot->h_ini = $datos['hIni'.$i];
					$slot->h_fin = $datos['hFin'.$i];
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