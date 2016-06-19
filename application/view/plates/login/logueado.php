<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>
    <br>
    <div class="registro">
	    <h3>LOGIN CORRECTO</h3>

		<?php if ($usuario->sexo == 'Hombre') : ?>
		    <p>
		    	Bienvenido al sistema, <b><?= $usuario->nombre; ?></b>
		    </p>
		<?php else : ?>
			<p>
				Bienvenida al sistema, <b><?= $usuario->nombre; ?></b>
			</p>
		<?php endif ?>
						
			<h4> SUS DATOS:	</h4> 
				<ul>
					<li>NOMBRE:  <b><?= $usuario->nombre; ?></b> </li>
					<li>APELLIDOS:  <b><?= $usuario->apellidos; ?></b> </li>
					<li>SEXO:  <b><?= $usuario->sexo; ?></b> </li>
					<li>FECHA NACIMIENTO:  <b><?= $usuario->fechaNac; ?></b> </li>
					<li>DIRECCIÓN:  <b><?= $usuario->direccion; ?></b> </li>
					<li>TELÉFONO:  <b><?= $usuario->telefono; ?></b> </li>
					<li>EMAIL:  <b><?= $usuario->email; ?></b> </li>	
					<li>CATEGORÍA:  <b><?= $usuario->idCategoria . "ª Categoría"; ?></b> </li>	
				</ul>	
				
				<div class="imagenUsuario">
					<img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
					alt="usuario<?= $usuario->idUsuario; ?>" height="100" />	
				</div>

		<h4> 
            ACCIONES:
        </h4> 
		<h5>
			<button onclick="window.location.href='../usuarios/editar'" class="btnbutton1">Editar datos de Usuario</button>&nbsp;&nbsp;&nbsp;
			<button onclick="window.location.href='../usuarios/cancelacion'" class="btnbutton1">Solicitar cancelación de la Cuenta</button>&nbsp;&nbsp;&nbsp;
			<button onclick="window.location.href='../monitores/solicitar'" class="btnbutton1">Ofrecerse como Monitor</button>&nbsp;&nbsp;&nbsp;
			<button onclick="window.location.href='../login/articulos'" class="btnbutton1">Artículos del Mercadillo</button>&nbsp;&nbsp;&nbsp;
			<button onclick="window.location.href='../mensajes/index'" class="btnbutton1">Mensajes</button>
	    </h5> 
	</div>
	<br>
</div>