<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    
    <h3 class="titulo-pagina">ADMINISTRACIÓN DE CLUBS &nbsp;&nbsp;&nbsp;  

                <login style="font-size: 18px;">    
                    <a href="../clubs/insertar">Registrar un Nuevo Club</a>
                <login/>    
    </h3>
    
	<?php foreach($clubs as $club): ?>

       <fieldset style="border: 2px solid navy; width: 100rem; padding: 1rem;">
       <table border="1" class="tablapartidos">
                <tr>
                    <td>
                        <ul> 
                            <li> Nombre Club:
                                <strong> 
                                    <?= $club->nombreClub ?> &nbsp;&nbsp;&nbsp; 
                                    
                                </strong> 
                                <ul>                            
                                    <li> Direccion : <?= $club->direccionClub ?>  </li>
                                    <li> Nº Pistas: <?= $club->numPistas ?>  </li>                      
                                </ul> 
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="../partidos/ver?idClub=<?= $club->idClub; ?>">Ver Partidos</a>
                    </td>
                </tr>
            </table>

            <div class="imagenClub">
                <img src="<?= URL; ?>img/clubs/club<?= $club->idClub; ?>.png" 
                alt="club<?= $club->idClub; ?>" height="150" /> 
            </div>
   		
    			<p>
                    <h4>
    					<a href="../clubs/editar?idClub=<?= $club->idClub; ?>">
    						Editar los datos de Club
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../clubs/borrar?idClub=<?= $club->idClub; ?>"
                        onclick="return confirm('&#191;Confirmar borrado?')">
    			   			Borrar los datos de Club
    			   		</a>
                        
                    </h4>
				</p>    	
       </fieldset>
    <?php endforeach ?>

    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a> 
    <a href="../login/index"><h4>...Volver a Administración</h4></a>
</div>