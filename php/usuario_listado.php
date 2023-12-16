<?php
    $ruta = '../';
    require("encabezado.php");
    include 'conexion.php';
    $conexion = conectar();
    session_start();
    if (!empty($_SESSION['usuario']) && $conexion) {
        echo '<main class="container">
        <section class= "row">
        <section class="col-3 menu pt-4">';
                require("menu.php"); 
        echo '</section>
            <article class="col-9">
                <section class="menu_tmp">
                    <a class="btn btn-dark" href="usuario_alta.php">+ Alta usuario</a>
                </section>
                <table class="table table-bordered table-hover table-striped w-auto">
                    <caption class="caption-top text-center bg-dark">Listado de usuarios</caption>
                    <tr>
                        <th class="bg-secondary text-white">Foto</th>
                        <th class="bg-secondary text-white">Usuario</th>
                        <th class="bg-secondary text-white">Tipo</th>
                        <th class="bg-secondary text-white">Modificar</th>
                        <th class="bg-secondary text-white">Eliminar</th>
                        <th class="bg-secondary text-white">Desactivar</th>
                    </tr>';            
                        
                        $consulta = 'SELECT id_usuario, usuario, tipo, foto
                                     FROM usuario
                                     WHERE activado = "S"';
                        
                        $sentencia = mysqli_prepare($conexion, $consulta);
            
                        $q = mysqli_stmt_execute($sentencia);
            
                        mysqli_stmt_bind_result($sentencia, $id, $usuarioBD, $tipoBD, $fotoBD);
                        mysqli_stmt_store_result($sentencia);
            
                        if ($q) {
                            while (mysqli_stmt_fetch($sentencia)) {
                                $foto = ($fotoBD != '') ? $fotoBD : 'usuario_default.png';
                                echo '<tr>
                                        <td><figure><img src="../img/usuarios/' . $foto . '"></figure></td>
                                        <td>' . $usuarioBD . '</td>
                                        <td>' . $tipoBD . '</td>
                                        <td><a href="modificacion.php?id=' . $id . '"><img src="../img/modificar.png"></a></td>
                                        <td><a href="eliminacion.php?id=' . $id . '"><img src="../img/eliminar.png"></a></td>
                                        <td><a href="desactivacion.php?id=' . $id . '"><img src="../img/desactivar.png"></a></td>

                                      </tr>';
                            }
            
                            mysqli_stmt_close($sentencia);

                            desconectar($conexion);
                            echo '</table>
                            </article>
                        </section>
                    </main>';
                    
                        }  
    }else {
        header("refresh:0; url=../index.php");
    }
?>


<?php
    require("pie.php");
?>