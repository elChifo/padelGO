<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container">
    <?php $this->insert('partials/feedback') ?>

    <h2>ACCESO DE USUARIOS </h2>

    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="login">
        <fieldset> 
            <legend>
                <h2> Credenciales del Usuario </h2> 
            </legend>             
            
            <section>
                <label>Email:</label>
                <input type="email" name="email" required="required" onblur="validacion()" placeholder="Escribe tu email" autofocus>
                
                <label>Password:</label>
                <input type="password" name="clave" required="required" onblur="validacion()" placeholder="****">            
                
                <input type="submit" value="Acceder" class="btnform"> 
            </section>
        </fieldset>
    </form>

</div>