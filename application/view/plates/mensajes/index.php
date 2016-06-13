<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">	
	<?php $this->insert('partials/feedback') ?>

	<?php if(count($mensajes) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Mensajes en la Base de Datos</h3>

    <?php else: ?>

		<h3 class="titulo-pagina">MENSAJES RECIBIDOS </h3> 	
		<div id="chat">
			<div id="header-chat">
				Chat PADELGO! 
			</div>
			<div id="mensajes">
		<?php foreach($mensajes as $mensaje): ?>

            <?php if ($mensaje->idReceptor == $idSession) : ?> 

            	<?php foreach($usuarios as $usuario): ?>

           			<?php if ($mensaje->idUsuario == $usuario->idUsuario) : ?>
							
						<div class="mensaje-autor">
							<img src="foto.jpeg" alt="" class="foto">
							<div class="flecha-izquierda"></div>
							<div class="contenido">
								<b><?= $usuario->nombre . ' ' . $usuario->apellidos ?></b>
								<br>
								<?= $mensaje->mensaje ?> 
							</div>
							<div class="fecha"><?= $mensaje->fechaMensaje ?> </div>
						</div>

					<?php endif ?>			 

				<?php endforeach ?>

			<?php endif ?>			

		<?php endforeach ?>
				<div id="caja-mensaje">
					<input type="text" placeholder="Enviar Un Mensaje...">
					<button onclick="window.location.href='../mensajes/enviar'" style="width: 10%">Enviar &#8594;</button>
				</div>
			</div>
		</div>
		 
	<?php endif ?>  

</div>
