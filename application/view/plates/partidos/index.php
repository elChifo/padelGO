<?php $this->layout('layout') ?>

<div class="container">

	<div class="nuevoPartido">
		<a href="partidos/insertar"><h2>Crear un Nuevo Partido</h2></a><br>
	</div>

    <?php if(count($partidos) == 0): ?>

        <p>No se encuentran Partidos Disponible</p>

    <?php else: ?>

        <h2>Disponemos de <?= count($partidos) ?> Partidos disponibles.</h2>  

		<?php foreach($partidos as $value) : ?>
			
			<div class="partido">
			<fieldset>
				<div class="idPartido">
					<p>Número de Partido: <?php echo $value->idPartido; ?></p>
				</div>

				<div class="cancha">
					<table border="1">
						<tr>
							<td></td>

							<td class:"jugador1">Jugador 1: 
								<?php echo $value->jugador1; ?>
							</td>

							<td class:"jugador3">Jugador 3: 
								<?php echo $value->jugador3; ?>
							</td>

							<td></td>
						</tr>
						<tr>
							<td></td>

							<td class:"jugador2">Jugador 2: 
								<?php echo $value->jugador2; ?>
							</td>

							<td class:"jugador4">Jugador 4: 
								<?php echo $value->jugador4; ?>
							</td>

							<td></td>					
						</tr>					
					</table>				
				</div>

				<div class="datosPartido">
					<ul>
						<li class="tipoPartido">Tipo de Partido: 
							<?php echo $value->tipoPartido; ?>
						</li>

						<li class="fechaPartido">Fecha del Partido: 
							<?php echo $value->fechaPartido; ?>
						</li>

						<li class="horaPartido">Hora del Partido: 
							<?php echo $value->horaPartido; ?>
						</li>
					</ul>
				</div>

				<div class="datosClub">
					<?php foreach ($clubs as $datos) : ?>
					
					<?php if($datos->idClub == $value->idClub): ?>

						<ul>
							<li class="nombreClub">Nombre del Club: 
								<?php echo $datos->nombreClub; ?>
							</li>

							<li class="direcciónClub">Dirección del Club: 
								<?php echo $datos->direccionClub; ?>
							</li>
						</ul>        			

	    			<?php endif ?>	
					
					<?php endforeach ?>
				</div>
			</fieldset>	
			</div>
		
		<?php endforeach ?>
    <?php endif ?>
</div>

