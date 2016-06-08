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
            
            <div>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" 
                    value="<?= (isset($registro['nombre'])) ? $registro['nombre'] : "" ?>"
                    placeholder="Introduzca el Nombre">
            </div>

            <div>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($registro['apellidos'])) ? $registro['apellidos'] : "" ?>"
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
            
            <div>
            <label for="fechaNac"><br>Fecha Nacimiento</label>
                <input type="text" value="" id="datetimepicker"/>
            </div>
            
            <br>

            <div class="subidaImagen">
                <label id="imagenUsuario" for="imagenUsuario">Subir Imagen de Usuario</label>
                <input id="subida" type="file" name="imagenUsuario">
            </div>

            <div>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($registro['direccion'])) ? $registro['direccion'] : "" ?>"
                    placeholder="Introduzca una Dirección">
            </div>

            <div>
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" 
                    value="<?= (isset($registro['telefono'])) ? $registro['telefono'] : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </div>
            
            <div>
            <label for="email">Email</label>
            <input type="email" name="email" 
                    value="<?= (isset($registro['email'])) ? $registro['email'] : "" ?>"
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

                <?php foreach($categorias as $categoria): ?>
                    
                    <option value="<?= $categoria->idCategoria ?>" >
                            <?= $categoria->nombreCategoria ?>
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