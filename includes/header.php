<style>
    :root {
        --azul: #003366;
        --rojo: #d32f2f;
        --gris-oscuro: #333;
        --blanco: #ffffff;
    }

    .navbar {
        background-color: var(--azul);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 5%;
        height: 70px;
        position: sticky;
        top: 0;
        z-index: 1000;
        border-bottom: 4px solid var(--rojo);
        font-family: sans-serif;
    }

    .logo { color: var(--blanco); font-weight: bold; font-size: 22px; }

    .nav-links { display: flex; list-style: none; margin: 0; padding: 0; }

    .nav-links li { position: relative; }

    .nav-links a {
        color: var(--blanco);
        text-decoration: none;
        padding: 24px 15px;
        display: block;
        transition: 0.3s;
    }

    .nav-links a:hover { background-color: var(--rojo); }

    /* --- SUBMENÚS --- */
    .submenu {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: var(--gris-oscuro);
        list-style: none;
        width: 200px;
        display: none;
        padding: 0;
    }

    .submenu li a {
        padding: 12px 15px;
        font-size: 14px;
        border-bottom: 1px solid #444;
    }

    .nav-links li:hover .submenu { display: block; }

    /* --- RESPONSIVO --- */
    #check { display: none; }
    .checkbtn { font-size: 30px; color: white; cursor: pointer; display: none; }

    @media (max-width: 950px) {
        .checkbtn { display: block; }
        .nav-links {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: var(--azul);
            top: 70px;
            left: -100%;
            text-align: center;
            transition: all .5s;
            flex-direction: column;
        }
        #check:checked ~ .nav-links { left: 0; }
        .submenu { position: static; width: 100%; display: block; background: #003366; }
    }
</style>

<nav class="navbar">
    <div class="logo">WEB INSTITUCIONAL</div>

    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">☰</label>

    <ul class="nav-links">
        <li><a href="home.php">Inicio</a></li>
        
        <li>
            <a href="#">Noticias ▾</a>
            <ul class="submenu">
                <li><a href="eventos.php">Eventos</a></li>
                <li><a href="actividades.php">Actividades</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Sobre Nosotros ▾</a>
            <ul class="submenu">
                <li><a href="historia.php">Historia</a></li>
                <li><a href="misión_vision.php">Misión y Visión</a></li>
                <li><a href="valores.php">Valores</a></li>
                <li><a href="himno.php">Símbolo</a></li>
                <li><a href="autoridades.php">Autoridades</a></li>
            </ul>
        </li>

        <li><a href="docentes.php">Docentes</a></li>
        <li><a href="contactanos.php">Contacto</a></li>
        <li>
    <a href="#"><i class="fas fa-user-circle"></i> Mi Cuenta ▾</a>
    <ul class="submenu">
        <li><a href="perfil.php">Ver Perfil</a></li>
<li><a href="../auth/logout.php" style="color: #ff4444;">Cerrar Sesión</a></li>
    </ul>
</li>
    </ul>
</nav>