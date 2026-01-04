<?php
require_once "../config/db.php";
include "menu/header_adm.php";

/* =========================
   VALIDAR ID
   ========================= */
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: publicaciones.php");
    exit;
}

/* =========================
   OBTENER TIPOS
   ========================= */
$tipos = $conexion->query(
    "SELECT id_tipo_publicacion, nombre 
     FROM tipo_publicacion 
     ORDER BY nombre"
)->fetchAll(PDO::FETCH_ASSOC);

$mensaje = "";
$tipo_alerta = "";

/* =========================
   ACTUALIZAR PUBLICACIÓN
   ========================= */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $tipo        = $_POST["tipo"];
    $titulo      = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);

    if ($tipo == "" || $titulo == "" || $descripcion == "") {
        $mensaje = "❌ Complete todos los campos";
        $tipo_alerta = "error";
    } else {
        $actualizado = false;

        // ¿Se cambió imagen?
        if (!empty($_FILES["imagen"]["name"])) {
            $extension = pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION);
            $nombreImagen = uniqid("img_") . "." . $extension;
            $rutaDestino = "../assets/img/" . $nombreImagen;

            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
                $sql = "UPDATE publicacion
                        SET id_tipo_publicacion = :tipo,
                            titulo = :titulo,
                            descripcion = :descripcion,
                            imagen = :imagen
                        WHERE id_publicacion = :id";
                $stmt = $conexion->prepare($sql);
                $stmt->execute([
                    ':tipo' => $tipo,
                    ':titulo' => $titulo,
                    ':descripcion' => $descripcion,
                    ':imagen' => $nombreImagen,
                    ':id' => $id
                ]);
                $actualizado = true;
            } else {
                $mensaje = "❌ Error al subir la nueva imagen";
                $tipo_alerta = "error";
            }
        } else {
            // Sin cambiar imagen
            $sql = "UPDATE publicacion
                    SET id_tipo_publicacion = :tipo,
                        titulo = :titulo,
                        descripcion = :descripcion
                    WHERE id_publicacion = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':tipo' => $tipo,
                ':titulo' => $titulo,
                ':descripcion' => $descripcion,
                ':id' => $id
            ]);
            $actualizado = true;
        }

        if ($actualizado) {
            $mensaje = "✅ Publicación actualizada correctamente";
            $tipo_alerta = "success";
        }
    }
}
/* =========================
   OBTENER PUBLICACIÓN
   ========================= */
$sql = "SELECT * FROM publicacion WHERE id_publicacion = :id";
$stmt = $conexion->prepare($sql);
$stmt->execute([':id' => $id]);
$pub = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pub) {
    header("Location: publicaciones.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Publicación</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f7f6;
            padding: 20px;
        }

        .contenedor {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            border-top: 5px solid #b08d48;
        }

        h2 {
            text-align: center;
            color: #003366;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
            color: #003366;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .img-preview {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 15px;
            background: #003366;
            color: #fff;
            border: none;
            border-radius: 8px;
            margin-top: 25px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #002244;
        }

        .mensaje {
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #2b7cff;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="contenedor">
    <h2>✏️ Editar Publicación</h2>

    <?php if ($mensaje != ""): ?>
        <div class="mensaje <?= $tipo_alerta ?>">
            <?= $mensaje ?>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">

        <label>Tipo de publicación</label>
        <select name="tipo">
            <?php foreach ($tipos as $t): ?>
                <option value="<?= $t['id_tipo_publicacion'] ?>"
                    <?= ($t['id_tipo_publicacion'] == $pub['id_tipo_publicacion']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($t['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($pub['titulo']) ?>">

        <label>Descripción</label>
        <textarea name="descripcion" rows="4"><?= htmlspecialchars($pub['descripcion']) ?></textarea>

        <label>Imagen actual</label>
        <img src="../assets/img/<?= htmlspecialchars($pub['imagen']) ?>" class="img-preview">

        <label>Cambiar imagen (opcional)</label>
        <input type="file" name="imagen" accept="image/*">

        <button type="submit">💾 Guardar Cambios</button>
    </form>

    <a href="publicaciones.php" class="volver">← Volver a publicaciones</a>
</div>

<br>
<?php include "menu/footer-adm.php"; ?>
</body>
</html>
