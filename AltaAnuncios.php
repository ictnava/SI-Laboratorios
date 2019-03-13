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
        <form action="nuevoArticulo.php" method="post">
            <div class="form-group row">
                <label for="Nombre" class="col-sm-2 col-form-label">Link</label>
                <div class="col-sm-4">
                    <input type="text" id="Nombre" required name="Nombre" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-2">
                    <input type="date" name="fecha" id="fecha">
                </div>
            </div>
            <div class="form-group row">
                <label for="numeroUASLP" class="col-sm-2 col-form-label">Becario</label>
                <div class="col-sm-4">
                <div class="input-group mb-3">
                
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="numeroUASLP" class="col-sm-2 col-form-label">Laboratorio</label>
                <div class="col-sm-4">
                <div class="input-group mb-3">
                
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                </div>
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