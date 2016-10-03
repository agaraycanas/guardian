<header>
	<div id="idIES">
		<?php if (isset($header['ies'])): ?>
			IES <?= $header['ies']['nombre']?>
		<?php else:?>
			Haz login para escoger IES 
		<?php endif;?>
	</div>
	
	<div id="idLogo">GUARDIAN</div>
	
	<div id="idUsuario">
		<?php if (isset($header['usuario'])): ?>
			<?= $header['usuario']['nombre'].' '.$header['usuario']['apellido1'] ?>
			<div id="idLogout">
				<a href="<?= base_url() ?>usuario/logout">Salir</a>
			</div>
		<?php else:?>
			No has hecho login 
			<a href="<?= base_url() ?>usuario/login">Entrar</a>
			  
			<a href="<?= base_url() ?>usuario/registrar">Registrar</a>
		<?php endif;?>
	</div>
</header>
