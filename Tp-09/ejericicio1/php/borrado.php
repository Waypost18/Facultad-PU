<?php

    require("conexion.php");
    $conexion = conectar();
    if($conexion && !empty($_GET['id'])){
        $id = $_GET['id'];
        $consulta = 'DELETE FROM usuario WHERE id_usuario = \''. $id .'\'';
        $resultado = mysqli_query($conexion,$consulta);
        desconectar($conexion);
        if($resultado){
            echo '<p>Eliminacion Exitosa!</p>';
            header("refresh:2;url=usuario_listado.php");
        }else{
            echo '<p>No se pudo eliminar</p>';
            header("refresh:2;url=usuario_listado.php");
        }
    }else{
        echo'<p>No se realizo la elimnacion</p>';
        header("refresh:2;url=usuario_listado.php");
    }
    
   
   





?>