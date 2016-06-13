<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container"> 
	<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="calcelacion">
        <fieldset> 
            <legend>
                <h2> Enviar Un Mensaje</h2> 
            </legend>                         	

				<div class="mensaje">
					
					<div>
			            <label for="idReceptor">Mensaje para:</label>
			            <select name="idReceptor">
			                    <option value="0"> Seleccione un Usuario </option> 

			                <?php foreach($usuarios as $usuario): ?>
			                    
			                    <option value="<?= $usuario->idUsuario ?>" >
			                            <?= $usuario->nombre . ' ' . $usuario->apellidos ?>
			                    </option>
			                <?php endforeach ?>
			            </select>    
		            </div> 
					
					<br><br>
					<label>
						<br>
						<textarea rows="4" cols="50" name="mensaje" 
								placeholder="Escriba aqui su mensaje" onblur="validacion2()" required="required" autofocus></textarea>
					</label>
				</div>

				<input type="submit" value="Enviar" class="btnform">
        </fieldset>
    </form>
</div>