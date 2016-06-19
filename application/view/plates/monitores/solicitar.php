<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;"> 
<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="registro">
        <fieldset> 
            <legend>
                <h3> Anunciarse como Monitor de Padel </h3> 
            </legend>             
            	
           		<h5>Para ser Monitor de "PadelGO!" rellene este formulario, 
           			y nos pondremos en contacto con Usted</h5>
				<br><br>

				<div class="ofrecerMonitor">

					<fieldset>
					<table class="tablapartidos">
            		<tr><td>
						<legend>
							Datos para el Administrador
						</legend>

						<label> Formación
							<br>
							<textarea rows="4" cols="50" name="formacion" 
									placeholder="Indique su Formación" onblur="validacion2()" required="required" autofocus></textarea>
						</label>
						<label> Experiencia
							<br>
							<textarea rows="4" cols="50" name="experiencia" 
									placeholder="Indique su Experiencia" onblur="validacion2()" required="required"></textarea>
						</label>
						</td></tr>
						</table>
					</fieldset>
			
					<br />

					<fieldset>
					<table class="tablapartidos">
            		<tr><td>
						<legend>
							Datos para el Anuncio
						</legend>

						<label> Anuncio
							<br>
							<textarea rows="4" cols="50" name="anuncio" 
									placeholder="Indique su Anuncio" onblur="validacion2()" required="required"></textarea>
						</label>
						<label> Horarios y Precios
							<br>
							<textarea rows="4" cols="50" name="horarios" 
									placeholder="Indique sus Horarios y Precios" onblur="validacion2()" required="required"></textarea>
						</label>
						</td></tr>
						</table>
					</fieldset>
				</div>
				<br />
				<input type="submit" value="Enviar" class="btnform">
        </fieldset>
    </form>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>