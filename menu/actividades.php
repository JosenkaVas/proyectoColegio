<?php
require_once "../config/db.php";

session_start();
if (!isset($_SESSION['cedula'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividades Escolares</title>

    <style>
        /* ===== RESET ===== */
        * {
            box-sizing: border-box;
        }

        /* ===== BODY ===== */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #eef2f7, #f9fbfd);
            margin: 0;
            color: #333;
        }

        /* ===== CONTENEDOR ===== */
        .contenedor {
            width: 85%;
            margin: 40px auto;
        }

        /* ===== TÍTULO ===== */
        .contenedor h1 {
            text-align: center;
            margin-bottom: 35px;
            color: #1f4fd8;
            font-weight: 700;
        }

        .grid-tarjetas {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* SIEMPRE 2 tarjetas */
            gap: 25px;
        }

        /* ===== TARJETA ===== */
        .tarjeta {
            background: #ffffff;
            padding: 20px 22px;
            border-radius: 14px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.1);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            animation: fadeUp 0.6s ease;
        }

        .tarjeta:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15);
        }

        /* ===== TITULO ACTIVIDAD ===== */
        .tarjeta h3 {
            margin-top: 0;
            color: #2b3e5c;
            font-size: 20px;
        }

        /* ===== IMAGEN ===== */
        .form-logo {
            width: 100%;
            max-height: 260px;
            object-fit: cover;
            border-radius: 10px;
            margin: 12px 0;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
        }

        /* ===== DESCRIPCIÓN ===== */
        .tarjeta p {
            text-align: justify;
            text-justify: inter-word;
            line-height: 1.6;
        }

        /* ===== FECHA ===== */
        .tarjeta small {
            display: block;
            margin-top: 5px;
            color: #6c757d;
        }

        /* ===== ACCIONES ===== */
        .acciones {
            margin-top: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ===== BOTONES ===== */
        button {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        /* LIKE */
        .btn-like {
            background: #e9f0ff;
            color: #1f4fd8;
        }

        .btn-like:hover {
            background: #1f4fd8;
            color: #fff;
        }

        /* COMENTAR */
        .btn-comentar {
            background: linear-gradient(135deg, #1f4fd8, #143bb5);
            color: #fff;
            margin-top: 10px;
        }

        .btn-comentar:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* ===== CONTADOR LIKES ===== */
        .acciones span {
            font-weight: 600;
            color: #444;
        }

        /* ===== TEXTAREA ===== */
        .comentario {
            width: 100%;
            height: 80px;
            margin-top: 12px;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            resize: none;
            font-family: inherit;
            transition: all 0.25s ease;
        }

        .comentario:focus {
            outline: none;
            border-color: #1f4fd8;
            box-shadow: 0 0 0 3px rgba(31, 79, 216, 0.15);
        }

        /* ===== ANIMACIÓN ===== */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


</head>

<body>

    <?php include "../includes/header.php"; ?>

    <div class="contenedor">
        <h1>🏫 Actividades Escolares</h1>
        <div class="grid-tarjetas">
            <?php
            $sql = "
                SELECT  p.id_publicacion, p.titulo, p.descripcion, p.imagen, p.fecha, COALESCE(l.cantidad,0) AS likes
                FROM publicacion p
                JOIN tipo_publicacion t 
                    ON p.id_tipo_publicacion = t.id_tipo_publicacion
                LEFT JOIN likes l 
                    ON l.id_publicacion = p.id_publicacion
                WHERE t.nombre = 'Actividad'
                ORDER BY p.fecha DESC";

            $stmt = $conexion->query($sql);

            if ($stmt->rowCount() == 0) {
                echo "<p>No hay actividades publicadas.</p>";
            }

            while ($actividad = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="tarjeta">
                    <h3><?= htmlspecialchars($actividad['titulo']) ?></h3>

                    <?php if ($actividad['imagen'] != "") { ?>
                        <img src="../assets/img/<?= htmlspecialchars($actividad['imagen']) ?>" class="form-logo">
                    <?php } ?>

                    <p><?= nl2br(htmlspecialchars($actividad['descripcion'])) ?></p>
                    <small>📆 <?= date("d/m/Y", strtotime($actividad['fecha'])) ?></small>

                    <div class="acciones">
                        <button class="btn-like" data-id="<?= $actividad['id_publicacion'] ?>">👍 Me gusta</button>
                        <span id="likes-<?= $actividad['id_publicacion'] ?>"><?= $actividad['likes'] ?></span>
                    </div>

                    <textarea class="comentario" id="comentario-<?= $actividad['id_publicacion'] ?>" placeholder="Escribe un comentario..."></textarea>
                    <button class="btn-comentar" data-id="<?= $actividad['id_publicacion'] ?>">Enviar comentario</button>
                    <!-- 👇 AQUÍ VA LA LISTA DE COMENTARIOS -->
                    <div class="lista-comentarios">
                        <?php
                        $sqlComentarios = "
                        SELECT c.comentario, u.nombre_usuario
                        FROM comentario c
                        JOIN usuario u ON u.id_usuario = c.id_usuario
                        WHERE c.id_publicacion = ?
                        ORDER BY c.id_comentario ASC ";
                        $stmtC = $conexion->prepare($sqlComentarios);
                        $stmtC->execute([$actividad['id_publicacion']]);

                        while ($com = $stmtC->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <p>
                                <strong><?= htmlspecialchars($com['nombre_usuario']) ?>:</strong>
                                <?= nl2br(htmlspecialchars($com['comentario'])) ?>
                            </p>
                        <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
   </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            // ====== LIKES ======
            document.querySelectorAll(".btn-like").forEach(btn => {
                btn.addEventListener("click", () => {
                    const id = btn.dataset.id;
                    fetch("like.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id_publicacion=" + id
                        })
                        .then(res => res.json())
                        .then(data => {
                            document.getElementById("likes-" + id).innerText = data.likes;
                        })
                        .catch(err => console.error("ERROR LIKE:", err));
                });
            });

            // ====== COMENTARIOS ======
            document.querySelectorAll(".btn-comentar").forEach(btn => {
                btn.addEventListener("click", () => {
                    const id = btn.dataset.id;
                    const textarea = document.getElementById("comentario-" + id);
                    const texto = textarea.value.trim();

                    if (texto === "") {
                        alert("Escribe un comentario");
                        return;
                    }

                    fetch("comentario.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id_publicacion=" + id + "&comentario=" + encodeURIComponent(texto)
                        })
                        .then(res => res.json())
                        .then(data => {
                            alert("Comentario guardado");
                            textarea.value = "";
                        })
                        .catch(err => console.error("ERROR COMENTARIO:", err));
                });
            });

        });
    </script>

    <?php include "../includes/footer.php"; ?>
</body>

</html>