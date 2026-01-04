<?php include "../includes/header.php"; ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --azul-real: #002344;
        --oro: #c5a059;
        --oro-brillante: #e5c07b;
        --blanco: #ffffff;
        --rojo-distincion: #9b1b1b;
    }

    body { 
        background-color: #f8f9fa; 
        font-family: 'Poppins', sans-serif; 
    }

    /* Encabezado de Lujo */
    .hero-autoridades {
        background: linear-gradient(135deg, var(--azul-real) 0%, #004080 100%);
        padding: 80px 20px;
        text-align: center;
        color: var(--blanco);
        border-bottom: 5px solid var(--oro);
        position: relative;
        overflow: hidden;
    }

    .hero-autoridades::after {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
        opacity: 0.1;
    }

    .hero-autoridades h1 { 
        font-family: 'Playfair Display', serif;
        font-size: 45px;
        margin-bottom: 10px;
        letter-spacing: 3px;
    }

    .divisor-oro {
        width: 100px;
        height: 3px;
        background: var(--oro);
        margin: 20px auto;
    }

    /* Contenedor Principal */
    .main-wrapper {
        max-width: 1200px;
        margin: -40px auto 80px;
        padding: 0 20px;
    }

    .grid-liderazgo {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 40px;
        justify-content: center;
    }

    /* Tarjeta Estilo Retrato de Honor */
    .honor-card {
        background: var(--blanco);
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        position: relative;
        border: 1px solid #eee;
    }

    .honor-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(0,51,102,0.2);
    }

    /* Marco de la Foto */
    .frame-foto {
        width: 100%;
        height: 420px;
        border: 10px solid var(--blanco);
        outline: 1px solid var(--oro);
        overflow: hidden;
        position: relative;
        box-shadow: inset 0 0 15px rgba(0,0,0,0.2);
    }

    .frame-foto img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }

    .honor-card:hover .frame-foto img {
        transform: scale(1.05);
    }

    /* Información */
    .label-cargo {
        background: var(--oro);
        color: var(--azul-real);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 2px;
        padding: 8px 25px;
        display: inline-block;
        margin-top: -20px;
        position: relative;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .nombre-autoridad {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        color: var(--azul-real);
        margin: 20px 0 10px 0;
        font-weight: 700;
    }

    .biografia-corta {
        font-size: 14px;
        color: #555;
        line-height: 1.6;
        padding: 0 20px 20px;
        border-left: 2px solid var(--oro);
        margin: 15px 10px;
        text-align: left;
    }

    .social-icons {
        padding: 15px 0;
        border-top: 1px solid #eee;
    }

    .social-icons i {
        color: var(--oro);
        margin: 0 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .social-icons i:hover { color: var(--azul-real); }

    /* Destacar a la Rectora */
    .destacado-rectora {
        grid-column: 1 / -1;
        display: flex;
        background: var(--blanco);
        max-width: 900px;
        margin: 0 auto 50px;
        align-items: center;
    }

    @media (max-width: 900px) {
        .destacado-rectora { flex-direction: column; }
    }
</style>

<div class="hero-autoridades">
    <h1>Cuerpo Directivo</h1>
    <div class="divisor-oro"></div>
    <p>Liderazgo inspirador para una educación de excelencia</p>
</div>

<div class="main-wrapper">
    
    <div class="honor-card destacado-rectora">
        <div class="frame-foto" style="flex: 1; height: 500px; border: none;">
            <img src="../assets/img/jessica_vintimilla.jpg" alt="Lcda. Jessica Vintimilla" onerror="this.src='https://via.placeholder.com/500x700?text=Rectora'">
        </div>
        <div style="flex: 1.2; padding: 40px; text-align: left;">
            <span class="label-cargo" style="margin-top: 0;">Rectora Institucional</span>
            <h2 class="nombre-autoridad" style="font-size: 32px;">Lcda. Jessica Vintimilla</h2>
            <p class="biografia-corta">
                "Bajo su liderazgo, nuestra institución se proyecta hacia la modernidad pedagógica, 
                manteniendo la firmeza de nuestros valores fundamentales. Su visión guía el camino de 
                cientos de jóvenes pasajeños hacia el éxito profesional."
            </p>
            <div class="social-icons">
                <i class="fas fa-envelope"></i> Rectorado@pazmino.edu.ec
            </div>
        </div>
    </div>

    <div class="grid-liderazgo">
        
        <div class="honor-card">
            <div class="frame-foto">
                <img src="../assets/img/prof_johana_viñeras.jpeg" alt="Lcda. Johanna Veriñas" onerror="this.src='https://via.placeholder.com/400x500?text=Vicerrectora'">
            </div>
            <span class="label-cargo">Vicerrectora</span>
            <h3 class="nombre-autoridad">Lcda. Johanna Veriñas</h3>
            <p class="biografia-corta">
                Gestora de la excelencia académica y la innovación en el aula. Su compromiso asegura 
                que cada estudiante reciba una formación de primer nivel.
            </p>
            <div class="social-icons">
                <i class="fab fa-linkedin"></i>
                <i class="fas fa-certificate"></i>
            </div>
        </div>

        <div class="honor-card">
            <div class="frame-foto">
                <img src="../assets/img/diana_alvarez_inspectora.jpg" alt="Lcda. Diana Álvarez" onerror="this.src='https://via.placeholder.com/400x500?text=Inspectora'">
            </div>
            <span class="label-cargo">Inspectora General</span>
            <h3 class="nombre-autoridad">Lcda. Diana Álvarez</h3>
            <p class="biografia-corta">
                Garante de la armonía y el respeto institucional. Su labor es fundamental para 
                mantener un ambiente de convivencia sano y disciplinado.
            </p>
            <div class="social-icons">
                <i class="fas fa-user-shield"></i>
                <i class="fas fa-handshake"></i>
            </div>
        </div>

    </div>
</div>

<div style="text-align: center; padding-bottom: 60px;">
    <p style="color: #aaa; font-size: 12px; letter-spacing: 5px; text-transform: uppercase;">
        Estudiar · Trabajar · Triunfar
    </p>
</div>

<?php include "../includes/footer.php"; ?>