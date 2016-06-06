<?php $this->layout('layout') ?>
<?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>EDITAR EL ARTÍCULO</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
            <legend>
                <h2> Datos del Artículo </h2> 
            </legend>
        
            <input type="hidden" name="idArticulo" 
                    value="<?= (isset($articulo->idArticulo)) ? $articulo->idArticulo : "" ?>">

            <input type="hidden" name="idUsuario" value="<?= $idSession; ?>">

            <p>
            <label for="nombreArticulo">Nombre del Artículo</label>
            <input type="text" name="nombreArticulo" 
                    value="<?= (isset($articulo->nombreArticulo)) ? $articulo->nombreArticulo : "" ?>"
                    placeholder="Introduzca el Nombre del Artículo">
            </p>          
           
            <p>
            <label for="descripcionArticulo">Descripción del Artículo</label>
            <input type="text" name="descripcionArticulo" 
                    value="<?= (isset($articulo->descripcionArticulo)) ? $articulo->descripcionArticulo : "" ?>"
                    placeholder="Introduzca la Descripción del Artículo">
            </p>   

            <div class="imagenArticulo">
                    <img src="<?= URL; ?>img/articulos/articulo<?= $articulo->idArticulo; ?>.png" 
                    alt="articulo<?= $articulo->idArticulo; ?>" height="150" /> 
            </div>      
            

            <div class="subidaImagen">
                <label id="imagenArticulo" for="imagenArticulo">Editar la Imagen del Artículo (max. 2 MB)
                </label>
                <input id="imagen" type="file" name="imagenArticulo">
            </div> 
            
            <p>
                <input type="submit" value="Enviar">
            </p>        
        </fieldset>   
    </form>
</div>

