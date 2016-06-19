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
  }else{
  nombre1.setCustomValidity('');
  nombre1.style.background='#bbeffa';
}

if(email.value==""){
  email.setCustomValidity('Inserte una direccion de correo válida');  
  }else{
  email.setCustomValidity('');
  email.style.background='#bbeffa';
}

if(coment.value==""){
  coment.setCustomValidity('Inserte un comentario');
  }else{
  coment.setCustomValidity('');
  coment.style.background='#bbeffa';
}

function validarcheck() { //comprueba que la política ha sido marcada y todos los campos son correctos
    var x = document.getElementById("check").required;
    document.getElementById("demo").innerHTML = x;
}
  

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

//validaciones para el resto de formularios de todo el menú
function validacion2(){
  if(nombre.value==""){
  nombre1.setCustomValidity('Inserte un nombre');  
  }else{
  nombre1.setCustomValidity('');
  nombre1.style.background='#bbeffa';
}


  if(apellidos.value==""){
  apellidos.setCustomValidity('Inserte un apellido');  
  }else{
  apellidos.setCustomValidity('');
  apellidos.style.background='#bbeffa';
}

if(direccion.value==""){
  direccion.setCustomValidity('Inserte una direccion');  
  }else{
  direccion.setCustomValidity('');
  direccion.style.background='#bbeffa';
}

if(telefono.value==""){
  telefono.setCustomValidity('Inserte un telefono');  
  }else{
  telefono.setCustomValidity('');
  telefono.style.background='#bbeffa';
}

if(email.value==""){
  email.setCustomValidity('Inserte una direccion de correo válida');  
  }else{
  email.setCustomValidity('');
  email.style.background='#bbeffa';
}

if(clave.value==""){
  clave.setCustomValidity('Inserte una clave');  
  }else{
  clave.setCustomValidity('');
  clave.style.background='#bbeffa';
}

if(jugador1.value==""){
  jugador1.setCustomValidity('Inserte un nombre de jugador');  
  }else{
  jugador1.setCustomValidity('');
  jugador1.style.background='#bbeffa';
}

if(jugador2.value==""){
  jugador2.setCustomValidity('Inserte un nombre de jugador');  
  }else{
  jugador2.setCustomValidity('');
  jugador2.style.background='#bbeffa';
}

if(jugador3.value==""){
  jugador3.setCustomValidity('Inserte un nombre de jugador');  
  }else{
  jugador3.setCustomValidity('');
  jugador3.style.background='#bbeffa';
}

if(jugador4.value==""){
  jugador4.setCustomValidity('Inserte un nombre de jugador');  
  }else{
  jugador4.setCustomValidity('');
  jugador4.style.background='#bbeffa';
}

if(nombreArticulo.value==""){
  nombreArticulo.setCustomValidity('Inserte un nombre de Articulo');  
  }else{
  nombreArticulo.setCustomValidity('');
  nombreArticulo.style.background='#bbeffa';
}

if(descripcionArticulo.value==""){
  descripcionArticulo.setCustomValidity('Inserte una descripcion de Articulo');  
  }else{
  descripcionArticulo.setCustomValidity('');
  descripcionArticulo.style.background='#bbeffa';
}

if(precio.value==""){
  precio.setCustomValidity('Inserte un precio');  
  }else{
  precio.setCustomValidity('');
  precio.style.background='#bbeffa';
}

if(formacion.value==""){
  formacion.setCustomValidity('Indique su formacion');  
  }else{
  formacion.setCustomValidity('');
  formacion.style.background='#bbeffa';
}

if(experiencia.value==""){
  experiencia.setCustomValidity('Indique su experiencia');  
  }else{
  experiencia.setCustomValidity('');
  experiencia.style.background='#bbeffa';
}

if(anuncio.value==""){
  anuncio.setCustomValidity('Indique su anuncio');  
  }else{
  anuncio.setCustomValidity('');
  anuncio.style.background='#bbeffa';
}

if(horarios.value==""){
  horarios.setCustomValidity('Indique sus horarios');  
  }else{
  horarios.setCustomValidity('');
  horarios.style.background='#bbeffa';
}

if(mensaje.value==""){
  mensaje.setCustomValidity('Indique su mensaje');  
  }else{
  mensaje.setCustomValidity('');
  mensaje.style.background='#bbeffa';
}


}