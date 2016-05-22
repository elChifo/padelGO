<?php $this->layout('layout') ?>


<div class="container">
    
    <h2>ADMINISTRACIÓN DE CLUBS</h2>

    <h4><a href="<?php echo URL; ?>../clubs/insertar">Registrar un Nuevo Club</a></h4>
    
	<?php foreach($clubs as $club): ?>

       <fieldset>
       <ul> 
            <li> 
                    Nombre Club: <strong> <?php echo $club->nombreClub ?> </strong>  
                <ul>                            
                        <li> Direccion : <?php echo $club->direccionClub ?>  </li>
                        <li> Nº Pistas: <?php echo $club->numPistas ?>  </li>                      
                </ul> 
            </li>
   		
    			<p>
                    <h4>
    					<a href="../clubs/editar?idClub=<?php echo $club->idClub; ?>">
    						Editar los datos de Club
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../clubs/borrar?idClub=<?php echo $club->idClub; ?>">
    			   			Borrar los datos de Club
    			   		</a>
                    </h4>
				</p>
    		
       </ul>
       </fieldset>
    <?php endforeach ?>

    <a href="../login/index"><h4>...Volver a Administración</h4></a>
</div>