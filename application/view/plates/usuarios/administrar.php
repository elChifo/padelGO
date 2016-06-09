<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    
    <h2>ADMINISTRACIÓN DE USUARIOS</h2>

    <h4><a href="<?= URL; ?>../registro">Registrar un Nuevo Usuario</a></h4>
    
		<?php foreach($usuarios as $usuario): ?>

            <?php if ($usuario->email != 'admin@padelgo.com') : ?>

           <fieldset>
           <table border="1" class="tablapartidos">
            <tr><td>
           <ul> 
                <li> 
                	NOMBRE: <strong> <?= $usuario->nombre; ?> </strong>
                </li>
                <li> 
                	APELLIDOS: <strong> <?= $usuario->apellidos; ?> </strong>
                </li>
                <li> 
                	SEXO: <strong> <?= $usuario->sexo; ?> </strong>
                </li>
                <li> 
                	FECHA NACIMIENTO: <strong> <?= $usuario->fechaNac; ?> </strong>
                </li>
                <li> 
                	DIRECCIÓN: <strong> <?= $usuario->direccion; ?> </strong>
                </li>
                <li> 
                	TELÉFONO: <strong> <?= $usuario->telefono; ?> </strong>
                </li>
                <li> 
                	CATEGORÍA: <strong> <?= $usuario->idCategoria . ' ª Categoría'; ?> </strong>
                </li>
       		       
                <div class="imagenUsuario">
                    <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                            alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
                </div>   
        			<p>
                        <h4>
        					<a href="../usuarios/editar?idUsuario=<?= $usuario->idUsuario; ?>">
        						Editar los datos de Usuario
        					</a> &nbsp;&nbsp;&nbsp;

        			   		<a href="../usuarios/borrar?idUsuario=<?= $usuario->idUsuario; ?>">
        			   			Borrar los datos de Usuario
        			   		</a>
                        </h4>    
					</p>
        		
           </ul>
           </td></tr>
           </table>
           </fieldset>
           <?php endif ?>

        <?php endforeach ?>
        
        <a href="../login"><h4>...Volver a Administración</h4></a>
        <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a> 
</div>