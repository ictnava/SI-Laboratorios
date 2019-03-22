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
    <title>Laboratorios</title>
    <?php include("head.php"); ?>
</head>
<body>
<?php include("menu.php"); ?>
    <div id="divArticulo">
        <h2>Laboratorios</h2>

        <div id="divTablaLab">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Área</th>
            </tr>
          </thead>
          <tbody>
          <?php 
              $bd = new BaseDatos();
              $bd->conectar();
              if(!$bd->getConexion())
                echo "Error al procesar la petición :( ";
              $qry = "SELECT * FROM laboratorio";
              $sentencia = $bd->getConexion()->prepare($qry);
              $rs = $sentencia->execute();
              if(!$rs)
                print_r($sentencia->errorInfo());
              while($datos= $sentencia->fetchObject())
              {
                echo "<tr class='text-body'>";
                echo "<th scope='row'>".$datos->ClaveLab."</th>";
                echo "<td>".$datos->NombreLab."</td>";
                echo "<td>".$datos->Area."</td>";
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