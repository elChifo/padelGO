<?php $this->layout('layout') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenid@ al sistema, 
    	<?= Session::get('nombre') ?> <?= Session::get('apellidos') ?>
    </p>
	</br>		

		<?php foreach($usuarios as $value): ?>			

			<?php if($value->idUsuario == Session::get('idUsuario')): ?>

					<h3> SUS DATOS:	</h3> 
						<ul>
							<li>NOMBRE:  <?php echo $value->nombre; ?> </li>
							<li>APELLIDOS:  <?php echo $value->apellidos; ?> </li>
							<li>SEXO:  <?php echo $value->sexo; ?> </li>
							<li>FECHA NACIMIENTO:  <?php echo $value->fechaNac; ?> </li>
							<li>DIRECCIÓN:  <?php echo $value->direccion; ?> </li>
							<li>TELÉFONO:  <?php echo $value->telefono; ?> </li>
							<li>EMAIL:  <?php echo $value->email; ?> </li>	
							<li>CATEGORÍA:  <?php echo $value->idCategoria . "ª Categoría"; ?> </li>	
						</ul>	
			
			<?php endif ?>	

		<?php endforeach ?>

	<p>
    <a href="../usuarios/editar"><h3>Editar los datos de Usuario</h3></a>

    <a href="../usuarios/borrar"><h3>Borrar los datos de Usuario</h3></a>
	</p>


</div>