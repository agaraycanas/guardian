<nav class="container navbar navbar-inverse">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span> <span class="icon-bar"></span> 
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?=base_url()?>">GUARDIAN</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuario<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?=base_url()?>usuario/registrar">Nuevo</a></li>
					<li><a href="<?=base_url()?>usuario/modificar">Modificar</a></li>
				</ul>
			</li>
			<li><a href="#">Page 2</a></li>
			<li><a href="#">Page 3</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="<?= base_url() ?>usuario/registrar">
				<span class="glyphicon glyphicon-user"></span>
				Registrar</a>
			</li>
			<li>
				<a href="<?= base_url() ?>usuario/login">
				<span class="glyphicon glyphicon-log-in"></span>
				Login</a>
			</li>
		</ul>
	</div>

</nav>
