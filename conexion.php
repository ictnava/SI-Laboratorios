<?php
//$user = "pm17182014";
$pass = "C8u7e8BNSs";
$user = "root";
try{
$conexion = new PDO('mysql:host=localhost;dbname=reactfilm2',$user);
}catch(PDOException $e){
    print "ERROR en la conexion"."<br/>";
    die();
}
?>