<section class="border-bottom mb-2 pb-2">
    <img src="../img/usuarios/<?php echo ($_SESSION['foto'] == '') ? 'usuario_default.png' : $_SESSION['foto'];?>" alt=""> <p><?php echo $_SESSION['usuario'];?></p> <a href="cerrarSesion.php" class="btn btn-secondary border">cerrar sesión</a>
</section>
<ul class="navbar-nav text-center">
    <li class="nav-item bg-warning mb-2">
        <a href="juego_listado.php" class="nav-link bi-controller"> Listado Juegos</a>
    </li>
    <li class="nav-item bg-warning mb-2">
        <a href="usuario_alta.php" class="nav-link bi-person-plus-fill"> Alta de Usuario</a>
    </li>
    <li class="nav-item bg-warning mb-2">
        <a href="usuario_listado.php" class="nav-link bi-person-fill"> Listado Usuarios</a>
    </li>
    <li class="nav-item bg-warning mb-2">
        <a href="preferencias.php" class="nav-link bi-gear-fill"> Preferencias</a>
    </li>
    <li class="nav-item bg-warning mb-2">
        <a href="listarFavoritos.php" class="nav-link bi-star-fill"> Listar Favoritos</a>
    </li>
</ul>