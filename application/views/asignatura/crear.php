<div class="container">
<h4>
Introduce los datos de la nueva asignatura
</h4>
	<form class="form" action="<?=base_url();?>asignatura/crearPost" method="post">
  		<div class="form-group">
  			<label for="idDepartamento">Departamento</label>
			<?= form_dropdown('departamento_id', $body['dptoOptions'], 0 , ['class'=>'form-control' ,'id'=>'idDepartamento','required'=>'required']) ?>
		</div>

		<div class="form-group">
			<label for="idNombre">Nombre *</label>
  			<input class="form-control" id="idNombre" type="text" name="nombre" required="required"/>
  		</div>
  		
		<div class="form-group">
			<label for="idAlias">Nombre corto *</label>
  			<input class="form-control" id="idAlias" type="text" name="alias" required="required"/>
  		</div>
  		
  		<div class="form-group">
  			<label for="idCiclo">Ciclo</label>
			<?= form_dropdown('ciclo_id', $body['cicloOptions'], 0 , ['class'=>'form-control' ,'id'=>'idCiclo','required'=>'required']) ?>
		</div>
  		
		<div class="form-group">
			<label for="idNivel">Nivel</label>
  			<input class="form-control" id="idNivel" type="number" name="nivel" min="1" max="9" required="required"/>
  		</div>
  		
  		<input type="submit" onclick="cifrar()" value="Login" class="btn btn-lg btn-primary"/>
	</form>
</div>