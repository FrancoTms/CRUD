<?php
    session_start();
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion && !empty($_POST['usuario']) && !empty($_POST['pass'])) {
        $consulta = 'SELECT foto FROM usuario
                    WHERE usuario = ? AND pass = ?';
        
        $sentencia = mysqli_prepare($conexion, $consulta);
        $usu = $_POST['usuario'];
        $clave = sha1($_POST['pass']);
        mysqli_stmt_bind_param($sentencia, 'ss', $usu, $clave);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $foto);
        mysqli_stmt_store_result($sentencia);
        $cantFilas = mysqli_stmt_num_rows($sentencia);
        if ($cantFilas == 1) {
            mysqli_stmt_fetch($sentencia);
            $_SESSION['usuario'] = $usu;
            $_SESSION['foto'] = $foto;
            header('refresh:0; juego_listado.php');
        }
    }else {
        echo '<p> Hubo un error, revise sus datos </p>';
        header("refresh:2; ../index.php");
    }
?>