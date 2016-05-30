<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>EDITAR DATOS DE USUARIO</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
            <legend>
                <h2> Datos del Usuario </h2> 
            </legend>

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

            <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($usuario->apellidos)) ? $usuario->apellidos : "" ?>"
                    placeholder="Introduzca los Apellidos">
            </p>
            
            <p>
                <label for="sexo">Sexo</label>
                <select name="sexo">

                    <option value="Hombre" <?php if($usuario->sexo == 'Hombre') { echo 'selected'; } ?> > Hombre </option>

                    <option value="Mujer" <?php if($usuario->sexo == 'Mujer') { echo 'selected'; } ?> > Mujer </option>

                </select>
            </p>
            
            <p>
            <label for="fechaNac">Fecha de Nacimiento</label>
            <input type="text" name="fechaNac" 
                    value="<?= (isset($usuario->fechaNac)) ? $usuario->fechaNac : "" ?>"
                    placeholder="Introduzca la Fecha de Nacimiento (AAAA-mm-dd)">
            </p>

            <p>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($usuario->direccion)) ? $usuario->direccion : "" ?>"
                    placeholder="Introduzca la Dirección">
            </p>

            <p>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" 
                    value="<?= (isset($usuario->telefono)) ? $usuario->telefono : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </p>
            
            <p>
            <input type="email" name="email" 
                    value="<?= (isset($usuario->email)) ? $usuario->email : "" ?>"
                    placeholder="Introduzca el Email">
            </p>

            <p>           
            <input type="hidden" name="clave" 
                    value="<?= (isset($usuario->clave)) ? $usuario->clave : "" ?>"
                    placeholder="Introduzca la Clave Login">
            </p>            
               
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

            <div class="imagenUsuario">
                <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
            </div>

            <div class="subidaImagen">
                <label id="imagenUsuario" for="imagenUsuario">Editar Imagen de Usuario</label>
                <input id="subida" type="file" name="imagenUsuario">
            </div>
            
            <p>
                <input type="submit" value="Enviar">
            </p>        
        </fieldset>   
    </form>
   
</div>

