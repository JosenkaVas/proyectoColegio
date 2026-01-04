<?php include "../includes/header.php"; ?>

<style>
    :root {
        --azul: #003366;
        --rojo: #d32f2f;
        --blanco: #ffffff;
        --gris-suave: #f9f9f9;
        --texto: #333333;
    }

    body {
        background-color: var(--gris-suave);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
    }

    /* Contenedor Principal */
    .container-identidad {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .titulo-principal {
        text-align: center;
        margin-bottom: 50px;
    }

    .titulo-principal h1 {
        color: var(--azul);
        font-size: 38px;
        position: relative;
        padding-bottom: 15px;
    }

    .titulo-principal h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background-color: var(--rojo);
    }

    /* Grid de Misión y Visión */
    .grid-identidad {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    .card-identidad {
        background: var(--blanco);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border-top: 5px solid var(--azul);
        transition: transform 0.3s ease;
        text-align: center;
    }

    .card-identidad:hover {
        transform: translateY(-10px);
        border-top-color: var(--rojo);
    }

    .icon-box {
        font-size: 50px;
        color: var(--rojo);
        margin-bottom: 20px;
    }

    .card-identidad h2 {
        color: var(--azul);
        font-size: 26px;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .card-identidad p {
        color: var(--texto);
        line-height: 1.8;
        font-size: 17px;
        text-align: justify;
    }

    /* Banner del Lema */
    .lema-banner {
        background-color: var(--azul);
        color: var(--blanco);
        text-align: center;
        padding: 40px 20px;
        margin-top: 60px;
        border-radius: 10px;
        border-left: 8px solid var(--rojo);
    }

    .lema-banner h3 {
        font-size: 24px;
        font-style: italic;
        margin: 0;
        letter-spacing: 2px;
    }

    /* Responsivo */
    @media (max-width: 850px) {
        .grid-identidad {
            grid-template-columns: 1fr;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div class="container-identidad">
    
    <div class="titulo-principal">
        <h1>Nuestra Identidad</h1>
    </div>

    <div class="grid-identidad">
        
        <div class="card-identidad">
            <div class="icon-box">
                <i class="fas fa-bullseye"></i>
            </div>
            <h2>Misión</h2>
            <p>
                Formar bachilleres con sólidos conocimientos científicos, técnicos y valores éticos, 
                capaces de enfrentar los retos de la sociedad actual. Nuestra institución se compromete 
                a brindar una educación integral de calidad, fomentando el espíritu crítico, 
                la innovación y el compromiso social para contribuir al desarrollo del país.
            </p>
        </div>

        <div class="card-identidad">
            <div class="icon-box">
                <i class="fas fa-eye"></i>
            </div>
            <h2>Visión</h2>
            <p>
                Ser una institución educativa líder y referente en la región, reconocida por su 
                excelencia académica y la formación de ciudadanos líderes. Aspiramos a proyectarnos 
                hacia el futuro con tecnología de vanguardia y metodologías activas que garanticen 
                el éxito profesional y personal de nuestros estudiantes.
            </p>
        </div>

    </div>

    <div class="lema-banner">
        <h3>"Estudiar, Trabajar y Triunfar"</h3>
    </div>

</div>

<?php include "../includes/footer.php"; ?>