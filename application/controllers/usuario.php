<?php
class Usuario extends CI_Controller {

	function login() {
		enmarcar ( $this, 'usuario/login' );
	}

	function loginPost() {
		if (! (isset ( $_POST ['email'] ) && isset ( $_POST ['password'] ))) {
			header ( 'Location:' . base_url () . 'usuario/login' );
		} else {
			$this->load->model ( 'usuario' );
			if ($this->usuario->existeUsuario ( $_POST ['email'], $_POST ['password'] )) {
				$usuario = $this->usuario->getUsuarioPorEmail ();
				$_SESSION ['idUsuario'] = $usuario->idUsuario;
				$_SESSION ['nombreUsuario'] = $usuario->nombre;
				$_SESSION ['apellidoUsuario'] = $usuario->apellido;
			}
		}
	}

	function registrar() {
		enmarcar ( $this, 'usuario/registrar' );
	}
}