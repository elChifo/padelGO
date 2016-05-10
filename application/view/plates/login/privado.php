<?php $this->layout('layout-dos') ?>

<div class="container">
    
    <h2>LOGIN CORRECTO</h2>
    <p>
    	Bienvenido a la Página de Administración, 
    	<?= Session::get('nombre') ?> <?= Session::get('apellidos') ?>
    </p>
	<p>
    <a href="/clubs/insertar"><h3>Registrar Un Club</h3></a>    
    <a href="/usuarios/administrar"><h3>Administrar Usuarios</h3></a>


    <!-- <a href="/actividades/insertar"><h3>Registrar Una Actividad</h3></a>
	</p> -->

	<!-- <p>
    <a href="/clubs/privado"><h3>Editar Un Club</h3></a>

    <a href="/actividades/privado"><h3>Editar Una Actividad</h3></a>
	</p> -->

</div>