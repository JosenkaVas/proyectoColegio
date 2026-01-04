<?php
session_start();
session_unset();
session_destroy();

// Redirigir al index principal que está fuera de la carpeta 'auth'
header("Location: ../index.php");
exit();
?>