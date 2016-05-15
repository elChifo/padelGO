<?php $this->layout('layout') ?>

<div class="container">
   
    <div class="nuevoUsuario">
        <a href="registro/index"><h2>Registrar Un Usuario</h2></a><br>
    </div>
    
    <?php if(count($usuarios) == 0): ?>

        <p>No se encuentran Usuarios en la Base de Datos</p>

    <?php else: ?>
        
        <h2>Disponemos de <?= count($usuarios) ?> Usuarios inscritos en la Base de Datos.</h2> 

         <?php foreach($usuarios as $value): ?>
           <fieldset>
           <ul> 
                <li> NOMBRE: 
                    <strong> 
                        <?php
                            echo $value->nombre; echo ' ';                            
                            echo $value->apellidos; 
                        ?> 
                    </strong>                                      
                </li>
                <br>
                <li> CATEGORÍA: 
                    <strong> 
                        <?php
                            echo $value->idCategoria; 
                            echo ' ª Categoría'; 
                        ?> 
                    </strong>                                      
                </li>
           </ul>
           </fieldset>

        <?php endforeach ?> 

    <?php endif ?>
</div>
