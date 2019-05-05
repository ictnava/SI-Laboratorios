<?php
    include ("validacionUsuario.php");
    include("baseDatos.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de inventario</title>
    <?php include("head.php"); ?>
</head>
<body>
    <?php include("menu.php"); ?>
    <div id="divFormEntr">
        <h2>Registro de inventario</h2>
        <form action="insertInventario.php" method="post">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Articulo: </label>
                <div class="col-sm-6">
                <select class="form-control" name="claveUnica">
                <?php
                        $bd = new BaseDatos();
                        $bd->conectar();
                        if(!$bd->getConexion())
                            echo "Error al procesar la petición :( ";
                        $qry = "SELECT idArticulo, nombre FROM articulo";
                        $sentencia = $bd->getConexion()->prepare($qry);
                        $rs = $sentencia->execute();
                        if(!$rs)
                            print_r($sentencia->errorInfo());
                        while( $datos= $sentencia->fetchObject())
                        {
                            echo "<option value='".$datos->idArticulo."'>" . $datos->nombre . "</option>";
                        }
                        $bd->desconectar();
                    ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Laboratorio: </label>
                <div class="col-sm-6">
                <select class="form-control" name="claveLab">
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
            <div class="form-group row">
            <label class="col-sm-4 col-form-label">Cantidad: </label>
                <div class="col-sm-6">
                    <input type="number" required name="fecha" class="form-control">
                </div>
            </div>
            <div class="form-group row">
            <label class="col-sm-4 col-form-label">Num Local: </label>
                <div class="col-sm-6">
                    <input type="number" required name="hora" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" value="Registrar" class="btn btn-info">
                </div>
            </div>
        </form>
    </div>
</body>
</html>