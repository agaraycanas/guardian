<script src="<?= base_url()?>assets/js/sha256.js"></script>

<script>
function cifrar(){
	var input_pass = document.getElementById("idPassword");
	input_pass.value = Sha256.hash(input_pass.value);
	//alert(input_pass.value); //DEBUG
}
</script>

<h4>
Introduce los datos del usuario
</h4>
	<form action="<?=base_url();?>usuario/loginPost" method="post">
		<label for="idEmail">Email de Educamadrid (sólo la parte izquierda de la @)</label>
  			<input id="idEmail" type="text" name="email" />
  		<label for="idPassword">Password</label>
  			<input id="idPassword" type="password" name="password" />
  		<input type="submit" onclick="cifrar()" value="Login" class="button"/>
	</form>