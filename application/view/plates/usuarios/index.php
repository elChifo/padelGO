<?php $this->layout('layout') ?>

<div class="container">
       
    <?php if(count($usuarios) == 0): ?>

        <p>No se encuentran Usuarios en la Base de Datos</p>

    <?php else: ?>
        
        <h2>Disponemos de <?= count($usuarios)-1 ?> Usuarios en la Base de Datos.</h2> 

         <?php foreach($usuarios as $usuario): ?>
           
           <?php if ($usuario->email != 'admin@admin.com'): ?>

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

    <?php if ($idUsuario == 7) : ?>
        <a href="../login/index"><h4>...Volver a Administración</h4></a>
    <?php endif ?>
</div>
