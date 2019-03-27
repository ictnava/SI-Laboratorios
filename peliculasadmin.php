<?php
include 'PEncabezadoadmin.php';
include 'conexion.php';
?>
<div class="container">
    <div class="list-group">
        <?php
            $sql = 'SELECT * FROM peliculas';
            $consulta = $conexion->query($sql);
            foreach($consulta as $fila)
            {
                echo<<< _HTML_
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-2">
                            <img src=$fila[2] class="img-fluid" alt="" >
                        </div>
                        <div class="col">
                            <div class="row justify-content-between">
                                <h5 class="mb-1">$fila[1]</h5>
                                <small>$fila[8]</small>
                            </div>
                            <div class="row">
                            <p class="mb-1">$fila[3]</p>
                            </div>
                            <div class="row">
                            <a name="" id="" class="btn btn-primary" href="modificar.php?id=$fila[0]" role="button">Modificar</a>
                            <a name="" id="" class="btn btn-danger" href="eliminar.php?id=$fila[0]&tabla=peliculas&pagina=peliculasadmin" role="button">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
_HTML_;
            }
            
        ?>
        
    </div>  
</div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>