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
	<form class="form" action="<?=base_url();?>usuario/registrarPost" enctype="multipart/form-data" method="post">
		<div class="form-group form-inline">	
			<label for="idEmail">* Usuario de educamadrid</label>
	  		<input class="form-control" id="idEmail" type="text" name="email" required="required" />
			<span class="help-block">La parte izquierda de la @ del correo de educa.madrid.com</span>
	
  			<label for="idPassword">* Contraseña</label>
  			<input class="form-control" id="idPassword" type="password" name="password" required="required"/>
		</div>

		<div class="form-group form-inline">	
	  		<label for="idNombre">* Nombre</label>
			<input class="form-control" id="idNombre" type="text" name="nombre" required="required">

	  		<label for="idApellido1">* Primer apellido</label>
			<input class="form-control" id="idApellido1" type="text" name="apellido1" required="required">

  			<label for="idApellido2">Segundo apellido</label>
			<input class="form-control" id="idApellido2" type="text" name="apellido2">
		</div>
		

  		<div class="form-group">
  			<label for="idFoto">Fotografía</label>
  			<input class="form-control" id="idFoto" type="file" name="foto" />
  			
  			<label for="idDepartamento">Departamento</label>
			<?= form_dropdown('departamento_id', $body['dptoOptions'], 0 , ['class'=>'form-control' ,'id'=>'idDepartamento','required'=>'required']) ?>
		</div>

  		<div class="form-group form-inline">
  			<label for="idlocalidad">Localidad del IES donde trabaja</label>
  			<?php $idLocalidad = $body['idLocalidadEscogida']==null?1:$body['idLocalidadEscogida'] ?>
			<?= form_dropdown('', $body['localidad'], $idLocalidad, ['class'=>'form-control' ,'id'=>'idLocalidad','onChange'=>'cambiarIES()']) ?>

  			<label for="idIes">* I.E.S. donde trabaja</label>
			<?php $idIesEscogido= $body['idIesEscogido']==null?1:$body['idIesEscogido'] ?>
			<?= form_dropdown('ies_id', $body['iesOptions'], $idIesEscogido, ['class'=>'form-control', 'id'=>'idIes','required'=>'required']) ?>
		</div>
			
		<input type="submit" onclick="cifrar()" value="Registrar" class="button"/>
	</form>
</div>