<?php
class Usuario extends CI_Controller {

	function login() {
		enmarcar ( $this, 'usuario/login' );
	}

	function loginPost() {
		if (! (isset ( $_POST ['email'] ) && isset ( $_POST ['password'] ))) {
			header ( 'Location:' . base_url () . 'usuario/login' );
		} else {
			$this->load->model ( 'usuario_model' );
			if ($this->usuario_model->existeUsuario ( $_POST ['email'], $_POST ['password'] )) {
				$usuario = $this->usuario_model->getUsuarioPorEmail ( $_POST ['email'] );
				$this->load->model ( 'ies_model' );
				$ies = $this->ies_model->recuperarPorId ( $usuario->ies->id );
				
				if (session_status () == PHP_SESSION_NONE) {
					session_start ();
				}
				$_SESSION ['idUsuario'] = $usuario->id;
				$_SESSION ['nombreUsuario'] = $usuario->nombre;
				$_SESSION ['apellido1Usuario'] = $usuario->apellido1;
				$_SESSION ['rolUsuario'] = $usuario->rol;
				$_SESSION ['idIes'] = $usuario->ies->id;
				$_SESSION ['nombreIes'] = $usuario->ies->nombre;
				$_SESSION ['idLocalidad'] = $ies->localidad_id;
				
				// enmarcar ( $this, 'home' );
				header ( 'Location:' . base_url () . 'home' ); // Patrón PRG
			} else { // Usuario o password incorrectas
				enmarcar ( $this, 'usuario/error/usuPwdIncorrecto' );
			}
		}
	}

	function logout() {
		if (session_status () == PHP_SESSION_NONE) {
			session_start ();
		}
		session_unset ();
		session_destroy ();
		header ( 'Location:' . base_url () . 'home' );
	}

	function registrar() {
		if (session_status () == PHP_SESSION_NONE) {
			session_start ();
		}
		
		// Para generar el SELECT de localidades
		$this->load->model ( 'localidad_model' );
		$localidades = $this->localidad_model->recuperarTodas ();
		
		$datos ['body'] ['localidad'] = [ ];
		foreach ( $localidades as $localidad ) {
			$datos ['body'] ['localidad'] [$localidad ['id']] = $localidad ['nombre'];
		}
		
		$datos ['body'] ['idLocalidadEscogida'] = (isset ( $_SESSION ['idLocalidad'] )) ? $_SESSION ['idLocalidad'] : 1;
		
		// Para generar el SELECT de IES desde JAVASCRIPT
		$this->load->model ( 'ies_model' );
		foreach ( $localidades as $localidad ) {
			$institutos = $this->ies_model->recuperarPorLocalidadId ( $localidad ['id'] );
			$datos ['body'] ['ies'] [$localidad ['id']] = [ ];
			foreach ( $institutos as $instituto ) {
				$ies = [ 
						$instituto ['id'],
						$instituto ['nombre'] 
				];
				array_push ( $datos ['body'] ['ies'] [$localidad ['id']], $ies );
			}
		}
		
		$datos ['body'] ['idIesEscogido'] = (isset ( $_SESSION ['idIes'] )) ? $_SESSION ['idIes'] : 1;
		
		// Para generar el SELECT de IES inicial en HTML
		$datos ['body'] ['iesOptions'] = [ ];
		foreach ( $datos ['body'] ['ies'] [$datos ['body'] ['idLocalidadEscogida']] as $ies ) {
			$datos ['body'] ['iesOptions'] [$ies [0]] = $ies [1];
		}
		
		// Para generar el SELECT de DEPARTAMENTO inicial en HTML
		$this->load->model ( 'departamento_model' );
		$departamentos = $this->departamento_model->recuperarTodos ();
		foreach ( $departamentos as $departamento) {
			$datos ['body'] ['dptoOptions'] [$departamento['id']] = $departamento['nombre'];
		}
		
		// Para generar el SELECT múltiple de asignaturas inicial en HTML (asumiendo el dpto. cero) por defecto
		$this->load->model ('asignatura_model');
		$asignaturas = $this->asignatura_model->recuperarPorDptoId(0);
		$datos ['body'] ['asignaturaOptions'] = [];
		foreach ($asignaturas as $asignatura) {
			$datos ['body'] ['asignaturaOptions'] [$asignatura['id']] = $asignatura['nombre'];
		}
		
		// Desplegamos la vista
		enmarcar ( $this, 'usuario/registrar', $datos );
	}

	function registrarPost() {
		extract ( $_POST );
		echo "$nombre | $apellido1 | $apellido2 | $email | $password | $ies_id </br>";
		$nombre = $_POST ['email'];
		$extension = '.jpg';
		$carpeta = './assets/img/usuario/'; // Debe tener “apache” permiso de escritura en ella
		
		if ($_FILES ['foto'] ['tmp_name'] != null) {
			copy ( $_FILES ['foto'] ['tmp_name'], $carpeta . $nombre . $extension );
		}
		echo "El fichero $nombre se almacen&oacute; en $carpeta"; // DEBUG
		
		/*
		 * if (! (isset ( $_POST ['email'] ) && isset ( $_POST ['password'] ) && isset ( $_POST ['nombre'] ) && isset ( $_POST ['apellido1'] ) && isset ( $_POST ['ies_id'] ))) {
		 * header ( 'Location:' . base_url () . 'usuario/registrar' );
		 * } else {
		 * $this->load->model ( 'usuario_model' );
		 * if ($this->usuario_model->existeUsuario ( $_POST ['email'], $_POST ['password'] )) {
		 * $usuario = $this->usuario_model->getUsuarioPorEmail ( $_POST ['email'] );
		 *
		 * if (session_status () == PHP_SESSION_NONE) {
		 * session_start ();
		 * }
		 * $_SESSION ['idUsuario'] = $usuario->id;
		 * $_SESSION ['nombreUsuario'] = $usuario->nombre;
		 * $_SESSION ['apellido1Usuario'] = $usuario->apellido1;
		 * $_SESSION ['rol'] = $usuario->rol;
		 * $_SESSION ['idIes'] = $usuario->ies->id;
		 * $_SESSION ['nombreIes'] = $usuario->ies->nombre;
		 *
		 * // enmarcar ( $this, 'home' );
		 * header ( 'Location:' . base_url () . 'home' ); // Patrón PRG
		 * } else { // Usuario o password incorrectas
		 * enmarcar ( $this, 'usuario/error/usuPwdIncorrecto' );
		 * }
		 * }
		 */
	}

	function info() {
	}
}