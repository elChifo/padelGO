<?php $this->layout('layout') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenido a la Página de Administración, 
    	<?= Session::get('nombre') ?> <?= Session::get('apellidos') ?>
        <a href="../usuarios/editar?idUsuario=<?php echo $usuario->idUsuario; ?>"> 
            <h3>Editar los datos de Usuario</h3>
        </a>
    </p>
    
    </br>                   

        <h3> SUS DATOS: </h3> 
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
        <a href="../clubs/insertar"><h3>Registrar Un Club</h3></a>    
        <a href="../usuarios/administrar"><h3>Administrar Usuarios</h3></a>
    </p>

	<!-- <p>
    <a href="/clubs/privado"><h3>Editar Un Club</h3></a>

    <a href="/actividades/privado"><h3>Editar Una Actividad</h3></a>
	</p> -->

</div>