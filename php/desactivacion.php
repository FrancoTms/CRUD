<?php
    $ruta = '../';
    require("encabezado.php");
    include("conexion.php");
?>
<main class="container">
    <section>
        <article>
<?php
    $conexion = conectar();
    if($conexion && !empty($_GET['id'])){
        $id = $_GET['id'];
        $activado = 'N';
        $consulta = 'UPDATE usuario
                    SET activado = ?
                    WHERE id_usuario = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'si', $activado, $id);
        $estado = mysqli_stmt_execute($sentencia);
        if($estado){
            echo '<h2 class="text-center">Desactivacion Exitosa!</h2>';
            header("refresh:2; url=usuario_listado.php");
        }else {
            echo '<h2 class="text-center">No se pudo desactivar</h2>';
            header("refresh:2; url=usuario_listado.php");
        }
    }
?>
        </article>
    </section>
</main>
<?php
    require("pie.php");
?>