<?php $this->layout('layout') ?>
<?php $idSession = Session::get('idUsuario'); ?>

<div class="container">
       
    <?php if(count($usuarios) == 0): ?>

        <h6> .</h6>
        <h3>No se encuentran Usuarios en la Base de Datos</h3>

    <?php else: ?>
        
        <h6> ...</h6>
        <h3>Disponemos de <?= count($usuarios)-1 ?> Usuarios en la Base de Datos.</h3> 

         <?php foreach($usuarios as $usuario): ?>
           
           <?php if ($usuario->idUsuario != 1): ?>

              <fieldset style="border: 2px solid navy; width: 100rem; padding: 1rem;">
           <ul> 
                <li> NOMBRE: 
                    <strong> 
                        <?php
                            echo $usuario->nombre; echo ' ';                            
                            echo $usuario->apellidos; 
                        ?> 
                    </strong>                                      
                </li>
                <br>
                <li> CATEGORÍA: 
                    <strong> 
                        <?php
                            echo $usuario->idCategoria; 
                            echo ' ª Categoría'; 
                        ?> 
                    </strong>                                      
                </li>
           </ul>

           <div class="imagenUsuario">
                <img src="<?= URL; ?>img/usuarios/usuario<?= $usuario->idUsuario; ?>.png" 
                alt="usuario<?= $usuario->idUsuario; ?>" height="100" /> 
            </div>
            
           </fieldset>

           <?php endif ?>

        <?php endforeach ?> 

    <?php endif ?>



    <?php if ($idSession == 1) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <?php endif ?>
</div>
