<?php
require_once "../config/db.php";
include "menu/header_adm.php";

/* =========================
   OBTENER TIPOS PUBLICACIÓN (Lógica original intacta)
   ========================= */
$tipos = $conexion->query(
    "SELECT id_tipo_publicacion, nombre 
     FROM tipo_publicacion 
     ORDER BY nombre"
)->fetchAll(PDO::FETCH_ASSOC);

$mensaje = "";
$tipo_alerta = ""; // Variable auxiliar para el estilo del mensaje

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo        = $_POST["tipo"];
    $titulo      = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);

    if ($tipo == "" || $titulo == "" || $descripcion == "") {
        $mensaje = "❌ Complete todos los campos";
        $tipo_alerta = "error";
    } else {
        $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
        $nombreImagen = uniqid("img_") . "." . $extension;
        $rutaDestino = "../assets/img/" . $nombreImagen;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
            $sql = "INSERT INTO publicacion
                    (id_tipo_publicacion, titulo, descripcion, imagen)
                    VALUES (:tipo, :titulo, :descripcion, :imagen)";

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":tipo", $tipo, PDO::PARAM_INT);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->bindParam(":imagen", $nombreImagen);

            if ($stmt->execute()) {
                $mensaje = "✅ Publicación guardada correctamente";
                $tipo_alerta = "success";
            } else {
                $mensaje = "❌ Error al guardar";
                $tipo_alerta = "error";
            }
        } else {
            $mensaje = "❌ Error al subir la imagen";
            $tipo_alerta = "error";
        }
    }
}
/* =========================
   OBTENER REGISTROS EXISTENTES
   ========================= */
$queryBusqueda = "SELECT p.id_publicacion, p.titulo, p.descripcion, p.imagen, p.fecha, t.nombre as categoria
                  FROM publicacion p
                  INNER JOIN tipo_publicacion t ON p.id_tipo_publicacion = t.id_tipo_publicacion
                  ORDER BY p.fecha DESC";
$publicaciones = $conexion->query($queryBusqueda)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Control de Publicaciones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Control de Publicaciones</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <style>
            :root {
                --azul-primario: #003366;
                --azul-claro: #2b7cff;
                --dorado: #b08d48;
                --gris-fondo: #f4f7f6;
            }

            body {
                font-family: 'Segoe UI', sans-serif;
                background-color: var(--gris-fondo);
                margin: 0;
                padding: 20px;
            }

            .main-wrapper {
                max-width: 1100px;
                margin: 0 auto;
            }

            .seccion-ingreso {
                max-width: 600px;
                margin: 0 auto 40px auto;
                background: #fff;
                padding: 30px 40px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                border-top: 5px solid var(--dorado);
            }

            .seccion-tabla {
                background: #fff;
                padding: 30px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            }

            h2,
            h3 {
                color: var(--azul-primario);
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            label {
                font-weight: bold;
                display: block;
                margin-top: 15px;
                color: var(--azul-primario);
                font-size: 14px;
            }

            input,
            textarea,
            select {
                width: 100%;
                padding: 12px;
                margin-top: 5px;
                border-radius: 8px;
                border: 1px solid #ddd;
                transition: 0.3s;
            }

            input:focus {
                border-color: var(--azul-claro);
                outline: none;
                box-shadow: 0 0 8px rgba(43, 124, 255, 0.2);
            }

            .btn-publicar {
                width: 100%;
                padding: 15px;
                background: var(--azul-primario);
                color: white;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                font-weight: bold;
                margin-top: 25px;
                transition: 0.3s;
            }

            .btn-publicar:hover {
                background: #002244;
                transform: translateY(-2px);
            }

            .tabla-publicaciones {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .tabla-publicaciones thead {
                background: var(--azul-primario);
                color: white;
            }

            .tabla-publicaciones th,
            .tabla-publicaciones td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #eee;
            }

            .img-miniatura {
                width: 70px;
                height: 70px;
                object-fit: cover;
                border-radius: 10px;
                border: 1px solid #ddd;
            }

            .badge-tipo {
                background: var(--dorado);
                color: white;
                padding: 5px 12px;
                border-radius: 15px;
                font-size: 11px;
                font-weight: bold;
            }

            .mensaje {
                padding: 15px;
                border-radius: 8px;
                text-align: center;
                margin-bottom: 20px;
                font-weight: bold;
            }

            .alerta-success {
                background: #d4edda;
                color: #155724;
            }

            .alerta-error {
                background: #f8d7da;
                color: #721c24;
            }
        </style>
    </head>

<body>
    <br>
    <div class="main-wrapper">

        <section class="seccion-ingreso">
            <h2><i class="fas fa-plus-circle"></i> Nueva Publicación</h2>

            <?php if ($mensaje != ""): ?>
                <div class="mensaje <?= ($tipo_alerta == 'success') ? 'alerta-success' : 'alerta-error' ?>">
                    <?= $mensaje ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario();">
                <label>Tipo de publicación</label>
                <select name="tipo" id="tipo">
                    <option value="">-- Seleccione --</option>
                    <?php foreach ($tipos as $t): ?>
                        <option value="<?= $t['id_tipo_publicacion'] ?>"><?= htmlspecialchars($t['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>

                <label>Título</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título atractivo...">

                <label>Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" placeholder="Detalles de la publicación..."></textarea>

                <label>Imagen</label>
                <input type="file" name="imagen" id="imagen" accept="image/*">

                <button type="submit" class="btn-publicar"><i class="fas fa-paper-plane"></i> PUBLICAR AHORA</button>
            </form>
        </section>

        <section class="seccion-tabla">
            <h3 style="text-align: left; border-bottom: 2px solid var(--dorado); padding-bottom: 10px;">
                <i class="fas fa-layer-group"></i> Publicaciones Realizadas
            </h3>

            <table class="tabla-publicaciones">
                <thead>
                    <tr>
                        <th>Vista</th>
                        <th>Título y Contenido</th>
                        <th>Categoría</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($publicaciones as $pub): ?>
                        <tr>
                            <td><img src="../assets/img/<?= htmlspecialchars($pub['imagen']) ?>" class="img-miniatura"></td>
                            <td>
                                <strong><?= htmlspecialchars($pub['titulo']) ?></strong><br>
                                <small style="color: #666;"><?= substr(htmlspecialchars($pub['descripcion']), 0, 80) ?>...</small>
                            </td>
                            <td><span class="badge-tipo"><?= htmlspecialchars($pub['categoria']) ?></span></td>
                            <td style="font-size: 13px; color: #888;"><?= date("d/m/Y", strtotime($pub['fecha'])) ?></td>
                            <td>
                                <a href="editar_publicacion.php?id=<?= $pub['id_publicacion'] ?>"
                                    style="color:#2b7cff; font-weight:bold; text-decoration:none;">
                                    ✏️ Editar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </section>

    </div>
    <br>

    <script>
        function validarFormulario() {
            const campos = ["tipo", "titulo", "descripcion", "imagen"];
            for (let id of campos) {
                let el = document.getElementById(id);
                if (el.value.trim() === "") {
                    alert("El campo " + id + " es obligatorio");
                    el.focus();
                    return false;
                }
            }
            return true;
        }
    </script>

    <?php include "menu/footer-adm.php"; ?>
</body>

</html>