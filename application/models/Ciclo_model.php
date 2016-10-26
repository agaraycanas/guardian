<?php
class Ciclo_model extends CI_Model {
	function recuperarTodos() {
		return R::findAll( 'ciclo','order by alias' );
	}
}