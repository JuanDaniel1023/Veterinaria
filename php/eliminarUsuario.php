<?php


if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);
    
    // Usar prepared statements para prevenir inyecciones SQL
    $stmt = $conexion->prepare("DELETE FROM usuario WHERE id_usuario = ?");
    $stmt->bind_param("i", $id); // "i" indica que es un valor entero.
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
          //  echo "<div>Persona eliminada correctamente</div>";
        } else {
           // echo "<div>Persona no encontrada en la base de datos</div>";
        }
    } else {
        echo "<div>Error al eliminar: " . $stmt->error . "</div>";
    }
    
    $stmt->close();
} else {
  //  echo "<div>ID no proporcionado o inválido</div>";
}



?>