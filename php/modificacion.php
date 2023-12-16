<?php
    $ruta = '../';
    require("encabezado.php");
    include ("conexion.php");
    session_start();
    $conexion = conectar();
    if($conexion && !empty($_SESSION['usuario']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $consulta = 'SELECT usuario, tipo, foto
                    FROM usuario
                    WHERE id_usuario = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'i', $id);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $usuarioBD, $tipoBD, $fotoBD);
        mysqli_stmt_store_result($sentencia);
        $cantFilas = mysqli_stmt_num_rows($sentencia);
        if ($cantFilas > 0) {
            mysqli_stmt_fetch($sentencia);
            }
    }else {
        echo '<h2 class="text-center">No se pudo Modificar</h2>';
        header("refresh:2; url=usuario_listado.php");
    }
?>
<main class="container">
    <section>
        <article>
            <section class="menu_tmp">
                <p>Modificar</p>
            </section>

            <form action="aceptarmod.php" method="post" enctype="multipart/form-data" class="bg-secondary border-info">
                <legend class="bg-dark border-info text-center">Modificar Usuario</legend>  
                   
                <section>
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" id="usuario" value="<?php echo $usuarioBD; ?>" required maxlength="45" class="form-control border-warning">

                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" id="pass" placeholder="Contraseña" required maxlength="45" class="form-control border-warning">

                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select border-warning">
                        <option value="Administrador" <?php  if($tipoBD == 'Administrador'){echo  'selected';}; ?>>Administrador</option>
                        <option value="Común"<?php  if($tipoBD == 'Común'){echo  'selected';}; ?>>Común</option>
                    </select>

                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control border-warning">

                    <section class="text-center">
                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                        <input type="hidden" value="<?php echo $fotoBD; ?>" name="foto">
                        <input type="submit" name="actualizar" value="Aceptar" class="btn btn-success mt-3 mb-3">
                    </section>

                    <section>
                        <a href="usuario_listado.php" class="btn btn-danger mt-3 mb-3">Cancelar</a>
                    </section>

                </section>
            </form>
        </article> 
    </section>
</main>

<?php
    require("pie.php");
?>