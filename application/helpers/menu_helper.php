<?php
$roles = ['profesor'=>0,'jefeDeEstudios'=>1,'administrador'=>2];
function esPadre($menu, $idp) {
	foreach ( $menu as $m ) {
		if ($m ['idp'] == $idp) {
			return true;
		}
	}
	return false;
}

function hijos($menu, $idp) {
	$hijos = [ ];
	foreach ( $menu as $candidato ) {
		if ($candidato ['idp'] == $idp) {
			array_push ( $hijos, $candidato );
		}
	}
	return $hijos;
}

function dibujarMenu($menu, $id = 0) {
	$salida = '';
	if (esPadre ( $menu, $id )) {
		$salida .= '<ul' . ($id == 0 ? ' class="nav navbar-nav"' : 'class="dropdown.menu"') . '>' . PHP_EOL;
		foreach ( hijos ( $menu, $id ) as $hijo ) {
			$salida .= '<li>' . PHP_EOL;
			$salida .= '<a ';
			$salida .= $hijo ['accion'] != '' ? 'href="' . base_url () . "{$hijo['accion']}\"" : '';
			$salida .= ">{$hijo['nombre']}</a>" . PHP_EOL;
			$salida .= dibujarMenu ( $menu, $hijo ['id'] );
			$salida .= '</li>' . PHP_EOL;
		}
		$salida .= '</ul>' . PHP_EOL;
	}
	return $salida;
}

function dibujarMenu2($menu, $id = 0) { // Antes de bootstrap
	$salida = '';
	if (esPadre ( $menu, $id )) {
		$salida .= '<ul' . ($id == 0 ? ' id="navigation"' : '') . '>' . PHP_EOL;
		foreach ( hijos ( $menu, $id ) as $hijo ) {
			$salida .= '<li>' . PHP_EOL;
			$salida .= '<a ';
			$salida .= $hijo ['accion'] != '' ? 'href="' . base_url () . "{$hijo['accion']}\"" : '';
			$salida .= ">{$hijo['nombre']}</a>" . PHP_EOL;
			$salida .= dibujarMenu ( $menu, $hijo ['id'] );
			$salida .= '</li>' . PHP_EOL;
		}
		$salida .= '</ul>' . PHP_EOL;
	}
	return $salida;
}

?>