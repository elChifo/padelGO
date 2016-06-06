<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>EDITAR DATOS DEL CLUBS</h2>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h2> Datos del Club </h2>
            </legend>       

			<p>
            <input type="hidden" name="idClub" 
                    value="<?= (isset($club->idClub)) ? $club->idClub : "" ?>">
            </p>

            <p>
            <label for="nombreClub">Nombre del Club</label>
            <input type="text" name="nombreClub" 
                    value="<?= (isset($club->nombreClub)) ? $club->nombreClub : "" ?>">
            </p>

            <p>
            <label for="direccionClub">Dirección</label>
            <input type="text" name="direccionClub" 
                    value="<?= (isset($club->direccionClub)) ? $club->direccionClub : "" ?>">
            </p>

            <p>
            <label for="numPistas">Número de Pistas</label>
            <input type="date" name="numPistas" 
                    value="<?= (isset($club->numPistas)) ? $club->numPistas : "" ?>">
            </p>

            <div class="imagenClub">
                <img src="<?= URL; ?>img/clubs/club<?= $club->idClub; ?>.png" 
                alt="club<?= $club->idClub; ?>" height="150" /> 
            </div>

            <div class="subidaClub">
                <label id="imagenClub" for="imagenClub">Agregar una Imagen al Club (max. 2 MB)
                </label>
                <input id="imagenclub" type="file" name="imagenClub">
            </div>           
           
                <input type="submit" value="Enviar">

        </fieldset> 

    </form>

</div>
