<?php 

    session_start();

    if(isset($_SESSION['administrador'])) {
        
        include('../../php/conexion.php');
        
        $sql = "INSERT INTO categorias (categoria) VALUES ('$_POST[nombrecategoria]')";
        mysqli_query($GLOBALS['link'],$sql);
        cerrarconexion();
        header('location:formcategorias.php?validado=1');

    }else {

        header('location:../index.html');
            
    }
       
?>