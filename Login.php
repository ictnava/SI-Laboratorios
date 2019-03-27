<?php
session_start();
include 'conexion.php';
$errores ="";
if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
    $usuario = filter_input(INPUT_POST, 'usuario',FILTER_SANITIZE_STRING);
    $contaseña = filter_input(INPUT_POST, 'contraseña',FILTER_SANITIZE_STRING);
    $hash = password_hash($contaseña,PASSWORD_DEFAULT);
    $sql = $conexion->prepare("SELECT * FROM `usuarios` WHERE `username` = :usuario");
    $sql->bindValue(':usuario', $usuario);
    $sql->execute();
    $resultado = $sql->fetch(PDO::FETCH_NUM);
    if($resultado[2]== "admin" &&  password_verify("root", $hash)){
    $_SESSION['admin'] = $usuario;
    header('Location: indexadmin.php');
   }else {
        if($resultado[2] == $usuario && password_verify($contaseña, $hash))
        {
            //setcookie('usuario', "$usuario");
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            return;
        }else{
            $errores = "ERROR no valido";
        }
   }
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form action="" method ="POST" class="bg-dark text-center mt-5 p-5">
        <img src="img/logoreactfilm2.png" alt="" class="col-2">
        <h1 style="color:white" class="m-5">Iniciar sesión para mejores beneficios</h1>
        <input type="text" name="usuario" placeholder="Nombre de usuario">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <button type="submit" class="btn btn-success col-8 mt-3"> Acceder</button>
        <p><a href="Registrar.php" class="btn btn-warning col-8">Registrate</a></p>
        </form>
        <?php if($errores != ""):?>
        <p><?=$errores?></p>
        <?php endif?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>