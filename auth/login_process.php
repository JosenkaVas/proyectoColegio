<?php
session_start();
require_once "../config/db.php"; // Conexión a PostgreSQL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario  = trim($_POST['usuario']);
    $password = $_POST['password'];

    if (empty($usuario) || empty($password)) {
        header("Location: ../index.php?error=vacio");
        exit();
    }

    try {
        // Buscamos al usuario por su nombre en la tabla usuario
        $stmt = $conexion->prepare("SELECT id_cedula, nombre_usuario, contrasenia_usuario FROM usuario WHERE nombre_usuario = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificamos la contraseña encriptada
            if (password_verify($password, $user['contrasenia_usuario'])) {
                
                // Guardamos los datos básicos en la sesión
                $_SESSION['cedula']  = $user['id_cedula'];
                $_SESSION['usuario'] = $user['nombre_usuario'];
                

                // VALIDACIÓN SIN ROL: Si el nombre es exactamente 'admin'
                if ($user['nombre_usuario'] === 'admin') {
                    header("Location: ../admin/publicaciones.php");
                } else {
                    header("Location: ../menu/home.php");
                }
                exit();
                
            } else {
                header("Location: ../index.php?error=password");
                exit();
            }
        } else {
            header("Location: ../index.php?error=usuario");
            exit();
        }

    } catch (PDOException $e) {
        header("Location: ../index.php?error=db");
        exit();
    }
}