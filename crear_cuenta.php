<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Colegio Ing. Agustín Pazmiño</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .error-alerta {
            color: #d32f2f;
            background-color: #fdecea;
            font-size: 11px;
            padding: 5px;
            border-radius: 4px;
            margin-top: 2px;
            display: none;
            font-weight: bold;
        }
        /* Nueva alerta para errores de servidor (usuario existe) */
        .alerta-servidor {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 13px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="main-container" style="height: 640px;"> 
    <div class="form-section">
        <img src="assets/img/logo_eduardo.png" class="form-logo" style="width:70px;">
        <h2>Crear Cuenta</h2>

        <?php if (isset($_GET['error']) && $_GET['error'] == 'user_exists'): ?>
            <div class="alerta-servidor">
                <i class="fas fa-exclamation-circle"></i> El nombre de usuario ya existe. Elija otro.
            </div>
        <?php endif; ?>
        
        <form action="procesar_registro.php" method="POST" class="grid-form" id="registroForm">
            <div class="input-group">
                <input type="text" name="cedula" id="cedula" placeholder="Cédula" maxlength="10" required>
                <div id="err-cedula" class="error-alerta">La cédula debe tener 10 dígitos numéricos.</div>
            </div>
            <div class="input-group">
                <input type="text" name="telefono" id="telefono" placeholder="Celular" maxlength="10" required>
                <div id="err-telefono" class="error-alerta">El celular debe tener 10 dígitos numéricos.</div>
            </div>
            
            <div class="input-group">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                <div id="err-nombre" class="error-alerta">Solo se permiten letras.</div>
            </div>
            <div class="input-group">
                <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                <div id="err-apellido" class="error-alerta">Solo se permiten letras.</div>
            </div>
            
            <div class="input-group full-width">
                <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required>
                <div id="err-correo" class="error-alerta">Ingrese un correo válido (ej: usuario@gmail.com).</div>
            </div>
            
            <div class="input-group full-width">
                <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required>
                <div id="err-ciudad" class="error-alerta">Solo se permiten letras en la ciudad.</div>
            </div>

            <div class="full-width"><hr style="border:0; border-top:1px solid #eee; margin:5px 0;"></div>

            <div>
                <label style="font-size:11px; font-weight:bold; color:#1a3a5a;">USUARIO</label>
                <div class="input-group"><input type="text" name="usuario" id="usuario" required></div>
            </div>
            <div>
                <label style="font-size:11px; font-weight:bold; color:#1a3a5a;">CONTRASEÑA</label>
                <div class="input-group"><input type="password" name="password" required></div>
            </div>

            <button type="submit" class="btn-submit full-width">Guardar Registro</button>
            
            <div class="form-links full-width" style="text-align: right; margin-top: 10px;">
                <p style="font-size: 14px; color: #666;">
                    ¿Ya tienes cuenta? 
                    <a href="index.php" style="color: #1a3a5a; font-weight: bold; text-decoration: none;">Inicia Sesión</a>
                </p>
            </div>
        </form>
    </div>

    <div class="image-section">
        <div class="overlay-blue"></div>
        <img src="assets/img/institucion.jpg" class="bg-image">
        <h1 class="slogan-text">"Forjando el carácter, inspirando la excelencia académica hacia el futuro."</h1>
    </div>
</div>

<script>
document.getElementById('registroForm').addEventListener('submit', function(e) {
    let error = false;
    const regexLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    const regexNumeros = /^[0-9]+$/;
    // Regex mejorado para correo completo (debe tener .com, .es, etc)
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

    document.querySelectorAll('.error-alerta').forEach(el => el.style.display = 'none');

    const cedula = document.getElementById('cedula').value;
    if (cedula.length !== 10 || !regexNumeros.test(cedula)) {
        document.getElementById('err-cedula').style.display = 'block';
        error = true;
    }

    const telefono = document.getElementById('telefono').value;
    if (telefono.length !== 10 || !regexNumeros.test(telefono)) {
        document.getElementById('err-telefono').style.display = 'block';
        error = true;
    }

    if (!regexLetras.test(document.getElementById('nombre').value)) { document.getElementById('err-nombre').style.display = 'block'; error = true; }
    if (!regexLetras.test(document.getElementById('apellido').value)) { document.getElementById('err-apellido').style.display = 'block'; error = true; }
    if (!regexLetras.test(document.getElementById('ciudad').value)) { document.getElementById('err-ciudad').style.display = 'block'; error = true; }

    // Validación de correo completo
    if (!regexCorreo.test(document.getElementById('correo').value)) {
        document.getElementById('err-correo').style.display = 'block';
        error = true;
    }

    if (error) {
        e.preventDefault();
    }
});
</script>
</body>
</html>