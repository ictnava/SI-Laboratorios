<?php
     class BaseDatos
     {
         private $conexion;
         private $dsn;
         private $username;
         private $passwd;
 
         public function __construct()
         {
             $host = "localhost";
             $port = "3306";
             $dbname = "bdsi";
             $this->dsn = "mysql:host=" . $host . ";port=". $port . ";dbname=".$dbname . ";";
             $this->username = "root";
             $this->passwd = "";
         }
 
         public function conectar()
         {
             try {
                 $this->conexion = new PDO($this->dsn, $this->username, $this->passwd);
             }
             catch(PDOException $excepcion)
             {
                 echo "No se pudo conectar a la base de datos...";
                 echo $excepcion->getMessage();
             }
         }
         
         public function getConexion()
         {
             return($this->conexion);
         }

         public function desconectar(){
            $this->conexion = null;
        }

        public function __destruct(){
            $this->desconectar();
        }
    }
?>