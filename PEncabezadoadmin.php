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
                <a class="navbar-brand col-2 text-white">ReactFilm</a>
         </div>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavId">
                <form class="form-inline col-6">
                    <input class="form-control col-9" type="text" placeholder="Buscar">
                    <button class="btn btn-outline-success btn-sm col-2 ml-3" type="submit">
                        <i class="fas fa-search"></i> Buscar</button>
                </form>

                <?php
                    if(isset($_SESSION['admin']))
                    {
                        echo'<a href="Cerrar.php">
                        <i class="fas fa-sign-in-alt btn-danger p-3"></i>
                    </a>';  
                    }
                    ?>
            </div>
        </nav>
        <!-- Barra Secundaria -->
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="indexadmin.php">Inicio</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="peliculasadmin.php">Peliculas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregarpeliculas.php">Agregar Pelicula</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="cuentas.php">Cuentas</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="regularcomentarios.php">Comentarios</a>
            </li>
        </ul>

            
        </div>
    </div>
</div>

