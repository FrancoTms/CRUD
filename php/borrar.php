<?php
    $ruta = '../';
    require("encabezado.php");
?>
<main class="container">
    <article class="container py-5 h-100">
        <section class="row d-flex justify-content-center align-items-center h-100">
            <?php
                    include 'conexion.php';
                    $conexion = conectar();
                    if ($conexion && !empty($_GET['id'])) {
                        $id = $_GET['id'];
                        $consulta = 'DELETE FROM usuario
                                    WHERE id_usuario = ?';
                        $sentencia = mysqli_prepare($conexion, $consulta);
                        mysqli_stmt_bind_param($sentencia, 'i', $id);
                        $resultado = mysqli_stmt_execute($sentencia);
                        if($resultado){
                            echo '<p class="text-center"> Borrado Exitoso! </p>';
                            header("refresh:2; url=usuario_listado.php");
                        }else {
                            echo '<p class="text-center"> No se pudo eliminar </p>';
                            header("refresh:2; url=usuario_listado.php");
                        }
                    }else {
                        echo '<p class="text-center"> No se realizó la eliminación </p>';
                        header("refresh:2; url=usuario_listado.php");
                    }
            ?>
        </section>
    </article>
</main>
<?php
    require("pie.php");
?>