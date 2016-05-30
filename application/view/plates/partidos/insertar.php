<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>NUEVO PARTIDO</h2> 

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
            <legend>
                <h2> Datos del Partido </h2>
            </legend> 
        
            <input type="hidden" name="idPartido" value="<?= $datos['idPartido'] ?>">

            <div>
                <label for="tipoPartido">Tipo de Partido</label>
                <select name="tipoPartido">
                    <option value="0">Seleccione el Tipo de Partido</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Mixto">Mixto</option>
                </select>
            </div>

            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
            </script>
            
            <br>
            <div>
                <label for="fechaPartido"><!--Fecha del Partido--></label>
                <input type="hidden" name="fechaPartido" id="fecha" />
                    <span style="background-color: #ffc; cursor:default; padding:.3em; border:thin solid #ff0; text-decoration:underline; color: blue;" 
                            onmouseover="this.style.cursor = 'pointer'; this.style.cursor = 'hand'; 
                                this.style.backgroundColor = '#ff8'; this.style.textDecoration='none';"
                            onmouseout="this.style.backgroundColor = '#ffc'; this.style.textDecoration = 'underline';" id="fecha_usuario"> 
                            Pinchar aqui para Seleccionar la fecha 
                    </span>                    
                <p id="error_fecha"></p>
            </div>
            <br>

            <script type="text/javascript">
                Calendar.setup({
                inputField: "fecha",
                ifFormat:   "%d/%m/%Y",
                weekNumbers: false,
                displayArea: "fecha_usuario",
                daFormat:    "%A, %d de %B de %Y"
                });
            </script>

            <div>
                <label for="horaPartido">Hora del Partido</label>

                <!-- 
                    <input type="text" name="horaPartido" 
                    value="<?= (isset($datos['horaPartido'])) ? $datos['horaPartido'] : "" ?>"
                    placeholder="Introduzca la Hora del Partido (hh:mm)"> 
                -->
                  
                <!--  
                    <input type="radio" name="horario" value="mañana" /> Mañana <br>
                    <input type="radio" name="horario" value="tarde" /> Tarde <br>   
                    <input type="radio" name="horario" value="noche" /> Noche <br> 
                -->

                        <select name="horaPartido" >
                            <option value="7:00">7:00</option>
                            <option value="7:30">7:30</option>
                            <option value="8:00">8:00</option>
                            <option value="8:30">8:30</option>
                            <option value="9:00">9:00</option>
                            <option value="9:30">9:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                            <option value="22:30">22:30</option>
                            <option value="23:00">23:00</option>
                            <option value="23:30">23:30</option>
                        </select> 
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

                            <option value="<?= $categoria->idCategoria; ?>">
                                    <?= $categoria->nombreCategoria; ?>
                            </option>

                        <?php endforeach ?>
                </select>
            </div>

            <div>
                <input type="hidden" name="idUsuario" value="<?= $usuarioPartido ?>">

            </div>

            <div>
                <label for="idClub">Clubs</label> 
                
                <select name="idClub">
                            
                        <?php foreach($clubs as $club): ?>

                            <option value="<?= $club->idClub; ?>">
                                    <?= $club->nombreClub; ?>
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