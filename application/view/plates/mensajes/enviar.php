<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;"> 
	<?php $this->insert('partials/feedback') ?>   

	<form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="registro">
        <fieldset> 
            <legend>
                <h3> Enviar Un Mensaje</h3> 
            </legend>                         	

				<div class="mensaje">
					
					<div>
			            <label for="idReceptor">Mensaje para:</label>
			            <select name="idReceptor">
			                    <option value="<?= (isset($mensaje['idReceptor'])) ? $mensaje['idReceptor'] : "" ?>" disabled> Seleccione un Usuario </option> 

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
								placeholder="Escriba aqui su mensaje" onblur="validacion2()" required="required" autofocus><?= (isset($mensaje['mensaje'])) ? $mensaje['mensaje'] : "" ?></textarea>
					</label>
				</div>

				<input type="submit" value="Enviar" class="btnform">
        </fieldset>
    </form><br>
</div>