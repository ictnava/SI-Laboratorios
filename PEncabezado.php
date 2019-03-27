<?php session_start(); 
include 'conexion.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <title>ReactFilm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="colores.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
      
       <!-- Barra Principal -->
     <nav class="navbar navbar-expand-md navbar-dark bg-dark">
         <div>
             <img src="img/logoreactfilm2.png" alt="Logo de la pagina" style=width:100px;>
                <a class="navbar-brand col-2" href="#">ReactFilm</a>
         </div>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavId">
                <form class="form-inline col-md-6" method="GET" action="peliculas.php">
                    <input class="form-control col-8" type="text" placeholder="Buscar" id="txtBuscar" name="pelicula">
                    <button class="btn btn-outline-success btn-sm col-2 ml-3" id="buscar" type="submit">
                        <i class="fas fa-search"></i> Buscar</button>
                </form>
                <section class="col-md-6 text-right">
                <div class="row">
                <a href="https://www.facebook.com" alt="envia a facebook" target="_blank">
                    <button type="button" class="btn btn-outline-primary btn-sm-block btn-md">
                        <i class="fab fa-facebook-square"></i> Facebook</button>
                </a>
                    <a href="https://www.twitter.com" alt="envia a twitter" target="_blank">
                    <button type="button" class="btn btn-outline-info btn-sm-block btn-md">
                        <i class="fab fa-twitter"></i> Twitter</button>
                    </a>
                    <a href="https://www.instagram.com" alt="envia a instagram" target="_blank">
                    <button type="button" class="btn btn-outline-danger btn-sm-block btn-md">
                        <i class="fab fa-instagram"></i> Instagram</button>
                    </a>
                    <?php
                    if(!isset($_SESSION['usuario']))
                    {
                        echo '<section class="col col-md-4">
                        <a class="m-2" href="Login.php">
                        <i class="fas fa-users btn-warning p-3"></i>
                    </a>
                    <a class="m-2" href="Registrar.php">
                    <i class="fas fa-user-plus btn-success p-3"></i>
                    </a>
                    </section>';
                    }else
                    {
                        echo'<section class="col col-md-4">
                        <a href="Cerrar.php">
                        <i class="fas fa-sign-in-alt btn-danger p-3"></i>
                    </a>
                        <a href="usuario.php">
                        <i class="fas fa-user-circle text-light border p-3"></i>
                    </a>
                    </section>';
                    }
                    ?>
                    </div>
                </section>
            </div>
        </nav>
        <!-- Barra Secundaria -->
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="clasificacion.php" role="button" aria-haspopup="true" aria-expanded="false">Clasificación</a>
                <div class="dropdown-menu">
                <?php
                    $sql ='SELECT * FROM `categoria`';
                    $consulta = $conexion->query($sql);
                    foreach ($consulta as $fila) {
                        echo<<< _HTML_
                        <a class="dropdown-item" href="clasificacion.php?id=$fila[1]">$fila[1]</a>
_HTML_;
                    }
                ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="peliculas.php">Peliculas</a>
            </li>
            
            <li class="nav-item">
                    <a class="nav-link" href="novedades.php">Novedades</a>
            </li>
        </ul>

</div>
<script>
    var pelicula = document.getElementById("txtBuscar");
    var xhr = new XMLHttpRequest();
    //xhr.addEventListener("load",respuesta); 
    var btnBusqueda = document.getElementById("buscar");
    btnBusqueda.addEventListener("click",buscar);
    function buscar(){
        console.log(pelicula.value);
        xhr.open("GET","peliculas.php?pelicula="+pelicula.value);
        xhr.send();
    }
</script>
