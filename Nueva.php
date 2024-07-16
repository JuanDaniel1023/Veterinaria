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

            echo json_encode(array("success" => $respuesta));
            break;

        case 'eliminar':
            // Instruccion eliminar
            $respuesta = false;

            if (isset($_POST['id'])) {
                $sentencia = $conexion->prepare("DELETE FROM eventos WHERE ID=:ID");
                $respuesta = $sentencia->execute(array("ID" => $_POST['id']));
            }
            echo json_encode(array("success" => $respuesta));
            break;

        case 'editar':
            // Instruccion editar
            $sentencia = $conexion->prepare("UPDATE eventos SET
                title=:title,
                description=:description,
                color=:color,
                texColor=:texColor,
                start=:start,
                end=:end
                WHERE ID=:ID
            ");

            $respuesta = $sentencia->execute(array(
                "ID" => $_POST['id'],
                "title" => $_POST['title'],
                "description" => $_POST['description'],
                "color" =>  $_POST['color'],
                "texColor" =>  $_POST['texColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end']
            ));
            echo json_encode(array("success" => $respuesta));

            break;

        default:
            $sentencia = $conexion->prepare("SELECT * FROM eventos");
            $sentencia->execute();

            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
            break;
    }
} catch (PDOException $e) {
    echo json_encode(array("error" => $e->getMessage()));
}