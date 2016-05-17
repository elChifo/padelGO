<?php $this->layout('layout') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenid@ al sistema, 
    	<?= Session::get('nombre') ?> <?= Session::get('apellidos') ?>
    </p>
	</br>					

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
			
	<p>
    <a href="../usuarios/editar">
    	<h3>Editar los datos de Usuario</h3>
    </a>
	</p>


</div>