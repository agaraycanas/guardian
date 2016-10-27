<?php
class Asignatura_model extends CI_Model {

	public function recuperarPorDptoId($idDpto) {
		$dpto = R::load ( 'departamento', $idDpto );
		R::close ();
		return $dpto->sharedAsignaturaList;
	}

	public function crear($nombre, $alias, $nivel, $departamento_id, $ciclo_id) {
		$status = 0; 
		
		$fallo = R::find( 'asignatura', ' nivel = ? and ciclo_id = ? and alias = ?', [ $nivel, $ciclo_id, $alias]);
		
		if (count($fallo) == 0) { 
			$departamento = R::load ( 'departamento', $departamento_id );
			$ciclo = R::load ( 'ciclo', $ciclo_id );
			$asignatura = R::dispense ( 'asignatura' );
			
			$asignatura->nombre= $nombre;
			$asignatura->alias=$alias;
			$asignatura->nivel=$nivel;
			$asignatura->departamento = $departamento;
			$asignatura->ciclo = $ciclo;
			
			R::store ( $asignatura );
		}
		else {
			$status = -1;
		}
		R::close ();
		
		return ($status);
	}
}