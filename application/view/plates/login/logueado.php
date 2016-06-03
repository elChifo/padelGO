<?php $this->layout('layout') ?>  
<?php $this->insert('partials/feedback') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>

	<?php if ($usuario->sexo == 'Hombre') : ?>
	    <p>
	    	Bienvenido al sistema, <?= $usuario->nombre; ?>
	    </p>
	<?php else : ?>
		<p>
			Bienvenida al sistema, <?= $usuario->nombre; ?>
		</p>
	<?php endif ?>
					
		<h3> SUS DATOS:	</h3> 
			<ul>
				<li>NOMBRE:  <?= $usuario->nombre; ?> </li>
				<li>APELLIDOS:  <?= $usuario->apellidos; ?> </li>
				<li>SEXO:  <?= $usuario->sexo; ?> </li>
				<li>FECHA NACIMIENTO:  <?= $usuario->fechaNac; ?> </li>
				<li>DIRECCIÓN:  <?= $usuario->direccion; ?> </li>
				<li>TELÉFONO:  <?= $usuario->telefono; ?> </li>
				<li>EMAIL:  <?= $usuario->email; ?> </li>	
				<li>CATEGORÍA:  <?= $usuario->idCategoria . "ª Categoría"; ?> </li>	
			</ul>	
			
			<div class="imagenUsuario">
				<img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
				alt="usuario<?= $usuario->idUsuario; ?>" height="100" />	
			</div>

	<p>
    <a href="../usuarios/editar"> 
    	<h3>Editar los datos de Usuario</h3>
    </a>
	</p>
	<p>
    <a href="../usuarios/cancelacion"> 
    	<h3>Solicitar Cancelación de la Cuenta</h3>
    </a>
	</p>


	<p>
    <a href="../login/articulos" style="color:red !important;"> 
    	<h3>Ver tus artículos del Mercadillo</h3>
    </a>
	</p>


</div>