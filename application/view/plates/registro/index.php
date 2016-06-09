<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2 style="margin-left: 20rem;">INSCRIPCIÓN DE USUARIOS</h2>
   
    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
            <legend>
                <h2> Datos del Usuario </h2> 
            </legend>  
            
            <input type="hidden" name="idUsuario" 
                    value="<?= (isset($registro['idUsuario'])) ? $registro['idUsuario'] : "" ?>"> 
            </input>

            <table border="1" class="tablapartidos">
             <tr><td>
            <div>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" 
                    value="<?= (isset($registro['nombre'])) ? $registro['nombre'] : "" ?>"
                    placeholder="Introduzca el Nombre">
            </div>
            <br />
            <div>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($registro['apellidos'])) ? $registro['apellidos'] : "" ?>"
                    placeholder="Introduzca los Apellidos"> 
            </div>
            <br />
            <div>
                <label for="sexo">Sexo</label>
                <select name="sexo">
                    <option value="0"> Seleccione el Sexo </option>
                    <option value="Hombre"> Hombre </option>
                    <option value="Mujer"> Mujer </option>
                </select>
            </div>
            <br />

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

            <br>

           
            <div class="subidaImagen">
                <label id="imagenUsuario" for="imagenUsuario">Subir Imagen de Usuario</label>
                <input id="subida" type="file" name="imagenUsuario">
            </div>
            <br />

            <div>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($registro['direccion'])) ? $registro['direccion'] : "" ?>"
                    placeholder="Introduzca una Dirección">
            </div>
            <br />

            <div>
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" 
                    value="<?= (isset($registro['telefono'])) ? $registro['telefono'] : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </div>
           <br />

            <div>
            <label for="email">Email</label>
            <input type="email" name="email" 
                    value="<?= (isset($registro['email'])) ? $registro['email'] : "" ?>"
                    placeholder="Introduzca el Email">
            </div>
            <br />

            <div>
            <label for="clave">Clave Login</label>
            <input type="password" name="clave" 
                    placeholder="Introduzca la Clave Login">
            </div>
            <br />

            <div>
            <label for="idCategoria">Categoría</label>
            <select name="idCategoria">
                    <option value="0"> Seleccione una Categoría </option> 

                <?php foreach($categorias as $categoria): ?>
                    
                    <option value="<?= $categoria->idCategoria ?>" >
                            <?= $categoria->nombreCategoria ?>
                    </option>
                <?php endforeach ?>
            </select>    
            </div> 
            <br />
            
            <div>
                <input type="submit" value="Enviar">
            </div> 
             </td></tr> 
            </table>       
        </fieldset>   
    </form> 
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>  
</div>