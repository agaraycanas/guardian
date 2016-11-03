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
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrador<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">ASIGNATURA</li>
					<li><a href="<?=base_url()?>asignatura/crear">Nueva</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">OTRO BEAN</li>
					<li><a href="<?=base_url()?>bean/accion">Otra accion</a></li>
				</ul>
			</li>

			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Jefe de estudios<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li class="dropdown-header">PROFESOR</li>
					<li><a href="<?=base_url()?>usuario/registrar">Nuevo</a></li>
					<li><a href="<?=base_url()?>usuario/listar">Listar</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">CURSO</li>
					<li><a href="<?=base_url()?>curso/crear">Nuevo</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">SLOT</li>
					<li><a href="<?=base_url()?>slot/crear">Nuevo</a></li>
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
