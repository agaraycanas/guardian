<script type="text/javascript" src="<?= base_url() ?>assets/js/serialize.js" ></script>

<script type="text/javascript">

var urlAJAX = "<?=base_url()?>asignatura/crearPost"; // PONER AQUÍ LA URL del SCRIPT AJAX a EJECUTAR
var idFormulario = 'idForm'; // PONER AQUÍ LA ID DEL FORMULARIO DONDE ESTAN LOS DATOS
var idPanel='idPanel'; // PONER AQUÍ EL ID del PANEL en el que ACTUAR
var conector;

function accionAJAX(respuesta) { 
	v = respuesta.split(':');
	document.getElementById(idPanel).innerHTML= v[1];
	if (v[0]<0) {
		document.getElementById(idPanel).className='alert alert-danger';
	}
	else {
		document.getElementById(idPanel).className='alert alert-success';
	}
}

function enviarAJAX(modo) {
	conector = new XMLHttpRequest();
	formulario = document.getElementById(idFormulario);
	datosSerializados = serialize(formulario);
	
	conector.open(modo, urlAJAX + (modo == 'GET' ? ('?' + datosSerializados) : ''), true);
	conector.setRequestHeader('X-Requested-With','XMLHttpRequest');
	if (modo == 'GET') {
		conector.send();
	}
	else {
		conector.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conector.send(datosSerializados);
	}
	
	conector.onreadystatechange = function() {
		if (conector.readyState == 4 && conector.status == 200) {
			accionAJAX(conector.responseText);
		}
	}
}
</script>

<div class="container">
<h4>
Introduce los datos de la nueva asignatura
</h4>
	<form id="idForm" class="form col-xs-6" action="<?=base_url();?>asignatura/crearPost" method="post">
  		<div class="form-group">
  			<label for="idDepartamento">Departamento</label>
			<?= form_dropdown('departamento_id', $body['dptoOptions'], 0 , ['class'=>'form-control' ,'id'=>'idDepartamento','required'=>'required']) ?>
		</div>

		<div class="form-group">
			<label for="idNombre">Nombre *</label>
  			<input class="form-control" id="idNombre" type="text" name="nombre" required="required"/>
  		</div>
  		
		<div class="form-group">
			<label for="idAlias">Nombre corto *</label>
  			<input class="form-control" id="idAlias" type="text" name="alias" required="required"/>
  		</div>
  		
  		<div class="form-group">
  			<label for="idCiclo">Ciclo</label>
			<?= form_dropdown('ciclo_id', $body['cicloOptions'], 0 , ['class'=>'form-control' ,'id'=>'idCiclo','required'=>'required']) ?>
		</div>
  		
		<div class="form-group">
			<label for="idNivel">Nivel</label>
  			<input class="form-control" id="idNivel" type="number" name="nivel" min="1" max="9" required="required"/>
  		</div>
  		
  		<input type="button" onclick="enviarAJAX('POST')" value="Guardar" class="btn btn-lg btn-primary"/>
	</form>
	<div id="idPanel"></div>
</div>