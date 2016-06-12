<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>EDITAR DATOS DE USUARIO</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
            <legend>
                <h2> Datos del Usuario </h2> 
            </legend>
            <table border="1" class="tablapartidos">
            <tr><td>

            <p>
            <input type="hidden" name="idUsuario" 
                    value="<?= (isset($usuario->idUsuario)) ? $usuario->idUsuario : "" ?>">
            </p>  
            
            <p>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" 
                    value="<?= (isset($usuario->nombre)) ? $usuario->nombre : "" ?>"
                    placeholder="Introduzca el Nombre">
            </p>
            <br />
            <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($usuario->apellidos)) ? $usuario->apellidos : "" ?>"
                    placeholder="Introduzca los Apellidos">
            </p>
            <br />
          

            <div>
                <label for="sexo">Seleccione el Sexo</label>              
                <input name="sexo" type="radio" 
                    value="Hombre" <?php if ($usuario->sexo == 'Hombre') : ?> 
                        checked = 'checked' <?php endif ?> >
                        Hombre &nbsp;&nbsp;&nbsp;
                <input name="sexo" type="radio" 
                    value="Mujer" <?php if ($usuario->sexo == 'Mujer') : ?> 
                        checked = 'checked' <?php endif ?> >
                        Mujer 
            </div>

            <br />
            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
           
            </script>

            <strong>Fecha de Nacimiento</strong> |  
            <span style="border: solid 1px black; height: 2rem; margin-right: 1rem; padding: 0.5rem;"><?= $usuario->fechaNac ?>
            </span>

            <input type="hidden" name="fechaNac" id="fecha" 
                value="<?= (isset($usuario->fechaNac)) ? $usuario->fechaNac : "" ?>">
            <span style="background-color: white; cursor:default; padding:.3em;  text-decoration:none; color: blue; border:solid 1px #c5f619;" 
            onmouseover="this.style.cursor='pointer'; this.style.cursor='hand'; this.style.backgroundColor='#c5f619'; this.style.textDecoration='none';"
            onmouseout="this.style.backgroundColor='white'; this.style.textDecoration='none';"
            id="fecha_usuario">
            Elegir AQUI 
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













            <p>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($usuario->direccion)) ? $usuario->direccion : "" ?>"
                    placeholder="Introduzca la Dirección">
            </p>
            <br />
            <p>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" 
                    value="<?= (isset($usuario->telefono)) ? $usuario->telefono : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </p>
            <br />
            <p>
            <input type="email" name="email" 
                    value="<?= (isset($usuario->email)) ? $usuario->email : "" ?>"
                    placeholder="Introduzca el Email">
            </p>
            <br />
            <p>           
            <input type="hidden" name="clave" 
                    value="<?= (isset($usuario->clave)) ? $usuario->clave : "" ?>"
                    placeholder="Introduzca la Clave Login">
            </p>            
            <br />
            <p>
            <label for="idCategoria">Elegir una Categoría</label>
            <select name="idCategoria">
                   
                <?php foreach($categorias as $categoria): ?>

                    <option value="<?= $categoria->idCategoria ?>" 

                        <?php if($categoria->idCategoria == $usuario->idCategoria) { echo 'selected'; } ?>  > 
                            <?= $categoria->nombreCategoria ?>
                    </option>
                <?php endforeach ?>

            </select> 
            <br />
            <div class="imagenUsuario">
                <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
            </div>
            <br />
            <div class="subidaImagen">
                <label id="imagenUsuario" for="imagenUsuario">Editar Imagen de Usuario</label>
                <input id="subida" type="file" name="imagenUsuario">
            </div>
            <br />
            <p>
                <input type="submit" value="Enviar" class="btnform">
            </p> 
            </p>
            </td></tr>
            </table>       
        </fieldset>   
    </form>
   
</div>

