<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>VENDER UN ARTÍCULO</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
            <legend>
                <h2> Datos del Artículo </h2> 
            </legend>

            <input type="hidden" name="idUsuario" value="<?= $idSession; ?>">

            <table border="1" class="tablapartidos">
            <tr><td>
            <p>
            <label for="nombreArticulo">Nombre del Artículo</label>
            <input type="text" name="nombreArticulo" 
                    value="<?= (isset($articulo->nombreArticulo)) ? $articulo->nombreArticulo : "" ?>"
                    placeholder="Introduzca el Nombre del Artículo" onblur="validacion2()" required="required" autofocus>
            </p>          
           <br />
            <p>
            <label for="descripcionArticulo">Descripción del Artículo</label>
            <input type="text" name="descripcionArticulo" 
                    value="<?= (isset($articulo->descripcionArticulo)) ? $articulo->descripcionArticulo : "" ?>"
                    placeholder="Introduzca la Descripción del Artículo" onblur="validacion2()" required="required">
            </p> 
            <br />
            <p>
            <label for="precio">Precio</label>
            <input type="number" name="precio" 
                    value="<?= (isset($articulo->precio)) ? $articulo->precio : "" ?>"
                    placeholder="Introduzca el Precio del Artículo" onblur="validacion2()" required="required" step="0.01" min="0.01" max="99">
            </p>
            <br />
            <div class="subidaImagen">
                <label id="imagenArticulo" for="imagenArticulo">Editar la Imagen del Artículo (max. 2 MB)
                </label>
                <input id="imagen" type="file" name="imagenArticulo">
            </div>
            <br />
            <p>
                <input type="submit" value="Enviar" class="btnform">
            </p>  
            </td></tr>
            </table>      
        </fieldset>   
    </form>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>

