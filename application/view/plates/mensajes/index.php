<?php $this->layout('layout') ?> 
<?php $idSession = Session::get('idUsuario'); ?>
<?php $this->insert('partials/feedback') ?>

<div class="container">
	
	<h4>
	    <a href="../mensajes/enviar">Enviar Un Mensaje</a>
    </h4>

	<?php if(count($mensajes) == 0): ?>
		<h6> .</h6>
        <h3>No se encuentran Mensajes en la Base de Datos</h3>

    <?php else: ?>
		<h6> .</h6>	 

		<h3 style="color:navy;">MENSAJES RECIBIDOS </h3> 

	<?php endif ?>

		<?php foreach($mensajes as $mensaje): ?>

            <?php if ($mensaje->idReceptor == $idSession) : ?> 

            	<?php foreach($usuarios as $usuario): ?>

           			<?php if ($mensaje->idUsuario == $usuario->idUsuario) : ?>

						<fieldset style="border: 2px solid navy; width: 35rem; padding: 1rem;">
						    <ul> 
						   		<li> Enviado Por:
						   			<strong> 
						   				<?= $usuario->nombre . ' ' . $usuario->apellidos ?> 
						   			</strong> 					   			
						   		</li>
						   		<li> Fecha Mensaje:
						   			<strong> 
						   				<?= $mensaje->fechaMensaje ?> 
						   			</strong> 					   			
						   		</li>
								<div class="mensaje" 
									style="border: 1px dotted; width: 35rem; padding: 1rem;">
						   				<?= $mensaje->mensaje ?> 
								</div>
						    </ul>					   		
						</fieldset> 
						<br><br>

					<?php endif ?>			 

				<?php endforeach ?>

			<?php endif ?>			

		<?php endforeach ?>    

    <?php if ($idSession == 1) : ?>
		<a href="../login/index"><h4>...Volver a Administración</h4></a>
	<?php endif ?>	

</div>
