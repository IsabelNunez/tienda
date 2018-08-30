<?php 

    session_start();

    if(!isset($_SESSION['administrador'])) {

        if($_POST['email']=="admin@correo.es" && $_POST['password']=="123"){

            $_SESSION['administrador']=$_POST['email'];
        }
    }

    if(isset($_SESSION['administrador'])){
        echo "Hola " . $_SESSION['administrador'] . "<br><br>";
        
        echo "<a href='categorias/formcategorias.php'>Añadir/modificar/eliminar Categorias</a>";
        
    }else {

            header('location:index.html');
            
    }
       
?>