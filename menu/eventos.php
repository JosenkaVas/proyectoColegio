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
    <title>Eventos del Colegio</title>
</head>
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

        /* ===== GRID ===== */
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

        /* ===== TITULO EVENTO ===== */
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

        /* ===== COMENTARIOS MOSTRADOS ===== */
        .tarjeta p:last-child {
            background: #f5f7fb;
            padding: 8px 10px;
            border-radius: 6px;
            margin-top: 8px;
            font-size: 14px;
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

        .lista-comentarios p {
            margin: 6px 0;
            padding: 6px;
            background: #f4f6f8;
            border-radius: 5px;
            font-size: 14px;
        }
    </style>
<body>

    <?php include "../includes/header.php"; ?>

    <div class="contenedor">
        <h1>📅 Eventos del Colegio Eduardo Pazmiño</h1>

        <div class="grid-tarjetas">

            <?php
            $sql = "
        SELECT  p.id_publicacion, p.titulo, p.descripcion, p.imagen, p.fecha,  COALESCE(l.cantidad,0) AS likes
        FROM publicacion p
        JOIN tipo_publicacion t 
            ON p.id_tipo_publicacion = t.id_tipo_publicacion
        LEFT JOIN likes l 
            ON l.id_publicacion = p.id_publicacion
        WHERE t.nombre = 'Evento'
        ORDER BY p.fecha DESC";


            $stmt = $conexion->query($sql);

            if ($stmt->rowCount() == 0) {
                echo "<p>No hay eventos publicados.</p>";
            }

            while ($evento = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="tarjeta">
                    <h3><?= htmlspecialchars($evento['titulo']) ?></h3>

                    <?php if ($evento['imagen'] != "") { ?>
                        <img src="../assets/img/<?= htmlspecialchars($evento['imagen']) ?>" class="form-logo">
                    <?php } ?>

                    <p><?= nl2br(htmlspecialchars($evento['descripcion'])) ?></p>
                    <small>📆 <?= date("d/m/Y", strtotime($evento['fecha'])) ?></small>

                    <div class="acciones">
                        <button class="btn-like" data-id="<?= $evento['id_publicacion'] ?>">👍 Me gusta</button>
                        <span id="likes-<?= $evento['id_publicacion'] ?>"><?= $evento['likes'] ?></span>
    
                        </span>
                    </div>

                    <textarea class="comentario" id="comentario-<?= $evento['id_publicacion'] ?>" placeholder="Escribe un comentario..."></textarea>
                    <button class="btn-comentar" data-id="<?= $evento['id_publicacion'] ?>">Enviar comentario</button>

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
                        $stmtC->execute([$evento['id_publicacion']]);

                        while ($com = $stmtC->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <p>
                                <strong><?= htmlspecialchars($com['nombre_usuario']) ?>:</strong>
                                <?= nl2br(htmlspecialchars($com['comentario'])) ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<div id="alerta-error" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #d9534f; color: white; padding: 25px; border-radius: 8px; box-shadow: 0 0 20px rgba(0,0,0,0.5); z-index: 10000; text-align: center; width: 320px; border: 2px solid #b52b27;">
    <div style="font-size: 40px; margin-bottom: 10px;">⚠️</div>
    <div id="mensaje-error" style="font-weight: bold; font-size: 16px; margin-bottom: 20px;"></div>
    <button onclick="cerrarAlerta()" style="background-color: white; color: #d9534f; border: none; padding: 8px 20px; border-radius: 4px; cursor: pointer; font-weight: bold; width: 100%;">Aceptar</button>
</div>

<div id="overlay-alerta" onclick="cerrarAlerta()" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 9999;"></div>

<script>
    function cerrarAlerta() {
        document.getElementById('alerta-error').style.display = 'none';
        document.getElementById('overlay-alerta').style.display = 'none';
    }
</script>
    <script>
document.querySelectorAll(".btn-like").forEach(btn => {
    btn.addEventListener("click", () => {
        const id = btn.dataset.id;
        const cedula = "<?= $_SESSION['cedula'] ?>";

        fetch("like.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id_publicacion=" + id + "&cedula=" + encodeURIComponent(cedula)
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "error_repetido") {
                // Mostrar alerta roja y fondo
                document.getElementById('mensaje-error').innerText = "Solo una reacción es permitida por usuario y por publicación";
                document.getElementById('alerta-error').style.display = 'block';
                document.getElementById('overlay-alerta').style.display = 'block';
            } else {
                // Actualizar contador normalmente
                document.getElementById("likes-" + id).innerText = data.likes;
            }
        })
        .catch(err => console.error("ERROR:", err));
    });

document.querySelectorAll(".btn-comentar").forEach(btn => {
    btn.addEventListener("click", function(e) {
        // 1. Detenemos cualquier otro evento que quiera dispararse
        e.preventDefault();
        e.stopImmediatePropagation();

        // 2. Si el botón ya está desactivado, no hacemos nada
        if (this.disabled) return;

        const id = this.dataset.id;
        const textarea = document.getElementById("comentario-" + id);
        const texto = textarea.value.trim();
        const cedula = "<?= $_SESSION['cedula'] ?>";

        if (texto === "") {
            document.getElementById('mensaje-error').innerText = "Escribe un comentario";
            document.getElementById('alerta-error').style.display = 'block';
            document.getElementById('overlay-alerta').style.display = 'block';
            return;
        }

        // 3. Bloqueo inmediato del botón
        this.disabled = true;
        const botonOriginalText = this.innerText;
        this.innerText = "Guardando...";

        fetch("comentario.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id_publicacion=" + id + 
                  "&cedula=" + encodeURIComponent(cedula) + 
                  "&comentario=" + encodeURIComponent(texto)
        })
        .then(res => res.json())
        .then(data => {
            if (data.ok) {
                textarea.value = "";
                // Insertar visualmente el comentario
                const lista = this.parentElement.querySelector(".lista-comentarios") || this.parentElement;
                const p = document.createElement("p");
                p.innerHTML = "💬 " + texto;
                lista.appendChild(p);
            } else {
                document.getElementById('mensaje-error').innerText = data.error;
                document.getElementById('alerta-error').style.display = 'block';
                document.getElementById('overlay-alerta').style.display = 'block';
            }
        })
        .catch(err => console.error("Error:", err))
        .finally(() => {
            // 4. Solo rehabilitamos después de terminar
            this.disabled = false;
            this.innerText = botonOriginalText;
        });
    });
});

        });
    </script>

    <?php include "../includes/footer.php"; ?>
</body>

</html>