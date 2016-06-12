<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?> 
  <?php $usuarioPartido = Session::get('usuarioPartido'); ?>

<div class="container">	    

        <h3 class="titulo-pagina">ADMINISTRACIÓN DE PARTIDOS &nbsp;&nbsp;&nbsp;  

				<login style="font-size: 18px;">	
					<a href="../partidos/insertar">Registrar un Nuevo Partido</a>
				<login/>	
        </h3> 
		<br>	

		<?php foreach ($partidos as $partido) : ?>
			
			<div class="partido">
			<fieldset>
				<div class="partido" style=" width: 55%; border: solid 1px #c5f619; padding-left: 1rem;">

				<div class="idPartido">				
				<h3>Partido Nº <?= $partido->idPartido; ?></h3>

				<?php foreach ($categorias as $categoria) : ?>
					
					<?php if($categoria->idCategoria == $partido->idCategoria): ?>
				
					<b>CATEGORÍA DEL PARTIDO:</b> <?= $categoria->nombreCategoria; ?>

    				<?php endif ?>	
				
				<?php endforeach ?> <br><br>

				<table class="tablapartidos">

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

						<?php if ($usuario->idUsuario == $partido->idUsuario) : ?>

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
					<table class="pista" height="300" width="600">
						<tr>
							<?php if ($partido->tipoPartido == "Masculino") : ?>
								<td><img class="hombreIzq" title="Plaza Masculina" src="<?= URL; ?>img/hombre1.png" height="75"></td>
							<?php elseif ($partido->tipoPartido == "Mixto") : ?>
								<td><img class="hombreIzq" title="Plaza Masculina" src="<?= URL; ?>img/hombre1.png" height="75"></td>
							<?php else : ?>	
								<td><img class="hombreIzq" title="Plaza Femenina" src="<?= URL; ?>img/mujer1.png" height="75"></td>
							<?php endif ?>

							<td class="jugador1">Jugador 1: 

								<?php if (!empty($partido->jugador1)) : ?>
									<b><?= $partido->jugador1; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" href="../partidos/entrar?idPartido=<?= $partido->idPartido; ?>">
									<b>Entrar</b></a>
								<?php endif ?>
							</td>

							<td class="jugador3">Jugador 3: 

								<?php if (!empty($partido->jugador3)) : ?>
									<b><?= $partido->jugador3; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" href="../partidos/entrar?idPartido=<?= $partido->idPartido; ?>">
									<b>Entrar</b></a>
								<?php endif ?>
							</td>
							<?php if ($partido->tipoPartido == "Masculino") : ?>
								<td><img class="hombreDer" title="Plaza Masculina" src="<?= URL; ?>img/hombre2.png" height="75"></td>
							<?php elseif ($partido->tipoPartido == "Mixto") : ?>
								<td><img class="hombreDer" title="Plaza Femenina" src="<?= URL; ?>img/mujer2.png" height="75"></td>	
							<?php else : ?>	
								<td><img class="hombreDer" title="Plaza Femenina" src="<?= URL; ?>img/mujer2.png" height="75"></td>
							<?php endif ?>
						</tr>
						<tr>
							<?php if ($partido->tipoPartido == "Masculino") : ?>
								<td><img class="hombreIzq" title="Plaza Masculina" src="<?= URL; ?>img/hombre1.png" height="75"></td>
							<?php elseif ($partido->tipoPartido == "Mixto") : ?>
								<td><img class="hombreIzq" title="Plaza Femenina" src="<?= URL; ?>img/mujer1.png" height="75"></td>
							<?php else : ?>	
								<td><img class="hombreIzq" title="Plaza Femenina" src="<?= URL; ?>img/mujer1.png" height="75"></td>
							<?php endif ?>

							<td class="jugador2">Jugador 2: 

								<?php if (!empty($partido->jugador2)) : ?>
									<b><?= $partido->jugador2; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" href="../partidos/entrar?idPartido=<?= $partido->idPartido; ?>">
									<b>Entrar</b></a>
								<?php endif ?>
							</td>

							<td class="jugador4">Jugador 4: 

								<?php if (!empty($partido->jugador4)) : ?>
									<b><?= $partido->jugador4; ?></b>
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" href="../partidos/entrar?idPartido=<?= $partido->idPartido; ?>">
									<b>Entrar</b></a>
								<?php endif ?> 
							</td>

							<?php if ($partido->tipoPartido == "Masculino") : ?>
								<td><img class="hombreDer" title="Plaza Masculina" src="<?= URL; ?>img/hombre2.png" height="75"></td>
							<?php elseif ($partido->tipoPartido == "Mixto") : ?>
								<td><img class="hombreDer" title="Plaza Masculina" src="<?= URL; ?>img/hombre2.png" height="75"></td>	
							<?php else : ?>	
								<td><img class="hombreDer" title="Plaza Femenina" src="<?= URL; ?>img/mujer2.png" height="75"></td>
							<?php endif ?>		
						</tr>					
					</table>				
				</div>
			</div>

				<div class="datosClub">				
				<table class="tablapartidos">
				<tr><td>
					<?php foreach ($clubs as $club) : ?>
					
					<?php if($club->idClub == $partido->idClub): ?>
						
						<h3>CLUB: <?= $club->nombreClub; ?></h3>

						<span>Dirección del Club: <?= $club->direccionClub; ?> </span>	

	    			<?php endif ?>	
					
					<?php endforeach ?>
					<p>
                    <h4>
    					<a href="../partidos/editar?idPartido=<?= $partido->idPartido; ?>">
    						Editar el Partido
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../partidos/borrar?idPartido=<?= $partido->idPartido; ?>"
                        onclick="return confirm('&#191;Confirmar borrado?')">
    			   			Borrar el Partido
    			   		</a>
                    </h4>
				</p>
					</td></tr>
					</table>
				</div>

			</fieldset>	
			</div>
		
		<?php endforeach ?>
	 		
	
	<br />
	<input type="button" class="btnimprimir" value="Imprimir página" onclick="window.print()">
	<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>

