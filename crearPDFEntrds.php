<?php
    include("validacionUsuario.php");
    include("baseDatos.php");
    date_default_timezone_set('America/Mexico_City');
    
    # Cargamos la librería dompdf.
    require_once 'dompdf\autoload.inc.php';

    use Dompdf\Dompdf;
    $hoy = getdate();
    $fecha = $hoy['year'] . "-" . $hoy['mon'] . "-" . $hoy['mday'];
    $claveLab = $_REQUEST['idL'];
    $nombre = "img/".$_REQUEST['nom'];
    if(isset($_REQUEST['idL'])):
        ?>
        
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ejemplo de Documento en PDF.</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
            
        <div style="width:90%; margin: 0 auto; text-align:center;">
            <img src="img/uaslp.jpg" class="img-thumbnail" alt="uaslp" style="width: 10%; float:left;">
            
            <?php
                $bd = new BaseDatos();
                $bd->conectar();
                if(!$bd->getConexion())
                    echo "Error al solicitar la petición";
                $qry = "SELECT NombreLab FROM laboratorio WHERE ClaveLab= :clab";
                $sentencia = $bd->getConexion()->prepare($qry);
                $rs = $sentencia->execute(array(':clab' => $claveLab));
                if(!$rs)
                    print_r($sentencia->errorInfo());
                $datos = $sentencia->fetchObject()
            ?>
            <h5 style="margin-right: 7%;"> Reporte del Laboratorio: <?php echo $datos->NombreLab; 
                $qry = "SELECT COUNT(ClaveUnica) AS maxEntrds FROM registro_alumno WHERE ClaveLab = :clab";
                $sentencia = $bd->getConexion()->prepare($qry);
                $rs = $sentencia->execute(array(':clab' => $claveLab));
                if(!$rs)
                    print_r($sentencia->errorInfo());
                $datos = $sentencia->fetchObject();
                $maxEntrds = $datos->maxEntrds;
            $bd->desconectar();?></h5>
            
            <img src="img/fi.jpg" class="img-thumbnail" alt="fi" style="width: 5%; float: right; margin-top: -4%;">
        </div>
        

        <div style="width:90%; margin: 0 auto; text-align:center;">
        
        <p style="margin-right: 7%;"><?php echo $fecha; ?></p>
        </div>

        <div style="width: 70%; margin: 5% auto;">
        <?php
        //hacer consulta en la base de datos
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
            echo "Error al solicitar la petición";
        $qry = "SELECT * FROM registro_alumno WHERE ClaveLab= :clab";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(':clab' => $claveLab));
        if(!$rs)
            print_r($sentencia->errorInfo());
        ?>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Clave Única</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
            </tr>
            </thead>
            <tbody>
        <?php
        while($datos = $sentencia->fetchObject()): ?>
            <tr>
                <td><?php echo $datos->ClaveUnica; ?></td>
                <td><?php echo $datos->Fecha; ?></td>
                <td><?php echo $datos->Hora; ?></td>
            </tr>
        <?php $bd->desconectar();endwhile;?>
       
        </tbody>
        </table>
        <div>
            <img class="img-thumbnail" src=<?php echo $nombre;?> id="grafica" alt="uaslp" style="width: 100%; float:left;">
        </div>
            
        </div>
        </body>
        </html>
    <?php else:
        echo "Algo salió mal :(";
    ?>
    <?php endif;?>
    <?php
    # Contenido HTML del documento que queremos generar en PDF.
    

    

    # Instanciamos un objeto de la clase DOMPDF.
    $mipdf = new Dompdf();

    # Definimos el tamaño y orientación del papel que queremos.
    # O por defecto cogerá el que está en el fichero de configuración.
    $mipdf ->set_paper("A4", "portrait");

    # Cargamos el contenido HTML.
    $mipdf ->load_html(ob_get_clean());

    # Renderizamos el documento PDF.
    $mipdf ->render();
    

    # Enviamos el fichero PDF al navegador.
    $mipdf ->stream('FicheroEjemplo.pdf', array('Attachment'=>0));
?>