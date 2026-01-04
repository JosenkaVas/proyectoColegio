<?php
require_once "../config/db.php";

$id = $_POST['id_publicacion'];
$cedula = $_POST['cedula'];

// Verificar si ya reaccionó
$checkPersona = $conexion->prepare("SELECT * FROM likes WHERE id_publicacion = ? AND cedula = ?");
$checkPersona->execute([$id, $cedula]);

if ($checkPersona->rowCount() > 0) {
    echo json_encode(["status" => "error_repetido"]);
    exit;
}


$check = $conexion->prepare("SELECT * FROM likes WHERE id_publicacion = ?");
$check->execute([$id]);

if ($check->rowCount() == 0) {
    $conexion->prepare("INSERT INTO likes (id_publicacion, cedula, cantidad) VALUES (?,?,1)")->execute([$id, $cedula]);
} else {
    $conexion->prepare("UPDATE likes SET cantidad = cantidad + 1 WHERE id_publicacion = ?")->execute([$id]);
}

$total = $conexion->prepare("SELECT SUM(cantidad) FROM likes WHERE id_publicacion = ?");
$total->execute([$id]);

echo json_encode(["status" => "success", "likes" => $total->fetchColumn()]);