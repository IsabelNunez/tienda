<?php 
    session_start();
    if(isset($_SESSION['administrador'])){
        
        $idcategoria=$_POST['idcategoria'];
        
        include('../../php/conexion.php');
        $sql = "DELETE FROM categorias WHERE id='$idcategoria'";                             $registros=mysqli_query($GLOBALS['link'],$sql); 
        cerrarconexion();
        
        //header('location:formcategorias.php');
        
    } else {
        
        header('location:../index.html');
    }






?>