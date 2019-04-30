<?php
    include("validacionUsuario.php");
    include("baseDatos.php");

    if(isset($_REQUEST["claveUnica"]) && isset($_REQUEST["claveLab"]) && isset($_REQUEST["fecha"]) 
        && isset($_REQUEST['hora']))
    {
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
            print_r("Algo salió mal :(");
        $qry = "INSERT INTO registro_alumno (ClaveUnica, ClaveLab, Fecha, Hora) VALUES (:claveu, :clavelab, :fech, :hra)";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(":claveu"  => $_REQUEST['claveUnica'], ":clavelab" => $_REQUEST['claveLab'], 
                                        ":fech" => $_REQUEST['fecha'], ":hra" => $_REQUEST['hora']));
        if(!$rs)
        {
            $bd->desconectar();
            print_r($sentencia->errorInfo());
        }
        else
        {
            $bd->desconectar();
            header("Location: consultaEntradas.php?msg=Se registró la entrada con éxito");
        }
    }
    else
    {
        echo "Error al procesar la petición :( <br> Intentelo de nuevo";
    }
?>