<?php
session_start();
require_once "../config/db.php";

$id_pub = $_POST['id_publicacion'];
$cedula = $_POST['cedula'];
$comentario = trim($_POST['comentario']);

$checkUsuario = $conexion->prepare("SELECT id_usuario FROM usuario WHERE id_cedula = ?");
$checkUsuario->execute([$cedula]);
$ide_usuario = $checkUsuario->fetchColumn();

if ($ide_usuario && !empty($comentario)) {
    $stmt = $conexion->prepare(
        "INSERT INTO comentario (id_publicacion, comentario, id_usuario) VALUES (?, ?, ?)"
    );
    $stmt->execute([$id_pub, $comentario, $ide_usuario]);
    echo json_encode(["ok" => true]);
} else {
    echo json_encode(["ok" => false, "error" => "Error al guardar"]);
}
exit(); 