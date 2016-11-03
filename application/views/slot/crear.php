<script type="text/javascript" src="<?= base_url() ?>assets/js/serialize.js" ></script>

<script type="text/javascript">

function accionAJAX(respuesta) { 
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
	urlAJAX = "<?=base_url()?>slot/crearPost";
	idFormulario = 'idForm';
	formulario = document.getElementById(idFormulario);
	datosSerializados = serialize(formulario);
	
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
	<h1>Slots diarios para el curso <?= $body['curso']?> - <?= $body['curso']+1?> </h1>
	<form class="form" id="idForm" method="post" action="<?=base_url()?>slot/crearPost">
		<div class="row">
			<div class="col-xs-1">Slot</div>
			<div class="col-xs-2">Hora de inicio</div>
			<div class="col-xs-2">Hora de fin</div>
			<div class="col-xs-1">¿Recreo?</div>
		</div>
		<input type="hidden" name="numSlots" value="<?=$body['numSlots'] ?>">
		
		<?php for ($i=1;$i <= $body['numSlots'];$i++): ?>
		<div class="row">
			<div class="form-group col-xs-1">
				<input class="form-control" type="number" id="idNumSlot" name="orden" value="<?=$i?>" readonly="readonly">
			</div>
			
			<div class="form-group col-xs-2">
				<input class="form-control" type="time" id="idIni" pattern="HH:MM" value="08:00" name="hIni<?=$i?>">
			</div>
			
			<div class="form-group col-xs-2">
				<input class="form-control" type="time" id="idFin" pattern="HH:MM" value="09:00" name="hFin<?=$i?>">
			</div>
			
			<div class="form-group col-xs-1">
				<input class="form-control" type="checkbox" id="idFin"  name="esRecreo<?=$i?>">
			</div>
		</div>
		<?php endfor; ?>
			
		<div class="form-group">
			<input type="button" value="Crear" class="btn btn-lg btn-primary" onclick="enviarAJAX()" />
		</div>
	</form>
</div>
<div class="container">
	<div class="col-xs-6" id="idPanel">
	</div>
</div>

