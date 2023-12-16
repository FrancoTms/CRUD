<?php
    $ruta = '../';
    require("encabezado.php");
    include("conexion.php");
    $conexion = conectar();
?>
<main class="container">
    <section>
        <article>
<?php
    if($conexion && !empty($_GET['id'])){
        $id = $_GET['id'];
        $consulta = 'SELECT usuario, tipo, foto
                    FROM usuario WHERE id_usuario = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'i', $id);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $usuarioBD, $tipoBD, $fotoBD);
        mysqli_stmt_store_result($sentencia);
        $cantFilas = mysqli_stmt_num_rows($sentencia);
        if ($cantFilas > 0) {
            echo '<h2 class="text-center"> Eliminar Usuario </h2>';
            while (mysqli_stmt_fetch($sentencia)) {
                echo '<p class="text-center"> ¿Está seguro de querer eliminar al usuario <strong>' . $usuarioBD . '</strong>?</p>';
                echo '<section class="text-center p-3 column d-flex justify-content-center align-items-center"><section class="text-center p-3"><a href="borrar.php?id=' . $id . '" class="btn btn-success">Aceptar</a></section>';
                echo '<section class="text-center p-3"><a href="usuario_listado.php" class="btn btn-danger">Cancelar</a></section></section>';

            }
        }
    }
?>
        </article>
    </section>
</main>
<?php
    require("pie.php");
?>