<header class="container">
<div class="row">
	<div id="idIES" class="col-sm-3">
		<?php if (isset($header['ies'])): ?>
			IES <?= $header['ies']['nombre']?>
		<?php else:?>
			Haz login para escoger IES 
		<?php endif;?>
	</div>
	
	<div id="idLogo" class="col-sm-6 text-center">GUARDIAN</div>
	
	<div id="idUsuario" class="col-sm-3">
		<?php if (isset($header['usuario'])): ?>
			<div id="idLogout text-right">
				<?= $header['usuario']['nombre'].' '.$header['usuario']['apellido1'] ?>
				<span class="glyphicon glyphicon-log-out"></span>
				<a href="<?= base_url() ?>usuario/logout">Salir</a>
			</div>
		<?php else:?>
			<span class="text-right">No has hecho login</span> 
		<?php endif;?>
	</div>
</div>
</header>
