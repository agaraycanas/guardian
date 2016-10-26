<script src="<?= base_url()?>assets/js/sha256.js"></script>

<script>
function cifrar(){
	var input_pass = document.getElementById("idPassword");
	input_pass.value = Sha256.hash(input_pass.value);
	//alert(input_pass.value); //DEBUG
}
</script>

<div class="container">
<h4>
Introduce los datos del usuario
</h4>
	<form class="form" action="<?=base_url();?>usuario/loginPost" method="post">
		<div class="form-group">
			<label for="idEmail">Usuario de Educamadrid</label>
  			<input class="form-control" id="idEmail" type="text" name="email" />
  			<span class="help-block"><small>La parte izquierda de la @ del correo de educa.madrid.com</small></span>
  		</div>
		<div class="form-group">
  			<label for="idPassword">Contraseña</label>
  			<input class="form-control" id="idPassword" type="password" name="password" />
		</div>
  		<input type="submit" onclick="cifrar()" value="Login" class="btn btn-lg btn-primary"/>
	</form>
</div>