<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?> 
  <?php $usuarioPartido = Session::get('usuarioPartido'); ?>

<div class="container">	

    <?php if(count($partidos) == 0): ?>

       <h3 class="titulo-pagina">No se encuentran Partidos Disponible</h3>

    <?php else: ?>

        <h3 class="titulo-pagina">PARTIDOS  

			<?php if (isset($idSession)) : ?>	

				<login style="font-size: 18px;">	
					<a href="partidos/insertar">Crear un Nuevo Partido</a>
				<login/>	

		<?php endif ?>

        </h3> 
		<br>	

		<?php foreach ($partidos as $partido) : ?>
			
			<div class="partido">
			<fieldset>
				<div class="partido" style="border: 2px double green; padding: 1rem; width: 55%;">

				<div class="idPartido">				
				<h3>Partido Nº <?= $partido->idPartido; ?></h3>

				<table border="1" class="tablapartidos">

				<tr><td>
				<span></span>
					<ul>						
						</li>
						<li class="tipoPartido">Tipo de Partido: <?= $partido->tipoPartido; ?>
						</li>					
						<li class="fechaPartido">Fecha del Partido: <?= $partido->fechaPartido; ?>
						</li>
						<li class="horaPartido">Hora del Partido: <?= $partido->horaPartido; ?>
						</li>
					</ul>

					<div class="idUsuario"> 

					<?php foreach ($usuarios as $usuario) : ?>

						<?php if ($usuario->idUsuario == $usuarioPartido) : ?>

						<p>								
							<b>El partido lo ha creado: </b>
							<?= $usuario->nombre . ' ' . $usuario->apellidos; ?>
						</p>
							
						<?php endif ?>

					<?php endforeach ?>	

					</div>
					</td></tr>
					</table>

					<div class="cancha" style="margin-left: 0;">
					<table border="1" class="tablapartidos">
						<tr>
							<td><img src="<?= URL; ?>img/iconojugador.png" alt="iconojugador"></td>

							<td class:"jugador1">Jugador 1: 

								<?php if (!empty($partido->jugador1)) : ?>
									<b><?= $partido->jugador1; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="../partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td class:"jugador3">Jugador 3: 

								<?php if (!empty($partido->jugador3)) : ?>
									<b><?= $partido->jugador3; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="../partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td><img src="<?= URL; ?>img/iconojugador.png" alt="iconojugador"></td>
						</tr>
						<tr>
							<td><img src="<?= URL; ?>img/iconojugador.png" alt="iconojugador"></td>

							<td class:"jugador2">Jugador 2: 

								<?php if (!empty($partido->jugador2)) : ?>
									<b><?= $partido->jugador2; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="../partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td class:"jugador4">Jugador 4: 

								<?php if (!empty($partido->jugador4)) : ?>
									<b><?= $partido->jugador4; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="../partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td><img src="<?= URL; ?>img/iconojugador.png" alt="iconojugador"></td>					
						</tr>					
					</table>				
				</div>
			</div>

				<div class="datosClub">				
				<table border="1" class="tablapartidos">
				<tr><td>
					<?php foreach ($clubs as $club) : ?>
					
					<?php if($club->idClub == $partido->idClub): ?>
						
						<h3>CLUB: <?= $club->nombreClub; ?></h3>

						<span>Dirección del Club: <?= $club->direccionClub; ?> </span>	

	    			<?php endif ?>	
					
					<?php endforeach ?>
					</td></tr>
					</table>
				</div>

			</fieldset>	
			</div>
		
		<?php endforeach ?>
	 		
	<?php endif ?>
	<input type="button" class="btnimprimir" value="Imprimir página" onclick="window.print()">
	<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>

