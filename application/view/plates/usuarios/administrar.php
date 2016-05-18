<?php $this->layout('layout') ?>


<div class="container">
    
    <h2>ADMINISTRACIÓN DE USUARIOS</h2>
    
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
       		
        			<p>
    					<a href="../usuarios/editar?idUsuario=<?php echo $usuario->idUsuario; ?>">
    						<h3>Editar los datos de Usuario</h3>
    					</a> 

    			   		<a href="../usuarios/borrar?idUsuario=<?php echo $usuario->idUsuario; ?>">
    			   			<h3>Borrar los datos de Usuario</h3>
    			   		</a>
					</p>
        		
           </ul>
           </fieldset>
           <?php endif ?>

        <?php endforeach ?>
</div>