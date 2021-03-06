<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>
   
    <h2>NUEVO PARTIDO</h2> 

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="registro">

        <fieldset>
         <table class="tablapartidos">
            <tr><td>
            <legend>
                <h2>Datos del Partido</h2>
            </legend> 

            <div id="cont_7f34bed8ce0ea846732f304bb7d7a37c"><span id="h_7f34bed8ce0ea846732f304bb7d7a37c">El Tiempo en Murcia</span><script type="text/javascript" async src="http://www.tiempo.com/wid_loader/7f34bed8ce0ea846732f304bb7d7a37c"></script></div>
        
            <input type="hidden" name="idPartido" value="<?= $partido['idPartido'] ?>">

            <div>
                <label for="tipoPartido">Tipo de Partido</label>              
                <input name="tipoPartido" type="radio" value="Masculino" checked>Masculino &nbsp;&nbsp;&nbsp;
                <input name="tipoPartido" type="radio" value="Femenino">Femenino &nbsp;&nbsp;&nbsp;
                <input name="tipoPartido" type="radio" value="Mixto">Mixto
            </div>


            <br />
            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
           
            </script>

            <strong>Fecha del Partido</strong> | 
            <input type="hidden" name="fechaPartido" id="fecha" />
            <span style="background-color: white; cursor:default; padding:.3em;  text-decoration:none; color: blue; border:solid 1px #f2f2f2;" 
            onmouseover="this.style.cursor='pointer'; this.style.cursor='hand'; this.style.backgroundColor='#3a7999'; this.style.textDecoration='none';"
            onmouseout="this.style.backgroundColor='white'; this.style.textDecoration='none';"
            id="fecha_usuario">
            Seleccionar
            </span>


            <script type="text/javascript">
            Calendar.setup({
              inputField: "fecha",
              ifFormat:   "%Y-%m-%d",
              weekNumbers: false,
              displayArea: "fecha_usuario",
              daFormat:    "%A, %d de %B de %Y"
            });
            </script>
            <br />
 
<br />
            <div>
                <label for="horaPartido">Hora del Partido</label>

                        <select name="horaPartido" >
                            <option value="10:00">09:00</option>
                            <option value="10:30">09:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
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
                            <option value="22:00">22:30</option>
                        </select> 
            </div>
            
            <br />

            <div>            
                <label for="jugador1">Jugador 1</label>
                <input type="text" name="jugador1" 
                    value="<?= (isset($partido['jugador1'])) ? $partido['jugador1'] : "" ?>"
                    placeholder="Nombre Jugador" onblur="validacion2()" autofocus>
            </div>
    
            <br />

            <div>
                <label for="jugador2">Jugador 2</label>
                <input type="text" name="jugador2" 
                    value="<?= (isset($partido['jugador2'])) ? $partido['jugador2'] : "" ?>"
                    placeholder="Nombre Jugador" onblur="validacion2()" >
            </div>

            <br />

            <div>
                <label for="jugador3">Jugador 3</label>
                <input type="text" name="jugador3" 
                    value="<?= (isset($partido['jugador3'])) ? $partido['jugador3'] : "" ?>"
                    placeholder="Nombre Jugador" onblur="validacion2()" >
            </div>

            <br />

            <div>
                <label for="jugador4">Jugador 4</label>
                <input type="text" name="jugador4" 
                    value="<?= (isset($partido['jugador4'])) ? $partido['jugador4'] : "" ?>"
                    placeholder="Nombre Jugador" onblur="validacion2()" >
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