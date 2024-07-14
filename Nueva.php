
<?php
include("./conexion.php");
header('Content-Type: application/json');

try {
    $accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
    switch ($accion) {
        case 'agregar':
            // Instruccion agregar

            $sentencia = $conexion->prepare("INSERT INTO eventos (title, description, color, texColor, start, end) VALUES (:title, :description, :color, :texColor, :start, :end)");

            $respuesta = $sentencia->execute(array(
                "title" => $_POST['title'],
                "description" => $_POST['description'],
                "color" =>  $_POST['color'],
                "texColor" =>  $_POST['texColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end']
            ));
            
           echo json_encode($respuesta);
            break;

        case 'eliminar':
            // Instruccion eliminar
            // echo "Instruccion eliminar";
            // $respuesta = false;

            // if(isset($_POST['id'])){
            //     $sentencia = $conexion->prepare("DELETE FROM eventos WHERE ID=:ID");
            //     $respuesta = $sentencia->execute(array("ID"=>$_POST['id']));
            // }
            // echo json_encode($respuesta);
            break;

        case 'editar':
            // Instruccion editar
            echo "Instruccion editar";
            break;

        default:
            $sentencia = $conexion->prepare("SELECT * FROM eventos");
            $sentencia->execute();

            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
            break;
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>