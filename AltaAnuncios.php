<?php 
    include("validacionUsuario.php");
    include("baseDatos.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir un articulo</title>
    <?php include("head.php"); ?>
</head>
<body>
    <?php include("menu.php"); ?>
    <div id="divArticulo">
        <h2>Nuevo Anuncio</h2>
        <form action="nuevoAnuncio.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="labora" class="col-sm-2 col-form-label">Laboratorio</label>
            <div class="col-sm-4">
                <div class="input-group mb-3">
                <select class="custom-select" name="lab">
                    <?php
                        $bd = new BaseDatos();
                        $bd->conectar();
                        if(!$bd->getConexion())
                            echo "Error al procesar la petición :( ";
                        $qry = "SELECT ClaveLab, NombreLab FROM laboratorio";
                        $sentencia = $bd->getConexion()->prepare($qry);
                        $rs = $sentencia->execute();
                        if(!$rs)
                            print_r($sentencia->errorInfo());
                        while( $datos= $sentencia->fetchObject())
                        {
                            echo "<option value='".$datos->ClaveLab."'>" . $datos->NombreLab . "</option>";
                        }
                        $bd->desconectar();
                    ?>
                </select>
                </div>
            </div>
        </div>
            <div class="form-group row">
                <label for="Img" class="col-sm-2 col-form-label">Imagen</label>
                <div class="col-sm-4">
                    <input type="file" id="Img" required class="form-control-file" accept="image/*" name="img">
                </div>
            </div>
            <div class="form-group row">
                <label for="Desc" class="col-sm-2 col-form-label">Descripción: </label>
                <div class="col-sm-4">
                    <textarea type="file" id="Desc" required class="form-control" rows="3" name="desc"></textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-8">
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    <p id="infoRegUsu">
                        <?php
                            if(isset($_REQUEST['msg']))
                                echo $_REQUEST['msg'];
                        ?>
                    </p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>