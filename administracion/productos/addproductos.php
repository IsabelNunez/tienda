<?php 
    session_start();
    include('../../php/conexion.php');

    if(isset($_SESSION['administrador']) && isset($_POST['nombre'])) {
        
        $nombre=utf8_decode($_POST['nombre']);
        $precio=utf8_decode($_POST['precio']);
        $descripcion=utf8_decode($_POST['descripcion']);
        $categoria=utf8_decode($_POST['categoria']);
        
        $registros=mysqli_query($GLOBALS['link'],"SELECT nombre FROM productos where nombre='$nombre'");
                
            if(mysqli_num_rows($registros)==0){  // No esta repetido
                
                // Comprobamos que se ha añadido una imagen
                if($_FILES['imagen1']['size']!=0) {
                    
                    // Cogemos la extensión (después del punto) de la imagen para luego el nombre.
                    $ext=explode(".",$_FILES['imagen1']['name']);
                    $extension=end($ext);
                    // Le ponemos el nombre del producto a la imagen así no se repiten
                    $_FILES['imagen1']['name']=$nombre."_01.".$extension;
                    $permitidos=array("image/jpg","image/jpeg","image/gif","image/png");
                    $limite_kb=1000;
                    
                    // Comprobamos que sea uno de los tipos de archivos permitidos y con el tamaño.
                    if(in_array($_FILES['imagen1']['type'],$permitidos) && $_FILES['imagen1']['size']<=$limite_kb*1024){
                        
                        // La ruta hacia donde vamos a guardar la imagen.
                        $ruta="imagenes/".$_FILES['imagen1']['name'];
                        // Movemos del directorio temporal a nuestra ruta, la carpeta imagenes.
                        $resultado=move_uploaded_file($_FILES['imagen1']['tmp_name'],$ruta);
                        
                    } else {
                        
                        echo "errorimagen";
                        exit();
                    }      
                }
                
                // Insertamos el producto en la tabla.    
                $sql = "INSERT INTO productos (nombre, precio, descripcion, id_categoria) VALUES ('$nombre','$precio','$descripcion','$categoria')";
                mysqli_query($GLOBALS['link'],$sql);
                cerrarconexion();
                echo "exito";
                
            } else {
                
                echo "nombrerepetido";
            }
            
    } else {
        
        header('location:../index.php');
    }

?>