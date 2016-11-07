<script type="text/javascript" src="<?= base_url() ?>assets/js/serialize.js" ></script>

<script type="text/javascript">
function accionAJAX(respuesta) { // PROCESAR la RESPUESTA AJAX AQUÍ
	v = respuesta.split(':');
	idPanel = 'idPanel';
	document.getElementById(idPanel).innerHTML= v[1];
	if (v[0]<0) {
		document.getElementById(idPanel).className='alert alert-danger';
	}
	else {
		document.getElementById(idPanel).className='alert alert-success';
	}
}

function enviarAJAX() {
	conector = new XMLHttpRequest();
	urlAJAX = "<?=base_url()?>ies/modificarCiclosPost";
	datosSerializados = serialize(document.getElementById('idForm'));
	
	conector.open('POST', urlAJAX , true);
	conector.setRequestHeader('X-Requested-With','XMLHttpRequest');
	conector.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conector.send(datosSerializados);
	
	conector.onreadystatechange = function() {
		if (conector.readyState == 4 && conector.status == 200) {
			accionAJAX(conector.responseText);
		}
	}
}
</script>


<div class="container">
	<h2>Selecciona los ciclos impartidos en este IES</h2>
	<form id="idForm" method="post">
		<div class="row">
			<?php foreach ($body['ciclos'] as $ciclo):?>
			<div class="checkbox">
				<label data-toggle="tooltip" title="<?=$ciclo->nombre?> (<?=$ciclo->familia?> - grado <?=$ciclo->grado?>)" class="col-xs-3">
					<input type="checkbox" value="<?=$ciclo->id?>" name="idCiclos[]" 
						<?= in_array($ciclo->id, $body['seleccionados'] )?'checked="checked"':'' ?>
					>
						<?=$ciclo->alias?>
				</label>
			</div>
			<?php endforeach;?>
		</div>
		
		<div class="row">
			<div class="form-group col-xs-6">
				<input type="button" value="Guardar" class="btn btn-lg btn-primary" onclick="enviarAJAX()"/>
			</div>
		</div>
		<div id="idPanel">
		</div>
	</form>
</div>