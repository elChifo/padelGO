<?php $this->layout('layout') ?>

<div class="container">

	<?php if(count($clubs) == 0): ?>

        <p>No se encuentran Clubs en la Base de Datos</p>

    <?php else: ?>
		   	
        <h2>Disponemos de <?= count($clubs) ?> clubs en la ciudad.</h2>       

		<?php foreach($clubs as $value): ?>
		<fieldset>
		   <ul> 
		   		<li> 
		   				Nombre Club: <strong> <?php echo $value->nombreClub ?> </strong>  
		   			<ul>		   					
		   					<li> Direccion : <?php echo $value->direccionClub ?>  </li>
		   					<li> Nº Pistas: <?php echo $value->numPistas ?>  </li>	   					
		   			</ul> 
		   		</li>
		   </ul>
		   <br>
		   		<a href="">Ver Partidos en este club</a>
		</fieldset>   
		<?php endforeach ?>
    <?php endif ?>
</div>
