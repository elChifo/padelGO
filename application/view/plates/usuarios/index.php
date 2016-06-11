<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario');  ?> 

<div class="container">
    <?php $this->insert('partials/feedback') ?>
       
    <?php if(count($usuarios) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Usuarios en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">USUARIOS</h3>

         <?php foreach($usuarios as $usuario): ?>          
           
           <?php if (($usuario->idUsuario != $idSession) && ($usuario->idUsuario != 1)) : ?>

            <fieldset style="border: 2px solid navy; width: 100rem; padding: 1rem;"> 
              <table border="1" class="tablapartidos">
             <tr><td>
              <ul>
              
              <?php foreach ($favoritos as $favorito): ?> 
                                    
                 <?php if ($idSession == $favorito->idUsuario) :?>

                  <?php if ($usuario->idUsuario == $favorito->Favorito): ?>                                   
                    <a href="../favoritos/quitar?idUsuario=<?= $usuario->idUsuario; ?>" 
                        style="float:right;">
                    <img src="<?= URL; ?>img/favorito.png" alt="FAVORITO" height="50" /></a>
          
                  <?php endif ?>                  

                <?php endif ?>
              
              <?php endforeach ?>

                <li> NOMBRE: 
                    <strong> 
                        <?= $usuario->nombre . ' ' . $usuario->apellidos; ?>
                    </strong>                                      
                </li>
                <br>
                <li> CATEGORÍA: 
                    <strong> 
                        <?= $usuario->idCategoria . ' ª Categoría'; ?> 
                    </strong>                                      
                </li>
           </ul>

           <div class="imagenUsuario">
                <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                alt="usuario<?= $usuario->idUsuario; ?>" height="100" style="border-radius: 100px;"/> 
            </div>
            </td></tr>
            </table>

            <?php if (isset($idSession)): ?>                 
                  <a href="../favoritos/agregar?idUsuario=<?= $usuario->idUsuario; ?>">Agregar a Favoritos
                </a>
              <?php endif ?>    
           
           </fieldset>

           <?php endif ?>

        <?php endforeach ?> 

    <?php endif ?>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
