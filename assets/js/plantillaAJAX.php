<script type="text/javascript" src="<?= base_url() ?>assets/js/serialize.js" ></script>

<script type="text/javascript">

var urlAJAX = 'ajax.php'; // PONER AQUÍ LA URL del SCRIPT AJAX a EJECUTAR
var idFormulario = 'idForm'; // PONER AQUÍ LA ID DEL FORMULARIO DONDE ESTAN LOS DATOS
var idPanel='idPanel'; // PONER AQUÍ EL ID del PANEL en el que ACTUAR
var conector;

function accionAJAX(respuesta) { // PROCESAR la RESPUESTA AJAX AQUÍ
	v = respuesta.split(':');
	document.getElementById(idPanel).innerHTML='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + v[1];
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