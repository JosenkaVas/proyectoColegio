<?php
session_start();
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula   = $_POST['cedula'];
    $nombre   = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo   = $_POST['correo'];

    try {
        $sql = "UPDATE persona 
                SET nombre = :nombre, 
                    apellido = :apellido, 
                    telefono = :telefono, 
                    correo = :correo 
                WHERE id_cedula = :id_cedula";

        $stmt = $conexion->prepare($sql);
        
        $resultado = $stmt->execute([
            ':nombre'    => $nombre,
            ':apellido'  => $apellido,
            ':telefono'  => $telefono,
            ':correo'    => $correo,
            ':id_cedula' => $cedula
        ]);

        if ($resultado) {
            // Redirigir con parámetro de éxito
            header("Location: perfil.php?status=success");
            exit();
        }

    } catch (PDOException $e) {
        // Redirigir con parámetro de error
        header("Location: perfil.php?status=error");
        exit();
    }
}
?>