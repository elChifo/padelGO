<?php $this->layout('layout') ?> 

<div class="container"> 
<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="calcelacion">
        <fieldset> 
            <legend>
                <h2> Cancelación de la Cuenta de Usuario. </h2> 
            </legend>             
            	
           		<h3>Por favor, indique el/los motivos de la cancelación.</h3>
				<br><br>

				<div class="cancelarCuenta">

					<input type="hidden" value"<?= $idSession; ?>"></input>

					<label>
						<input type="checkbox" name="privacidad" value="privacidad">
						Relativo a la Privacidad de Datos.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="dificultad" value="dificultad">
						Diseño Pobre o Dificultad de Uso de la Aplicación.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="negativa" value="negativa">
						Registro Complejo o Primera Impresión Negativa.
					</label>
					<br><br>
					<label>
						<input type="checkbox" name="desuso" value="desuso">
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