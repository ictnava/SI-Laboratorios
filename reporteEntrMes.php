<?php
    include("validacionUsuario.php");
    include("baseDatos.php");
    //variables utilizadas para las fechas
    $hoy = getdate();
    $anio = $hoy['year'];
    $mes = "01";
    $claveLab = 1;

    //por default siempre aparece el laboratorio con clave 1, a menos de que se cambie
    if(isset($_REQUEST['lab']))
        $claveLab = $_REQUEST['lab'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/loader.js"></script>
    <title>Reporte de entradas por mes</title>
    <?php include("head.php");?>
</head>
<body>
    <?php 
        include("menu.php");
        //recopilar los datos en javascript para 
        //poder hacer la gráfica, no me gusta ajax
        //porque es inseguro en la parte de las peticiones
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
            echo "Error al solicitar la petición";
        echo "<script>
                localStorage.clear();
                var Periodos = [];";
        for($i = 1; $i<13; $i++)
        {
            //esto del if es para evitar errores del lado de la consulta
            if($i<10)
                $mes = "0" . $i;
            else
                $mes = $i;
            $qry = "SELECT COUNT(ClaveUnica) AS entrds FROM registro_alumno WHERE Fecha LIKE '$anio-$mes%' AND ClaveLab=$claveLab";
            $sentencia = $bd->getConexion()->prepare($qry);
            $rs = $sentencia->execute();
            if(!$rs)
                print_r($sentencia->errorInfo());
            $datos = $sentencia->fetchObject();
            //esto para evitar que marque error desde el otro lado
            //de javascript al tratar de llenar la gráfica
            if($datos->entrds == null)
                $datos->entrds = 0;
            echo "
                    var periodo = {};
                    periodo.anio = $anio;
                    periodo.mes = $mes;
                    periodo.entradas = $datos->entrds;
                    periodo.laboratorio = $claveLab;
                    Periodos.push(periodo);
                    window.localStorage.setItem('Periodos', JSON.stringify(Periodos));
            ";
        }
            echo "</script>";
            $bd->desconectar();
    ?>
    <div id="divEntradasMes">
        <h2>Reporte de entradas por mes</h2>
        <form method="post">
            <div class="form-group row">
                <div class="col-sm-4">
                    <select id="selectLab" class="form-control" name="lab">
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
                <div class="col-sm-3">
                    <input type="submit" value="Buscar" class="btn btn-info">
                </div>
            </div>
        </form>
        <div id="avisoPDF" class="alert alert-info" role="alert">
            Clic <a href="crearPDFEntrds.php" class="alert-link" target="_blank">aqui</a> para ver PDF...
        </div>
    </div>
    <div id="divGrafEntrds" class="container">
    </div>
    
    <script src="js/chartEntradas.js"></script>
</body>
</html>
