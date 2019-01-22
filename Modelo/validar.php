<?php


$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

class Conexion{
    public function get_conexion() {
        $user="postgres";
        $pass="1234";
        $host="localhost";
        $db="reservas";
        $conexion= new PDO("pgsql:host=$host;dbname=$db",$user,$pass);
    return $conexion;
    }
}
 $pruebacon=new Conexion();
 $con = $pruebacon -> get_conexion();
 if($con){
     echo "se conectó exitosamente";

 }else{
     echo "Error No se pudo conectar";
 }


 $consulta = 'select * from login where correo="' . $correo . '" and contrasena = "' . $contrasena . '"';

$orden = $conexion->prepare($consulta);

$orden->execute();

$esUsuarioRegistrado = $orden->rowCount();


$dirLogeado = "prueba.php";
$dirError = "index.php";

if($esUsuarioRegistrado == 1){
    header('Location: '. $dirLogeado);
}else{
    header('Location: '. $dirError);
}
