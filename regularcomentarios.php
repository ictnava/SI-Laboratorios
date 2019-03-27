<?php
    include 'PEncabezadoadmin.php';
    
    function muestraComentarios(){
        global $conexion;
        $sql = "SELECT * FROM comentarios WHERE aprobado=0";
        $resultado = $conexion->query($sql);
        if($resultado){
            foreach($resultado as $fila){
                echo '<form method="POST">
                <div class="row">
                    <section class="col-lg-2 col-sm-12 p-3 ml-3 border-bottom ">
                        <h3>'.$fila[1].'</h3>
                    </section>
                    <section class="col-lg-3 col-sm-12 p-3 border-bottom">
                        <h5>'.$fila[2].'</h5>
                    </section>
                    <section class="col-lg-3 col-sm-12 border-bottom">
                        <input type="hidden" name="id" value="'.$fila[0].'">
                    </section>
                    <section class="col-lg-1 col-sm-6 p-2 border-bottom">
                    <button class="btn btn-danger btn-md ml-3" name="eliminar" type="submit">
                    Eliminar</button>
                    </section>
                    <section class="col-lg-2 col-sm-6 p-2 border-bottom">
                    <button class="btn btn-success btn-md ml-3" name="aprobar" type="submit">
                    Aprobar</button>
                    </section>
                </div>
                </form>';
            }
        }
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['eliminar']))
        {
            global $conexion;
            $sql = "DELETE FROM comentarios WHERE id=".$_POST['id'];
            //echo $sql;
            $resultado = $conexion->query($sql);
        }
        else{
            global $conexion;
            $sql = "UPDATE comentarios SET aprobado=1 WHERE id=".$_POST['id'];
            $resultado = $conexion->query($sql);
        }
    }
?>
<div class="container justify-content-center">
    <h1 class="text-success">Comentarios pendientes</h1>
    <div class="column-md-12 border m-3">
        <?php muestraComentarios(); ?>
    </div>
</div>