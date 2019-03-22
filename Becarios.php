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
    <title>Becarios</title>
    <?php include("head.php"); ?>
</head>
<body>
    <?php include("menu.php"); ?>
    <div id="divArticulo">
        <h2>Becarios</h2>

        <div id="divTablaBeca">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombres</th>
              <th scope="col">Apellido Paterno</th>
              <th scope="col">Apellido Materno</th>
              <th scope="col">Clave </th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $bd = new BaseDatos();
              $bd->conectar();
              if(!$bd->getConexion())
                echo "Error al procesar la petición :( ";
              $qry = "SELECT * FROM becarios";
              $sentencia = $bd->getConexion()->prepare($qry);
              $rs = $sentencia->execute();
              if(!$rs)
                print_r($sentencia->errorInfo());
              while($datos= $sentencia->fetchObject())
              {
                echo "<tr class='text-body'>";
                echo "<th scope='row'>".$datos->IdBecarios."</th>";
                echo "<td>".$datos->Nombre."</td>";
                echo "<td>".$datos->ApPaterno."</td>";
                echo "<td>".$datos->ApMaterno."</td>";
                echo "<td>".$datos->Usuario."</td>";
                echo "</tr>";
              }
              $bd->desconectar();
            ?>
          </tbody>
        </table>
        </div>
    </div>
</body>
</html>