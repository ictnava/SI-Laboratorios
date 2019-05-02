<?php
    session_start();
    include("BaseDatos.php");

    if(isset($_REQUEST['logUs']) && isset($_REQUEST['logCont']))
    {
        //conectar a la BD
        $usuarioo = $_REQUEST['logUs'];
        $contraseña = $_REQUEST['logCont'];
        $bd = new BaseDatos();
        $bd->conectar();
        if(!$bd->getConexion())
            echo "No fue Posible acceder a la base de datos";
        $qry = "SELECT CONCAT(Nombre, ' ', ApPaterno, ' ', ApMaterno) AS Nombre, IdBecarios FROM becarios WHERE Usuario= :usuario and Contrasena= :contradecrypt";
        $sentencia = $bd->getConexion()->prepare($qry);
        $rs = $sentencia->execute(array(':usuario' => $usuarioo, ':contradecrypt' => $contraseña));
        //Si Existen Usuarios
        if($rs)
        {
            $datos = $sentencia->fetchObject();
            //almacenar los datos en el arreglo session
            $_SESSION['clave'] = $usuarioo;
            $_SESSION['Nombre'] = $datos->Nombre;
            $_SESSION['idbec'] = $datos->IdBecarios;
            $bd->desconectar();
            if($_SESSION['Nombre']!=null)
            {
                header("Location:index.php");
            }
            else
                header("Location:login.php?msg=Usuario o Contraseña no coinciden");
        }
        
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("head.php"); ?>
    <title>Login Laboratorios UASLP</title>
</head>
<body>
    <?php include("menu.php"); ?>
    <!--Form de Acceso-->
    <div id="formLogin">
        <form action="login.php" method="post">
            <fieldset>
                <div>
                    <div>
                        <label for="logUs">Clave del alumno: </label>
                    </div>
                    <div>
                        <input type="text" id="logUs" maxlength="40" name="logUs" required>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="logCont">Contraseña: </label>
                    </div>
                    <div>
                        <input type="password" id="logCont" maxlength="20" name="logCont" required>
                    </div>
                </div>
                <a href="#">Olvidé mi contraseña</a>
            </fieldset>
            <input type="submit" value="Acceder" id="btn-login">
        </form>
        <p id="infoRegUsu">
            <?php
                if(isset($_REQUEST['msg']))
                    echo $_REQUEST['msg'];
            ?>
        </p>
    </div>
</body>
</html>