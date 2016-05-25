<?php $this->layout('layout') ?>


<div class="container">
    
    <h2>ADMINISTRACIÓN DE USUARIOS</h2>

    <h4><a href="<?php echo URL; ?>../registro">Registrar un Nuevo Usuario</a></h4>
    
		<?php foreach($usuarios as $usuario): ?>

            <?php if ($usuario->email != 'admin@admin.com') : ?>

           <fieldset>
           <ul> 
                <li> 
                	NOMBRE: <strong> <?php echo $usuario->nombre; ?> </strong>
                </li>
                <li> 
                	APELLIDOS: <strong> <?php echo $usuario->apellidos; ?> </strong>
                </li>
                <li> 
                	SEXO: <strong> <?php echo $usuario->sexo; ?> </strong>
                </li>
                <li> 
                	FECHA NACIMIENTO: <strong> <?php echo $usuario->fechaNac; ?> </strong>
                </li>
                <li> 
                	DIRECCIÓN: <strong> <?php echo $usuario->direccion; ?> </strong>
                </li>
                <li> 
                	TELÉFONO: <strong> <?php echo $usuario->telefono; ?> </strong>
                </li>
                <li> 
                	CATEGORÍA: <strong> <?php echo $usuario->idCategoria . ' ª Categoría'; ?> </strong>
                </li>
       		       
                <div class="imagenUsuario">
                    <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                            alt="usuario<?= $usuario->idUsuario; ?>" height="25" /> 
                </div>   
        			<p>
                        <h4>
        					<a href="../usuarios/editar?idUsuario=<?php echo $usuario->idUsuario; ?>">
        						Editar los datos de Usuario
        					</a> &nbsp;&nbsp;&nbsp;

        			   		<a href="../usuarios/borrar?idUsuario=<?php echo $usuario->idUsuario; ?>">
        			   			Borrar los datos de Usuario
        			   		</a>
                        </h4>    
					</p>
        		
           </ul>
           </fieldset>
           <?php endif ?>

        <?php endforeach ?>
        
        <a href="../login"><h4>...Volver a Administración</h4></a>
</div>