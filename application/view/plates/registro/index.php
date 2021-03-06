<?php $this->layout('layout') ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>

<h2 style="margin-left: 20rem;">INSCRIPCIÓN DE USUARIOS</h2>
   
    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data" class="registro">
        <fieldset> 
            <legend>
                <h3> Datos del Usuario </h3> 
            </legend>  

            <table class="tablapartidos">
             <tr><td>
            <div>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" autofocus placeholder="Introduzca su nombre" required="required" onblur="validacion2()" value="<?= (isset($registro['nombre'])) ? $registro['nombre'] : "" ?>">
            </div>
            <br />
            
            <div>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" required="required" onblur="validacion2()" placeholder="Introduzca sus apellidos" value="<?= (isset($registro['apellidos'])) ? $registro['apellidos'] : "" ?>"> 
            </div>
            <br />            

            <div>
                <label for="sexo">Seleccione el Sexo</label>              
                <input name="sexo" type="radio" value="Hombre" checked>Hombre &nbsp;&nbsp;&nbsp;
                <input name="sexo" type="radio" value="Mujer">Mujer 
            </div>

            <br />

            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
            </script>

           
            <strong>Fecha de Nacimiento</strong> |  
            <input type="hidden" name="fechaNac" id="fecha" >
            <span style="background-color: white; cursor:default; padding:.3em;  text-decoration:none; color: blue; border:solid 1px #f2f2f2;" 
            onmouseover="this.style.cursor='pointer'; this.style.cursor='hand'; this.style.backgroundColor='#3a7999'; this.style.textDecoration='none';"
            onmouseout="this.style.backgroundColor='white'; this.style.textDecoration='none';"
            id="fecha_usuario">
            Seleccionar 
            </span>

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

            <br />
           
            <div class="subidaImagen">
                <label id="imagenUsuario" for="imagenUsuario">Subir Imagen de Usuario</label>
                <input id="subida" type="file" name="imagenUsuario">
            </div>
            <br />

            <div>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($registro['direccion'])) ? $registro['direccion'] : "" ?>"
                    placeholder="Introduzca una Dirección" onblur="validacion2()" required="required">
            </div>
            <br />

            <div>
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" 
                    value="<?= (isset($registro['telefono'])) ? $registro['telefono'] : "" ?>"
                    placeholder="Introduzca el Teléfono" onblur="validacion2()" required="required">
            </div>
           <br />

            <div>
            <label for="email">Email</label>
            <input type="email" name="email" 
                    value="<?= (isset($registro['email'])) ? $registro['email'] : "" ?>"
                    placeholder="Introduzca el Email" onblur="validacion2()" required="required">
            </div>
            <br />

            <div>
            <label for="clave">Clave Login</label>
            <input type="password" name="clave" 
                    placeholder="Introduzca la Clave Login" onblur="validacion2()" required="required">
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
                <input type="submit" value="Enviar" class="btnform">
            </div> 
             </td></tr> 
            </table>       
        </fieldset>   
    </form> 
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>  
</div>