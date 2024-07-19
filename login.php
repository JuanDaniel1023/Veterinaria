<?php
session_start();
include("./conexion.php");

if ($_POST) {
    // Prepara la consulta SQL
    $sentencia = $conexion->prepare("SELECT usuario.id_usuario, usuario.nombUsuario, usuario.password, usuario.idRol, roles.nombre
    FROM `usuario`
    LEFT JOIN roles ON usuario.idRol = roles.idRol
    WHERE nombUsuario = :nombUsuario AND password = :password;
    ");

    // Obtén los valores de usuario y contraseña del formulario POST
    $usuario = $_POST['nombUsuario'];
    $password = $_POST['password'];

    // Vincula los parámetros a la consulta
    $sentencia->bindParam(":nombUsuario", $usuario);
    $sentencia->bindParam(":password", $password);

    // Ejecuta la consulta
    $sentencia->execute();

    // Obtiene el resultado de la consulta
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Verifica si se encontró un usuario válido
   if ($registro !== false) {
        // Iniciar sesión correcta
        $_SESSION["usuario"] = $registro["nombUsuario"];
        $_SESSION["login"] = true;
        $_SESSION['rol'] = $registro['nombre']; // Nombre del rol

        // Asigna el rol del usuario a la variable de sesión
      //  $_SESSION['rol'] = $registro['nombre']; // Nombre del rol en lugar de idrol

        // Redirecciona al usuario según su rol
        if ($_SESSION['rol'] == "Administrador") {
            header("Location: dashboardUsuario.php"); // Redirige a la página de administrador
        } else {
            header("Location: dashboardUsuario.php"); // Redirige a la página de usuario regular
        }
    } else {
        // Error: el usuario o la contraseña son incorrectos
        $mensaje = "Error, el usuario o la contraseña son incorrectos";
    }
}

?>

<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Formulario de Acceso </title>    
        
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

                    <form action="" method= "post" id="loginform">
                        <label for="usuario">Usuario</label>
                        <input id="nombUsuario" type="text" name="nombUsuario" placeholder="Usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="password" required>
                        
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    

                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="registroUsuario.php">¿No tienes Cuenta? Registrate</a>
                        <hr>
                        <a href="../Index.php">« Volver</a>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>