function iniciar(){
  //comprueba la existencia de todos los campos
  //addEventListener sirve para adjuntar un evento de clic a un elemento
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
/*
if(coment.value=="") {
  check.setCustomValidity('Aceptar los terminos y condiciones');
}else {
  check.setCustomValidity('');
}
*/

/*
   check = document.getElementById("aceptar_condiciones");
    if (!check.checked) {
        alert("Debe seleccionar el checkbox!");
        return false;
    }
    return true;
*/

  

}

 //controla el numero de caracteres permitidos en el text area
function contar(){ 
   var max = "150"; 
         var cadena = document.getElementById("coment").value; 
         var longitud = cadena.length; 

             if(longitud <= max) { 
                  document.getElementById("contador").value = max-longitud; 
             } else { 
                  document.getElementById("coment").value = cadena.substr(0, max); 
             } 
} 





//El método addEventListener () concede un controlador de eventos para el elemento especificado.
window.addEventListener("load", iniciar, false);
