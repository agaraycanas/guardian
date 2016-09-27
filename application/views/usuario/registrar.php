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
  		<label for="idApellido">Nombre</label>
			<input id="idApellido" type="text" name="apellido">
  		<input type="submit" value="Login" class="button"/>
	</form>