<?php include "../includes/header.php"; ?>

<style>
    :root {
        --azul: #003366;
        --rojo: #d32f2f;
        --gris-fondo: #f8f9fa;
        --blanco: #ffffff;
    }

    body {
        background-color: var(--gris-fondo);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .contacto-section {
        max-width: 1200px;
        margin: 50px auto;
        padding: 0 20px;
    }

    .contacto-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .contacto-header h1 {
        color: var(--azul);
        font-size: 36px;
        margin-bottom: 10px;
    }

    .grid-contacto {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        background: var(--blanco);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .info-col h2 {
        color: var(--azul);
        margin-bottom: 20px;
        border-left: 5px solid var(--rojo);
        padding-left: 15px;
    }

    .texto-apoyo {
        color: #555;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .mapa-container {
        width: 100%;
        height: 300px;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 20px;
        border: 2px solid #eee;
    }

    .form-col {
        background: var(--gris-fondo);
        padding: 30px;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: var(--azul);
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-group input, .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        outline: none;
        transition: 0.3s;
    }

    .form-group input:focus, .form-group textarea:focus {
        border-color: var(--azul);
        box-shadow: 0 0 8px rgba(0,51,102,0.2);
    }

    .btn-enviar {
        background-color: var(--azul);
        color: white;
        padding: 15px 30px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        transition: 0.3s;
        text-transform: uppercase;
    }

    .btn-enviar:hover {
        background-color: var(--rojo);
        transform: translateY(-2px);
    }

    /* Estilos de Alerta Profesionales */
    .alerta {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .alerta-exito {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
    }

    .alerta-error {
        background-color: #ffebee;
        color: #c62828;
        border: 1px solid #ffcdd2;
    }

    @media (max-width: 900px) {
        .grid-contacto { grid-template-columns: 1fr; }
    }
</style>

<div class="contacto-section">
    <div class="contacto-header">
        <h1>Contáctanos</h1>
    </div>

    <div class="grid-contacto">
        
        <div class="info-col">
            <h2>Nuestros Datos</h2>
            <p class="texto-apoyo">
                Nuestro equipo está a tu disposición para cualquier duda, llámanos, escríbenos o diligencia el formulario y nos pondremos en contacto contigo lo antes posible.
            </p>
            
            <div class="contact-info">
                <p style="margin-bottom: 10px;"><strong><i class="fas fa-phone-alt" style="color:var(--rojo);"></i> Teléfono:</strong> +(593) 95 905 8711</p>
                <p style="margin-bottom: 10px;"><strong><i class="fas fa-envelope" style="color:var(--rojo);"></i> Correo:</strong> coleedupaz@hotmail.es</p>
                <p style="margin-bottom: 20px;"><strong><i class="fas fa-map-marker-alt" style="color:var(--rojo);"></i> Ubicación:</strong> Pasaje, El Oro, Ecuador</p>
            </div>

            <div class="mapa-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.241512345678!2d-79.805!3d-3.328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM8KwMTknNDAuOCJTIDc5wrA0OCcxOC4wIlc!5e0!3m2!1ses!2sec!4v1234567890" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <div class="form-col">
            <?php if(isset($_GET['status'])): ?>
                <?php if($_GET['status'] == 'success'): ?>
                    <div class="alerta alerta-exito">
                        <i class="fas fa-check-circle"></i> ¡Mensaje enviado con éxito! Nos pondremos en contacto pronto.
                    </div>
                <?php elseif($_GET['status'] == 'error'): ?>
                    <div class="alerta alerta-error">
                        <i class="fas fa-exclamation-circle"></i> Ocurrió un error al enviar. Por favor, intente de nuevo.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="enviar_contacto.php" method="POST">
                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input type="text" name="nombre" placeholder="Ej. Juan Pérez" required>
                </div>

                <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="email" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="form-group">
                    <label>Asunto</label>
                    <input type="text" name="asunto" placeholder="Motivo del mensaje" required>
                </div>

                <div class="form-group">
                    <label>Mensaje</label>
                    <textarea name="mensaje" rows="5" placeholder="Escribe tu consulta aquí..." required></textarea>
                </div>

                <button type="submit" class="btn-enviar">Enviar Mensaje</button>
            </form>
        </div>

    </div>
</div>

<?php include "../includes/footer.php"; ?>