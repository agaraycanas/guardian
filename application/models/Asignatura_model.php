<?php
class Asignatura_model extends CI_Model {

	public function recuperarPorDptoId($idDpto) {
		$dpto = R::load ( 'departamento', $idDpto );
		R::close ();
		return $dpto->ownAsignaturaList;
	}

	public function recuperarPorDptoIdAgrupadaPorCursos($idDpto, $idCiclosImpartidos) {
		$asignaturas = $this->recuperarPorDptoId ( $idDpto );
		$salida = [ ];
		foreach ( $asignaturas as $asignatura ) {
			if (in_array ( $asignatura->ciclo->id, $idCiclosImpartidos )) {
				$fila ['asignatura_alias'] = $asignatura ['alias'];
				$fila ['asignatura_id'] = $asignatura ['id'];
				$fila ['ciclo_alias'] = $asignatura->ciclo->alias . $asignatura ['nivel'];
				array_push ( $salida, $fila );
			}
		}
		return $salida;
	}

	public function crear($nombre, $alias, $nivel, $departamento_id, $ciclo_id) {
		$status = 0;
		
		$fallo = R::find ( 'asignatura', ' nivel = ? and ciclo_id = ? and alias = ?', [ 
				$nivel,
				$ciclo_id,
				$alias 
		] );
		
		if (count ( $fallo ) == 0) {
			$departamento = R::load ( 'departamento', $departamento_id );
			$ciclo = R::load ( 'ciclo', $ciclo_id );
			$asignatura = R::dispense ( 'asignatura' );
			
			$asignatura->nombre = $nombre;
			$asignatura->alias = $alias;
			$asignatura->nivel = $nivel;
			$asignatura->departamento = $departamento;
			$asignatura->ciclo = $ciclo;
			
			R::store ( $asignatura );
		} else {
			$status = - 1;
		}
		R::close ();
		
		return ($status);
	}
}