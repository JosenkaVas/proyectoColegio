<?php
// config/database.php

$DB_HOST = 'localhost';
$DB_NAME = 'colegioDB';
$DB_USER = 'postgres';
$DB_PASS = 'Estudiante123*';
$DB_PORT = '5432';

try {
    $conexion = new PDO(
        "pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die('Error de conexión a la base de datos');
}
