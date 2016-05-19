function iniciar(){
  //comprueba la existencia de todos los campos
  nombre1=document.getElementById("nombre");
  nombre1.addEventListener("input", validacion, false);
  email=document.getElementById("email");
  email.addEventListener("input", validacion, false);
  comment=document.getElementById("coment");
  comment.addEventListener("input", validacion, false);
  check=document.getElementById("check");
  check.addEventListener("checkbox", validacion, false);

  validacion(); //llama a la siguiente funcion cuando termina de comprobar los campos
}

function validacion(){
  //realiza todas las validaciones campo a campo
  if(nombre1.value==""){
    //si el campo nombre está vacio salta la alerta y pinta el campo, si es correcto lo pinta de otro color
  nombre1.setCustomValidity('Inserte un nombre');
  nombre1.style.background='#FFDDDD';
  }else{
  nombre1.setCustomValidity('');
  nombre1.style.background='#bbeffa';
}

if(email.value==""){
  email.setCustomValidity('Inserte una direccion de correo valida');
  email.style.background='#FFDDDD';
  }else{
  email.setCustomValidity('');
  email.style.background='#bbeffa';
}

if(coment.value==""){
  coment.setCustomValidity('Inserte un comentario');
  coment.style.background='#FFDDDD';
  }else{
  coment.setCustomValidity('');
  coment.style.background='#bbeffa';
}

   /* check = document.getElementById("registro_condiciones");
    if (!check.checked) {
        alert("Debe seleccionar el checkbox!");
        return false;
    }*/

}
//El método addEventListener () concede un controlador de eventos para el elemento especificado.
window.addEventListener("load", iniciar, false);