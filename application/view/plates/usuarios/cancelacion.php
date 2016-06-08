<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container"> 
	<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="cancelacion">
        <fieldset> 
            <legend>
                <h2> Cancelación de la Cuenta de Usuario. </h2> 
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
							Diseño Pobre o Dificultad de Uso de la Aplicación.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="malaImpresion" 
							value="Registro Complejo o Primera Impresión Negativa.">
							Registro Complejo o Primera Impresión Negativa.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="desuso" 
							value="No se Usa la Aplicación o No se Practica Padel.">
							No se Usa la Aplicación o No se Practica Padel.
					</label>
					<br><br>
					<label>
						<br>
						<textarea rows="4" cols="50" name="otrosmotivos" 
								placeholder="Indique Otros Motivos..."></textarea>
					</label>
				</div>

				<input type="submit" value="Enviar">
        </fieldset>
    </form>
</div>