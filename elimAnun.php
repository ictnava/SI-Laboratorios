<?php
    include("validacionUsuario.php");
    include("baseDatos.php");
    
    if(isset($_REQUEST['idA']))
    {
        $idAnun = $_REQUEST['idA'];

        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
        echo "Error al procesar la petición :( ";
        $qry = "DELETE FROM anuncio WHERE IdAnuncio=:idA";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(':idA' => $idAnun));
        if(!$rs)
        {
        print_r($sentencia->errorInfo());
        }
        else
        {
            header("Location:consultaAnuncios.php?msg=Se eliminó un anuncio con éxito");
        }
    }
    else
    {
        header("Location:consultaAnuncios.php?msg=Error al intentar eliminar el anuncio");
    }

?>