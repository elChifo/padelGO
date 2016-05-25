<?php $this->layout('layout') ?>  
<?php if (Session::get('idUsuario')) { Session::delete('feedback_negative');} ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>

	<?php if ($usuario->sexo == 'Hombre') : ?>
	    <p>
	    	Bienvenido al sistema, <?php echo $usuario->nombre; ?>
	    </p>
	<?php else : ?>
		<p>
			Bienvenida al sistema, <?php echo $usuario->nombre; ?>
		</p>
	<?php endif ?>
					
		<h3> SUS DATOS:	</h3> 
			<ul>
				<li>NOMBRE:  <?php echo $usuario->nombre; ?> </li>
				<li>APELLIDOS:  <?php echo $usuario->apellidos; ?> </li>
				<li>SEXO:  <?php echo $usuario->sexo; ?> </li>
				<li>FECHA NACIMIENTO:  <?php echo $usuario->fechaNac; ?> </li>
				<li>DIRECCIÓN:  <?php echo $usuario->direccion; ?> </li>
				<li>TELÉFONO:  <?php echo $usuario->telefono; ?> </li>
				<li>EMAIL:  <?php echo $usuario->email; ?> </li>	
				<li>CATEGORÍA:  <?php echo $usuario->idCategoria . "ª Categoría"; ?> </li>	
			</ul>	
			
			<div class="imagenUsuario">
				<img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
				alt="usuario<?= $usuario->idUsuario; ?>" height="25" />	
			</div>

	<p>
    <a href="../usuarios/editar"> 
    	<h3>Editar los datos de Usuario</h3>
    </a>
	</p>


</div>