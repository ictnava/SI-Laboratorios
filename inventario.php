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
    <title>Consulta de Entradas</title>
    <?php include("head.php"); ?>
</head>
<body>
    <?php include("menu.php"); ?>
    <div id="divConsEntrad">
        <h2>Entradas</h2>
            <?php 
                if(isset($_GET["msg"])):
            ?>
            <div class="alert alert-light" role="alert">
                <?php echo $_GET['msg']; ?>
            </div>
            <?php endif; ?>
        <div id="divTablaBeca">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Nombre </th>
              <th scope="col">Descripcion </th>
              <th scope="col">No. UASLP </th>
              <th scope="col">No. Local </th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $bd = new BaseDatos();
              $bd->conectar();
              if(!$bd->getConexion())
                echo "Error al procesar la petición :( ";
              $qry = "SELECT a.nombre, a.descripcion, a.numuaslp, b.nolocal FROM articulo a, inventario b where a.IdArticulo = b.IdArticulo";
              $sentencia = $bd->getConexion()->prepare($qry);
              $rs = $sentencia->execute();
              if(!$rs)
                print_r($sentencia->errorInfo());
              while($datos= $sentencia->fetchObject())
              {
                echo "<tr class='text-body'>";
                echo "<td>".$datos->nombre."</td>";
                echo "<td>".$datos->descripcion."</td>";
                echo "<td>".$datos->numuaslp."</td>";
                echo "<td>".$datos->nolocal."</td>";
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