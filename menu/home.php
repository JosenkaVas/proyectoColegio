<?php include "../includes/header.php"; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

<style>
    :root {
        --azul-oscuro: #4a5d73;
        --blanco: #ffffff;
        --dorado: #b5945a;
        --azul-fuerte: #1a3a5a;
        --gris-suave: #f8f9fa;
    }

    body {
        margin: 0;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        color: #333;
    }

    /* --- HERO SECTION --- */
    .hero-container {
        position: relative;
        height: 100vh;
        width: 100%;
        overflow: hidden;
    }

    .swiper { width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: 1; }
    .swiper-slide { background-size: cover; background-position: center; }

    .capa-diseño {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-color: rgba(26, 58, 90, 0.75); /* Un tono más profundo para mayor contraste */
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--blanco);
        padding: 0 20px;
    }

    .capa-diseño h1 {
        font-size: clamp(45px, 7vw, 90px);
        margin-bottom: 25px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .capa-diseño p {
        font-size: clamp(18px, 2.5vw, 28px);
        max-width: 900px;
        line-height: 1.4;
        font-weight: 300;
        opacity: 0.9;
    }

    /* --- SECCIÓN MENSAJE Y TARJETAS --- */
    .seccion-mensaje {
        padding: 100px 20px;
        background-color: var(--blanco);
        text-align: center;
    }

    .titulo-principal {
        font-size: 42px;
        color: var(--azul-fuerte);
        margin-bottom: 30px;
        font-weight: 700;
    }

    .texto-descripcion {
        font-size: 20px;
        color: #555;
        line-height: 1.8;
        max-width: 950px;
        margin: 0 auto 60px;
    }

    .oferta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .oferta-card {
        background: var(--gris-suave);
        padding: 50px 40px;
        border-radius: 20px;
        border-bottom: 5px solid var(--dorado);
        transition: all 0.4s ease;
    }

    .oferta-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .oferta-card i {
        font-size: 55px;
        color: var(--dorado);
        margin-bottom: 25px;
    }

    .oferta-card h3 {
        font-size: 26px;
        color: var(--azul-fuerte);
        margin-bottom: 15px;
    }

    .oferta-card p {
        font-size: 17px;
        line-height: 1.6;
        color: #666;
    }

    /* --- FRANJA AZUL INTERMEDIA (MODERNA) --- */
    .franja-azul-media {
        background-color: var(--azul-fuerte);
        color: white;
        padding: 60px 20px;
    }

    .datos-wrap {
        display: flex;
        justify-content: space-around;
        max-width: 1200px;
        margin: 0 auto;
        flex-wrap: wrap;
        gap: 30px;
    }

    .dato-bloque {
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 22px;
    }

    .dato-bloque i {
        color: var(--dorado);
        font-size: 32px;
    }

    .dato-bloque strong {
        font-size: 28px;
        color: var(--blanco);
    }

    /* --- INFORMACIÓN CLAVE --- */
    .info-clave-section {
        padding: 100px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px 80px;
        margin-top: 50px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .icon-box {
        background: var(--dorado);
        width: 75px;
        height: 75px;
        border-radius: 15px; /* Cuadrado redondeado más elegante que círculo */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 30px;
        flex-shrink: 0;
        transform: rotate(-5deg); /* Toque de diseño moderno */
    }

    .info-text strong {
        display: block;
        font-size: 22px;
        color: var(--azul-fuerte);
        margin-bottom: 5px;
    }

    .info-text span {
        font-size: 18px;
        color: #666;
    }

    /* --- STATS FINALES --- */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        background: var(--azul-oscuro);
        color: white;
        padding: 80px 20px;
        text-align: center;
    }

    .stat-item h3 { font-size: 55px; margin: 0; color: var(--dorado); font-weight: 800; }
    .stat-item p { margin-top: 10px; font-size: 16px; letter-spacing: 2px; text-transform: uppercase; opacity: 0.8; }

    @media (max-width: 992px) {
        .info-grid, .stats-container { grid-template-columns: 1fr 1fr; }
        .stats-container { gap: 40px; }
    }

    @media (max-width: 600px) {
        .info-grid, .stats-container, .datos-wrap { grid-template-columns: 1fr; flex-direction: column; }
    }
</style>

<div class="hero-container">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url('../assets/img/colegio.jpg');"></div>
            <div class="swiper-slide" style="background-image: url('../assets/img/docentes.jpg');"></div>
            <div class="swiper-slide" style="background-image: url('../assets/img/estudiantes.jpg');"></div>
        </div>
    </div>
    <div class="capa-diseño">
        <h1>Excelencia que Inspira</h1>
        <p>Formando líderes íntegros en el corazón de Pasaje con visión global y valores humanos.</p>
    </div>
</div>

<section class="seccion-mensaje">
    <h2 class="titulo-principal">Nuestra Institución</h2>
    <p class="texto-descripcion">
        Somos un hogar de formación integral donde la excelencia académica se une con el calor humano. 
        En nuestra institución, cada estudiante es el protagonista de un viaje hacia el conocimiento, 
        cultivando mentes brillantes y corazones solidarios para transformar el mañana.
    </p>

    <div class="oferta-grid">
        <div class="oferta-card">
            <i class="fas fa-user-graduate"></i>
            <h3>Educación Secundaria</h3>
            <p>Un currículo riguroso enfocado en el desarrollo del pensamiento crítico y la formación en valores.</p>
        </div>
        <div class="oferta-card">
            <i class="fas fa-globe-americas"></i>
            <h3>Bachillerato Internacional</h3>
            <p>Certificación de prestigio mundial que abre las puertas a las mejores universidades del planeta.</p>
        </div>
    </div>
</section>

<section class="franja-azul-media">
    <div class="datos-wrap">
        <div class="dato-bloque">
            <i class="fas fa-user-plus"></i>
            <span><strong>500</strong> Estudiantes</span>
        </div>
        <div class="dato-bloque">
            <i class="fas fa-chalkboard-teacher"></i>
            <span><strong>24</strong> Docentes</span>
        </div>
        <div class="dato-bloque">
            <i class="fas fa-chalkboard"></i>
            <span>Promedio <strong>25 - 30</strong> alumnos x salón</span>
        </div>
    </div>
</section>

<section class="info-clave-section">
    <h2 class="titulo-principal" style="text-align: center;">Información Clave</h2>
    <div class="info-grid">
        <div class="info-item">
            <div class="icon-box"><i class="fas fa-map-marked-alt"></i></div>
            <div class="info-text">
                <strong>Ubicación Estratégica</strong>
                <span>Ciudad de Pasaje, El Oro, Ecuador.</span>
            </div>
        </div>
        <div class="info-item">
            <div class="icon-box"><i class="fas fa-history"></i></div>
            <div class="info-text">
                <strong>Jornadas Flexibles</strong>
                <span>Sección Matutina y Nocturna.</span>
            </div>
        </div>
        <div class="info-item">
            <div class="icon-box"><i class="fas fa-users"></i></div>
            <div class="info-text">
                <strong>Ambiente Inclusivo</strong>
                <span>Institución Educativa Mixta.</span>
            </div>
        </div>
        <div class="info-item">
            <div class="icon-box"><i class="fas fa-comment-dots"></i></div>
            <div class="info-text">
                <strong>Idioma y Cultura</strong>
                <span>Español con fortalecimiento en Inglés.</span>
            </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    effect: "fade",
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    speed: 1200
  });
</script>

<?php include "../includes/footer.php"; ?>