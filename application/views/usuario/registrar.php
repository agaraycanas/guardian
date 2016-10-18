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

<h4>
Introduce los datos del nuevo profesor
</h4>
<p>
(los campos con * son obligatorios)
</p>
	<form action="<?=base_url();?>usuario/registrarPost" enctype="multipart/form-data" method="post">
		<label for="idEmail">* Email de educamadrid - sólo lo que está a la izquierda del "@educa.madrid.org"</label>
  			<input id="idEmail" type="text" name="email" required="required"/>

  		<label for="idNombre">* Nombre</label>
			<input id="idNombre" type="text" name="nombre" required="required">

  		<label for="idApellido1">* Primer apellido</label>
			<input id="idApellido1" type="text" name="apellido1" required="required">

  		<label for="idApellido2">Segundo apellido</label>
			<input id="idApellido2" type="text" name="apellido2">
		
  		<label for="idPassword">* Contraseña</label>
  			<input id="idPassword" type="password" name="password" required="required"/>

  		<label for="idFoto">Fotografía</label>
  			<input id="idFoto" type="file" name="foto" />

  		<label for="idlocalidad">Localidad del IES donde trabaja</label>
  			<?php $idLocalidad = $body['idLocalidadEscogida']==null?1:$body['idLocalidadEscogida'] ?>
			<?= form_dropdown('', $body['localidad'], $idLocalidad, ['id'=>'idLocalidad','onChange'=>'cambiarIES()']) ?>

  		<label for="idIes">* I.E.S. donde trabaja</label>
			<?php $idIesEscogido= $body['idIesEscogido']==null?1:$body['idIesEscogido'] ?>
			<?= form_dropdown('ies_id', $body['iesOptions'], $idIesEscogido, ['id'=>'idIes','required'=>'required']) ?>
			
		<input type="submit" onclick="cifrar()" value="Registrar" class="button"/>
	</form>