<?php
    $ruta = '../';
    if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['tipo']) && !empty($_FILES['foto']['size'])) {
        require 'conexion.php';
        $conexion = conectar();

        if ($conexion) {
            $usu = $_POST['usuario'];
            $clave = sha1($_POST['pass']);
            $tipo = $_POST['tipo'];

            $rutaPortada = '../img/usuarios/';

            $nombreArr = explode ('.', $_FILES['foto']['name']);

            $extension = $nombreArr[1];

            $nuevoNombre = $usu . '.' . $extension;

            $origen = $_FILES['foto']['tmp_name'];
            $destino = $rutaPortada . $nuevoNombre; 
            
            $resultado = move_uploaded_file ($origen, $destino);

            $consulta = 'INSERT INTO usuario(usuario, pass, tipo, foto)
                            VALUES (?, ?, ?, ?)';

            $sentencia = mysqli_prepare($conexion, $consulta);

            mysqli_stmt_bind_param($sentencia, 'ssss', $usu, $clave, $tipo, $nuevoNombre);

            $q = mysqli_stmt_execute($sentencia);

            if($q){
                echo '<p class="container bg-dark text-white text-center p-3 rounded">Guardado Exitosamente!</p>';
                header("refresh:3;url=usuario_alta.php");
            }else{
                echo '<p class="container bg-dark text-white text-center p-3 rounded">Error al guardar!</p>';
            }
            desconectar($conexion);
        }
    } else {
        echo '<p class="container bg-dark text-white text-center p-3 rounded">Tiene que ingresar un usuario, una contraseña y una foto!</p>';
        header("refresh:3;url=../index.php");
    }

?>