<script>
var bdIES = new Array();

function inicializarBDIES() {
	<?php foreach ($body['localidad'] as $k => $v): ?>
	aux = [ 
		<?php foreach ($body['ies'][$k] as $ies): ?>	
			['<?= $ies[0] ?>' , '<?= $ies[1] ?>' ] 
			<?php if (next($body['ies'][$k])): ?>, <?php endif; ?> 
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
	input_pass.value = Sha256.hash(input_pass.value);
}
</script>

<h4>
Introduce los datos del nuevo usuario
</h4>
	<form action="<?=base_url();?>usuario/registrarPost" method="post">
		<label for="idEmail">Email de educamadrid</label>
  			<input id="idEmail" type="text" name="email" />

  		<label for="idPassword">Password</label>
  			<input id="idPassword" type="password" name="password" />

  		<label for="idNombre">Nombre</label>
			<input id="idNombre" type="text" name="nombre">

  		<label for="idApellido1">Primer apellido</label>
			<input id="idApellido1" type="text" name="apellido1">

  		<label for="idApellido2">Segundo apellido</label>
			<input id="idApellido2" type="text" name="apellido2">
		
  		<label for="idlocalidad">Localidad</label>
  			<?php $idLocalidad = $body['idLocalidadEscogida']==null?1:$body['idLocalidadEscogida'] ?>
			<?= form_dropdown('', $body['localidad'], $idLocalidad, ['id'=>'idLocalidad','onChange'=>'cambiarIES()']) ?>

  		<label for="idIes">I.E.S.</label>
			<select id="idIes" name="ies_id">
			</select>
		
		<?= $body['iesIdEscogido']?> // <?= $body['idLocalidadEscogida']?>
  		<input type="submit" onclick="cifrar()" value="Registrar" class="button"/>
	</form>