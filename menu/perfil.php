<?php 
session_start();
if (!isset($_SESSION['cedula'])) {
    header("Location: ../index.php");
    exit();
}

include "../includes/header.php";
require_once "../config/db.php"; 

try {
    $cedula_sesion = $_SESSION['cedula'];
    $stmt = $conexion->prepare("SELECT * FROM persona WHERE id_cedula = ?");
    $stmt->execute([$cedula_sesion]);
    $persona = $stmt->fetch();

    if (!$persona) {
        die("Error: No se encontraron datos.");
    }
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>
<style>
    :root {
        --azul-institucional: #003366;
        --dorado-institucional: #b08d48;
        --verde-exito: #28a745;
    }

    /* Estilo para la alerta dentro del formulario */
    .alerta-perfil {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        font-size: 14px;
        animation: fadeOut 5s forwards;
    }

    .alerta-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        70% { opacity: 1; }
        100% { opacity: 0; visibility: hidden; }
    }
    
    .perfil-container { 
        max-width: 900px; 
        margin: 40px auto; 
        background: #fff; 
        padding: 40px; 
        border-radius: 12px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
        font-family: 'Segoe UI', sans-serif; 
    }

    /* CABECERA CON LOGO MÁS GRANDE */
    .perfil-header { 
        border-bottom: 2px solid var(--dorado-institucional); 
        margin-bottom: 35px; 
        padding-bottom: 15px; 
        display: flex; 
        align-items: center; 
        gap: 20px; 
    }

    .perfil-header i { 
        font-size: 60px; /* Tamaño aumentado */
        color: var(--azul-institucional);
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }

    .perfil-header h2 { 
        margin: 0; 
        color: var(--azul-institucional); 
        text-transform: uppercase; 
        font-size: 28px;
        letter-spacing: 1px; 
    }

    .grid-inputs { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .form-group { margin-bottom: 20px; display: flex; flex-direction: column; }
    .form-group label { font-weight: bold; color: var(--azul-institucional); margin-bottom: 8px; font-size: 14px; }
    .form-control { padding: 12px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9; font-size: 15px; }
    .form-control:not(:disabled) { background-color: #fff; border-color: var(--dorado-institucional); outline: none; }
    .full-width { grid-column: span 2; }
    .acciones { margin-top: 30px; display: flex; gap: 15px; }
    
    .btn-perfil { 
        padding: 12px 25px; 
        border: none; 
        border-radius: 5px; 
        font-weight: bold; 
        cursor: pointer; 
        text-transform: uppercase; 
        font-size: 13px; 
        display: flex;
        align-items: center;
        gap: 8px;
        transition: transform 0.2s;
    }
    .btn-perfil:active { transform: scale(0.98); }

    .btn-edit { background-color: var(--azul-institucional); color: white; }
    .btn-save { background-color: var(--verde-exito); color: white; display: none; }
    .btn-cancel { background-color: #6c757d; color: white; display: none; }
</style>
<div class="perfil-container">
    <div class="perfil-header">
        <i class="fas fa-user-circle"></i>
        <h2 class="titulo-principal">Mi Perfil</h2>
    </div>

   

    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'success'): ?>
            <div class="alerta-perfil alerta-success">
                <i class="fas fa-check-circle"></i> ¡Datos actualizados exitosamente en colegioDB!
            </div>
        <?php elseif ($_GET['status'] == 'error'): ?>
            <div class="alerta-perfil alerta-error">
                <i class="fas fa-exclamation-triangle"></i> Hubo un error al actualizar los datos en PostgreSQL.
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <form action="actualizar_persona.php" method="POST">
        <div class="grid-inputs">
            <div class="form-group">
                <label>Cédula </label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($persona['id_cedula']) ?>" disabled>
                <input type="hidden" name="cedula" value="<?= htmlspecialchars($persona['id_cedula']) ?>">
            </div>

            <div class="form-group">
                <label>Nombres</label>
                <input type="text" name="nombre" class="form-control editable" value="<?= htmlspecialchars($persona['nombre']) ?>" disabled required>
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" name="apellido" class="form-control editable" value="<?= htmlspecialchars($persona['apellido']) ?>" disabled required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control editable" value="<?= htmlspecialchars($persona['telefono']) ?>" disabled required>
            </div>

            <div class="form-group full-width">
                <label>Correo Electrónico</label>
                <input type="email" name="correo" class="form-control editable" value="<?= htmlspecialchars($persona['correo']) ?>" disabled required>
            </div>
        </div>

        <div class="acciones">
            <button type="button" id="btnModificar" class="btn-perfil btn-edit">
                <i class="fas fa-edit"></i> Editar Datos
            </button>
            <button type="submit" id="btnGuardar" class="btn-perfil btn-save">
                <i class="fas fa-save"></i> Guardar Cambios
            </button>
            <button type="button" id="btnCancelar" class="btn-perfil btn-cancel">
                <i class="fas fa-times"></i> Cancelar
            </button>
        </div>
    </form>
</div>

<script>
    const btnModificar = document.getElementById('btnModificar');
    const btnGuardar = document.getElementById('btnGuardar');
    const btnCancelar = document.getElementById('btnCancelar');
    const inputsEditables = document.querySelectorAll('.editable');

    btnModificar.addEventListener('click', function() {
        inputsEditables.forEach(input => input.disabled = false);
        this.style.display = 'none';
        btnGuardar.style.display = 'inline-block';
        btnCancelar.style.display = 'inline-block';
    });

    btnCancelar.addEventListener('click', () => {
        location.href = 'perfil.php'; // Recarga limpia para quitar parámetros de la URL
    });
</script>

<?php include "../includes/footer.php"; ?>