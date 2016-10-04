<?php
class Ies_model extends CI_Model {
	function recuperarTodos() {
		return R::findAll ( 'ies' );
	}
	function recuperarPorLocalidadId($localidad_id) {
		$d = R::find ( 'ies', 'localidad_id = ? ', [ 
				"$localidad_id" 
		] );
		R::close ();
		return $d;
	}
	function recuperarPorId($id) {
		$bean = R::load( 'ies', $id );
		//echo 'BEAN=';print_r($bean); //DEBUG
		R::close();
		return ($bean->id==0?null:$bean);
	}
}