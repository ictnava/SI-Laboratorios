<?php include 'PEncabezado.php' ?>
<?php
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
    }
    //echo '<form method="POST">
    //<input type="text" id="reaccion" nombre="reacci">
    //</form>';
    //echo '<p id="prueba"></p>';
    //echo "<script> $('#peli').val('".$_GET['title']."'); </script>";
    $title = $_GET['title'];
    //echo $title;

    function muestraImagen(){
        global $title;
        global $conexion;
      $sql = "SELECT * FROM peliculas WHERE nombre = '".$title."'";
      $consulta = $conexion->query($sql);
      if ($consulta === TRUE) {
        echo "New record created successfully";
    } else {
       // print_r($conexion->errorInfo());
    }
      //var_dump($consulta);
      foreach($consulta as $fila){
              echo '
              <div class="row justify-content-center">
            <section class="col-md-12 well bg-dark text-center">
            <h2 class="p-4 text-white" id="titulo">'.$fila[1].'</h2>
            </section>
        </div>';
        
        echo '<div class="row">
            <section class="col-md-6 text-center bg-warning mt-3 p-3">
                <img class="" id="poster" width="250" src='.$fila[2].' alt="movie poster">
                <form method = "POST">
                <div class="row justify-content-center">
                        <button name="reacc1" value="heart" id="heart"><i class="fas fa-heart"></i></button>
                        <button name="reacc2" value="like" id="like"><i class="far fa-thumbs-up"></i></button>
                        <button name="reacc3" value="dislike" id="dislike"><i class="far fa-thumbs-down"></i></button>
                        <button name="reacc4" value="sad" id="sad"><i class="far fa-frown"> </i></button>
                        
                </div>';
                imprimeCantidad();
                echo '</form>';
                echo<<< _HTML_
                <div class="row justify-content-center m-3">
                    <br>
                    <br>
                    <h4 class="text-danger">Descripcion</h4>
                    <br>
                    <p>
                        $fila[3]
                    </p>
                </div>
            </section>

_HTML_;
    }
}

function muestraComentarios(){
    global $title;
    global $conexion;
    global $usuario;
    $sql = "SELECT * FROM comentarios WHERE pelicula = '".$title."' AND aprobado = 1";
    //echo $sql;
      $consulta = $conexion->query($sql);
      //var_dump($consulta);
//a la tabla de comentario agregar username y nombre de la pelicula
    echo<<< _HTML_
    <section class="col-md-6 text-center border mt-3 p-3">
    <div class="row">
        <section class="col col-md-1">
            <h4>$usuario</h4>
        </seciton>
     <form method="POST">
        <section class="col col-md-6 col-sm-12">
            <textarea rows="5" cols="53" name="comentario">
            </textarea>
        </section>
        <section>
        <button id="submitcomment" class="btn btn-outline-info btn-md ml-3" value="submit" name="comment">
            Comentar
        </button>
        <br>
        </section>
     </form>
    </div>
    <div class="row">
_HTML_;
        foreach($consulta as $fila){
                echo '<section class="col-md-11 bg-dark text-white m-3">
                <h4>'.$fila[1].'</h4>
            </seciton>
            <section class="col-md-12 border">
                <p>'.$fila[2].'</p>
            </section>
            ';
        }
      echo  '</div>
</section>
</div>';
}
//CLICK A LAS REACCIONES
if($_SERVER['REQUEST_METHOD']=='POST'){
    global $conexion;
    global $title;
    global $usuario;
    $tmp="";
    if(isset($usuario)){
        //HAY USUARIO Y SE VA A LAS REACCIONES PARA VER CUAL ELIGIO
        if(isset($_POST['reacc1']) || isset($_POST['reacc2']) || isset($_POST['reacc3']) || isset($_POST['reacc4']) ){
            //echo 'SI ENTRO';
            if(isset($_POST['reacc1'])){
                $tmp = '4';
                echo $tmp;
                echo '<input type="hidden" id="reaccion" name="reacci" value="'.$tmp.'">';
            }
            else if(isset($_POST['reacc2'])){
                $tmp = '3';
                //echo $tmp;
                echo '<input type="hidden" id="reaccion" name="reacci" value="'.$tmp.'">';
            }
            else if(isset($_POST['reacc3'])){
                $tmp = '2';
                echo '<input type="hidden" id="reaccion" name="reacci" value="'.$tmp.'">';
            }
            else{
                $tmp = '1';
                echo '<input type="hidden" id="reaccion" name="reacci" value="'.$tmp.'">';
            }
            $tmp;
            $consulta = "SELECT * FROM calificacion WHERE pelicula ='".$title."' AND usuario ='".$usuario."'";
            //echo $consulta;
            $res =$conexion->query($consulta);
            //echo 'why' . $res->fetch(PDO::FETCH_OBJ);
        //var_dump($res);
            if(!$res){
                echo '<script>alert("YA REACCINASTE A ESTA PELICULA")</script>';
            }
            else{
                //if(isset($_SESSION['usuario'])){
            $sql = "INSERT INTO calificacion(pelicula,usuario,calificacion) VALUES('$title','$usuario',".$tmp.")";
            //echo $sql;
            $conexion->query($sql);
                //}
            }
        }
        else{ //SI ENTRA AQUI HAY USUARIO PERO NO DIO CLICK EN REACCION
            $sql = "INSERT INTO comentarios (user,comentario,pelicula,aprobado) VALUES ('$usuario','".$_POST['comentario']."','".$title."',1)";
            $conexion->query($sql);
        }
   }
    else if(isset($_POST['comment'])){
        //echo 'entro';
        $sql = "INSERT INTO comentarios (user,comentario,pelicula,aprobado) VALUES ('anónimo','".$_POST['comentario']."','".$title."',0)";
        //echo $sql;
        $conexion->query($sql);
    }
    else{
        echo '<script>alert("DEBES ESTAR REGISTRADO PARA REACCIONAR")</script>';
    }
}

function imprimeCantidad(){
    global $conexion;
    global $usuario;
    global $title;
    //sqls de las reacciones
    $sql4 = "SELECT SUM(calificacion.calificacion) FROM calificacion WHERE pelicula='".$title."' AND calificacion=4";
    $sql3 = "SELECT SUM(calificacion.calificacion) FROM calificacion WHERE pelicula='".$title."' AND calificacion=3";
    $sql2 = "SELECT SUM(calificacion.calificacion) FROM calificacion WHERE pelicula='".$title."' AND calificacion=2";
    $sql1 = "SELECT SUM(calificacion.calificacion) FROM calificacion WHERE pelicula='".$title."' AND calificacion=1";
    //var_dump($conexion->query($sql2));
    echo '<form class="mt-5 pr-2 pt-5 col-2 border mx-auto">';
    $temporal = $conexion->query($sql4)->fetchAll();
    foreach ($temporal as $tm){
        echo '<div class="progress">
        <div>
            <i class="fas fa-heart"></i>
        </div>
        <div class="progress-bar" role="progressbar" style="width:'.$tm[0].';" aria-valuenow="'.$tm[0].'" aria-valuemin="0" aria-valuemax="100">'.$tm[0].'</div>
        </div>';
    }

    $temporal2 = $conexion->query($sql3)->fetchAll();
    foreach ($temporal2 as $tm2){
        echo '<div class="progress">
        <div>
            <i class="far fa-thumbs-up"></i>
        </div>
        <div class="progress-bar" role="progressbar" style="width:'.$tm2[0].';" aria-valuenow="'.$tm2[0].'" aria-valuemin="0" aria-valuemax="100">'.$tm2[0].'</div>
        </div>';
    }

    $temporal3 = $conexion->query($sql2)->fetchAll();
    foreach ($temporal3 as $tm3){
        echo '<div class="progress">
        <div>
            <i class="far fa-thumbs-down"> </i>
        </div>
        <div class="progress-bar" role="progressbar" style="width:'.$tm3[0].';" aria-valuenow="'.$tm3[0].'" aria-valuemin="0" aria-valuemax="100">'.$tm3[0].'</div>
        </div>';
    }

    $temporal4 = $conexion->query($sql1)->fetchAll();
    foreach ($temporal4 as $tm4){
        echo '<div class="progress">
        <div>
            <i class="far fa-frown"> </i>
        </div>
        <div class="progress-bar" role="progressbar" style="width:'.$tm4[0].';" aria-valuenow="'.$tm4[0].'" aria-valuemin="0" aria-valuemax="100">'.$tm4[0].'</div>
        </div>';
    }

    echo '</form>';
}

?>
    <script src="calificaciones.js"> </script>
    <div class="container">
        <?php 
              muestraImagen();
              muestraComentarios();
        ?>  
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
