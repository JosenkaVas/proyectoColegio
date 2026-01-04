<?php
require_once "../config/db.php";

/* ====== TOTALES GENERALES ====== */
$totalLikes = $conexion->query("
    SELECT COALESCE(SUM(cantidad),0) FROM likes
")->fetchColumn();

$totalComentarios = $conexion->query("
    SELECT COUNT(*) FROM comentario
")->fetchColumn();

/* ====== TOP 3 PUBLICACIONES CON MÁS LIKES ====== */
$topLikes = $conexion->query("
    SELECT p.titulo, p.imagen, l.cantidad
    FROM likes l
    JOIN publicacion p ON p.id_publicacion = l.id_publicacion
    ORDER BY l.cantidad DESC
    LIMIT 3
");

/* ====== TOP 3 PUBLICACIONES CON MÁS COMENTARIOS ====== */
$topComentarios = $conexion->query("
    SELECT p.titulo, p.imagen, COUNT(c.id_comentario) AS total
    FROM comentario c
    JOIN publicacion p ON p.id_publicacion = c.id_publicacion
    GROUP BY p.id_publicacion
    ORDER BY total DESC
    LIMIT 3
");

/* ====== ESTADÍSTICAS POR PUBLICACIÓN ====== */
$estadisticas = $conexion->query("
    SELECT 
        p.titulo,
        COALESCE(l.cantidad,0) AS total_likes,
        COUNT(c.id_comentario) AS total_comentarios
    FROM publicacion p
    LEFT JOIN likes l ON l.id_publicacion = p.id_publicacion
    LEFT JOIN comentario c ON c.id_publicacion = p.id_publicacion
    GROUP BY p.id_publicacion, l.cantidad
    ORDER BY p.fecha DESC
");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Publicaciones</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .contenedor {
            width: 90%;
            margin: auto;
        }

        h1 {
            margin: 20px 0;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .1);
        }

        .card h2 {
            margin: 0;
            font-size: 18px;
        }

        .card .numero {
            font-size: 32px;
            font-weight: bold;
            margin-top: 10px;
        }

        .top-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .top-card img {
            width: 100%;
            border-radius: 8px;
            max-height: 150px;
            object-fit: cover;
        }

        .top-card h4 {
            margin: 10px 0 5px;
        }

        .seccion {
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #f1f1f1;
            text-align: left;
        }

        td:nth-child(2),
        td:nth-child(3),
        th:nth-child(2),
        th:nth-child(3) {
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include "menu/header_adm.php"; ?>

    <div class="contenedor">

        <h1>📊 Seguimiento de Publicaciones</h1>

        <!-- ====== TOTALES ====== -->
        <div class="dashboard">
            <div class="card">
                <h2>👍 Total Likes</h2>
                <div class="numero"><?= $totalLikes ?></div>
            </div>

            <div class="card">
                <h2>💬 Total Comentarios</h2>
                <div class="numero"><?= $totalComentarios ?></div>
            </div>
        </div>

        <!-- ====== TOP 3 ====== -->
        <div class="seccion">
            <h2>🔥 Top 3 Publicaciones</h2>

            <div class="top-grid">

                <!-- TOP LIKES -->
                <div class="card top-card">
                    <h3>👍 Más Likes</h3>
                    <?php while ($row = $topLikes->fetch(PDO::FETCH_ASSOC)) { ?>
                        <?php if ($row['imagen']) { ?>
                            <img src="../assets/img/<?= htmlspecialchars($row['imagen']) ?>">
                        <?php } ?>
                        <h4><?= htmlspecialchars($row['titulo']) ?></h4>
                        <p>👍 <?= $row['cantidad'] ?></p>
                    <?php } ?>
                </div>

                <!-- TOP COMENTARIOS -->
                <div class="card top-card">
                    <h3>💬 Más Comentarios</h3>
                    <?php while ($row = $topComentarios->fetch(PDO::FETCH_ASSOC)) { ?>
                        <?php if ($row['imagen']) { ?>
                            <img src="../assets/img/<?= htmlspecialchars($row['imagen']) ?>">
                        <?php } ?>
                        <h4><?= htmlspecialchars($row['titulo']) ?></h4>
                        <p>💬 <?= $row['total'] ?></p>
                    <?php } ?>
                </div>

            </div>
        </div>

        <!-- ====== ESTADÍSTICAS POR PUBLICACIÓN ====== -->
        <div class="seccion">
            <h2>📋 Estadísticas por Publicación</h2>

            <div class="card" style="padding:0;">
                <table>
                    <thead>
                        <tr>
                            <th>Publicación</th>
                            <th>👍 Likes</th>
                            <th>💬 Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $estadisticas->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?= htmlspecialchars($row['titulo']) ?></td>
                                <td><?= $row['total_likes'] ?></td>
                                <td><?= $row['total_comentarios'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<br>
    <?php include "menu/footer-adm.php"; ?>

</body>

</html>