<?php
    require("../html/header.html");
    require("conexion.php");
    $conexion = conectar();
    if(!empty($_POST['usuario']) && !empty($_POST['pass'])&& !empty($_POST['tipo']) || !empty($_FILES['foto']['size']) ){
        $usu = trim($_POST['usuario']); //controlamos los datos y les ponemos variables
        $contra = trim($_POST['pass']);
        $contra = sha1($_POST['pass']);
        $tipo = trim($_POST['tipo']);
        $foto = trim($_FILES['foto']['name']);
    if($conexion){
        $consulta = 'SELECT usuario,tipo,foto FROM usuario'; // iniciamos la cosulta de si existe el nombre de usuario
                    $resultado = mysqli_query($conexion, $consulta );
                    $numfila = mysqli_num_rows($resultado);
                    $fila = mysqli_fetch_array($resultado);
        if($fila['usuario'] != $usu){ //si no existe el nombre de usuario
            $insert= 'INSERT INTO usuario(usuario, pass, tipo, foto) VALUE (\''.$usu.'\',\''.$contra.'\',\''.$tipo.'\',\''.$foto.'\')';
        $q=mysqli_query($conexion,$insert); // crea el nuevo usuario insertando los datos a la tabla

        if ($q) {
            echo 'guardado con exito'; // guarda con exito los datos
            header("refresh:0;url=usuario_listado.php");
        } else {
            echo 'error al guardar';
            header("refresh:2;url=usuario_alta.php");
        }
    }else{
        echo 'error usuario ya utilizado'; // si exite el usuario da error
        header("refresh:2;url=usuario_alta.php");
    }
        }
        
    }
   

    desconectar($conexion);
 require("../html/footer.html");






















?>