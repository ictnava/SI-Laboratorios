<?php

include 'conexion.php';
if($_SERVER['REQUEST_METHOD']== 'POST')
{
    $usuario = $_POST['username'];
    if($_POST['acepto']=="on"){
            $sentencia = $conexion->prepare("SELECT username FROM usuarios WHERE username = :usuario");
            $sentencia->bindValue(':usuario',$usuario);
            $sentencia->execute();
            if(!$sentencia->fetch(PDO::FETCH_NUM))
            {
                $nombre= filter_input(INPUT_POST, 'nombre',FILTER_SANITIZE_STRING);
                $usuario= filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
                $email= filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
                $contrasenia = filter_input(INPUT_POST, 'contrasena',FILTER_SANITIZE_STRING);
                $contrasenia2 = filter_input(INPUT_POST, 'contrasena2',FILTER_SANITIZE_STRING);
                $hash = password_hash($contrasenia,PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios (nombre,username,email,contrasena,`image`) VALUES('$nombre','$usuario','$email','$hash','img/users.png')";
                $conexion->query($sql);
                header('Location: index.php');
                return;
            }else{
                echo '<script src="registrar.js"></script>';
                //print"Ya existe ese nombre en la base de datos";
            }
        } 
        else{
            echo '<script>alert("NO ACEPTASTE TERMINOS Y CONDICIONES");</script>';
        }
}
include 'PEncabezado.php';
?>
      <div class="container pt-5 pb-5">
        <h1 class="text-center">Registrate y súmate a nuestra comunidad</h1>

      <form action="" method="POST">
                            <div class="form-group row justify-content-center">
                                <input type="text" class="form-control col-5" required name="nombre" id="nombre" placeholder="Nombre Completo">
                                <label class="col-1">&nbsp;</label>
                                <input type="text" class="form-control col-5" required name="username" id="username" placeholder="Nombre Usuario">
                                <p id="mensaje"></p>
                            </div>
                            <div class="form-group row justify-content-center">
                                <input type="email" class="form-control col-5" required name="email" id="email" placeholder="E-mail">
                                <label class="col-1">&nbsp;</label>
                                <input type="password" class="form-control col-5" required name="contrasena" id="contrasena" placeholder="Contraseña">
                            </div>
                            <div class="form-group row justify-content-center">
                                <input type="password" class="form-control col-5" required name="contrasena2" id="contrasena2" placeholder="Confirmar Contraseña">
                            </div>
                            <div class="text-center">
                                <input type="checkbox" id="customCheck1" name="acepto" id="acepto">
                                <label  for="customCheck1">Acepto terminos y condiciones de este sitio web.</label>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" id="registrar" class="btn btn-outline-warning" value="submit">Registar</button>
                            </div>
                            </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>