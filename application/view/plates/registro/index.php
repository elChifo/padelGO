<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>INSCRIPCIÓN DE USUARIOS</h2>
   
    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <fieldset> 
            <legend>
                <h2> Datos del Usuario </h2> 
            </legend>  
            
            <input type="hidden" name="idUsuario" 
                    value="<?= (isset($datos['idUsuario'])) ? $datos['idUsuario'] : "" ?>"> 
            </input>
            
            <div>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" 
                    value="<?= (isset($datos['nombre'])) ? $datos['nombre'] : "" ?>"
                    placeholder="Introduzca el Nombre">
            </div>

            <div>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($datos['apellidos'])) ? $datos['apellidos'] : "" ?>"
                    placeholder="Introduzca los Apellidos">
            </div>
            
            <div>
                <label for="sexo">Sexo</label>
                <select name="sexo">
                    <option value="0"> Seleccione el Sexo </option>
                    <option value="Hombre"> Hombre </option>
                    <option value="Mujer"> Mujer </option>
                </select>
            </div>
            
            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
            </script>

            <div>
            <label for="fechaNac"><br><!--Fecha Nacimiento--></label>
                <input type="hidden" name="fechaNac" id="fecha" />
                    <span style="background-color: #ffc; cursor:default; padding:.3em; border:thin solid #ff0; text-decoration:underline; color: blue;" 
                            onmouseover="this.style.cursor = 'pointer'; this.style.cursor = 'hand'; 
                                this.style.backgroundColor = '#ff8'; this.style.textDecoration='none';"
                            onmouseout="this.style.backgroundColor = '#ffc'; this.style.textDecoration = 'underline';" id="fecha_usuario"> 
                            Pinchar aqui para Seleccionar la fecha 
                    </span>                    
                <p id="error_fecha"></p>
            </div>

            <script type="text/javascript">
                Calendar.setup({
                inputField: "fecha",
                ifFormat:   "%d/%m/%Y",
                weekNumbers: false,
                displayArea: "fecha_usuario",
                daFormat:    "%A, %d de %B de %Y"
                });
            </script>

            <br>
            <div>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($datos['direccion'])) ? $datos['direccion'] : "" ?>"
                    placeholder="Introduzca una Dirección">
            </div>

            <div>
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" 
                    value="<?= (isset($datos['telefono'])) ? $datos['telefono'] : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </div>
            
            <div>
            <label for="email">Email</label>
            <input type="email" name="email" 
                    value="<?= (isset($datos['email'])) ? $datos['email'] : "" ?>"
                    placeholder="Introduzca el Email">
            </div>

            <div>
            <label for="clave">Clave Login</label>
            <input type="password" name="clave" 
                    placeholder="Introduzca la Clave Login">
            </div>
               
            <div>
            <label for="idCategoria">Categoría</label>
            <select name="idCategoria">
                    <option value="0"> Seleccione una Categoría </option> 

                <?php foreach($categorias as $value): ?>
                    
                    <option value="<?php echo $value->idCategoria ?>" >
                            <?php echo $value->nombreCategoria ?>
                    </option>
                <?php endforeach ?>
            </select>    
            </div>                
            <div>
                <input type="submit" value="Enviar">
            </div>        
        </fieldset>   
    </form>   
</div>