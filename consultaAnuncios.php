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
    <?php include("head.php"); ?>
    <title>Consulta de Anuncios</title>
</head>
<body>
    <?php include("menu.php"); ?>
    <?php 
        if(isset($_GET["msg"])):
    ?>
    <div class="alert alert-light" role="alert">
        <?php echo $_GET['msg']; ?>
    </div>
    <?php endif; ?>
</body>
</html>