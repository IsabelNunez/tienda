<?php 

    session_start();
    
    /* Si se ha iniciado sesión, comprobamos que se ha añadido un nombre a la categoria,
       insertamos la nueva categoria en la tabla y validamos con un mensaje, por el contrario si el campo se ha dejado vacío, muestra un mensaje de error.*/
    if(isset($_SESSION['administrador'])) {
        
        if($_POST['nombrecategoria']!="") {
        
            include('../../php/conexion.php');
            
            $nombrecategoria=utf8_decode($_POST['nombrecategoria']);
            
            $registros=mysqli_query($GLOBALS['link'],"SELECT categoria FROM categorias where categoria='$nombrecategoria'");
                
            if(mysqli_num_rows($registros)==0){
            
                // Insertamos la categoria en la tabla.    
                $sql = "INSERT INTO categorias (categoria) VALUES ('$nombrecategoria')";
                mysqli_query($GLOBALS['link'],$sql);
                cerrarconexion();
                header('location:formcategorias.php?validado=1&alert='.$_POST['nombrecategoria']);
             } else {
                cerrarconexion();
                header('location:formcategorias.php?validado=3&alert='.$_POST['nombrecategoria']);
            }
            
        } else if ($_POST['nombrecategoria']=="") {
            
            header('location:formcategorias.php?validado=2');
        }

    }else {

        header('location:../index.php');
            
    }
       
?>