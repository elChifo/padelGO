<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?> 
  <?php $usuarioPartido = Session::get('usuarioPartido'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">	    

        <h3 class="titulo-pagina">ADMINISTRACIÓN DE PARTIDOS &nbsp;&nbsp;&nbsp;  

				<login style="font-size: 18px;">	
					<a href="../partidos/insertar" style="font-size: 18px; float:right;" class="colorPadelGO2">+ Registrar un Nuevo Partido</a>
				<login/>	
        </h3> 
		<br>	

		<?php foreach ($partidos as $partido) : ?>
			
			<fieldset>
				<div class="partido" style="width: 85%;">

				<div class="idPartido">
				<div class="datosClub">				
				<table class="tablapartidos">
				<tr><td>
					<?php foreach ($clubs as $club) : ?>
					
					<?php if($club->idClub == $partido->idClub): ?>
						
						<h3>Club : <b><?= $club->nombreClub; ?></b></h3>

	    			<?php endif ?>	
					
					<?php endforeach ?>
					</td></tr>
					</table>
				</div>	

				<?php foreach ($categorias as $categoria) : ?>
					
					<?php if($categoria->idCategoria == $partido->idCategoria): ?>
				
					Nivel:
					<?php if ($categoria->nombreCategoria == 'Primera') : ?>
						<font style="color:#1a33e5; font-size: 150%;"><b>1ª Categoría</b></font>
					<?php elseif ($categoria->nombreCategoria == 'Segunda') : ?>	
						<font style="color:#1d1d1d; font-size: 150%;"><b>2ª Categoría</b></font>
					<?php elseif ($categoria->nombreCategoria == 'Tercera') : ?>	
						<font style="color:#941694; font-size: 150%;"><b>3ª Categoría</b></font>
					<?php elseif ($categoria->nombreCategoria == 'Cuarta') : ?>	
						<font style="color:#7e453c; font-size: 150%;"><b>4ª Categoría</b></font>
					<?php else : ?>		
						<font style="color:#105f1a; font-size: 150%;"><b>5ª Categoría</b></font>
					<?php endif ?>

    				<?php endif ?>	
				
				<?php endforeach ?> <br>

				<table class="tablapartidos">

				<tr><td>
				<span></span>					
						
						<p>Tipo de Partido: <b><?= $partido->tipoPartido; ?></b></p>
											
						<p><img src="<?= URL; ?>img/fecha.png" alt="CLUBS" height="20" /> <b><?= $partido->fechaPartido; ?></b></p>
						
						<p><img src="<?= URL; ?>img/hora.png" alt="CLUBS" height="20" /> <b><?= $partido->horaPartido; ?></b></p>

					<div class="idUsuario"> 

					<?php foreach ($usuarios as $usuario) : ?>

						<?php if ($usuario->idUsuario == $partido->idUsuario) : ?>

						<p>								
							Creado por: 
							<b><?= $usuario->nombre . ' ' . $usuario->apellidos; ?></b>
						</p>
							
						<?php endif ?>

					<?php endforeach ?>

					</div>
					</td></tr>
					</table>
							
					<div class="cancha">
					<?php if ($partido->idCategoria == '1') : ?>
						<table class="pista1" height="300" width="600">
					<?php elseif ($partido->idCategoria == '2') : ?>	
						<table class="pista2" height="300" width="600">
					<?php elseif ($partido->idCategoria == '3') : ?>	
						<table class="pista3" height="300" width="600">
					<?php elseif ($partido->idCategoria == '4') : ?>	
						<table class="pista4" height="300" width="600">	
					<?php else : ?>		
						<table class="pista5" height="300" width="600">	
					<?php endif ?>

						<tr>
							<?php if ($partido->tipoPartido == "Masculino") : ?>
								<td><img class="hombreIzq" title="Plaza Masculina" src="<?= URL; ?>img/hombre1.png" height="75"></td>
							<?php elseif ($partido->tipoPartido == "Mixto") : ?>
								<td><img class="hombreIzq" title="Plaza Masculina" src="<?= URL; ?>img/hombre1.png" height="75"></td>
							<?php else : ?>	
								<td><img class="hombreIzq" title="Plaza Femenina" src="<?= URL; ?>img/mujer1.png" height="75"></td>
							<?php endif ?>

							<td class="jugador1">Jugador 1: <br>

								<?php if (!empty($partido->jugador1)) : ?>

									<?php foreach ($usuarios as $usuario) : ?>

										<?php if ($usuario->idUsuario == $partido->jugador1) : ?>
							
											<?php if ($usuario->sexo == 'Hombre'): ?>

											<b style="color: #66ccff; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>

											<?php else : ?>

											<b style="color: #ff99cc; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>
												
											<?php endif ?>
																					
										<?php endif ?>

									<?php endforeach ?>	
									
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" 

					href="../partidos/entrar?idPartido=<?= $partido->idPartido;?>
								&jugador1=<?= $idSession; ?> ">

									<b>Entrar</b></a>
								<?php endif ?>
							</td>

							<td class="jugador3">Jugador 3: <br>

								<?php if (!empty($partido->jugador3)) : ?>

									<?php foreach ($usuarios as $usuario) : ?>

										<?php if ($usuario->idUsuario == $partido->jugador3) : ?>
							
											<?php if ($usuario->sexo == 'Hombre'): ?>

											<b style="color: #66ccff; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>

											<?php else : ?>

											<b style="color: #ff99cc; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>
												
											<?php endif ?>
																					
										<?php endif ?>

									<?php endforeach ?>	
									
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" 

					href="../partidos/entrar?idPartido=<?= $partido->idPartido;?>
								&jugador3=<?= $idSession; ?> ">

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

							<td class="jugador2">Jugador 2: <br>

								<?php if (!empty($partido->jugador2)) : ?>

									<?php foreach ($usuarios as $usuario) : ?>

										<?php if ($usuario->idUsuario == $partido->jugador2) : ?>
							
											<?php if ($usuario->sexo == 'Hombre'): ?>

											<b style="color: #66ccff; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>

											<?php else : ?>

											<b style="color: #ff99cc; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>
												
											<?php endif ?>
																					
										<?php endif ?>

									<?php endforeach ?>	
									
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO"

					href="../partidos/entrar?idPartido=<?= $partido->idPartido;?>
								&jugador2=<?= $idSession; ?> ">

									<b>Entrar</b></a>
								<?php endif ?>
							</td>

							<td class="jugador4">Jugador 4: <br>

								<?php if (!empty($partido->jugador4)) : ?>

									<?php foreach ($usuarios as $usuario) : ?>

										<?php if ($usuario->idUsuario == $partido->jugador4) : ?>
							
											<?php if ($usuario->sexo == 'Hombre'): ?>

											<b style="color: #66ccff; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>

											<?php else : ?>

											<b style="color: #ff99cc; font-size: 1.5rem;">
											<?= $usuario->nombre . '<br>' . $usuario->apellidos; ?>
											</b>
												
											<?php endif ?>
																					
										<?php endif ?>

									<?php endforeach ?>	
									
								<?php elseif (!$idSession) : ?>
									<a href="../login/">login</a>
								<?php else : ?>									
									<a class="colorPadelGO" 

					href="../partidos/entrar?idPartido=<?= $partido->idPartido;?>
								&jugador4=<?= $idSession; ?> ">

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
						<div class="datosClub">				
				<table class="tablapartidos">
				<tr><td>
					<?php foreach ($clubs as $club) : ?>
					
					<?php if($club->idClub == $partido->idClub): ?>

						<br><span>Dirección del Club: <b><?= $club->direccionClub; ?></b></span>	

	    			<?php endif ?>	 
					
					<?php endforeach ?>
					</td></tr>
					</table>
				</div>				
					</table>	
					<h4>
    					<a href="../partidos/editar?idPartido=<?= $partido->idPartido; ?>">
    						Editar el Partido
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../partidos/borrar?idPartido=<?= $partido->idPartido; ?>"
                        onclick="return confirm('&#191;Confirmar borrado?')">
    			   			Borrar el Partido
    			   		</a>
                    </h4>
					<br>			
				</div>
			</div>
			</fieldset>	
		
		<?php endforeach ?>
	 		
	
	<br />
	<button onclick="window.location.href='../login'" class="btnbutton1" style="clear:both;float:left">&#8592; Volver a Administración</button>
	<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>

