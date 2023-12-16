<?php
    $ruta = '../';
    require("encabezado.php");
    require("conexion.php");
?>
<main class="container">
    <section>
        <article>
<?php
    $conexion = conectar();
    if($conexion && isset($_POST['id']) && !empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['tipo'])){
        
        $id = $_POST['id'];
        $usu = $_POST['usuario'];
        $tipo = $_POST['tipo'];
        $contra = sha1($_POST['pass']);
        $foto = $_POST['foto'];
        
        if ($_FILES['foto']['name'] != '') {
            $rutaPortada = '../img/usuarios/';
            $nombreArr = explode('.', $_FILES['foto']['name']);
            $extension = $nombreArr[1];
            $nuevoNombre = $usu . '.' . $extension;
            $origen = $_FILES['foto']['tmp_name'];
            $destino = $rutaPortada . $nuevoNombre;

            $resultado = move_uploaded_file($origen, $destino);

        } else {
            $rutaPortada = '../img/usuarios/';
            unlink($rutaPortada . $foto);

            $nuevoNombre = '';
        }

        $consulta = 'UPDATE usuario
                    SET usuario = ?, pass = ?, tipo = ?, foto = ?
                    WHERE id_usuario = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'ssssi', $usu, $contra, $tipo, $nuevoNombre, $id);
        $estado = mysqli_stmt_execute($sentencia);
        if($estado){
            echo '<h2 class="text-center">Modificacion Exitosa!</h2>';
            header("refresh:2; url=usuario_listado.php");
        }else {
            echo '<h2 class="text-center">No se pudo Modificar</h2>';
            header("refresh:2; url=usuario_listado.php");
        }
        
        desconectar($conexion);
    }else {
        echo '<h2 class="text-center">No se pudo Modificar jaja</h2>';
        header("refresh:2; url=usuario_listado.php");
    }
?>
        </article>
    </section>
</main>
<?php
    require("pie.php");
?>