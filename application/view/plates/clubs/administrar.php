<?php $this->layout('layout') ?>


<div class="container">
    
    <h2>ADMINISTRACIÓN DE CLUBS</h2>

    <h4><a href="<?= URL; ?>../clubs/insertar">Registrar un Nuevo Club</a></h4>
    
	<?php foreach($clubs as $club): ?>

       <fieldset>
       <ul> 
            <li> 
                    Nombre Club: <strong> <?= $club->nombreClub ?> </strong>  
                <ul>                            
                        <li> Direccion : <?= $club->direccionClub ?>  </li>
                        <li> Nº Pistas: <?= $club->numPistas ?>  </li>                      
                </ul> 
            </li>
   		
    			<p>
                    <h4>
    					<a href="../clubs/editar?idClub=<?= $club->idClub; ?>">
    						Editar los datos de Club
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../clubs/borrar?idClub=<?= $club->idClub; ?>">
    			   			Borrar los datos de Club
    			   		</a>
                    </h4>
				</p>
    		
       </ul>
       </fieldset>
    <?php endforeach ?>

    <a href="../login/index"><h4>...Volver a Administración</h4></a>
</div>