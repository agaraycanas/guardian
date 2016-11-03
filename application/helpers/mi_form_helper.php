<?php
function form_checkbox_colapsables($datos, $grupo, $id, $label, $name) {

	function arrayGrupos($datos,$grupo) {
		$salida = [];
		foreach ($datos as $d) {
			if (!in_array($d[$grupo],$salida)) {
				array_push($salida, $d[$grupo]);
			}
		}
		return $salida;
	}
	$salidaHTML = <<<HTML
<div class="panel-group" id="accordion">
	<div class="panel panel-default">
HTML;
	$cont=1;$in='in';
	
	foreach (arrayGrupos($datos, $grupo) as $gr ) {
		$salidaHTML .= <<<HTML
	<div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse$cont">$gr</a>
      </h4>
    </div>
	
	<div id="collapse$cont" class="panel-collapse collapse $in">
      <div class="panel-body">
	
HTML;
		foreach ($datos as $d) {
			if ($d[$grupo] == $gr) {
				$salidaHTML .= <<<HTML
				<label class="checkbox-inline"><input type="checkbox" name="{$name}[]" value="{$d[$id]}">{$d[$label]}</label>
	
HTML;
			}
		}
		$salidaHTML .= <<<HTML
	  </div>
    </div>
	
HTML;
		$cont++; $in='';
	}
	$salidaHTML .= <<<HTML
  </div>
	
</div>
	
HTML;
	return $salidaHTML;
	}