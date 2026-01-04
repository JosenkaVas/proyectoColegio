<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reestablecer contraseña</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Estilo para alertas internas */
        .alerta-form {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 13px;
            display: none; /* Se activa con JS */
        }
        /* Clase para ocultar sin dejar espacio */
        .hidden-group { display: none; }
    </style>
</head>
<body>

<div class="main-container" style="height: 640px;">
    <div class="form-section">
        <img src="assets/img/logo_eduardo.png" class="form-logo" style="width:100px;">
        <h2>Reestablecer contraseña</h2>
        
        <div id="mensajeError" class="alerta-form"></div>

        <form action="auth/procesar_restablecer.php" method="POST" id="resetForm" class="grid-form">
            <div class="input-group full-width">
                <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required>
            </div>    
            
            <div class="input-group full-width hidden-group" id="groupPass1">
                <input type="password" name="nuevaContrasena" id="pass1" placeholder="Nueva Contraseña">
            </div>
            <div class="input-group full-width hidden-group" id="groupPass2">
                <input type="password" name="confirmarContrasena" id="pass2" placeholder="Confirmar Contraseña">
            </div>

            <button type="button" id="btnVerificar" class="btn-submit full-width">Verificar Correo</button>
            <button type="submit" id="btnRestablecer" class="btn-submit full-width hidden-group">Restablecer Contraseña</button>
        </form>
    </div>

    <div class="image-section">
        <div class="overlay-blue"></div>
        <img src="assets/img/institucion.jpg" class="bg-image">
        <h1 class="slogan-text">"Forjando el carácter, inspirando la excelencia académica hacia el futuro."</h1>
    </div>
</div>

<script>
const btnVerificar = document.getElementById('btnVerificar');
const btnRestablecer = document.getElementById('btnRestablecer');
const errorDiv = document.getElementById('mensajeError');

btnVerificar.addEventListener('click', async () => {
    const correo = document.getElementById('correo').value;
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+\.[^\s@]{2,}$/; // Formato completo

    errorDiv.style.display = 'none';

    if (!correo.includes('@') || !correo.includes('.')) {
        errorDiv.textContent = "Ingrese un formato de correo válido.";
        errorDiv.style.display = 'block';
        return;
    }

    // Verificar en BD mediante un pequeño fetch (AJAX)
    const response = await fetch('auth/verificar_correo.php', {
        method: 'POST',
        body: new URLSearchParams({ 'correo': correo })
    });
    const res = await response.json();

    if (res.existe) {
        // Mostrar campos de contraseña y ocultar botón de verificar
        document.getElementById('groupPass1').style.display = 'block';
        document.getElementById('groupPass2').style.display = 'block';
        btnRestablecer.style.display = 'block';
        btnVerificar.style.display = 'none';
        document.getElementById('correo').readOnly = true;
    } else {
        errorDiv.textContent = "El correo no está registrado en nuestra institución.";
        errorDiv.style.display = 'block';
    }
});

document.getElementById('resetForm').addEventListener('submit', (e) => {
    const p1 = document.getElementById('pass1').value;
    const p2 = document.getElementById('pass2').value;

    if (p1 !== p2) {
        e.preventDefault();
        errorDiv.textContent = "Las contraseñas no coinciden.";
        errorDiv.style.display = 'block';
    }
});
</script>
</body>
</html>