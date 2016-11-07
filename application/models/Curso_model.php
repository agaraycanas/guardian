<?php
class Curso_model extends CI_Model {
	public function crear($anyoIni, $copiarSlots) {
		$status = 0;
		
		$curso = R::findOne( 'curso', 'anyo_ini = ?', [ $anyoIni ] );
		if ($curso == null) {
			$curso = R::dispense ( 'curso' );
			$curso->anyo_ini= $anyoIni;
			if ($copiarSlots) {
				$cursoAnterior = R::findOne( 'curso', 'anyo_ini = ?', [ $anyoIni-1 ] );
				if ($cursoAnterior!=null) {
					foreach ($cursoAnterior->ownSlotList as $slot) {
						$nuevoSlot = R::dispense('slot');
						$nuevoSlot -> dia = $slot->dia;
						$nuevoSlot -> orden = $slot->orden;
						$nuevoSlot -> h_ini = $slot->h_ini;
						$nuevoSlot -> h_fin = $slot->h_fin;
						$curso->ownSlotList[] = $nuevoSlot;
					}
				}
			}
			R::store ( $curso );
		}
		else {
			$status = -1;
		}
		R::close ();
		
		return ($status);	}
}