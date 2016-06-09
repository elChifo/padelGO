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
           			y nos pondremos en contacto con Usted</h5>
				<br><br>

				<div class="ofrecerMonitor">

					<fieldset>
					<table border="1" class="tablapartidos">
            		<tr><td>
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
						</td></tr>
						</table>
					</fieldset>
			
					<br />

					<fieldset>
					<table border="1" class="tablapartidos">
            		<tr><td>
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
						</td></tr>
						</table>
					</fieldset>
				</div>
				<br />
				<input type="submit" value="Enviar">
        </fieldset>
    </form>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>