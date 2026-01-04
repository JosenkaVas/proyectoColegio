<?php include "../includes/header.php"; ?>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --primario: #002344;
        --oro: #c5a059;
        --fondo: #f8fafd;
    }

    body { background-color: var(--fondo); font-family: 'Montserrat', sans-serif; }

    .main-docentes { max-width: 1200px; margin: 60px auto; padding: 0 20px; }

    .titulo-principal {
        text-align: center;
        font-family: 'Playfair Display', serif;
        font-size: 35px;
        color: var(--primario);
        margin-bottom: 50px;
    }

    /* Grid para Docentes con Foto */
    .grid-galeria {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 30px;
        margin-bottom: 80px;
    }

    .card-honor {
        background: #fff;
        padding: 10px;
        border-radius: 4px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        text-align: center;
        border-bottom: 3px solid var(--oro);
        transition: transform 0.3s;
    }

    .card-honor:hover { transform: translateY(-5px); }

    .foto-placeholder {
        width: 100%;
        height: 280px;
        background: #eee;
        margin-bottom: 15px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .foto-placeholder img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .label-titulo {
        font-size: 11px;
        text-transform: uppercase;
        color: var(--oro);
        font-weight: 700;
        letter-spacing: 1px;
    }

    .nombre-perfil {
        font-size: 15px;
        color: var(--primario);
        font-weight: 600;
        margin-top: 5px;
    }

    /* Estilo para Nocturna (Sin Foto) */
    .grid-simple {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 15px;
    }

    .card-simple {
        background: #fff;
        padding: 15px 20px;
        display: flex;
        align-items: center;
        border-left: 4px solid var(--primario);
        font-size: 14px;
    }

    .card-simple i { color: var(--oro); margin-right: 15px; }

    /* Footer Auxiliar */
    .banner-auxiliar {
        background: var(--primario);
        color: white;
        padding: 30px;
        margin-top: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }
</style>

<div class="main-docentes">
    
    <h2 class="titulo-principal">Cuerpo Docente - Jornada Matutina</h2>

    <div class="grid-galeria">
        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_manolo.jpg"></div>
            <div class="label-titulo">Magíster</div>
            <div class="nombre-perfil">Manolo Armijos Herrera</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/danny_avila.jpg" alt="Dra. Danny Ávila"></div>
            <div class="label-titulo">Doctora</div>
            <div class="nombre-perfil">Ávila Espinoza Danny Elsa</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_flor_caiminagua.jpg" alt="Lic. Flor Caiminagua"></div>
            <div class="label-titulo">Licenciada</div>
            <div class="nombre-perfil">Caiminagua Nagua Flor María</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_angel_campoverde.jpg" alt="Dr. Angel Campoverde"></div>
            <div class="label-titulo">Doctor</div>
            <div class="nombre-perfil">Campoverde Matute Angel Danilo</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_jofre_delgado.jpg" alt="Ing. Joffre Delgado"></div>
            <div class="label-titulo">Ingeniero</div>
            <div class="nombre-perfil">Delgado Ruiz Joffre Antonio</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_nelly.jpg" alt="Mgs. Nelly Espinoza"></div>
            <div class="label-titulo">Magíster</div>
            <div class="nombre-perfil">Espinoza Yánez Nelly Azucena</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/severo_guevara_vicerrector.jpg" alt="Lic. Severo Guevara"></div>
            <div class="label-titulo">Licenciado</div>
            <div class="nombre-perfil">Severo Napoleón Guevara Gonzáles</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/fanny_hurtado.jpg" alt="Dra. Fanny Hurtado"></div>
            <div class="label-titulo">Doctora</div>
            <div class="nombre-perfil">Hurtado Mendoza Fanny Alba</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_janeth_llivipuma.jpeg"></div>
            <div class="label-titulo">Magíster</div>
            <div class="nombre-perfil">Llivipuma Arias Janeth Susana</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_teresa_marquez.jpg" alt="Ec. Teresa Márquez"></div>
            <div class="label-titulo">Economista</div>
            <div class="nombre-perfil">Márquez Ortega Teresa Jackeline</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_greys_nieto.jpg" alt="Mgs. Ana Nieto"></div>
            <div class="label-titulo">Magíster</div>
            <div class="nombre-perfil">Nieto Orozco Ana Greys</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_cristina_morales.jpg" alt="Lic. Cristina Morales"></div>
            <div class="label-titulo">Licenciada</div>
            <div class="nombre-perfil">Cristina Morales Orellana</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_lady_quizphi.jpg" alt="Ing. Lady Quizhpi"></div>
            <div class="label-titulo">Ingeniera</div>
            <div class="nombre-perfil">Quizhpi Lupercio Lady Patricia</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_cristian_reyes.jpeg" alt="Lic. Christian Reyes"></div>
            <div class="label-titulo">Licenciado</div>
            <div class="nombre-perfil">Christian Reyes</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_mayra_saldaña.jpg" alt="Mgs. Mayra Saldaña"></div>
            <div class="label-titulo">Magíster</div>
            <div class="nombre-perfil">Saldaña Méndez Mayra Elizabeth</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/nestor_tenesaca.jpeg" alt="Mgs. Néstor Tenezaca"></div>
            <div class="label-titulo">Magíster</div>
            <div class="nombre-perfil">Tenezaca Caiminagua Néstor Fabricio</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_soledad_tinoco.jpg" alt="Ing. María Tinoco"></div>
            <div class="label-titulo">Ingeniera</div>
            <div class="nombre-perfil">Tinoco Rodas María Soledad</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_erika_ullauri.jpg" alt="Lcda. Erika Ullauri"></div>
            <div class="label-titulo">Licenciada</div>
            <div class="nombre-perfil">Ullauri Tigre Erika Edith</div>
        </div>

        <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_jinsop.jpeg" alt="Lcdo. Jinsop Vásquez"></div>
            <div class="label-titulo">Licenciado</div>
            <div class="nombre-perfil">Vásquez Noles Jinsop Freddy</div>
        </div>
          <div class="card-honor">
            <div class="foto-placeholder"><img src="../assets/img/prof_leonardo_romero.jpg" alt="Lcdo. Leonardo Romero"></div>
            <div class="label-titulo">Licenciado</div>
            <div class="nombre-perfil">Romero Piedra Edwin Leonardo</div>
        </div>
    </div>

    <h2 class="titulo-principal">Docentes - Jornada Nocturna</h2>
    <div class="grid-simple">
        <div class="card-simple"><i class="fas fa-user-tie"></i> Abg. Aguilar Aguilar Romel Adrián</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Lcda. Banegas Arias Mayra Elizabeth</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Lcda. Benites Encarnación Jenny Estefanía</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Lcdo. Chávez Porras Mayco Kelvin</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Bioq. Enríquez Escobar Sandra Pahola</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Lcdo. López Guamán Christian Manuel</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Lcdo. Montesdeoca Guaicha Jessica Marlene</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Mgs. Polo Cuenca Naldo</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Lcdo. Ríos Aguilar Diego Patricio</div>
        <div class="card-simple"><i class="fas fa-user-tie"></i> Mgs. Valarezo Rivera Evelyn Samantha</div>
    </div>

    <div class="banner-auxiliar">
        <i class="fas fa-info-circle fa-2x" style="color: var(--oro);"></i>
        <div>
            <strong style="display: block; font-size: 18px; color: var(--oro);">Auxiliar de Servicio</strong>
            <span>Sr. Jorge Luis Romero Patiño</span>
        </div>
    </div>

</div>

<?php include "../includes/footer.php"; ?>