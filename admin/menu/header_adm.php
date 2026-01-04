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
    /* Estilo específico para el menú de Usuario */
    .user-menu {
        background-color: var(--rojo); /* Color distintivo */
        font-weight: bold;
    }

    .nav-links li .submenu-user {
        right: 0; /* Para que despliegue hacia la izquierda si está al final */
        left: auto;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .nav-links li .submenu-user li a {
        color: var(--gris-oscuro);
        border-bottom: 1px solid #eee;
    }

    .nav-links li .submenu-user li a:hover {
        background-color: #eee;
        color: var(--rojo);
    }

    /* Iconos */
    .nav-links i {
        margin-right: 8px;
    }
</style>

<nav class="navbar">
    <div class="logo">ADMINISTRACION</div>

    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">☰</label>

    <ul class="nav-links">
        <li><a href="publicaciones.php">Publicaciones</a></li>
        <li><a href="seguimiento.php">Seguimiento</a></li>
        <li><a href="nosotros.php">Nosotros</a></li>
        <li>
            <a href="#" class="user-menu">
                <i class="fa-solid fa-circle-user"></i> 
                <?php echo $_SESSION['usuario'] ?? 'Admin'; ?>
            </a>
            <ul class="submenu submenu-user">
<li><a href="../auth/logout.php" style="color: #d32f2f;"><i class="fa-solid fa-power-off"></i> Cerrar Sesión</a></li>            </ul>
        </li>
    </ul>
</nav>