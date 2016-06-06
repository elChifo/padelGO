<?php $this->layout('layout') ?>
<?php $this->insert('partials/feedback') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenido a la Página de Administración, 
    	<?= $usuario->nombre; ?> <?= $usuario->apellidos; ?>        
    </p>                 

    <h4> 
        SUS DATOS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../usuarios/editar?idUsuario=<?= $usuario->idUsuario; ?>"> 
            Editar 
        </a> 

    </h4> 
        
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

    <h4>
        <a href="../usuarios/administrar">Administrar Usuarios</a>
        &nbsp;&nbsp;&nbsp;
        <a href="../clubs/administrar">Administrar Clubs</a> 
        &nbsp;&nbsp;&nbsp;
        <a href="../noticias/administrar">Administrar Noticias</a> 
    </h4> 

    <h3>
        <a href="../login/articulos" style="color:red !important;">Ver tus artículos del Mercadillo</a>
        &nbsp;&nbsp;&nbsp;
        <a href="../mensajes/index" style="color:orange !important;">Ver Mensajes</a> 
    </h3> 

</div>