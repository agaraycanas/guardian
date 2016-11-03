<div class="container">
	<h3>Introduce el número de slots diarios para el curso <?= $body['curso']?> - <?= $body['curso']+1?></h3>
	<p>Incluye los recreos y el horario matutino y vespertino en el caso de
		que el horario cubra todo el día</p>
	<form action="<?=base_url() ?>slot/crear">
		<div class="col-xs-2">
			<div class="form-group">
				<label for="idNumSlots">Número de slots</label>
				<input type="number" value="7" min="1" max="30" class="form-control" name="numSlots">
			</div>
			<div class="form-group">
				<input type="submit" value="Continuar" class="btn btn-lg btn-primary"/>
			</div>
		</div>
	</form>
</div>