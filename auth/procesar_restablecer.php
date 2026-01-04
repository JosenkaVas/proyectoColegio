<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $nuevaPass = password_hash($_POST['nuevaContrasena'], PASSWORD_BCRYPT);

    try {
        // 1. Extraer id_cedula de la tabla persona usando el correo
        $stmt = $conexion->prepare("SELECT id_cedula FROM persona WHERE correo = ?");
        $stmt->execute([$correo]);
        $persona = $stmt->fetch();

        if ($persona) {
            $cedula = $persona['id_cedula'];

            // 2. Actualizar la contraseña en la tabla usuario
            $update = $conexion->prepare("UPDATE usuario SET contrasenia_usuario = ? WHERE id_cedula = ?");
            $resultado = $update->execute([$nuevaPass, $cedula]);

            if ($resultado) {
                // SALIDA CON SWEETALERT2
                echo "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                </head>
                <body>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: '¡Contraseña Actualizada!',
                            text: 'Tu contraseña ha sido restablecida con éxito. Ya puedes iniciar sesión.',
                            showConfirmButton: false,
                            timer: 2500,
                            timerProgressBar: true
                        }).then(() => {
                            window.location.href = '../index.php';
                        });
                    </script>
                </body>
                </html>";
                exit();
            }
        }
    } catch (PDOException $e) {
        echo "Error en PostgreSQL: " . $e->getMessage();
    }
}