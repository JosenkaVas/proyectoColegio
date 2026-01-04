<?php include "../includes/header.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --azul-corp: #003366;
        --rojo-vibrante: #d32f2f;
        --gris-fondos: #f8fafc;
        --blanco-puro: #ffffff;
        --gradiente-azul: linear-gradient(135deg, #003366 0%, #004b93 100%);
    }

    body {
        background-color: var(--gris-fondos);
        font-family: 'Inter', 'Segoe UI', sans-serif;
    }

    .container-valores {
        max-width: 1200px;
        margin: 60px auto;
        padding: 0 25px;
    }

    /* Encabezado Premium */
    .header-premium {
        text-align: center;
        margin-bottom: 70px;
    }

    .header-premium .subtitulo {
        color: var(--rojo-vibrante);
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 4px;
        font-size: 14px;
        display: block;
        margin-bottom: 10px;
    }

    .header-premium h1 {
        color: var(--azul-corp);
        font-size: 42px;
        font-weight: 900;
        margin: 0;
        position: relative;
    }

    .header-premium h1::after {
        content: '';
        display: block;
        width: 100px;
        height: 5px;
        background: var(--rojo-vibrante);
        margin: 20px auto;
        border-radius: 10px;
    }

    /* Grid de Valores de Alto Impacto */
    .grid-valores-premium {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
    }

    .valor-card-pro {
        background: var(--blanco-puro);
        padding: 45px 35px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
    }

    .valor-card-pro:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px -12px rgba(0, 51, 102, 0.15);
        border-color: var(--azul-corp);
    }

    /* Estilo de los Logos/Iconos */
    .icon-wrapper-pro {
        width: 80px;
        height: 80px;
        background: var(--gradiente-azul);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 10px 20px rgba(0, 51, 102, 0.2);
        transition: 0.4s;
    }

    .valor-card-pro:hover .icon-wrapper-pro {
        transform: rotateY(180deg);
        background: var(--rojo-vibrante);
    }

    .valor-card-pro h3 {
        color: var(--azul-corp);
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .valor-card-pro p {
        color: #555;
        line-height: 1.7;
        font-size: 16px;
        margin: 0;
    }

    /* Badge Decorativo Detrás */
    .bg-number {
        position: absolute;
        right: -10px;
        bottom: -20px;
        font-size: 120px;
        font-weight: 900;
        color: rgba(0, 51, 102, 0.03);
        user-select: none;
    }

    /* Frase de Cierre Estilo Banner */
    .lema-final-card {
        margin-top: 80px;
        background: var(--azul-corp);
        padding: 60px;
        border-radius: 30px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .lema-final-card h2 {
        font-size: 32px;
        font-weight: 300;
        letter-spacing: 1px;
        position: relative;
        z-index: 2;
    }

    .lema-final-card b {
        color: #ffca28;
    }

    .decoration-circle {
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
        top: -150px;
        right: -100px;
    }

    /* Móvil */
    @media (max-width: 768px) {
        .header-premium h1 { font-size: 30px; }
        .grid-valores-premium { grid-template-columns: 1fr; }
        .lema-final-card { padding: 40px 20px; }
    }
</style>

<div class="container-valores">
    
    <header class="header-premium">
        <span class="subtitulo">Formación de Excelencia</span>
        <h1>Principios Institucionales</h1>
    </header>

    <div class="grid-valores-premium">
        
        <article class="valor-card-pro">
            <div class="icon-wrapper-pro">
                <i class="fas fa-shield-halved"></i>
            </div>
            <h3>Ética e Integridad</h3>
            <p>Forjamos el carácter de nuestros estudiantes basándonos en la honestidad y el respeto mutuo, asegurando que cada bachiller sea un ciudadano de palabra y valores sólidos.</p>
            <span class="bg-number">01</span>
        </article>

        <article class="valor-card-pro">
            <div class="icon-wrapper-pro">
                <i class="fas fa-award"></i>
            </div>
            <h3>Excelencia en el Estudio</h3>
            <p>Buscamos la calidad máxima en el aprendizaje. El estudio es la herramienta principal que entregamos a nuestros jóvenes para que puedan transformar su futuro.</p>
            <span class="bg-number">02</span>
        </article>

        <article class="valor-card-pro">
            <div class="icon-wrapper-pro">
                <i class="fas fa-tools"></i>
            </div>
            <h3>Cultura del Trabajo</h3>
            <p>Creemos en el esfuerzo como motor del cambio. Enseñamos que el trabajo digno y constante es el único camino real hacia la prosperidad y el éxito.</p>
            <span class="bg-number">03</span>
        </article>

        <article class="valor-card-pro">
            <div class="icon-wrapper-pro">
                <i class="fas fa-trophy"></i>
            </div>
            <h3>Visión de Triunfo</h3>
            <p>Preparamos bachilleres con mentalidad ganadora. El triunfo institucional es ver a nuestros egresados liderando proyectos y triunfando en la educación superior.</p>
            <span class="bg-number">04</span>
        </article>

        <article class="valor-card-pro">
            <div class="icon-wrapper-pro">
                <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Emprendimiento</h3>
            <p>Inspirados por el espíritu emprendedor del Ing. Agustín Eduardo Pazmiño Barciona, motivamos a los estudiantes a innovar, crear y no temer a los retos.</p>
            <span class="bg-number">05</span>
        </article>

        <article class="valor-card-pro">
            <div class="icon-wrapper-pro">
                <i class="fas fa-users-gear"></i>
            </div>
            <h3>Compromiso Social</h3>
            <p>El colegio no es una isla; somos parte de Pasaje. Fomentamos la solidaridad y la participación activa en el desarrollo cultural de nuestra provincia.</p>
            <span class="bg-number">06</span>
        </article>

    </div>

    <section class="lema-final-card">
        <div class="decoration-circle"></div>
        <h2>Nuestra filosofía se resume en nuestra meta:<br> <b>Estudiar, Trabajar y Triunfar</b></h2>
    </section>

</div>

<?php include "../includes/footer.php"; ?>