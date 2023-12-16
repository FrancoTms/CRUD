<?php
    $ruta = '../';
    require("encabezado.php");
    include 'conexion.php';
    session_start();
    if (!empty($_SESSION['usuario'])) {
        echo '<main class="container">
        <section class= "row">
        <section class="col-3 menu pt-4">';
                require("menu.php"); 
        echo '</section>
        <section class="col-9">
            <article>
                <section class="menu_tmp">
                    <p>Opción: Usuarios > Alta</p>
                </section>
                <form action="usuario_alta_ok.php" method="post" enctype="multipart/form-data" class="bg-secondary border-info">
                    <legend class="bg-dark border-info text-center">Alta usuario</legend>     
                    <section>
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required maxlength="45" class="form-control border-warning">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" name="pass" id="pass" placeholder="Contraseña" required maxlength="45" class="form-control border-warning">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-select border-warning">
                            <option value="Administrador">Administrador</option>
                            <option value="Común">Común</option>
                        </select>
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" name="foto" id="foto"  class="form-control border-warning">
                        <section class="text-center">
                            <input type="submit" name="enviar" value="Confirmar" class="btn btn-dark mt-3 mb-3">
                        </section>
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