<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>NUEVO PARTIDO</h2> 

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">

        <fieldset>
         <table border="1" class="tablapartidos">
            <tr><td>
            <legend>
                <h2>Datos del Partido</h2>
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
            <br />
            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
            </script>
            
            
            <div>
                <label for="fechayhora">Fecha:
                 <input type="text" id="fechayhora" value="" />
                </label>

            </div>
           <br />

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

    <h3>DateTimePicker</h3>
        <input type="text" value="" id="datetimepicker"/><br><br>
        <h3>TimePicker</h3>
        <input type="text" id="datetimepicker1"/><br><br>
        <h3>DatePicker</h3>
        <input type="text" id="datetimepicker2"/><br><br>
</div>

<br />
            <div>
                <label for="horaPartido">Hora del Partido</label>

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
            
            <br />

            <div>            
                <label for="jugador1">Jugador 1</label>
                <input type="text" name="jugador1" 
                    value="<?= (isset($datos['jugador1'])) ? $datos['jugador1'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>
    
            <br />

            <div>
                <label for="jugador2">Jugador 2</label>
                <input type="text" name="jugador2" 
                    value="<?= (isset($datos['jugador2'])) ? $datos['jugador2'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <br />

            <div>
                <label for="jugador3">Jugador 3</label>
                <input type="text" name="jugador3" 
                    value="<?= (isset($datos['jugador3'])) ? $datos['jugador3'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <br />

            <div>
                <label for="jugador4">Jugador 4</label>
                <input type="text" name="jugador4" 
                    value="<?= (isset($datos['jugador4'])) ? $datos['jugador4'] : "" ?>"
                    placeholder="Introduzca el Código de Jugador">
            </div>

            <br />

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

            <br />

            <div>
                <input type="hidden" name="idUsuario" value="<?= $usuarioPartido ?>">            
            </div>

            <br />

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

            <br />

            <div>
                <input type="submit" value="Crear Partido" class="btnform">
            </div>      
        </table>
        </fieldset> 

    </form>
<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>