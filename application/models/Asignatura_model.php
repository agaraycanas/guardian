<?php
class Asignatura_model extends CI_Model {
	function recuperarPorDptoId($idDpto) {
		/*
		 * $d = R::find ( 'asignatura', 'localidad_id = ? ', [
		 * "$localidad_id"
		 * ] );
		 * R::close ();
		 * return $d;
		 */
		return [ 
				[ 
						'id' => 1,
						'nombre' => 'asignatura1' 
				],
				[ 
						'id' => 2,
						'nombre' => 'asignatura2' 
				] 
		];
	}
}