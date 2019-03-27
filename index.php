<?php include 'PEncabezado.php'?>
<?php
function uploadTop(){
    try{
        global $conexion;
        
        $sql = "SELECT TOP 3 * FROM pelicula p INNER JOIN calificacion c ON p.idPelicula=c.idPelicula
        ORDER BY c.total DESC";
        echo $sql;
        $resultado = $conexion->query($sql);
        if(($fila = $resultado->fetch(PDO::FETCH_OBJ)) != false){
            
        }else {
           
        }
    }
    catch(PDOException $ex){
        echo 'Error en la conexión' . $ex->getMessage();
        return;
    }
}
?>
<div class="container">
    <!--slider-->
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner justify-content-center" role="listbox">
                <div class="carousel-item active ">
                    <img src="img/1.jpg" class="img-fluid" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Title</h3>
                        <p>Description</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/2.jpg" class="img-fluid  " alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Title</h3>
                        <p>Description</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpg" class="img-fluid" alt="Thirty slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Title</h3>
                        <p>Description</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--Table-->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Duracion</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = 'SELECT * FROM peliculas WHERE id < 10';
                $consulta = $conexion->query($sql);
                foreach ($consulta as $fila) {
                    echo<<< _HTML_
                    <tr>
                        <th scope="row">$fila[0]</th>
                        <td>$fila[1]</td>
                        <td>$fila[6]</td>
                        <td>$fila[7]</td>
                    </tr>
_HTML_;
                }
            ?>
            </tbody>
        </table>

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