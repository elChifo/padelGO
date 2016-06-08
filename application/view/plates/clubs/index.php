<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">

	<?php if(count($clubs) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Clubs en la Base de Datos</h3>

    <?php else: ?> 

        <h3 class="titulo-pagina">CLUBS</h3>  

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
		   		
		</fieldset> 

		<?php endforeach ?>

	<?php endif ?>
	<input type="button" class="btnimprimir" value="Imprimir página" onclick="window.print()">
	<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
