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
            
            <p>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" 
                    value="<?= (isset($datos['nombre'])) ? $datos['nombre'] : "" ?>"
                    placeholder="Introduzca el Nombre">
            </p>

            <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($datos['apellidos'])) ? $datos['apellidos'] : "" ?>"
                    placeholder="Introduzca los Apellidos">
            </p>
            
            <p>
                <label for="sexo">Sexo</label>
                <select name="sexo">
                    <option value="0"> Seleccione el Sexo </option>     
                    <option value="Hombre"> Hombre </option>
                    <option value="Mujer"> Mujer </option>
                </select>
            </p>
            
            <p>
            <label for="fechaNac">Fecha de Nacimiento</label>
            <input type="date" name="fechaNac" 
                    value="<?= (isset($datos['fechaNac'])) ? $datos['fechaNac'] : "" ?>"
                    placeholder="Introduzca la Fecha de Nacimiento (AAAA-mm-dd)">
            </p>

            <p>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($datos['direccion'])) ? $datos['direccion'] : "" ?>"
                    placeholder="Introduzca la Dirección">
            </p>

            <p>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" 
                    value="<?= (isset($datos['telefono'])) ? $datos['telefono'] : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </p>
            
            <p>
            <label for="email">Email</label>
            <input type="text" name="email" 
                    value="<?= (isset($datos['email'])) ? $datos['email'] : "" ?>"
                    placeholder="Introduzca el Email">
            </p>

            <p>
            <label for="clave">Clave Login</label>
            <input type="password" name="clave" 
                    placeholder="Introduzca la Clave Login">
            </p>
               
            <p>
            <label for="idCategoria">Categoría</label>
            <select name="idCategoria">
                    <option value="0"> Seleccione una Categoría </option> 

                <?php foreach($categorias as $value): ?>
                    
                    <option value="<?php echo $value->idCategoria ?>" >
                            <?php echo $value->nombreCategoria ?>
                    </option>
                <?php endforeach ?>

            </select>                    
            <p>
                <input type="submit" value="Enviar">
            </p>        
        </fieldset>   
    </form>   
</div>