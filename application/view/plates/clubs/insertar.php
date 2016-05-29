<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>INSCRIPCIÓN DE NUEVOS CLUBS</h2>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
            <legend>
                <h2> Datos del Club </h2>
            </legend>       

            <input type="hidden" name="idClub" value="<?= $idClub['idClub'] ?>">

            <p>
            <label for="nombreClub">Nombre del Club</label>
            <input type="text" name="nombreClub" 
                    value="<?= (isset($datos['nombreClub'])) ? $datos['nombreClub'] : "" ?>">
            </p>

            <p>
            <label for="direccionClub">Dirección</label>
            <input type="text" name="direccionClub" 
                    value="<?= (isset($datos['direccionClub'])) ? $datos['direccionClub'] : "" ?>">
            </p>

            <p>
            <label for="numPistas">Número de Pistas</label>
            <input type="date" name="numPistas" 
                    value="<?= (isset($datos['numPistas'])) ? $datos['numPistas'] : "" ?>">
            </p>
           
                <input type="submit" value="Registrar">

        </fieldset> 

    </form>

</div>

    