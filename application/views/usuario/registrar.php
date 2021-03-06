<script type="text/javascript">


function accionAJAX(respuesta) { // PROCESAR la RESPUESTA AJAX AQUÍ
	document.getElementById('idAcordeonAsignaturas').innerHTML = respuesta;
}

function enviarAJAX() {
	conector = new XMLHttpRequest();
	urlAJAX = '<?=base_url()?>asignatura/getAsignaturasAgrupadas';
	datosSerializados = 'id='+document.getElementById('idDepartamento').value;
	
	conector.open('GET', urlAJAX + '?' + datosSerializados, true);
	conector.setRequestHeader('X-Requested-With','XMLHttpRequest');
	conector.send();
	
	conector.onreadystatechange = function() {
		if (conector.readyState == 4 && conector.status == 200) {
			accionAJAX(conector.responseText);
		}
	}
}
</script>

<script>
var bdIES = new Array();

function inicializarBDIES() {
	<?php foreach ($body['localidad'] as $k => $v): ?>
	aux = [ 
	   	<?php $cont = count($body['ies'][$k]); ?>
		<?php foreach ($body['ies'][$k] as $ies): ?>	
			['<?= $ies[0] ?>' , '<?= $ies[1] ?>' ] 
			<?php if (--$cont > 0): ?>, <?php endif; ?> 
		<?php endforeach; ?> 
		];
	bdIES['<?= $k ?>'] = aux;
	<?php endforeach;?>

}

function cambiarIES() {
	inicializarBDIES();
	opciones = '';
	localidad = document.getElementById('idLocalidad').value;
	for (var i=0;i<bdIES[localidad].length;i++) {
		opciones += ('<option value="'+ bdIES[localidad][i][0] + '">' + bdIES[localidad][i][1] + '</option>');
	}
	document.getElementById('idIes').innerHTML = opciones;
}
</script>

<script src="<?= base_url()?>assets/js/sha256.js"></script>

<script>
function cifrar(){
	var input_pass = document.getElementById("idPassword");
	if (input_pass.value != '') {
		input_pass.value = Sha256.hash(input_pass.value);
	}
}
</script>


<div class="container">
<h4>
Introduce los datos del nuevo profesor
</h4>
	<form action="<?=base_url();?>usuario/registrarPost" enctype="multipart/form-data" method="post">
		<div class="form-group">
			<div class="col-xs-3">
				<label for="idEmail">Usuario de educamadrid *</label>
		  		<input class="form-control" id="idEmail" type="text" name="email" required="required" />
			</div>
			<div class="col-xs-3">
	  			<label for="idPassword">Contraseña *</label>
	  			<input class="form-control" id="idPassword" type="password" name="password" required="required"/>
			</div>
			<div class="col-xs-6">
	  			<label for="idFoto">Fotografía</label>
	  			<input class="form-control" id="idFoto" type="file" name="foto" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-4">
		  		<label for="idNombre">Nombre *</label>
				<input class="form-control" id="idNombre" type="text" name="nombre" required="required">
			</div>
			
			<div class="col-xs-4">
		  		<label for="idApellido1">Primer apellido *</label>
				<input class="form-control" id="idApellido1" type="text" name="apellido1" required="required">
			</div>

			<div class="col-xs-4">
	  			<label for="idApellido2">Segundo apellido</label>
				<input class="form-control" id="idApellido2" type="text" name="apellido2">
			</div>
		</div>
		

  		<div class="form-group">
			<div class="col-xs-4">
	  			<label for="idlocalidad">Localidad del IES donde trabaja (este curso)</label>
	  			<?php $idLocalidad = $body['idLocalidadEscogida']==null?1:$body['idLocalidadEscogida'] ?>
				<?= form_dropdown('', $body['localidad'], $idLocalidad, ['class'=>'form-control' ,'id'=>'idLocalidad','onChange'=>'cambiarIES()']) ?>
			</div>

			<div class="col-xs-8">
	  			<label for="idIes">I.E.S. donde trabaja (este curso)*</label>
				<?php $idIesEscogido= $body['idIesEscogido']==null?1:$body['idIesEscogido'] ?>
				<?= form_dropdown('ies_id', $body['iesOptions'], $idIesEscogido, ['class'=>'form-control', 'id'=>'idIes','required'=>'required']) ?>
			</div>
		</div>
			
  		<div class="form-group">
			<div class="col-xs-4">
	  			<label for="idDepartamento">Departamento *</label>
				<?= form_dropdown('departamento_id', $body['dptoOptions'], 0 , ['onchange'=>'enviarAJAX()', 'class'=>'form-control' ,'id'=>'idDepartamento','required'=>'required']) ?>
			</div>
			
			<div id="idAcordeonAsignaturas" class="col-xs-8">
			</div>
		</div>

  		<div class="form-group">
			<div class="col-xs-2">
				<input type="submit" onclick="cifrar()" value="Registrar" class="btn btn-lg btn-primary"/>
			</div>
		</div>
		
	</form>
</div>