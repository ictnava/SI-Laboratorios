<?php include 'PEncabezado.php';
include 'conexion.php';
?>
  <div class="container mt-5">
    <div class="row">
      <div class="col bg-dark pb-2">
        <h3 class= "text-white">Top 10 me Gusta </h3>
        <ul class="list-group">
        <?php
          $consulta=$conexion->query("SELECT pelicula, COUNT(pelicula) FROM calificacion WHERE calificacion = '3' GROUP BY pelicula");
          $contador=10;
          foreach ($consulta as $key) {
            if($contador>0)
            {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="peliculaindividual.php?title='.$key[0].'">'.$key[0].'</a><span class="badge badge-primary badge-pill">'.$key[1].'</span></li>';
              $contador--;
            }
            
          }
        ?>
        </ul>
      </div>
      <div class="col bg-dark pb-2">
        <h3 class= "text-white">Top 10 mas Duraderas </h3>
        <ul class="list-group">
        <?php
          $consulta=$conexion->query("SELECT * FROM peliculas WHERE duracion > '120'");
          $contador=10;
          foreach ($consulta as $key) {
            if($contador>0)
            {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="peliculaindividual.php?title='.$key[1].'">'.$key[1].'</a><span class="badge badge-primary badge-pill">'.$key[7].'</span></li>';
              $contador--;
            }
            
          }
        ?>
        </ul>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col bg-dark pb-2">
        <h3 class= "text-white">Top 10 en Boca de Todos </h3>
        <ul class="list-group">
        <?php
          $consulta=$conexion->query("SELECT pelicula,COUNT(pelicula) as cuenta FROM `comentarios` GROUP by pelicula ORDER by cuenta DESC");
          $contador=10;
          foreach ($consulta as $key) {
            if($contador>0)
            {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="peliculaindividual.php?title='.$key[0].'">'.$key[0].'</a><span class="badge badge-primary badge-pill">'.$key[1].'</span></li>';
              $contador--;
            }
            
          }
        ?>
        </ul>
      </div>
      <div class="col bg-dark pb-2">
        <h3 class= "text-white">Top 10 mas Calificadas </h3>
        <ul class="list-group">
        <?php
          $consulta=$conexion->query("SELECT pelicula,COUNT(pelicula) as cuenta FROM `calificacion` GROUP by pelicula ORDER by cuenta DESC");
          $contador=10;
          foreach ($consulta as $key) {
            if($contador>0)
            {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center"><a href="peliculaindividual.php?title='.$key[0].'">'.$key[0].'</a><span class="badge badge-primary badge-pill">'.$key[1].'</span></li>';
              $contador--;
            }
            
          }
        ?>
        </ul>
      </div>
    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>