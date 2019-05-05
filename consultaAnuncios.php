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
   
    <div id="divConsEntrad">
            <h2>Consulta de anuncios</h2>
            <div class="card-group">
            <?php 
              $bd = new BaseDatos();
              $bd->conectar();
              if(!$bd->getConexion())
                echo "Error al procesar la petición :( ";
              $qry = "SELECT IdAnuncio, Fecha, Hora, NombreLab, CONCAT(Nombre, ' ', ApPaterno, ' ', ApMaterno) AS nomBec FROM (anuncio INNER JOIN laboratorio ON anuncio.IdLaboratorio = laboratorio.ClaveLab) INNER JOIN becarios ON anuncio.IdLaboratorio = becarios.IdBecarios";
              $sentencia = $bd->getConexion()->prepare($qry);
              $rs = $sentencia->execute();
              if(!$rs)
                print_r($sentencia->errorInfo());
              while($datos= $sentencia->fetchObject())
              {
                  echo "<div class='tarjs'><div class='card'>";
                  echo "<img class='card-img-top' src='blob.php?idA=".$datos->IdAnuncio."' alt='$datos->IdAnuncio' style='width: 15rem; margin: 0 auto;'>";
                  echo "<div class='card-body'>";
                  echo "<h5 class='card-title'>$datos->NombreLab"."--".$datos->IdAnuncio."</h5>";
                  echo "<p class='card-text'>$datos->Fecha<br>".$datos->Hora."<br>".$datos->nomBec."</p>";
                  echo "</div>";
                  echo "</div></div>";
              }
              $bd->desconectar();
            ?>
            </div>
            </div>
</body>
</html>