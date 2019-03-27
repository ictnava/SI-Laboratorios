var mensaje = document.getElementById("mensaje");
var registrar = document.getElementById("registrar");
registrar.addEventListener("click", respuesta);
    function respuesta(){
    mensaje.innerText = "Ya existe ese nombre en la base de datos";
    }