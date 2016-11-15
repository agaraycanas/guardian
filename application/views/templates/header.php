
<header class="container">
	<div class="row">
		<div id="idIES" class="col-xs-3">
			<?php if (isset($header['ies'])): ?>
				IES <?= $header['ies']['nombre']?>
			<?php else:?>
				Haz login para escoger IES 
			<?php endif;?>
		</div>
		
		<div id="idLogo" class="col-xs-6 text-center">
			<img src="<?=base_url()?>assets/img/logo/guardian.png" class="img-rounded" alt="Logo Guardian" width="100" height="15">
		</div>
		
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
</header>
