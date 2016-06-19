<?php $this->layout('layout') ?>
  <?php $idSession = Session::get('idUsuario'); ?>
  
<div class="container" style="margin-left: -30px;padding-left: 3%; padding-right: 3%;">
    <?php $this->insert('partials/feedback') ?>

    <h2>ACCESO DE USUARIOS </h2>

    <form  action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="login">
        <fieldset> 
            <legend>
               </h3> Credenciales del Usuario </h3>
            </legend>             
            
            <section>
                <label>Email:</label>
                <input type="email" name="email" required="required" onblur="validacion()" placeholder="Escribe tu email" autofocus value="<?= (isset($usuario['email'])) ? $usuario['email'] : "" ?>">
                
                <label>Password:</label>
                <input type="password" name="clave" required="required" onblur="validacion()" placeholder="****">            
                
                <input type="submit" value="Acceder" title="Acceder" class="btnform"> 
            </section>
        </fieldset>
    </form>

</div>