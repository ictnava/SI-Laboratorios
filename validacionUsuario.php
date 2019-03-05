<?php
    session_start();
    //Verificar si el usuario esta autenticado
    if(!isset($_SESSION['clave']) && !isset($_SESSION['Nombre']))
        header("Location:login.php");
?>