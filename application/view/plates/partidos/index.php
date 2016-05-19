<?php $this->layout('layout') ?> 
<?php $idUsuario = Session::get('usuarioPartido'); ?>

<div class="container">	

    <?php if(count($partidos) == 0): ?>

        <p>No se encuentran Partidos Disponible</p>

    <?php else: ?>

        <h2>Disponemos de <?= count($partidos) ?> Partidos. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
				     		

		<?php if(isset($idUsuario)) : ?>		

				<a href="partidos/insertar">Crear un Nuevo Partido</a>
			
		<?php else: ?>	
				
				<login style="font-size: 18px;">
					Para inscribirse en un partido necesita:&nbsp;&nbsp;&nbsp;&nbsp;  
					<a href="login/index">Loguearse</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					<a href="registro/index">Registrarse</a>
				<login/>

		<?php endif ?>

        </h2>  

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

								<?php if (!empty($value->jugador1)) : ?>
									<b><?php echo $value->jugador1; ?></b>
								<?php elseif (!Session::get('idUsuario')) : ?>
									<a href="../login/index">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td class:"jugador3">Jugador 3: 

								<?php if (!empty($value->jugador3)) : ?>
									<b><?php echo $value->jugador3; ?></b>
								<?php elseif (!Session::get('idUsuario')) : ?>
									<a href="../login/index">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td></td>
						</tr>
						<tr>
							<td></td>

							<td class:"jugador2">Jugador 2: 

								<?php if (!empty($value->jugador2)) : ?>
									<b><?php echo $value->jugador2; ?></b>
								<?php elseif (!Session::get('idUsuario')) : ?>
									<a href="../login/index">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
							</td>

							<td class:"jugador4">Jugador 4: 

								<?php if (!empty($value->jugador4)) : ?>
									<b><?php echo $value->jugador4; ?></b>
								<?php elseif (!Session::get('idUsuario')) : ?>
									<a href="../login/index">login</a>
								<?php else : ?>									
									<a href="partidos/entrar"><b>entrar</b></a>
								<?php endif ?>
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

				<div class="idUsuario"> 

					<?php foreach ($usuarios as $usuario) : ?>

						<?php if ($usuario->idUsuario == $value->idUsuario): ?>

						<p>								
							<b>El partido lo ha creado: </b><?php echo $usuario->nombre . ' ' . $usuario->apellidos; ?>
							<?php if(isset($idUsuario)) : ?>
		
							<h4><a href="partidos/entrar">Entrar al Partido</a></h4>

							<?php endif ?>

						</p>
							
						<?php endif ?>

					<?php endforeach ?>	

				</div>

			</fieldset>	
			</div>
		
		<?php endforeach ?>
    <?php endif ?>

    <?php if ($idUsuario == 7) : ?>
		<a href="../login/index"><h4>...Volver a Administración</h4></a>
	<?php endif ?>	
</div>

