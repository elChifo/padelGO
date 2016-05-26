<?php $this->layout('layout') ?>

<div class="container">
    
    <h2>ADMINISTRACIÓN DE NOTICIAS</h2>

    <h4><a href="<?php echo URL; ?>../noticias/crear">Crear una Noticia</a></h4>
    
	<?php foreach($noticias as $noticia): ?>

       <fieldset>
            <fieldset>
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
                <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idUsuario; ?>.png" 
                alt="noticia<?= $noticia->idNoticia; ?>" height="25" /> 
            </div>
   		
    			<p>
                    <h4>
    					<a href="../noticias/editar?idNoticia=<?php echo $noticia->idNoticia; ?>">
    						Editar la Noticia
    					</a> &nbsp;&nbsp;&nbsp;
    			   		<a href="../noticias/borrar?idNoticia=<?php echo $noticia->idNoticia; ?>">
    			   			Borrar la Noticia
    			   		</a>
                    </h4>
				</p>
    		       
       </fieldset>
    <?php endforeach ?>

    <a href="../login/index"><h4>...Volver a Administración</h4></a>
</div>