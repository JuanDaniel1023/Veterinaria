<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../modelo/conexion.php';

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $conexion->prepare(" SELECT * FROM usuario WHERE usuario = ? AND password = ? ");
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->num_rows;

    if ($rows) {
        $_SESSION["usuario"] = $usuario;
       // $_SESSION["rol"] = $rows["rol"];
        header('Location: ../vista/dashboardUsuario.php');
    } else {
       
        include '../vista/login.php';
        die ("<script>alert('Error de acceso, Usuario o Contraseña incorrectos')</script>");
    }

    $stmt->close();
    $conexion->close();
}
?>