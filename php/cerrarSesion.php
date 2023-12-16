<?php
    session_start();
    include 'conexion.php';
    if (!empty($_SESSION['usuario'])) {
        header("refresh:0; ../index.php");
        session_destroy();
    }else {
        header("refresh:0; ../index.php");
    }
?>