<?php
class Usuario_model extends CI_Model {
	/**
	 * 
	 * @param string $email el email del usuario a buscar
	 * @return Array La información del usuario encontrado, o null en el caso de que no haya coincidencia con $email
	 */
	function getUsuarioPorEmail($email) {
		$usuario = R::find( 'usuario', 'email LIKE ? ', ["$email"] );
		R::close();
		return isset($usuario[1])?$usuario[1]:null;
	}
	
	function existeUsuario($email, $password) {
		return true;
	}
}