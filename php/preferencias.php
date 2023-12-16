<?php
    $ruta = '../';
    require("encabezado.php");
    include 'conexion.php';
    $conexion = conectar();
    session_start();
    if (!empty($_SESSION['usuario']) && $conexion) {
        echo '<main class="container">
        <section class="row">
            <section class="col-3 menu pt-4">';
                 require("menu.php");
        echo    '</section>
            <article class="col-9 listado pt-2">
                <h2 class="col-12 text-center mt-4">Preferencias</h2>';
                
                echo'<form class="col-5 mt-2 mb-2 p-2 bg-light border" method="post" action="guardarCookie.php">
                <legend class="text-center bg-secondary p-2">Género favorito</legend>
                <label class="form-label mt-3">Elija el género:</label>
                <select class="form-select" name="genero" id="genero">';

                $consulta = 'SELECT DISTINCT(genero)
                            FROM juego
                            ORDER BY genero';
                $sentencia = mysqli_prepare($conexion, $consulta);
                mysqli_stmt_execute($sentencia);
                mysqli_stmt_bind_result($sentencia, $genero);
                mysqli_stmt_store_result($sentencia);
                $cantidadFilas = mysqli_stmt_num_rows($sentencia);
                if ($cantidadFilas > 0) {
                    while (mysqli_stmt_fetch($sentencia)) {
                        echo '<option value="'. $genero .'">'. $genero .'</option>';
                    }
                }
                            echo    '</select>
                                    <section class="text-center">
                                        <input type="submit" value="Guardar" class="btn btn-success mt-3 mb-3">
                                    </section>
                                </form>
            </article>
        </section>
    </main>';
    }else {
        header("refresh:0; url=../index.php");
    }
?>


<?php
    require("pie.php");
?>