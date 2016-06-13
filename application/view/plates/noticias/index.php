<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
       
    <?php if(count($noticias) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Noticias en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">NOTICIAS</h3> 

         <?php foreach($noticias as $noticia): ?>                   

               <fieldset>
               
               <table class="tablanoticias" style="width: 85%;">

                <tr><td>
                    <h3><?= $noticia->titular; ?> </h3>  
                    <h5 style="color:red;">FECHA:  <?= $noticia->fechaNoticia; ?> </h5> 
                  <fieldset>
                        <h5>CONTENIDO: </h5>
                        <p>
                            <?= $noticia->contenido; ?>
                        </p>
                    </fieldset>   
                    <div class="imagenNoticia">
                    <img src="<?= URL; ?>img/noticias/noticia<?= $noticia->idNoticia; ?>.png" 
                    alt="noticia<?= $noticia->idNoticia; ?>" height="350" style="max-width: 80%" /> 
                    </div>               
                    
                     </tr></td>  
        

            
              </td></tr>
              </table>
           </fieldset>           

        <?php endforeach ?> 

    <?php endif ?>
<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
