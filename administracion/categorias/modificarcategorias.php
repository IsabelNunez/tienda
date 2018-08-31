<?php 

    session_start();
    
    /* Si se ha iniciado sesión, comprobamos que se ha añadido un nombre a la categoria,
       insertamos la nueva categoria en la tabla y validamos con un mensaje, por el contrario si el campo se ha dejado vacío, muestra un mensaje de error.*/
    if(isset($_SESSION['administrador'])) {
        
        if($_POST['categorianueva']!="") {
        
            include('../../php/conexion.php');
            
            $categorianueva=utf8_decode($_POST['categorianueva']);
            $categoriavieja=utf8_decode($_POST['categoriavieja']);
            
            $registros=mysqli_query($GLOBALS['link'],"SELECT categoria FROM categorias where categoria='$categorianueva'");
                
            if(mysqli_num_rows($registros)==0){
                
                // Actualizamos  
                $sql = "UPDATE categorias SET categoria='$categorianueva' WHERE categoria='$categoriavieja'";
                mysqli_query($GLOBALS['link'],$sql);
                cerrarconexion();
                header('location:formcategorias.php?validado=4&categoriavieja='.$categoriavieja.'&categorianueva='.$categorianueva);
             } else {
                cerrarconexion();
                header('location:formcategorias.php?validado=3&alert='.$_POST['categorianueva']);
            }
            
        } else if ($_POST['nombrecategoria']=="") {
            
            header('location:formcategorias.php?validado=5');
        }

    }else {

        header('location:../index.php');
            
    }
       
?>