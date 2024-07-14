<?php
if(!empty($_POST['modificarDatos'])){

$id=$_POST['id'] ;
$nombre_completo= $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$sql =$conexion->query("update usuario set nombre_completo='$nombre_completo', correo='$correo', usuario='$usuario', password='$password' where id_usuario=$id ");
if ($sql==1) {
   header("location: dashboardUsuario.php") ;
} else {
    echo "<div class= 'atert alert-danger'>Error al modificar producto </div>";
}



}

?>