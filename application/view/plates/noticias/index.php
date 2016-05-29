<?php $this->layout('layout') ?>

<?php $idUsuario = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($noticias) == 0): ?>

        <h6> .</h6>
        <h3>No se encuentran Noticias en la Base de Datos</h3>

    <?php else: ?>
        
        <h6> .</h6>
        <h3>Disponemos de <?= count($noticias) ?> Noticias en la Base de Datos.</h3> 

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



    <?php if ($idUsuario == 1) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <?php endif ?>
</div>
