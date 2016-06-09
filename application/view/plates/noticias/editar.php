<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>EDITAR LA NOTICIA</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
        <table border="1" class="tablapartidos">
        <tr><td>
            <legend>
                <h2> Datos de la Noticia </h2> 
            </legend>

            <p>
            <input type="hidden" name="idNoticia" 
                    value="<?= (isset($noticia->idNoticia)) ? $noticia->idNoticia : "" ?>">
            </p>  
            <br />
            <p>
            <label for="titular">Titular</label>
            <input type="text" name="titular" 
                    value="<?= (isset($noticia->titular)) ? $noticia->titular : "" ?>"
                    placeholder="Introduzca el Titular de la Noticia">
            </p>          
           <br />
            <p>
            <label for="fechaNoticia">Fecha</label>
            <input type="text" name="fechaNoticia" 
                    value="<?= (isset($noticia->fechaNoticia)) ? $noticia->fechaNoticia : "" ?>"
                    placeholder="Introduzca la Fecha de la Noticia (AAAA-mm-dd)">
            </p>
            <br />
            <div class="imagenNoticia">
                <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idNoticia; ?>.png" 
                alt="noticia<?= $noticia->idNoticia; ?>" height="150" /> 
            </div>
            
            <br />    
            
            <p>
            <label for="contenido">Contenido</label>
            <textarea  name="contenido" placeholder="Introduzca el Contenido de la Noticia" 
                rows="5" cols="50"> <?= (isset($noticia->contenido)) ? $noticia->contenido : "" ?> </textarea>
            </p>
            <br />
            <p>
            <div class="subidaImagen">
                <label id="imagenNoticia" for="imagen">Editar la Imagen de la Noticia (max. 2 MB)</label>
                <input id="imagen" type="file" name="imagen">
            </div>
            <br />
            <p>
                <input type="submit" value="Enviar">
            </p>  
            </p>
            </td></tr>
            </table>      
        </fieldset>   
    </form>
</div>

