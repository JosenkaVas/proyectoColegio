<?php
require_once "../config/db.php";
$correo = $_POST['correo'] ?? '';
$stmt = $conexion->prepare("SELECT COUNT(*) FROM persona WHERE correo = ?");
$stmt->execute([$correo]);
echo json_encode(['existe' => $stmt->fetchColumn() > 0]);