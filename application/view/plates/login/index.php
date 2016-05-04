<?php $this->layout('layout') ?>

<div class="container">
    <?php $this->insert('partials/feedback') ?>

    <h2>ACCESO DE USUARIOS </h2>

    <form  action="/login/logueado" method="post" class="login">
        <fieldset> 
            <legend>
                <h2> Credenciales del Usuario </h2> 
            </legend>             
            
            <section>
                <label>EMAIL:</label>
                <input type="text" name="email">
                
                <label>CLAVE:</label>
                <input type="password" name="clave">            
                
                <label>&nbsp;</label>
                <input type="submit" value="Acceder"> 
            </section>
        </fieldset>
    </form>

</div>