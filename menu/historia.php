<?php include "../includes/header.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<style>
    :root {
        --azul-marino: #001f3f;
        --dorado-mate: #c5a059;
        --rojo-claro: #d32f2f;
        --gris-soft: #f9f9f9;
    }

    body { 
        background-color: #f5f7fa; 
        font-family: 'Montserrat', sans-serif;
        color: #333;
    }

    .historia-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
    }

    /* Encabezado sin Logo */
    .historia-header {
        text-align: center;
        margin-bottom: 50px;
        border-bottom: 2px solid var(--dorado-mate);
        padding-bottom: 20px;
    }

    .historia-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 38px;
        color: var(--azul-marino);
        margin: 0;
    }

    /* Caja de Reseña Principal */
    .resena-principal {
        background: white;
        padding: 45px;
        border-radius: 10px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
        margin-bottom: 40px;
        line-height: 1.9;
        text-align: justify;
        font-size: 16px;
    }

    /* Secciones de Listados */
    .seccion-info {
        margin-bottom: 50px;
    }

    .titulo-sub {
        font-family: 'Playfair Display', serif;
        font-size: 26px;
        color: var(--azul-marino);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        border-left: 5px solid var(--dorado-mate);
        padding-left: 15px;
    }

    /* Tablas Profesionales */
    .tabla-personal {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 30px;
    }

    .tabla-personal thead th {
        background: var(--azul-marino);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .tabla-personal td {
        padding: 12px 20px;
        border-bottom: 1px solid #eee;
        font-size: 14px;
    }

    /* Columna de Rectores */
    .grid-rectores {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 10px;
    }

    .rector-box {
        background: #fff;
        padding: 12px 20px;
        border: 1px solid #e0e0e0;
        font-size: 15px;
    }

    .th-especial { background: var(--rojo-claro) !important; }
    .th-auxiliar { background: #555 !important; }

</style>

<div class="historia-container">
    
    <header class="historia-header">
        <h1>Reseña Histórica Institucional</h1>
    </header>

    <div class="resena-principal">
        <p>El Colegio Técnico Nacional “Ing. Eduardo Pazmiño Barciona” surge como una necesidad de que la Ciudad de las Nieves cuente con un plantel fiscal exclusivamente femenino, es así como según acuerdo ministerial No. 4321 del 17 de junio de 1982, se crea este prestigioso plantel.</p>
        
        <p>Nos iniciamos laborando en el local de la escuela “Abdón Calderón” ubicada en la avenida Rocafuerte entre Ochoa León y Machala, posteriormente pasamos al colegio “Carmen Mora de Encalada” y actualmente nos encontramos en nuestro propio local ubicado en las calles Juan Montalvo y Clemente Vaca.</p>
        
        <p>La historia de la institución tiene a su haber momentos de triunfo, donde los laureles de gloria han colmado de satisfacción a todos sus integrantes, es así como este plantel, el benjamín de la educación fiscal en nuestra ciudad, ha escrito páginas de triunfo en diferentes certámenes académicos, sociales, culturales y deportivos.</p>
        
        <p>El Colegio “Ing. Eduardo Pazmiño Barciona”, que desde el año 2006 es mixto, cuenta con una planta docente de profesionales en ciencias de la educación, dentro del proyecto educativo que está aplicando se ha seleccionado los valores de respeto, tolerancia, solidaridad, justicia y paz. Su misión es la de afianzar y consolidar la estructura moral de sus estudiantes; es decir, colocar a la educación al servicio del ser humano, con todos los servicios de apoyo pedagógico y tecnológico necesarios, aspirando a convertirse en líder de las innovaciones educativas y las excelencia académica.</p>
        
        <p>Nuestro plantel en miras de lograr la excelencia educativa continuará con el bachillerato en ciencias y el bachillerato técnico servicios informáticos. Actualmente el colegio cuenta con 39 personas entre maestras, maestros y personal administrativo y de servicio.</p>
    </div>

    <section class="seccion-info">
        <h2 class="titulo-sub">Nómina Histórica de Rectores</h2>
        <div class="grid-rectores">
            <div class="rector-box">Lcda. Felicia González Gómez</div>
            <div class="rector-box">Prof. Mercedes Sanmartín Barros</div>
            <div class="rector-box">Prof. Wellington Márquez Aguilar</div>
            <div class="rector-box">Lcda. Rosario González Gómez</div>
            <div class="rector-box">Lcda. Margarita Gómez Reyes</div>
            <div class="rector-box">Lcda. Gladys Zoraida López</div>
            <div class="rector-box">Mónica Tacuri Zea</div>
            <div class="rector-box">Lcda. Diana Martínez</div>
            <div class="rector-box">Lic. Jessica Vintimilla</div>
        </div>
    </section>

    <section class="seccion-info">
        <h2 class="titulo-sub">Personal Directivo y Apoyo DECE</h2>
        <table class="tabla-personal">
            <thead>
                <tr>
                    <th>Cargo / Función</th>
                    <th>Nombre de la Autoridad</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Rectora</td><td>Lcda. Jessica Vintimilla</td></tr>
                <tr><td>Vicerrectora</td><td>Lcda. Johanna Veriñas; Mgs.</td></tr>
                <tr><td>Inspectora General</td><td>Lcda. Diana Isabel Álvarez Duta</td></tr>
                <tr><td>Representante DECE</td><td>Lcda. Daniela Collaguazo</td></tr>
                <tr><td>Representante DECE</td><td>Lcdo. Jostin Santos</td></tr>
            </tbody>
        </table>
    </section>


</div>

<?php include "../includes/footer.php"; ?>