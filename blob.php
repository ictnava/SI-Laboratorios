<?php
    include("validacionUsuario.php");
    include("baseDatos.php");
    if(isset($_REQUEST['idA']))
    {
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
        {
            echo "No fue posible conectarse a la BD. ";
        }
        $id = $_REQUEST['idA'];
        $qry = "SELECT Imagen FROM anuncio WHERE idAnuncio= :id";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(':id' => $id));
        $datos = $sentencia->fetchObject();
        header("Content-Type: image/jpeg");
        echo($datos->Imagen);
        $bd->desconectar();
    }
?>