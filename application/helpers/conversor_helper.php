<?php
	/**
	 * Adapta un paquete de datos en un array asociativo genérico a un array de pares <code>$k=>$v</code> preparado
	 * principalmente para rellenar un conjunto de <option> de un select.
	 * 
	 * @param array $datos el array inicial [ [k1 => v11, k2 => v12, ..., kN => v1N], [k1 => v21, k2 => v22, ..., kN => v2N], ..., [...] ]
	 * @param string $value Uno de los k1, k2, ..., kn a elegir. Normalmente el id. P.ej k1
	 * @param string $label Uno de los k1, k2, ..., kn a elegir. P.ej k2
	 * @param string $labelExtra Uno de los k1, k2, ..., kn a elegir. P.ej k2 (p.def. null)
	 * @return [ v11 => v12, v21 => v22, ... ] (p.ej para $value = 'k1' y $label = 'k2')
	 */
	function crearDatosOption($datos, $value, $label, $labelExtra=null) {
		$sol = [];
		foreach ($datos as $dato) {
			$sol[$dato[$value]] = $labelExtra==null?$dato[$label]:$dato[$label].' ('.$dato[$labelExtra].')';
		}
		return $sol;
	}
?>