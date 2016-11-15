<?php
class Usuario_model extends CI_Model {
	/**
	 * 
	 * @param string $email el email del usuario a buscar
	 * @return Array La información del usuario encontrado, o null en el caso de que no haya coincidencia con $email
	 */
	function getUsuarioPorEmail($email) {
		$usuario = R::findOne('usuario','email = ?', ["$email"] );
		R::close();
		return $usuario;
	}
	
	function existeUsuario($email) {
		$usuario = R::findOne('usuario','email = ?', ["$email"] );
		R::close();
		return ($usuario != null);
	}
	
	function loginOK($email, $password) {
		$usuario = R::findOne( 'usuario', 'email = ? ', ["$email"] );
		R::close();
		return $usuario != null && $usuario->password == $password;
	}
	
	function crearUsuario($email,$password,$nombre,$apellido1,$apellido2,$ies_id,$departamento_id,$asignaturas_id) {
		$u = R::dispense('usuario');
		$u -> email 	= $email;
		$u -> password 	= $password;
		$u -> nombre 	= $nombre;
		$u -> apellido1	= $apellido1;
		$u -> apellido2 = $apellido2;
		$u -> ies 	=  R::load('ies', $ies_id);
		$u -> departamento	= R::load('departamento', $departamento_id);
		foreach ($asignaturas_id as $asignatura_id) {
			$a = R::load('asignatura',$asignatura_id);
			$u -> sharedAsignaturaList[] = $a;
		}
		R::store($u);
	}
}