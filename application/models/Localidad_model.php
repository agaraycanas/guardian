<?php
class Localidad_model extends CI_Model {
	function recuperarTodas() {
		return R::findAll( 'localidad' );
	}
}