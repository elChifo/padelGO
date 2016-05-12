<?php $this->layout('layout-dos') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>NUEVO PARTIDO</h2>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
            <legend>
                <h2> Datos del Partido </h2>
            </legend> 
        
            <!-- <input type="hidden" name="idPartido" value="<?= $datos['idPartido'] ?>"> -->

            <div>
                <label for="tipoPartido">Tipo de Partido</label>
                <select name="tipoPartido">
                    <option value="0">Seleccione el Tipo de Partido</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Mixto">Mixto</option>
                </select>
            </div>

            <div>
                <label for="fechaPartido">Fecha del Partido</label>
                <input type="date" name="fechaPartido" 
                    value="<?= (isset($datos['fechaPartido'])) ? $datos['fechaPartido'] : "" ?>"
                    placeholder="Introduzca la Fecha del Partido (AAAA-mm-dd)">
            </div>

            <div>
                <label for="horaPartido">Hora del Partido</label>
                <input type="text" name="horaPartido" 
                    value="<?= (isset($datos['horaPartido'])) ? $datos['horaPartido'] : "" ?>"
                    placeholder="Introduzca la Hora del Partido (HH:mm:ss)">
            </div>

            <div>
                <label for="jugador1">Jugador 1</label>
                <input type="text" name="jugador1" 
                    value="<?= (isset($datos['jugador1'])) ? $datos['jugador1'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <div>
                <label for="jugador2">Jugador 2</label>
                <input type="text" name="jugador2" 
                    value="<?= (isset($datos['jugador2'])) ? $datos['jugador2'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <div>
                <label for="jugador3">Jugador 3</label>
                <input type="text" name="jugador3" 
                    value="<?= (isset($datos['jugador3'])) ? $datos['jugador3'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <div>
                <label for="jugador4">Jugador 4</label>
                <input type="text" name="jugador4" 
                    value="<?= (isset($datos['jugador4'])) ? $datos['jugador4'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <div>
                <label for="idCategoria">Categoría</label> 
                
                <select name="idCategoria">
                            
                        <?php foreach($categorias as $categoria): ?>

                            <option value="<?php echo $categoria->idCategoria; ?>">
                                    <?php echo $categoria->nombreCategoria; ?>
                            </option>

                        <?php endforeach ?>
                </select>
            </div>

            <div>
                <input type="hidden" name="idUsuario" value="<?= $idUsuario ?>">

            </div>

            <div>
                <label for="idClub">Clubs</label> 
                
                <select name="idClub">
                            
                        <?php foreach($clubs as $club): ?>

                            <option value="<?php echo $club->idClub; ?>">
                                    <?php echo $club->nombreClub; ?>
                            </option>

                        <?php endforeach ?>
                </select>
            </div>


            <div>
                <input type="submit" value="Crear Partido">
            </div>      

        </fieldset> 

    </form>

</div>