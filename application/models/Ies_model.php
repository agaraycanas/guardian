<?php
class Ies_model extends CI_Model {

	function recuperarTodos() {
		return R::findAll ( 'ies' );
	}

	function recuperarPorLocalidadId($localidad_id) {
		$d = R::find ( 'ies', 'localidad_id = ? ', [ "$localidad_id" ] );
		R::close ();
		return $d;
	}

	function recuperarPorId($id) {
		$bean = R::load ( 'ies', $id );
		R::close ();
		return ($bean->id == 0 ? null : $bean);
	}

	function modificarListaCiclos($idIes, $listaIdCiclos) {
		$status = 0;
		$ies = R::load ( 'ies', $idIes );
		$ies->sharedCicloList = [ ]; // Borramos todas las asociaciones previas
		foreach ( $listaIdCiclos as $idCiclo ) {
			$ciclo = R::load ( 'ciclo', $idCiclo );
			$ies->sharedCicloList [] = $ciclo;
		}
		R::store ( $ies );
		return $status;
	}
	
	function obtenerIdCiclosSeleccionados($idIes) {
		$lista = [];
		$ies = R::load('ies',$idIes);
		foreach ($ies->sharedCicloList as $ciclo) {
			array_push($lista, $ciclo->id);
		}
		return $lista;
	}
}