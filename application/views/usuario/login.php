<h4>
Introduce los datos del nuevo usuario
</h4>
	<form action="<?=base_url();?>usuario/loginPost" method="post">
		<label for="idEmail">Email de educamadrid (sólo la parte izquierda de la @)</label>
  			<input id="idEmail" type="text" name="email" />
  		<label for="idPassword">Password</label>
  			<input id="idPassword" type="password" name="password" />
  		<input type="submit" value="Login" class="button"/>
	</form>