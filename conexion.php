<?php 
//header("Access-Control-Allow-Origin: http://localhost");
//$conexion = mysqli_connect("localhost","root", "123456789", "nueva");
$servidor= "localhost";
$baseDeDatos= "proyecto";
$usuario="root";
$contrasena= "123456789";


try{
    $conexion= new PDO("mysql:host=$servidor; dbname=$baseDeDatos",$usuario,$contrasena);
}catch(Exception $ex){
    echo $ex ->getMessage();
}
// ?>