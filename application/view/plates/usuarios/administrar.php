<?php $this->layout('layout') ?>


<div class="container">
    
    <h2>ADMINISTRACIÓN DE USUARIOS</h2>
    
		<?php foreach($usuarios as $value): ?>
           <fieldset>
           <ul> 
                <li> 
                	NOMBRE: <strong> <?php echo $value->nombre; ?> </strong>
                </li>
                <li> 
                	APELLIDOS: <strong> <?php echo $value->apellidos; ?> </strong>
                </li>
                <li> 
                	SEXO: <strong> <?php echo $value->sexo; ?> </strong>
                </li>
                <li> 
                	FECHA NACIMIENTO: <strong> <?php echo $value->fechaNac; ?> </strong>
                </li>
                <li> 
                	DIRECCIÓN: <strong> <?php echo $value->direccion; ?> </strong>
                </li>
                <li> 
                	TELÉFONO: <strong> <?php echo $value->telefono; ?> </strong>
                </li>
                <li> 
                	CATEGORÍA: <strong> <?php echo $value->idCategoria . ' ª Categoría'; ?> </strong>
                </li>
       		
        			<p>
    					<!-- <a href="../usuarios/editar?idUsuario=<?php echo $value->idUsuario; ?>">
    						<h3>Editar los datos de Usuario</h3>
    					</a> --> 

    			   		<a href="../usuarios/borrar?idUsuario=<?php echo $value->idUsuario; ?>">
    			   			<h3>Borrar los datos de Usuario</h3>
    			   		</a>
					</p>
        		
           </ul>
           </fieldset>

        <?php endforeach ?>
</div>