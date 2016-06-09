<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
    
    <h2>ADMINISTRACIÓN DE NOTICIAS</h2>

    <h4><a href="<?= URL; ?>../noticias/crear">Crear una Noticia</a></h4>
    
	<?php foreach($noticias as $noticia): ?>

       <fieldset>
            <fieldset>
             <table border="1" class="tablapartidos">
                <tr><td>
                <ul> 
                <li> 
                    <h3>TITULAR: </h3>                    
                    <?= $noticia->titular; ?>                                                         
                </li>

                <br>

                <li> 
                    <h3>FECHA: </h3>                    
                    <?= $noticia->fechaNoticia; ?>                                                 
                </li>
                <br>

                <li> 
                    <h3>CONTENIDO: </h3>                    
                    <?= $noticia->contenido; ?>                                                         
                </li>
                <br>
           </ul>
           
           <div class="imagenNoticia">
                <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idNoticia; ?>.png" 
                alt="noticia<?= $noticia->idNoticia; ?>" height="150" /> 
            </div>
   	        <tr><td>
    			<p>
                    <h4>
    					<a href="../noticias/editar?idNoticia=<?= $noticia->idNoticia; ?>">
    						Editar la Noticia
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../noticias/borrar?idNoticia=<?= $noticia->idNoticia; ?>">
    			   			Borrar la Noticia
    			   		</a>
                    </h4>
				</p>
                </td></tr>
    		  </td></tr> 
              </table>    
       </fieldset>
    <?php endforeach ?>

    <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>