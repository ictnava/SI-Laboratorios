<?php
include 'PEncabezado.php';
$usuario = $_SESSION['usuario'];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_FILES["foto"]["name"])){
        $filename = $_FILES["foto"]["name"];
        $fileruta = $_FILES["foto"]["tmp_name"];
        $filedestino = "usuarios/".$filename;
        copy($fileruta,$filedestino);
        }
    
    $sql ="UPDATE usuarios SET image = '".$filedestino."' WHERE username = '".$_SESSION['usuario']."'";
    $consulta = $conexion->query($sql);


}
?>
      <div class="container">
      <div class="row border">
            <div class="col-4 border text-center bg-dark">
                    <div class="border bg-white mt-5">
                        <?php
                            $consulta2 = $conexion->query("SELECT * FROM usuarios WHERE username = '".$_SESSION['usuario']."'");
                            foreach ($consulta2 as $key ) {
                                echo'<img src='.$key[5].' alt="" width="150" height="145"style="position:relative">';
                            }
                        ?>
                        <!-- <img src= alt="" width="150" height="145"style="position:relative"> -->
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" class="form-control-file border" name="foto" value="usuarios/users.png">
                        <button type="submit" class="btn btn-warning mt-3" id="asd">
                        <i class="fas fa-camera-retro text-ligth" width="200px"></i>
                        Cambiar foto de perfil
                        </button>
                       
                    </form>
                    
                    
                    
                    <h2 class="mt-4 text-white"><?php echo strtoupper($_SESSION['usuario']);?></h2>
            </div>
            <div class="col border">
            <h1>Lista de peliculas favoritas</h1>
            <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="mt-5">
            
            <div class="list-group">
        <?php
            $sql = "SELECT * FROM lista WHERE usuario = '".$usuario."'";
            
            $consulta = $conexion->query($sql);
            foreach ($consulta as $fila2) {
                
                $sql = "SELECT * FROM peliculas WHERE nombre ='".$fila2[1]."'";
                
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
                                <a name="" id="" class="btn btn-danger text-white"  role="button"  data-toggle="modal" data-target="#exampleModal">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>
_HTML_;
            }
            }
            
            
        ?>
        
    </div> 
        </div>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estas seguro que deseas eliminar de tu lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <?php
        $sql = "SELECT * FROM lista WHERE usuario = '".$usuario."'";
            
        $consulta = $conexion->query($sql);
        foreach ($consulta as $fila2) {
            
            $sql = "SELECT * FROM peliculas WHERE nombre ='".$fila2[1]."'";
            
            $consulta = $conexion->query($sql);
            foreach($consulta as $fila)
            {
                $pelicula = $fila2[0];
                
            }
        }
        echo '<a class="btn btn-primary" href="eliminar.php?id='.$pelicula.'&tabla=lista&pagina=usuario">Continuar</a>';
        ?>
        
      </div>
    </div>
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