 <?php

include '../modelo/conexion.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];



$query = "INSERT INTO usuario(nombre_completo, correo, usuario, password) 
          VALUES ('$nombre_completo', '$correo', '$usuario', '$password')";

// verificar que el correo no se repita db.

 
$verificar_correo = mysqli_query($conexion, " SELECT * FROM usuario WHERE correo = '$correo' ");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo ' 
    <script>
        alert(" Este correo ya esta registrado, intenta con otro diferente");
        window.location="registro.html"
    </script>
    ';
    exit();
}

// verificar que el usuario no se repita db.
$verificar_usuario = mysqli_query($conexion, " SELECT * FROM usuario WHERE usuario = '$usuario' ");

if (mysqli_num_rows($verificar_usuario) > 0) {
    echo ' 
    <script>
        alert(" Este usuario ya esta registrado, intenta con uno diferente"); 
        window.location="registro.php"
    </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script> 
        alert ("Usuario guardado exitosamente");
        window.location = " ../dashboardUsuario.php";
    </script> ';
} else {
    echo '
    <script> 
        alert ("Usuario no almacenado ");
        window.location = " ../registro.php";
    </script> ';
}

mysqli_close($conexion);
