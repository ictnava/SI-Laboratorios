<?php 
include 'PEncabezadoadmin.php';
include 'conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $nombre = filter_input(INPUT_POST, 'nombre',FILTER_SANITIZE_STRING);
    $Descripcion = filter_input(INPUT_POST, 'des',FILTER_SANITIZE_STRING);
    $Director = filter_input(INPUT_POST, 'dir',FILTER_SANITIZE_STRING);
    $Duracion = filter_input(INPUT_POST, 'dur',FILTER_SANITIZE_NUMBER_INT);
    $anio = filter_input(INPUT_POST, 'anio',FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST, 'cat',FILTER_SANITIZE_STRING);
    $fecha = date("Y-m-d");; 
    
    if(isset($_FILES["foto"]["name"])){
        $filename = $_FILES["foto"]["name"];
        $fileruta = $_FILES["foto"]["tmp_name"];
        $filedestino = "img/".$filename;
        copy($fileruta,$filedestino);
        }
    
        $sql ='INSERT INTO `peliculas` (`id`, `nombre`, `foto`, `descripcion`, `anio`, `director`, `categoria`, `duracion`,`fecha`) 
        VALUES (NULL, :nombre, :foto, :descripcion, :anio, :director, :categoria, :duracion, :fecha)';
        $sentencia = $conexion->prepare($sql);
        $sentencia->bindValue(':nombre',$nombre);
        $sentencia->bindValue(':foto',$filedestino);
        $sentencia->bindValue(':descripcion',$Descripcion);
        $sentencia->bindValue(':anio',$anio);
        $sentencia->bindValue(':director',$Director);
        $sentencia->bindValue(':categoria',$categoria);
        $sentencia->bindValue(':duracion',$Duracion);
        $sentencia->bindValue(':fecha',$fecha);
        $sentencia->execute();
        $bandera = false;
        header('Location: peliculasadmin.php');
}
?>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group" >
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre1" name="nombre" value='<?=$nombre?>' placeholder="Nombre" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="des" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="des" name="des" placeholder="Descripcion" value='<?=$Descripcion?>' required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dir" class="col-sm-2 col-form-label">Director</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="dir" name="dir" placeholder="Director" value='<?=$Director?>' required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dura" class="col-sm-2 col-form-label">Duracion</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="dura" name="dur" placeholder="Duracion" value='<?=$Duracion?>' required>
                    </div>
                    <label for="a" class="col-sm-1 col-form-label">Año</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="a" placeholder="Año" name="anio" value='<?=$anio?>' required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cat" class="col-sm-2">Categoria</label>
                    <select class="form-control col-sm-9" id="cat" name="cat" value='<?=$categoria?>' required>
                    <?php
                        $sql ='SELECT * FROM `categoria`';
                        $consulta = $conexion->query($sql);
                        foreach ($consulta as $fila) {
                            echo "<option> $fila[1] </option>";
                        }
                        
                    ?>
                    </select>
                </div>
                <input type="file" class="form-control-file border" name="foto" placeholder="" value='<?=$fecha?>' required>            
            </div>
                <button type="submit" class="btn btn-success">Agregar</button>          
        
        </form>
    </div>

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>