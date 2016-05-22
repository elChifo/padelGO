<?php $this->layout('layout') ?>

<div class="container">
       
    <?php if(count($usuarios) == 0): ?>

        <h6> .</h6>
        <h3>No se encuentran Usuarios en la Base de Datos</h3>

    <?php else: ?>
        
        <h6> .</h6>
        <h3>Disponemos de <?= count($usuarios)-1 ?> Usuarios en la Base de Datos.</h3> 

         <?php foreach($usuarios as $usuario): ?>
           
           <?php if ($usuario->idUsuario != 1): ?>

               <fieldset>
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
           </fieldset>

           <?php endif ?>

        <?php endforeach ?> 

    <?php endif ?>

    <?php if ($idUsuario == 1) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <?php endif ?>
</div>
