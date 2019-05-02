<?php
    include("validacionUsuario.php");
    include("baseDatos.php");

    if(isset($_REQUEST['lab']))
    {
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
            echo "No fue posible procesar la petición ";
        $lab = $_REQUEST['lab'];
        if(!empty($_FILES['img']['tmp_name']))
        {
            //recuperr las variables
            $Nombre = $_FILES['img']['name'];
            $Tipo = $_FILES['img']['type'];
            $NombreTemporal = $_FILES['img']['tmp_name'];
            $tamanio = $_FILES['img']['size'];
            
            
            //Recuperer el contenido del archivo
            $fp = fopen($NombreTemporal, "r");
            $contenido = fread($fp, $tamanio);
            fclose($fp);
            $contenido = addslashes($contenido);
        }
        $hoy = getdate();
        $fecha = $hoy['year'] . "-" . $hoy['mon'] . "-" . $hoy['mday'];
        $hora = $hoy['hours'] . ":" . $hoy['minutes'] . ":" . $hoy['seconds'];
        $becario = $_SESSION['idbec'];

        $qry = "INSERT INTO anuncio (IdLaboratorio, Fecha, Hora, IdBecario, Imagen) VALUES (:idlab, :fech, :hra, :idbec, '$contenido')";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(':idlab' => $lab, ':fech' => $fecha, ':hra' => $hora, ':idbec' => $becario));
        if(!$rs)
            echo "Algo salio mal :(" . $sentencia->errorInfo();
        header("Location:consultaAnuncios.php?msg=Se añadio un anuncio");
    }
    else
    {
        header("Location:AltaAnuncios.php?msg=Error al intentar insertar el anuncio");
    }
?>