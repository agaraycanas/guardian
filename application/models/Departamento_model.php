<?php
class Departamento_model extends CI_Model {
	function recuperarTodos() {
		return R::findAll( 'departamento','order by nombre' );
	}
}