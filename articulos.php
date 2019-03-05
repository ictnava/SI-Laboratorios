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
        <h2>Registrar un nuevo articulo</h2>
        <form action="nuevoArticulo.php" method="post">
            <div class="form-group row">
                <label for="Nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-4">
                    <input type="text" id="Nombre" required name="Nombre" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-4">
                    <textarea id="exampleFormControlTextarea1" rows="3" required name="Descripcion" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="numeroUASLP" class="col-sm-2 col-form-label">Numero UASLP</label>
                <div class="col-sm-4">
                    <input type="number" id="numeroUASLP" required name="numero" class="form-control">
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