var btnRegistrar = document.getElementById("registrar");
btnRegistrar.onclick = registrar;
var nombre = document.getElementById("nombre");
var usuario = document.getElementById("username");
var email = document.getElementById("email");
var contra1 = document.getElementById("contrasena");
var contra2 = document.getElementById("contrasena2");
var acepto = document.getElementById("acepto");

var mensaje = document.getElementById("mensaje");
nombre.addEventListener("input",buscaUsuario);
var xhr = new XMLHttpRequest();
xhr.addEventListener("load",respuesta);

function buscaUsuario(){
    //console.log(usuario.value);
    xhr.open("GET","PEncabezado.php?username="+usuario.value);
    xhr.send();
}

function respuesta(){
    //console.log(this.XMLHttpRequest);
    if(this.responseText == 1){
        mensaje.innerText = "El usuario ya existe";
    } else{
        mensaje.innerText = "";
    }
}

function registrar(){
    if(acepto.value=="on"){
        console.log(nombre.value);
    }
    else{
        console.log("invalid");
    }
}
