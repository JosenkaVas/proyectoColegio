<?php include "../includes/header.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    :root {
        --azul-oscuro: #003366;
        --rojo-inst: #d32f2f;
        --dorado: #c5a059;
        --gris-fondo: #f0f2f5;
    }

    body { background-color: var(--gris-fondo); font-family: 'Poppins', sans-serif; }

    .himno-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
        text-align: center;
    }

    .himno-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border-top: 10px solid var(--azul-oscuro);
    }

    h1 { color: var(--azul-oscuro); font-size: 26px; margin-bottom: 5px; font-weight: 700; text-transform: uppercase; }
    .subtitle { color: var(--rojo-inst); font-weight: bold; margin-bottom: 25px; display: block; font-size: 14px; }

    /* Caja con Scrollbar Personalizado */
    .letra-box {
        max-height: 450px; /* Altura fija para que aparezca el scroll */
        overflow-y: auto;
        padding: 30px;
        line-height: 2.2;
        font-size: 19px;
        color: #333;
        background: #fdfdfd;
        border-radius: 15px;
        border: 1px solid #eee;
    }

    /* Estilo del Scrollbar (El que te gustó) */
    .letra-box::-webkit-scrollbar {
        width: 8px;
    }
    .letra-box::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .letra-box::-webkit-scrollbar-thumb {
        background: var(--azul-oscuro);
        border-radius: 10px;
    }
    .letra-box::-webkit-scrollbar-thumb:hover {
        background: var(--rojo-inst);
    }

    /* Reproductor de Audio */
    .audio-player-container {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 50px;
        margin-bottom: 30px;
        border: 1px solid #eee;
    }

    audio { width: 100%; height: 45px; }

    .seccion-texto { margin-bottom: 40px; }
    .coro-estilo { font-weight: bold; color: var(--azul-oscuro); margin-bottom: 30px; }
    
    .lema-final {
        font-size: 24px;
        font-weight: 900;
        color: var(--rojo-inst);
        margin-top: 30px;
        text-transform: uppercase;
    }

    .creditos { font-size: 14px; color: #777; margin-bottom: 20px; }
</style>

<div class="himno-container">
    <div class="himno-card">
        <h1>Himno al Colegio</h1>
        <span class="subtitle">ING. AGUSTÍN EDUARDO PAZMIÑO BARCIONA</span>

        <div class="creditos">
            <strong>Letra:</strong> Prof. Alfonso Bolívar Pineda Valarezo | 
            <strong>Música:</strong> Lic. Julio Lituma Suin
        </div>

        <div class="audio-player-container">
            <audio id="himnoAudio" controls preload="auto">
                <source src="../assets/audio/himno_colegio.mp3" type="audio/mpeg">
                Tu navegador no soporta el audio.
            </audio>
        </div>

        <div class="letra-box">
            
            <div class="seccion-texto coro-estilo">
                ¡Salve, salve crisol de los Andes,<br>
                Luminaria de América Toda;<br>
                En la cima se siente la aurora<br>
                ¡Y en la cúspide siempre estarás!
            </div>

            <div class="seccion-texto">
                <b style="color: var(--azul-oscuro);">ESTROFA I</b><br>
                Sacro templo en El Oro surgido<br>
                En un valle profundo y sagrado<br>
                Donde el raudo Jubones ha orlado<br>
                De esperanza, y civismo tu altar.<br>
                Porque tú eres el alfa y omega<br>
                El principio y el fin de las cosas <br>
                Cuyo edén de jazmines y rosas<br>
                A Pasaje mil triunfos dará.
            </div>

            <div class="seccion-texto">
                <b style="color: var(--azul-oscuro);">ESTROFA II</b><br>
                A estudiar con denuedo y constancia<br>
                Pazmiñista levanta la frente!<br>
                Nunca olvides que el libro es tu fuente <br>
                Donde a diario en él beberás<br>
                El acervo que nutre las mentes<br>
                Y de obstáculo libra el camino<br>
                Construyendo tu propio destino<br>
                Y un mañana de luz vesperal.
            </div>

            <div class="seccion-texto">
                <b style="color: var(--azul-oscuro);">ESTROFA III</b><br>
                Pues Eduardo Pazmiño Barciona<br>
                Custodiando se encuentra tu empeño<br>
                De ver realizando su sueño<br>
                De hacer de Pasaje inmortal<br>
                Encumbrando su estirpe y su fama<br>
                En el dombo de América entera<br>
                Y que sea tu emblema y bandera<br>
                
                <div class="lema-final">¡ESTUDIAR, TRABAJAR Y TRIUNFAR!</div>
            </div>

        </div>
    </div>
</div>

<script>
    window.onload = function() {
        var audio = document.getElementById('himnoAudio');
        audio.load(); // Fuerza a Chrome a reconocer el archivo en XAMPP
    };
</script>

<?php include "../includes/footer.php"; ?>