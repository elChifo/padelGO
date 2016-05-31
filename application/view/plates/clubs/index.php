<?php $this->layout('layout') ?> 
<?php $idSession = Session::get('idUsuario'); ?>

<div class="container">

	<?php if(count($clubs) == 0): ?>
		<h6> .</h6>
        <h3>No se encuentran Clubs en la Base de Datos</h3>

    <?php else: ?>
		<h6> .</h6>	   	
        <h3>Disponemos de <?= count($clubs) ?> clubs en la ciudad. </h3>  

	<?php endif ?>

		<?php foreach($clubs as $value): ?>
		<fieldset>
		    <ul> 
		   		<li> Nombre Club:
		   			<strong> 
		   				<?= $value->nombreClub ?> &nbsp;&nbsp;&nbsp; 
		   				<a href="">Ver Partidos</a>
		   			</strong> 
		   			<ul>		   					
	   					<li> Direccion : <?= $value->direccionClub ?>  </li>
	   					<li> Nº Pistas: <?= $value->numPistas ?>  </li>	   					
		   			</ul> 
		   		</li>
		    </ul>

		    <div class="imagenClub">
                <img src="<?= URL; ?>img/clubs/club<?= $club->idClub; ?>.png" 
                alt="club<?= $club->idClub; ?>" height="150" /> 
            </div>
		   		
		</fieldset>   
		<?php endforeach ?>
    

    <?php if ($idSession == 1) : ?>
		<a href="../login/index"><h4>...Volver a Administración</h4></a>
	<?php endif ?>	

</div>
