<?php $this->layout('layout') ?>

<div class="container">

    <!-- El formulario se envía a una URL externa y muestra los datos que se reciben en el servidor-->
        <form action="http://www.redti.es/tools/dump.php" method="POST" id="registro" onsubmit="return validacion()">
            <fieldset>
            <legend>Ponte en contacto con nosotros</legend>
                 <table>
                    <tr><td>Nombre:(*)</td><td><input type="text" id="nombre" autofocus placeholder="Escribe tu nombre" required="required"></td></tr> 

                    <tr><td> E-mail:(*)</td><td><input type="email" id="email" placeholder="Escribe tu email" required="required"></td></tr>

                    <tr><td>Teléfono:</td><td><input type="tel" placeholder="Escribe tu teléfono"></td></tr>

                    <tr><td>Comentario:(*)</td><td><textarea id="coment" placeholder="Déjanos tu comentario" required="required" onKeyDown="contar()" onKeyUp="contar()"></textarea></td></tr>

                    <tr><td> <label> Caracteres restantes: </label><input disabled size="3" value="150" id="contador"></td></tr>

                    <tr><td></td><td><input type="checkbox" name="check" id="check" required>Acepto la <a href="politica.html">politica de privacidad</a></td></tr><br>

                    <tr><td></td><td><input type="submit" value="Enviar" onclick="validarcheck()"> <input type="reset" value="Reiniciar"><p>Los campos marcados con (*) son obligatorios.</p></td></tr>

                  </table>
              </fieldset>
        </form>

    
</div>
