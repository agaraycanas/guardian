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
	urlAJAX = "<?=base_url()?>curso/crearPost";
	datosSerializados = 'anyoIni='+document.getElementById('idIni').value;
	
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
	<h1>Crear curso</h1>
	<form class="form">
		<div class="col-xs-2">
			<div class="form-group"
				oninput="document.getElementById('idFin').value= parseInt(document.getElementById('idIni').value) + 1 "
			>
				<label for="idIni">Año inicio</label>
				<input class="form-control" id="idIni" type="number"
					value="<?=date('Y')?>"
				>
			</div>
			<div class="form-group">
				<label for="idFin">Año fin</label>
				<input class="form-control" type="text" id="idFin"
					readonly="readonly" value="<?=date('Y')+1?>"
				>
			</div>
			<div class="form-group">
				<input type="button" value="Crear" class="btn btn-lg btn-primary"
					onclick="enviarAJAX()"
				/>
			</div>
		</div>
	</form>
</div>
<div class="container">
	<div class="col-xs-6" id="idPanel">
	</div>
</div>

