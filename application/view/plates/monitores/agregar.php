<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>AGREGAR UN NUEVO MONITOR</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <fieldset> 
            <legend>
                <h2> Datos del Monitor </h2> 
            </legend>

            <div>
                <label for="idUsuario">Agregar como Monitor a:</label>
                <select name="idUsuario">
                        <option value="0"> Seleccione un Usuario </option> 

                    <?php foreach($usuarios as $usuario): ?>
                        
                        <option value="<?= $usuario->idUsuario ?>" >
                                <?= $usuario->nombre . ' ' . $usuario->apellidos ?>
                        </option>
                    <?php endforeach ?>
                </select>    
            </div> 

            <p> <br>
                <label for="anuncio">Anuncio del Monitor</label>
                <br>
                <textarea name="anuncio" placeholder="Introduzca el Anuncio del Monitor" value="<?= (isset($monitor['anuncio'])) ? $monitor['anuncio'] : "" ?>"></textarea>
            </p> 

            <p>
                <label for="horarioClases">Horario de Clases</label>
                <input type="text" name="horarioClases" placeholder="Introduzca el Horario de Clases" value="<?= (isset($monitor['horarioClases'])) ? $monitor['horarioClases'] : "" ?>">
            </p>  
            
            <p>
                <input type="submit" value="Enviar">
            </p>        
        </fieldset>   
    </form>
</div>

