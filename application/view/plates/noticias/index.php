<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
       
    <?php if(count($noticias) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Noticias en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">NOTICIAS</h3> 

         <?php foreach($noticias as $noticia): ?>       
               
               <div class="divNoticias" style="width: 85%;">
                    <h3 style="font-size: 200%;"><b><?= $noticia->titular; ?> </b></h3><br>  
                        <p class="pNoticia">
                            <?= $noticia->contenido; ?>
                        </p><br>
                    <div class="imagenNoticia" style="text-align: center;">
                      <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idNoticia; ?>.png" 
                      title="Imagen de la noticia <?= $noticia->titular; ?>" height="350" style="border: 4px solid #c5f619;margin-bottom: 2.5%;" />  
                    </div>
                    <font style="float:right;">Fecha de la publicación: <b><?= $noticia->fechaNoticia; ?></b></font>
              </div>        

        <?php endforeach ?> 

    <?php endif ?>
<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
