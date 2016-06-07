<?php $this->layout('layout') ?> 
<?php $idSession = Session::get('idUsuario'); ?>
<?php $usuarioPartido = Session::get('usuarioPartido'); ?>

<div class="container">	

    <?php if(count($partidos) == 0): ?>

		<h6> .</h6>
        <h3>No se encuentran Partidos Disponible</h3>

    <?php else: ?>
		<h6> .</h6>
        <h3>Disponemos de <?= count($partidos) ?> Partidos. </h3> <br>   
				     		
	<?php endif ?>

		<?php if (isset($idSession)) : ?>	

				<login style="font-size: 18px;">	
					<a href="partidos/insertar">Crear un Nuevo Partido</a>
				<login/>
				
		<?php else : ?>	
				
				<login style="font-size: 18px;">
					Para inscribirse en un partido necesita:&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="button" class="botonlogin" title="Registrarse" 
                    	onclick="window.location.href='<?= URL; ?>registro'">Registrarse
	                </button>
	                <button type="button" class="botonlogin" title="Iniciar Sesión" 
	                    onclick="window.location.href='<?= URL; ?>login'">Iniciar Sesión
	                </button>					

				<login/>

		<?php endif ?>

        </h2>  

		<?php foreach ($partidos as $partido) : ?>
			
			<div class="partido">
			<fieldset>
				<div class="idPartido">
					<p>Número de Partido: <?= $partido->idPartido; ?></p>
				</div>

				<div class="cancha">
					<table border="1" class="tablapartidos">
						<tr>
							<td><img src="img/iconojugador.png" alt="iconojugador"></td>

							<td class:"jugador1">Jugador 1: 

								<?php if (!empty($partido->jugador1)) : ?>
									<b><?= $partido->jugador1; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td class:"jugador3">Jugador 3: 

								<?php if (!empty($partido->jugador3)) : ?>
									<b><?= $partido->jugador3; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td><img src="img/iconojugador.png" alt="iconojugador"></td>
						</tr>
						<tr>
							<td><img src="img/iconojugador.png" alt="iconojugador"></td>

							<td class:"jugador2">Jugador 2: 

								<?php if (!empty($partido->jugador2)) : ?>
									<b><?= $partido->jugador2; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td class:"jugador4">Jugador 4: 

								<?php if (!empty($partido->jugador4)) : ?>
									<b><?= $partido->jugador4; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td><img src="img/iconojugador.png" alt="iconojugador"></td>					
						</tr>					
					</table>				
				</div>
<br />
<h3>Datos del Partido</h3>

				<div class="datosPartido">
				<table border="1" class="tablapartidos">
				<tr><td>
					<ul>
						<li class="tipoPartido">Tipo de Partido: 
							<?= $partido->tipoPartido; ?>
						</li>
					
						<li class="fechaPartido">Fecha del Partido: 
							<?= $partido->fechaPartido; ?>
						</li>

						<li class="horaPartido">Hora del Partido: 
							<?= $partido->horaPartido; ?>
						</li>
					</ul>
					</td></tr>
					</table>
				</div>

<h3>Datos del Club</h3>
				<div class="datosClub">
				<table border="1" class="tablapartidos">
				<tr><td>
					<?php foreach ($clubs as $club) : ?>
					
					<?php if($club->idClub == $partido->idClub): ?>

						<ul>
							<li class="nombreClub">Nombre del Club: 
								<?= $club->nombreClub; ?>
							</li>

							<li class="direcciónClub">Dirección del Club: 
								<?= $club->direccionClub; ?>
							</li>
						</ul>        			
					
	    			<?php endif ?>	
					
					<?php endforeach ?>
					</td></tr>
					</table>
				</div>

				<div class="idUsuario"> 

					<?php foreach ($usuarios as $usuario) : ?>

						<?php if ($usuario->idUsuario == $usuarioPartido) : ?>

						<p>								
							<b>El partido lo ha creado: </b><?= $usuario->nombre . ' ' . $usuario->apellidos; ?>

							<?php if(isset($idSession)) : ?>
		
							<h4><a href="partidos/entrar">Entrar al Partido</a></h4>

							<?php endif ?>

						</p>
							
						<?php endif ?>

					<?php endforeach ?>	

				</div>

			</fieldset>	
			</div>
		
		<?php endforeach ?>
    

    <?php if ($idSession == 1) : ?>
		<a href="../login/index"><h4>...Volver a Administración</h4></a>
	<?php endif ?>	
</div>

