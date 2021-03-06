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
	urlAJAX = "<?=base_url()?>ies/modificarCiclosPost"; // URL SCRIPT AJAX POST
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

<!-- BODY -->
		<div class="row">
			<div class="form-group col-xs-6">
				<input type="button" value="Crear" class="btn btn-lg btn-primary" onclick="enviarAJAX()"/>
			</div>
		</div>
		<div class="idPanel">
		</div>
	