<div class="container">
	<div class="row">
		<div id="idIES" class="col-xs-3">
			<?php if (isset($header['ies'])): ?>
				IES <?= $header['ies']['nombre']?>
			<?php else:?>
				Haz login para escoger IES 
			<?php endif;?>
		</div>
		
		<div id="idLogo" class="col-xs-6 text-center">GUARDIAN</div>
		
		<div id="idUsuario" class="col-xs-3">
			<?php if (isset($header['usuario'])): ?>
				<div id="idLogout" class="text-right">
					<?= $header['usuario']['nombre'].' '.$header['usuario']['apellido1'] ?>
					<span class="glyphicon glyphicon-log-out"></span>
					<a href="<?= base_url() ?>usuario/logout">Salir</a>
				</div>
			<?php else:?>
				<div class="text-right">No has hecho login</div> 
			<?php endif;?>
		</div>
	</div>
</div>
