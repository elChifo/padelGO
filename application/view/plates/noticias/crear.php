<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

<h2>CREACIÓN DE UNA NUEVA NOTICIA</h2>
   
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
        <fieldset> 
        <table border="1" class="tablapartidos">
        <tr><td>
            <legend>
                <h2> Datos de la Noticia </h2> 
            </legend>
           
            <p>
            <label for="titular">Titular</label>
            <input type="text" name="titular"
                    placeholder="Introduzca el Titular de la Noticia">
            </p>          
           
            <br />
            <script type="text/javascript">
                try{(function(a){var b="http://",c="librosweb.es",d="/cdn-cgi/cl/",e="img.gif",f=new a;f.src=[b,c,d,e].join("")})(Image)}catch(e){}
           
            </script>

            <strong>Fecha de la Noticia</strong> | 
            <input type="hidden" name="fechaNoticia" id="fecha" />
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
            <br /><br />

            <p>
            <label for="contenido">Contenido</label>
            <textarea  name="contenido" 
                    placeholder="Introduzca el Contenido de la Noticia" rows="5" cols="50"></textarea>
            </p>
            <br />
            <p>

            <div class="subidaImagen">
                <label id="imagenNoticia" for="imagen">Agregar una Imagen a la Noticia (max. 2 MB)
                </label>
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

