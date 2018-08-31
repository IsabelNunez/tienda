<?php 
    session_start();
?>

<?php if(isset($_SESSION['administrador'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="../../css/estilo.css">
    <link rel="stylesheet" href="../../css/normalizar.css">
    <link rel="stylesheet" href="../../css/administracion.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Para el botón de menú cuando minimizamos la pantalla.
            $('.menu-barra').click(function(){
                $('nav').toggleClass('active')
            })
            // Para las flechas desplegables del menú
            $('ul li').click(function(){
                $(this).siblings().removeClass('active');
                $(this).toggleClass('active');                     
            })
        })
    </script>
</head>
<body>
   <header>
       <div class="logo"><a href="../../index.php">LOGO</a></div>
       
       <div class="menu-barra"><i><img src="../../img/iconoMenu.png" alt="icono-barra"></i></div>
   </header>
   
    <div class="cont-formulario-corto">
        <div class="add-categorias">
            Actualizar Categorias
        </div>
        <form class="formulario" action="modificarcategorias.php" method="post">
          <div class="form-group">
            <label>Categoria</label>
            <input type="text" class="form-control" placeholder="<?php echo $_GET['categoriavieja'];?>" name="categorianueva">
            <input type="hidden" name="categoriavieja" value="<?php echo $_GET['categoriavieja'];?>">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    
    <!--Pie de página-->
    <footer>
        <p>©2018 Todos los derechos reservados | 
        <a href="https://github.com/IsabelNunez">Isabel Nuñez</a></p>
    </footer>
    
</body>
</html>

<?php } else {
    
    header('location:../index.php');
    }
?>


