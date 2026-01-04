<?php
// Usamos la sesión para el nombre en el header si es necesario
session_start();
require_once "../config/db.php";
include "menu/header_adm.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nosotros | Proyecto de Grado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --azul-institucional: #003366;
            --dorado-formal: #b08d48;
            --fondo-gris: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: var(--fondo-gris);
            margin: 0;
            color: #333;
        }

        .container-principal {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* --- ENCABEZADO TÉCNICO --- */
        .seccion-titulo {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 50px;
            border-left: 8px solid var(--azul-institucional);
        }

        .seccion-titulo h1 {
            color: var(--azul-institucional);
            font-size: 1.6rem;
            margin: 0 0 15px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .seccion-titulo p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #4a5568;
            margin: 0;
        }

        /* --- GRID DE AUTORES --- */
        .autores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .card-autor {
            background: #fff;
            padding: 40px 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        /* Ajuste para que los rostros se vean siempre bien */
        .foto-marco {
            width: 180px;
            height: 180px;
            margin: 0 auto 25px;
            border-radius: 50%;
            border: 3px solid var(--dorado-formal);
            padding: 5px;
            background: #fff;
        }

        .foto-marco img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top; /* Enfoca la parte superior (rostros) */
            border-radius: 50%;
        }

        .card-autor h2 {
            color: var(--azul-institucional);
            font-size: 1.25rem;
            margin: 10px 0;
            height: 50px; /* Alineación vertical de nombres */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rol-tecnico {
            color: var(--dorado-formal);
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-bottom: 15px;
            display: block;
        }

        .etiqueta-bachiller {
            background: #edf2f7;
            color: #2d3748;
            padding: 6px 16px;
            border-radius: 4px;
            font-size: 0.85rem;
            display: inline-block;
            border: 1px solid #e2e8f0;
        }

        /* --- AGRADECIMIENTOS FORMALES --- */
        .seccion-agradecimiento {
            margin-top: 60px;
            background: var(--azul-institucional);
            color: #fff;
            padding: 50px;
            border-radius: 8px;
            text-align: center;
        }

        .seccion-agradecimiento h3 {
            color: var(--dorado-formal);
            text-transform: uppercase;
            font-size: 1.4rem;
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(176, 141, 72, 0.3);
            display: inline-block;
            padding-bottom: 10px;
        }

        .seccion-agradecimiento p {
            font-size: 1.05rem;
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto;
            font-style: italic;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .seccion-titulo { padding: 25px; }
            .seccion-agradecimiento { padding: 30px; }
        }
        .foto-marco img {
    width: 100%;
    height: 100%;
    /* 'cover' asegura que la imagen llene el círculo sin deformarse */
    object-fit: cover; 
    /* 'top' o un porcentaje (ej. 20%) sube la imagen para mostrar el rostro */
    object-position: center 15%; 
    border-radius: 50%;
    display: block;
}
    </style>
</head>
<body>

<div class="container-principal">
    
    <header class="seccion-titulo">
        <h1>Proyecto de Grado Demostrativo</h1>
        <p>“DISEÑO E IMPLEMENTACIÓN DE UNA PÁGINA WEB INFORMATIVA PARA LA U.E. <br> 
           <strong>ING. AGUSTÍN EDUARDO PAZMIÑO BARCIONA</strong>”</p>
    </header>

    <main class="autores-grid">
     <article class="card-autor">
    <div class="foto-marco" style="width: 180px; height: 180px; overflow: hidden; border-radius: 50%; margin: 0 auto;">
        <img src="../assets/img/integrante2.jpeg" alt="Kenneth Renato García Herrera">
    </div>
    <span class="rol-tecnico">DESARROLLADOR FULL-STACK</span>
    <h2>KENNETH RENATO GARCÍA HERRERA</h2>
    <div class="etiqueta-bachiller">3ero de Bachillerato - Informática</div>
</article>

        <article class="card-autor">
            <div class="foto-marco">
                <img src="../assets/img/integrante1.jpeg" alt="Crismar Carrero">
            </div>
            <span class="rol-tecnico">Diseño UI/UX & Contenido</span>
            <h2>CRISMAR ANDREA CARRERO</h2>
            <div class="etiqueta-bachiller">3ero de Bachillerato - Informática</div>
        </article>

        <article class="card-autor">
            <div class="foto-marco">
                <img src="../assets/img/integrante3.jpeg" alt="David Lobato">
            </div>
            <span class="rol-tecnico">Gestión de Base de Datos</span>
            <h2>DAVID ANDRES LOBATO ORTIZ</h2>
            <div class="etiqueta-bachiller">3ero de Bachillerato - Informática</div>
        </article>
    </main>

    <footer class="seccion-agradecimiento">
        <h3>Reconocimientos y Agradecimientos</h3>
        <p>
            Hacemos extensivo nuestro agradecimiento a la Unidad Educativa "Ing. Agustín Eduardo Pazmiño Barciona" y al cuerpo docente por la formación brindada. Este sistema representa la culminación técnica de nuestros estudios de bachillerato, desarrollado con el rigor profesional necesario para fortalecer la infraestructura digital de nuestra institución.
        </p>
    </footer>

</div>

<?php include "menu/footer-adm.php"; ?>

</body>
</html>