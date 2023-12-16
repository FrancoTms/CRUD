<?php
    $ruta = '../';
    require("encabezado.php");
    session_start();
    if (!empty($_SESSION['usuario'])) {

        echo '<main class="container">
        <section class="row">
            <section class="col-3 menu pt-4">';
                require("menu.php"); 
        echo '</section>
            <article class="col-9 listado pt-2">';

                    require("conexion.php");
                    $conexion = conectar();
                    if ($conexion) {
                        $consulta = 'SELECT titulo, jugadores, lanzamiento, genero, portada 
                                    FROM juego';
                        $sentencia = mysqli_prepare($conexion, $consulta);
                        mysqli_stmt_bind_result($sentencia, $title, $jugadores, $lanzamiento, $genero, $portada);
                        mysqli_stmt_execute($sentencia);
                        mysqli_stmt_store_result($sentencia);
                        $cantidad = mysqli_stmt_num_rows($sentencia);
                        if ($cantidad > 0) {
                            while (mysqli_stmt_fetch($sentencia)) {
                                if (empty($portada)) {
                                    $portada = 'portada_default.png';
                                }
                                echo '<section class="col-5 mt-2 mb-2">
                                    <section class="card">
                                        <img src="../img/portadas/'. $portada .'" />
                                        
                                        <section class="card-content p-3">
                                            <h4 class="card-title text-center">'. $title .'</h4>
                                            <p class="">Jugadores: '. $jugadores. '</p>
                                            <p class="">Fecha de lanzamiento: '. $lanzamiento .'</p>
                                            <p class="btn btn-primary">'. $genero .'</p>
                                        </section>
                                    </section>
                                </section>';
                            
                            }
                        } else {
                            echo '<h2>No hay resultados</h2>';
                        }
                        desconectar($conexion);
                    }

        echo  '</article>
        </section>
    </main>';
    }else {
        header("refresh:0; url=../index.php");
    }
?>

<?php
    require("pie.php");
?>