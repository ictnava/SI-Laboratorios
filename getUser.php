<?php include 'conexion.php' ?>
<?php
echo 'HOLA';
//mysqli_select_db($con,"ajax_demo");
if($_GET['us']!=""){ //Entra aqui si es un inicio de sesion
global $conexion;
$q = intval($_GET['q']);
$sql="SELECT * FROM usuarios WHERE id = "$q."";
echo $sql;
$resultado = $conexion->query($sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = $resultado->fetch(PDO::FETCH_NUM)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";
}

if($_GET['n']!=""){ //entra aqui si es un registro
    global $conexion;
    $nom = $_GET['n'];
    $email = $_GET['e'];
    $contra = $_GET['c1'];
    $user = $_GET['u'];
    $sql = "INSERT INTO usuario (nombre,email,fecha_registro,contrasena,user) VALUES('".$nom."','".$email."',curdate(),'"
        .$contra."','".$user."')";
    echo $sql;
    $resultado = $conexion->query($sql);

}
?>