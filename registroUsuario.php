<?php
session_start();
include("./conexion.php");

if ($_POST) {
    // Inicializa las variables con valores predeterminados
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $nombUsuario = isset($_POST['nombUsuario']) ? $_POST['nombUsuario'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $idRol = 2; // Asigna el rol de usuario (suponiendo que el rol de usuario es 2)

    // Verifica si el usuario o correo ya existen
    $sentencia = $conexion->prepare("SELECT * FROM usuario WHERE nombUsuario = :nombUsuario OR correo = :correo");
    $sentencia->bindParam(":nombUsuario", $nombUsuario);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($registro !== false) {
        // Error: el usuario o correo ya existen
        $mensaje = "Error, el usuario o el correo ya están registrados. Por favor, elige otro.";
    } else {
        // Inserta el nuevo usuario en la base de datos
        $sentencia = $conexion->prepare("INSERT INTO usuario (id_usuario, nombre, apellido, correo, nombUsuario, password, idRol) VALUES (null, :nombre, :apellido, :correo, :nombUsuario, :password, :idRol)");
        $sentencia->bindParam(":nombre", $nombre);
        $sentencia->bindParam(":apellido", $apellido);
        $sentencia->bindParam(":correo", $correo);
        $sentencia->bindParam(":nombUsuario", $nombUsuario);
        $sentencia->bindParam(":password", $password);
        $sentencia->bindParam(":idRol", $idRol);

        if ($sentencia->execute()) {
            $mensaje = "Usuario registrado exitosamente.";
            echo "<script>alert('Usuario registrado exitosamente.'); window.location.href = 'login.php';</script>";
            exit();
        } else {
            $mensaje = "Error al registrar el usuario. Por favor, intenta de nuevo.";
        }
    }
}
?>



<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">

<head>

    <meta charset="utf-8">

    <title> Formulario de Registro </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Videojuegos & Desarrollo">
    <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5 y CSS">
    <meta name="keywords" content="login,formulariode acceso html">

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="./css/login.css">

    <style type="text/css">

    </style>

    <script type="text/javascript">

    </script>

</head>

<body>

    <div id="contenedor">

        <div id="contenedorcentrado">
            <div id="login">

                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensaje; ?></strong>
                    </div>
                <?php } ?>

                <form action="" method="post" id="registroform">
                    <label for="usuario">Nombres</label>
                    <input id="nombre" type="text" name="nombre" placeholder="Nombres" required>

                    <label for="password">Apellidos</label>
                    <input id="apellido" type="text" placeholder="Apellidos" name="apellido" required>

                    <label for="correo">Correo</label>
                    <input id="correo" type="email" placeholder="Corrreo" name="correo" required>

                    <label for="password">Nombre de Usuario</label>
                    <input id="nombUsuario" type="text" placeholder="Nombre de usuario" name="nombUsuario" required>

                    <label for="password">Contraseña</label>
                    <input id="password" type="password" placeholder="Contraseña" name="password" required>


                    <button type="submit" title="Ingresar" name="registrar">Registrar</button>
                </form>


            </div>
            <div id="derecho">
                <div class="titulo">
                    Registrate
                </div>
                <hr>
                <!-- <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="registro.php">¿No tienes Cuenta? Registrate</a>
                        <hr>
                        <a href="../Index.php">« Volver</a>
                    </div> -->
            </div>
        </div>
    </div>

</body>

</html>