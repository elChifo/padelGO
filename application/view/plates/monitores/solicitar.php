<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container"> 
<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="solicitud">
        <fieldset> 
            <legend>
                <h2> Anunciarse como Monitor de Padel </h2> 
            </legend>             
            	
           		<h5>Para ser Monitor de "PadelGO!" rellene este formulario, 
           			Y nos pondremos en Contacto con Usted</h5>
				<br><br>

				<div class="ofrecerMonitor">

					<fieldset style="border:1px dotted green;">
						<legend>
							Datos para el Administrador
						</legend>

						<label> Formación
							<br>
							<textarea rows="4" cols="50" name="formacion" 
									placeholder="Indique su Formación..."></textarea>
						</label>
						<label> Experiencia
							<br>
							<textarea rows="4" cols="50" name="experiencia" 
									placeholder="Indique su Experiencia..."></textarea>
						</label>
					</fieldset>

					<fieldset style="border:1px dotted orange;">
						<legend>
							Datos para el Anuncio
						</legend>

						<label> Anuncio
							<br>
							<textarea rows="4" cols="50" name="anuncio" 
									placeholder="Indique su Anuncio..."></textarea>
						</label>
						<label> Horarios y Precios
							<br>
							<textarea rows="4" cols="50" name="horarios" 
									placeholder="Indique sus Horarios y Precios..."></textarea>
						</label>
					</fieldset>
				</div>

				<input type="submit" value="Enviar">
        </fieldset>
    </form>
</div>