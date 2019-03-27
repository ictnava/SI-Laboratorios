var xmlhttp = new XMLHttpRequest();
var btnRegistrar = document.getElementById("registrar");
btnRegistrar.addEventListener("click",usuario);
btnRegistrar.addEventListener()

var modal = document.getElementById("myModal");

var camposvacios = document.getElementById("camposvacios");

function usuario() {
    var acepto = document.getElementById("acepto");
    if (acepto.value == "on") {
        var nom = document.getElementById("nombre");
        var usr = document.getElementById("username");
        var email = document.getElementById("email");
        var con1 = document.getElementById("contrasena");
        var con2 = document.getElementById("contrasena2");
            if(con1.value==con2.value){
                camposvacios.innerText = nom.value;
                xmlhttp.open("GET","getUser.php?n="+nom.value+ "&u=" + usr.value+ "&e=" + email.value);
                xmlhttp.send();
            }
            else{
                document.getElementById("mensaje").innerText = "Las contraseñas no coinciden";
            }
    }
    else{
        var usuario = document.getElementById("user");
        var contra = document.getElementById("password");
        camposvacios.innerText = "esta mal";
        console.log('wtf');
        if(usuario.value != "" && contra.value!=""){
            //var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","getUser.php?us="+usuario+ "&con=" + contra,true);
            xmlhttp.send();
        }
        else{
            document.getElementById("mensaje").innerText = "Faltan datos";
        }
    }
}
