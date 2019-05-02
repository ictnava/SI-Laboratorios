<?php
    include("validacionUsuario.php");
    include("baseDatos.php");
    if(isset($_REQUEST['Nombre']) && isset($_REQUEST['Descripcion']) && isset($_REQUEST['numero']))
    {
        //Conexión a la base de datos
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
            echo "No fue posible procesar la petición ". mysqli_error($conn);
        $nombre = $_REQUEST['Nombre'];
        $descripcion = $_REQUEST['Descripcion'];
        $numero = $_REQUEST['numero'];
        $qry = "INSERT INTO articulo (Nombre, Descripcion, NumUASLP) VALUES (:nom, :descr, :num)";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(':nom' => $nombre, ':descr' => $descripcion, ':num' => $numero));
        if(!$rs)
            echo "Algo salio mal :(" . $sentencia->errorInfo();
        header("Location:articulos.php?msg=Se añadio un articulo");
    }
    else
    {
        header("Location:articulos.php?msg=Error al intentar insertar el articulo");
    }
?>