<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --azul-inst: #003366; 
        --rojo: #d32f2f;
        --blanco: #ffffff;
        --gris-texto: #cccccc;
    }

    footer {
        background-color: var(--azul-inst);
        color: var(--blanco);
        padding: 60px 0 30px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border-top: 5px solid var(--rojo);
        margin-top: 50px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 5%;
        gap: 40px;
    }

    .footer-column {
        flex: 1;
        min-width: 250px;
    }

    /* --- COLUMNA LOGO: CENTRADA --- */
 .footer-logo-column {
        display: flex;
        flex-direction: column;
        align-items: center; 
        text-align: center;
    }

    .footer-logo-column img {
        max-width: 220px; /* Logo más grande */
        height: auto;
        margin-bottom: 0; /* Eliminamos la distancia con el texto */
        filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.3));
    }

    .footer-logo-column p {
        margin-top: 5px; /* Texto pegado al logo */
        font-size: 16px; 
        color: var(--gris-texto); 
        line-height: 1.3; /* Espaciado entre líneas más cerrado */
    }
    
    .footer-logo-column strong {
        display: block; /* Hace que el nombre resalte en su propia línea */
        margin-top: 2px;
    }
    /* --- OTRAS COLUMNAS: IZQUIERDA --- */
    .footer-left-align {
        text-align: left;
    }

    .footer-column h3 {
        color: var(--blanco);
        font-size: 19px;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Línea roja a la izquierda */
    .footer-left-align h3::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 45px;
        height: 2px;
        background-color: var(--rojo);
    }

    .contact-info {
        list-style: none;
        padding: 0;
    }

    .contact-item {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin-bottom: 15px;
        color: var(--gris-texto);
    }

    .contact-item i {
        color: var(--rojo);
        margin-right: 12px;
        font-size: 17px;
        width: 20px;
        text-align: center;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
    }

    .footer-links li a {
        color: var(--gris-texto);
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
    }

    .footer-links li a:hover {
        color: var(--rojo);
        transform: translateX(5px);
    }

    /* Facebook simplificado */
    .fb-container {
        margin-top: 20px;
        display: flex;
        justify-content: flex-start;
    }

    .social-link-fb {
        background-color: #1877F2;
        color: white;
        padding: 10px 18px;
        border-radius: 4px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: bold;
        transition: 0.3s;
    }

    .social-link-fb:hover {
        background-color: #145dbf;
        transform: translateY(-2px);
    }

    /* Copyright */
    .footer-bottom {
        text-align: center;
        max-width: 1200px;
        margin: 40px auto 0 auto;
        padding: 25px 5% 0 5%;
        border-top: 1px solid rgba(255,255,255,0.1);
        font-size: 13px;
        color: #888;
    }

    @media (max-width: 768px) {
        .footer-column, .footer-bottom, .footer-left-align {
            text-align: center;
        }
        .footer-left-align h3::after {
            left: 50%;
            transform: translateX(-50%);
        }
        .contact-item, .fb-container {
            justify-content: center;
        }
    }
</style>

<footer>
    <div class="footer-container">
        
        <div class="footer-column footer-logo-column">
            <img src="../assets/img/logo_eduardo.png" alt="Logo Colegio" onerror="this.src='https://via.placeholder.com/140x140?text=LOGO'">
            <p style="font-size: 16px; color: var(--gris-texto); line-height: 1.6;">
                Colegio de Bachillerato<br>
                <strong>"Ing. Eduardo Pazmiño Barciona"</strong>
                 
            </p>
        </div>

        <div class="footer-column footer-left-align">
            <h3>Contáctanos</h3>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <span>+(593) 95 905 8711</span> 
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:coleedupaz@hotmail.es" style="color:inherit; text-decoration:none;">coleedupaz@hotmail.es</a>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Pasaje, Ecuador</span>
                </div>
                
                <div class="fb-container">
                    <a href="https://www.facebook.com/coledupaz?locale=es_LA" class="social-link-fb" target="_blank">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-column footer-left-align">
            <h3>Explora</h3>
            <ul class="footer-links">
                <li><a href="eventos.php"><i class="fas fa-chevron-right" style="font-size:10px; margin-right:8px;"></i>Noticias</a></li>
                <li><a href="autoridades.php"><i class="fas fa-chevron-right" style="font-size:10px; margin-right:8px;"></i>Autoridades</a></li>
                <li><a href="docentes.php"><i class="fas fa-chevron-right" style="font-size:10px; margin-right:8px;"></i>Profesores</a></li>
                <li><a href="eventos.php"><i class="fas fa-chevron-right" style="font-size:10px; margin-right:8px;"></i>Eventos</a></li>
                <li><a href="actividades.php"><i class="fas fa-chevron-right" style="font-size:10px; margin-right:8px;"></i>Actividades</a></li>
                <li><a href="himno.php"><i class="fas fa-chevron-right" style="font-size:10px; margin-right:8px;"></i>Himno</a></li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; <?php echo date("Y"); ?> Colegio Eduardo Pazmiño - Todos los derechos reservados.
    </div>
</footer>