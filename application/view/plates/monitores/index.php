<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">

    <?php if(count($monitores) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Monitores en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">MONITORES 

        <?php if (isset($idSession)) : ?>   

                <a class="colorPadelGO2" href="../monitores/solicitar" style="font-size: 18px;float:right;">¿Eres Monitor? Anunciate AQUÍ</a>
                
        <?php endif ?> 

        </h3>
<div class="col-md-12">
         <?php foreach($monitores as $monitor): ?>   

            <?php foreach($usuarios as $usuario): ?>

            <?php if ($monitor->idUsuario == $usuario->idUsuario) : ?>                     

                <?php if ($usuario->idCategoria == '1') : ?>
                      <div class="divMonitor1" style="width: 30%;float:left;">
                <?php elseif ($usuario->idCategoria == '2') : ?>
                      <div class="divMonitor2" style="width: 30%;float:left;">
                <?php elseif ($usuario->idCategoria == '3') : ?>
                      <div class="divMonitor3" style="width: 30%;float:left;">
                <?php elseif ($usuario->idCategoria == '4') : ?>
                      <div class="divMonitor4" style="width: 30%;float:left;">
                <?php else : ?>
                      <div class="divMonitor5" style="width: 30%;float:left;">
                <?php endif ?>
                <h3>
                <div class="imagenUsuario">
                    <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                    height="100" width="100" alt="usuario<?= $usuario->idUsuario; ?>" class="usuarioRedonda"/> 
                  </div>
                <font style="color:#FFF; font-size: 100%;"><b><?= $usuario->nombre . ' ' . $usuario->apellidos; ?></b></font><br><br>
                  <font style="color:#FFF; font-size: 100%;"><b><?= $usuario->idCategoria ?>ª Categoría<a href=""></a></b></font><br>
                
                </h3> <br>
                    <div class="descripClases">
                        <font style="color:#000;">Teléfono: <b><?= $usuario->telefono; ?></b></font><br>
                        <font style="color:#000;">Horario de Clases: <b><?= $monitor->horarioClases; ?></b></font><br>
                        <font style="color:#000;">Anuncio: <b><?= $monitor->anuncio; ?></b></font>
                    </div>
                </div>

                <?php endif ?>           

            <?php endforeach ?> 

        <?php endforeach ?> 

    <?php endif ?>
</div>
<a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
