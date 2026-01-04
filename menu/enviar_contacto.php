<?php
require_once "../config/db.php"; // Asegúrate de que esta ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre  = htmlspecialchars($_POST['nombre']);
    $email   = htmlspecialchars($_POST['email']);
    $asunto  = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    try {
        // Consulta compatible con PostgreSQL y MySQL usando PDO
        $sql = "INSERT INTO mensajes_contacto (nombre, email, asunto, mensaje) 
                VALUES (:nombre, :email, :asunto, :mensaje)";
        $stmt = $conexion->prepare($sql);
        
        $resultado = $stmt->execute([
            ':nombre'  => $nombre,
            ':email'   => $email,
            ':asunto'  => $asunto,
            ':mensaje' => $mensaje
        ]);

        header("Location: contactanos.php?status=success");
    } catch (Exception $e) {
        header("Location: contactanos.php?status=error");
    }
} else {
    header("Location: contactanos.php");
}
exit();