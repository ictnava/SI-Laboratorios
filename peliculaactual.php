<?php include 'PEncabezado.php' ?>
<?php
    echo '<input type="hidden" id="peli">';
    echo "<script> $('#peli').val('".$_GET['title']."'); </script>";
    $title = $_GET['title'];
    //echo $title;

    function muestraImagen(){
        global $title;
        global $conexion;
      $sql = "SELECT * FROM peliculas WHERE nombre = '".$title."'";
      $consulta = $conexion->query($sql);
      //var_dump($consulta);
      foreach($consulta as $fila){
              echo<<< _HTML_
              <div class="col bg-info text-center m-3">
                    <h2 class="p-3" id="titulo">$fila[1]</h2>
                </div>
                <div class="col text-center">
                <img class="card-img-top" id="poster" width="150" src=$fila[2] alt="">
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button name="reacc" value="heart"><i class="fas fa-heart"></i></button>
                        <button name="reacc" value="like"><i class="far fa-thumbs-up"></i></button>
                        <button name="reacc" value="dislike"><i class="far fa-thumbs-down"></i></button>
                        <button name="reacc" value="sad"><i class="far fa-frown"> </i></button>
                    </div>
                </div>
                <div class="text-center col">
                    <h4>Description</h4>
                    <p>
                        $fila[3]
                    </p>
                </div>
_HTML_;
    }
}
?>
    <div class="container">

        <!-- Descripcion de la pelicula-->
        <div class="row border">
            <form class="m-5 pr-5 col-3 border">
                
                   <?php muestraImagen() ?>
                
                
                
            </form>
            <!--Progress bar-->
            <form class="mt-5 pr-2 pt-5 col-2 border mx-auto">
                <div class="progress">
                    <div>
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                </div>
                <br>
                <div class="progress">
                    <div>
                        <i class="far fa-thumbs-up"></i>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">5%</div>
                </div>
                <br>
                <div class="progress">
                    <div>
                        <i class="far fa-thumbs-down"> </i>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
                <br>
                <div class="progress">
                    <div>
                        <i class="far fa-frown"> </i>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100">5%</div>
                </div>
                <br>
                <input type="text" id="reaccion">
                <h6 class="mt-5">Comments</h6>
                <div class="row">
                    <div class="col col-2">
                        <img src="coco.jpg" alt="user image" width="30">
                    </div>
                    <div class="col col-10">
                    <p>Lorem ipsum dolor explicabo fuga obcaecati? Tenetur laboriosam vitae ullam.</p>
                    </div>
                </div>
            </form>
            <!--Video-->
            <form class=" m-5 pr-5 col-4 border">
                <video width="320" height="240" controls>
                    <source src="https://www.youtube.com/watch?v=bOIHSSBIXZE" type="video/mp4"> Your browser does not support the video tag.
                </video>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>

<script>
    var peli = document.getElementById("peli");
    document.getElementById("titulo").innerText = peli.value;
//REACCIONES
  var heart = document.getElementById("heart");
  var like = document.getElementById("like");
  var dislike = document.getElementById("dislike");
  var sad = document.getElementById("sad");
  heart.addEventListener("click",reaccionh);
  like.addEventListener("click",reaccionl);
  dislike.addEventListener("click",reacciond);
  sad.addEventListener("click",reaccions);
  function reaccionh(){
        $('#reaccion').val('4');
  }
  function reaccionl{
        $('#reaccion').val('3');
      }
    function reacciond{
        $('#reaccion').val('2');
      }
      function reaccions{
        $('#reaccion').val('1');
      }
      //poner en un hiden input la cantidad de la calificacion
</script>