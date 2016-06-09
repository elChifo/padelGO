<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($usuarios) == 0): ?>

        <h3 class="titulo-pagina">No se encuentran Usuarios en la Base de Datos</h3>

    <?php else: ?>
        
        <h3 class="titulo-pagina">USUARIOS</h3> 

         <?php foreach($usuarios as $usuario): ?>
           
           <?php if ($usuario->idUsuario != 1): ?>

              <fieldset style="border: 2px solid navy; width: 100rem; padding: 1rem;">
               <table border="1" class="tablapartidos">
             <tr><td>
              <ul> 
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
                alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
            </div>
            </td></tr>
            </table>
           </fieldset>

           <?php endif ?>

        <?php endforeach ?> 

    <?php endif ?>
    <a href='#' onclick='subir();return false' title='Ir Arriba' class="flecha"><img src="<?= URL; ?>img/flecha.png"></a>
</div>
