<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;"> 
	<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="registro">
        <fieldset> 
            <legend>
                <h3> Cancelación de la Cuenta de Usuario</h3> 
            </legend>             
            	
           		<h4>Por favor, indique los motivos de la cancelación.</h4>
				<br><br>

				<div class="cancelarCuenta">

					<label>
						<input type="checkbox" name="privacidad" 
							value="Relativo a la Privacidad de Datos.">
							Relativo a la Privacidad de Datos.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="dificultad" 
							value="Diseño Pobre o Dificultad de Uso de la Aplicación.">
							Diseño pobre o dificultad de uso de la aplicación.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="malaImpresion" 
							value="Registro Complejo o Primera Impresión Negativa.">
							Registro complejo o primera impresión negativa.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="desuso" 
							value="No se Usa la Aplicación o No se Practica Padel.">
							No se usa la aplicación o no se practica padel.
					</label>
					<br><br>
					<label>
						<br>
						<textarea rows="4" cols="50" name="otrosmotivos" 
								placeholder="Indique otros motivos..."></textarea>
					</label>
				</div>

				<input type="submit" value="Enviar" class="btnform">
        </fieldset>
    </form>
</div>