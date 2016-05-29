<?php $this->layout('layout') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenido a la Página de Administración, 
    	<?= Session::get('nombre') ?> <?= Session::get('apellidos') ?>        
    </p>                 

    <h4> 
        SUS DATOS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../usuarios/editar?idUsuario=<?php echo $usuario->idUsuario; ?>"> 
            Editar 
        </a> 

    </h4> 
        
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
                alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
    </div>

	<p>
        <h4>
            <a href="../usuarios/administrar">Administrar Usuarios</a>
            &nbsp;&nbsp;&nbsp;
            <a href="../clubs/administrar">Administrar Clubs</a> 
            &nbsp;&nbsp;&nbsp;
            <a href="../noticias/administrar">Administrar Noticias</a> 

        </h4>    
    </p>

	<!-- <p>
    <a href="/clubs/privado"><h3>Editar Un Club</h3></a>

    <a href="/actividades/privado"><h3>Editar Una Actividad</h3></a>
	</p> -->

</div>