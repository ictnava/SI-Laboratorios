<?php 
include 'conexion.php';
include 'PEncabezado.php';
?>

    <div class="container">
    <?php
            if(isset($_GET['pelicula'])){
                //echo 'si entra '.$_GET['pelicula'];
                $sql = "SELECT * FROM peliculas WHERE nombre='".$_GET['pelicula']."'";
            }
            else{$sql = "SELECT * FROM peliculas";}
            $consulta = $conexion->query($sql);
            $contador = 7;
            foreach ($consulta as $fila) {
                if($contador > 5)
                {
                    echo '<div class="card-deck">';
                    
                    $contador=1;
                }
                echo<<< _HTML_
                <div class="card col-md-2 col-sm-6 mb-50">
                <div class="row">
_HTML_;
                if(isset($_SESSION['usuario']))
                {
                    $usuario = $_SESSION['usuario'];
                    echo"<div class='text-right col-12 bg-dark'>
                    <a href='agregar.php?nombre=$usuario&peli=$fila[1]'><i class='fas fa-plus-circle text-success'></i></a>
                    </div>";
                }
                echo<<<_HTML
                <a href="peliculaindividual.php?title=$fila[1]"><img class="card-img-top" src=$fila[2] alt=""></a>
                <div class="card-body">
                <a href="peliculaindividual.php?title=$fila[1]"><h4 class="card-title">$fila[1]</h4></a>
                </div>
                </div>
            </div>
_HTML;
$contador++;
                if($contador > 5)
                {
                    echo '</div>';
                }
            }
            ?>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>