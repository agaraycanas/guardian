<?php
class Ies_model extends CI_Model {
	function recuperarTodos() {
		return R::findAll( 'ies' );
	}
	
	function recuperarPorLocalidadId($localidad_id) {
		$d = R::find( 'ies', 'localidad_id = ? ', ["$localidad_id"] );
		R::close();
		return $d;
	}
}