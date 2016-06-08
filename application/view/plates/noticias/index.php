<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($noticias) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Noticias en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">NOTICIAS</h3> 

         <?php foreach($noticias as $noticia): ?>                   

               <fieldset>
           <ul> 
                <li> 
                    <h3><?= $noticia->titular; ?> </h3>                    
                                                                            
                </li>
                <li> 
                    <h5 style="color:red;">FECHA:  <?= $noticia->fechaNoticia; ?> </h5>
                </li>
                <li> 
                    <fieldset>
                        <h5>CONTENIDO: </h5>
                        <p>
                            <?= $noticia->contenido; ?>
                        </p>
                    </fieldset>                  
                                                                            
                </li>
           </ul>

            <div class="imagenNoticia">
                <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idNoticia; ?>.png" 
                alt="noticia<?= $noticia->idNoticia; ?>" height="150" /> 
            </div>
            
           </fieldset>           

        <?php endforeach ?> 

    <?php endif ?>

</div>
