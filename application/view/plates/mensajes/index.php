<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">	
	<?php $this->insert('partials/feedback') ?>

	<h4>
	    <a href="../mensajes/enviar">Enviar Un Mensaje</a>
    </h4>

	<?php if(count($mensajes) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Mensajes en la Base de Datos</h3>

    <?php else: ?>

		<h3 class="titulo-pagina">MENSAJES RECIBIDOS </h3> 	

		<?php foreach($mensajes as $mensaje): ?>

            <?php if ($mensaje->idReceptor == $idSession) : ?> 

            	<?php foreach($usuarios as $usuario): ?>

           			<?php if ($mensaje->idUsuario == $usuario->idUsuario) : ?>

						<fieldset style="border: 2px solid navy; width: 35rem; padding: 1rem;">
						 <table border="1" class="tablapartidos">
            			<tr><td>
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
						    </td></tr>
						    </table>					   		
						</fieldset> 
						<br><br>

					<?php endif ?>			 

				<?php endforeach ?>

			<?php endif ?>			

		<?php endforeach ?>
		 
	<?php endif ?>  

</div>
