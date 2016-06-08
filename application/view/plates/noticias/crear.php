<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>CREACIÓN DE UNA NUEVA NOTICIA</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
            <legend>
                <h2> Datos de la Noticia </h2> 
            </legend>

            <p>
            <input type="hidden" name="idNoticia" 
                    value="<?= (isset($noticia->idNoticia)) ? $noticia->idNoticia : "" ?>">
            </p>  

            <p>
            <label for="titular">Titular</label>
            <input type="text" name="titular" 
                    value="<?= (isset($noticia->titular)) ? $noticia->titular : "" ?>"
                    placeholder="Introduzca el Titular de la Noticia">
            </p>          
           
            <p>
            <label for="fechaNoticia">Fecha</label>
            <input type="text" name="fechaNoticia" 
                    value="<?= (isset($noticia->fechaNoticia)) ? $noticia->fechaNoticia : "" ?>"
                    placeholder="Introduzca la Fecha de la Noticia (AAAA-mm-dd)">
            </p>

            <p>
            <label for="contenido">Contenido</label>
            <textarea  name="contenido" 
                    value="<?= (isset($noticia->contenido)) ? $noticia->contenido : "" ?>"
                    placeholder="Introduzca el Contenido de la Noticia" rows="5" cols="50"></textarea>
            </p>

            <p>

            <div class="subidaImagen">
                <label id="imagenNoticia" for="imagen">Agregar una Imagen a la Noticia (max. 2 MB)
                </label>
                <input id="imagen" type="file" name="imagen">
            </div>
            
            <p>
                <input type="submit" value="Enviar">
            </p>        
        </fieldset>   
    </form>
</div>

