<?php
include 'PEncabezadoadmin.php';
include 'conexion.php';
?>


<div class="container">
    <div class="list-group">
        <?php
            $sql = 'SELECT * FROM usuarios';
            $consulta = $conexion->query($sql);
            $id;
            foreach($consulta as $fila)
            {
                echo
                '<div class="list-group-item">
                    <div class="row">
                            <div class="col">
                            <div class="row justify-content-between">
                                <h5 class="mb-1">'.$fila[1].'</h5>
                            </div>
                            <div class="row">'; ?>
                            <button type ="button" class="btn btn-danger" data-toggle="modal" data-target="registrar">
                            ELIMINAR
                            </button>
                            <?php
                            echo '</div>
                        </div>
                    </div>
                </div>';
            }
            
        ?>
        
    </div>  
</div>

    
    <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="registrar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CUENTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       ¿SEGURO QUE QUIERE ELIMINAR ESTA CUENTA?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php global $id;
        echo '<a name="" id="" class="btn btn-success" href="eliminar.php?id='.$id.'&tabla=usuarios&pagina=cuentas" role="button">Eliminar</a>';
        ?>
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