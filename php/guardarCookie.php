<?php
    session_start();
    if (!empty($_POST) && !empty($_SESSION['usuario'])) {
        header('refresh:0; url=preferencias.php');
        $genero = $_POST['genero'];
        $usuario = $_SESSION['usuario'];
        $tiempo_expira = time() + 90 * 24 *60 * 60;
        setcookie($usuario, $genero, $tiempo_expira, '/');
    }
?>