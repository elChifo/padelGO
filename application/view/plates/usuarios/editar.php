<?php $this->layout('layout-dos') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>EDITAR DATOS DE USUARIOS</h2>
   
    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <fieldset> 
            <legend>
                <h2> Datos del Usuario </h2> 
            </legend>  

            <p>
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" 
                    value="<?= (isset($usuarios->nombre)) ? $usuarios->nombre : "" ?>"
                    placeholder="Introduzca el Nombre">
            </p>

            <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" 
                    value="<?= (isset($usuarios->apellidos)) ? $usuarios->apellidos : "" ?>"
                    placeholder="Introduzca los Apellidos">
            </p>
            
            <p>
                <label for="sexo">Sexo</label>
                <select name="sexo">

                    <option value="Hombre" <?php if($usuarios->sexo == 'Hombre') { echo 'selected'; } ?> > Hombre </option>

                    <option value="Mujer" <?php if($usuarios->sexo == 'Mujer') { echo 'selected'; } ?> > Mujer </option>

                </select>
            </p>
            
            <p>
            <label for="fechaNac">Fecha de Nacimiento</label>
            <input type="text" name="fechaNac" 
                    value="<?= (isset($usuarios->fechaNac)) ? $usuarios->fechaNac : "" ?>"
                    placeholder="Introduzca la Fecha de Nacimiento (AAAA-mm-dd)">
            </p>

            <p>
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" 
                    value="<?= (isset($usuarios->direccion)) ? $usuarios->direccion : "" ?>"
                    placeholder="Introduzca la Dirección">
            </p>

            <p>
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" 
                    value="<?= (isset($usuarios->telefono)) ? $usuarios->telefono : "" ?>"
                    placeholder="Introduzca el Teléfono">
            </p>
            
            <p>
            <input type="hidden" name="email" 
                    value="<?= (isset($usuarios->email)) ? $usuarios->email : "" ?>"
                    placeholder="Introduzca el Email">
            </p>

            <p>           
            <input type="hidden" name="clave" 
                    value="<?= (isset($usuarios->clave)) ? $usuarios->clave : "" ?>"
                    placeholder="Introduzca la Clave Login">
            </p>            
               
            <p>
            <label for="idCategoria">Elegir una Categoría</label>
            <select name="idCategoria">
                   
                <?php foreach($categorias as $value): ?>

                    <option value="<?php echo $value->idCategoria ?>" 

                        <?php if($value->idCategoria == $usuarios->idCategoria) { echo 'selected'; } ?> >
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

