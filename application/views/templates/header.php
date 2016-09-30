<header>
	<span class="titulo">GUARDIAN</span>
	<div id="usuario">
		<?php if (isset($header['usuario'])): ?>
			<?= $header['usuario']['nombre'].' '.$header['usuario']['apellido1'] ?>
		<?php else:?>
			No has hecho login 
			<a href="<?= base_url() ?>usuario/login">Entrar</a>
			  
			<a href="<?= base_url() ?>usuario/registrar">Registrar</a>
		<?php endif;?>
	</div>
</header>
