<?php
require_once "config/db.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula   = $_POST['cedula'];
    $nombre   = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo   = $_POST['correo'];
    $ciudad   = $_POST['ciudad'];
    $usuario  = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
        // 1. Verificar si el nombre de usuario ya existe
        $check = $conexion->prepare("SELECT COUNT(*) FROM usuario WHERE nombre_usuario = ?");
        $check->execute([$usuario]);
        
        if ($check->fetchColumn() > 0) {
            // REDIRECCIÓN CON ERROR PARA MOSTRAR EN EL FORMULARIO
            header("Location: crear_cuenta.php?error=user_exists");
            exit();
        }

        $conexion->beginTransaction();

        // Usamos id_cedula como indicaste en tu esquema de PostgreSQL
        $sqlPersona = "INSERT INTO persona (id_cedula, nombre, apellido, telefono, correo) VALUES (?, ?, ?, ?, ?)";
        $stmtP = $conexion->prepare($sqlPersona);
        $stmtP->execute([$cedula, $nombre, $apellido, $telefono, $correo]);

        $sqlUsuario = "INSERT INTO usuario (id_cedula, nombre_usuario, contrasenia_usuario) VALUES (?, ?, ?)";
        $stmtU = $conexion->prepare($sqlUsuario);
        $stmtU->execute([$cedula, $usuario, $password]);

        $conexion->commit();

        // Éxito: Alerta flotante y redirección
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            setTimeout(function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Registro Exitoso!',
                    text: 'La cuenta se ha creado correctamente',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = 'index.php';
                });
            }, 100);
        </script>";

    } catch (PDOException $e) {
        if ($conexion->inTransaction()) {
            $conexion->rollBack();
        }
        echo "Error en la base de datos: " . $e->getMessage();
    }
}
?>