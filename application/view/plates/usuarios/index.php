<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario');  ?> 

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>
       <div class="col-md-12">
    <?php if(count($usuarios) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Usuarios en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">USUARIOS</h3>
        
         <?php foreach($usuarios as $usuario): ?>          
           
           <?php if (($usuario->idUsuario != $idSession) && ($usuario->idUsuario != 1)) : ?>
                <?php if ($usuario->idCategoria == '1') : ?>
                      <div class="divUsuario1" style="width: 30%;float:left;">
                <?php elseif ($usuario->idCategoria == '2') : ?>
                      <div class="divUsuario2" style="width: 30%;float:left;">
                <?php elseif ($usuario->idCategoria == '3') : ?>
                      <div class="divUsuario3" style="width: 30%;float:left;">
                <?php elseif ($usuario->idCategoria == '4') : ?>
                      <div class="divUsuario4" style="width: 30%;float:left;">
                <?php else : ?>
                      <div class="divUsuario5" style="width: 30%;float:left;">
                <?php endif ?>
              
                  <div class="imagenUsuario">
                    <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                    height="100" width="100" alt="usuario<?= $usuario->idUsuario; ?>" class="usuarioRedonda"/> 
                  </div>
                  
                  <font style="color:#FFF; font-size: 150%;"><b><?= $usuario->nombre . ' ' . $usuario->apellidos; ?></b></font><br><br>
                  <font style="color:#FFF; font-size: 150%;"><b><?= $usuario->idCategoria ?>ª Categoría<a href=""></a></b></font><br>
                  <?php foreach ($favoritos as $favorito): ?> 
                                    
                 <?php if ($idSession == $favorito->idUsuario) :?>

                  <?php if ($usuario->idUsuario == $favorito->Favorito): ?>                                   
                    <a href="../favoritos/quitar?idUsuario=<?= $usuario->idUsuario; ?>" 
                        style="float:right;position: absolute;">
                    <img src="<?= URL; ?>img/favorito.png" title="Borrar de mis Favoritos" alt="FAVORITO" height="50" /></a>
                  <?php else : ?>

                  <?php endif ?>                  

                <?php endif ?>
              
              <?php endforeach ?>
                  <?php if (isset($idSession)): ?>      
                      <a href="../favoritos/agregar?idUsuario=<?= $usuario->idUsuario; ?>" title="Agregar a mis Favoritos"><img src="<?= URL; ?>img/favoritoVacio.png" title="Agregar a mis Favoritos" alt="FAVORITO" height="50" /></a>
                  <?php endif ?> 
                </div>

           <?php endif ?>

        <?php endforeach ?> 
        
    <?php endif ?>
    </div>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
