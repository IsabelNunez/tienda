<?php 
            include('php/conexion.php');
            $sql = "SELECT * FROM categorias ORDER BY categoria ASC";                                    
            $registros=mysqli_query($GLOBALS['link'],$sql); 
            cerrarconexion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/normalizar.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
       <div class="logo">LOGO</div>
       <nav>
           <ul>
               <li><a href="index.html" class="active">Inicio</a></li>
               <li><a href="#" class="sub-menu">Productos</a>
                   <ul>
                      <?php while($fila=mysqli_fetch_array($registros)){ ?>
                       <li><a href="#"><?php echo utf8_encode($fila['categoria']);?></a></li>
                       <?php } ?>
                   </ul>
                </li>
               <li><a href="#">Contacto</a></li>
               <li><a href="#" class="sub-menu">Accesos</a>
                   <ul>
                       <li><a href="administracion/index.html">Login</a></li>
                       <li><a href="#">Registro</a></li>
                   </ul>
                </li>
           </ul>
       </nav>
       <div class="menu-barra"><i><img src="img/iconoMenu.png" alt="icono-barra"></i></div>
   </header>
   
   <!--Slider-->
   <div class="slider">
       <div class="img-slider" id="img1">
           <a href="#img5"><img class="flechaIzq" src="img/flechaIzq.png" alt=""></a>
           <img class="fondo" src="img/fondo1.png" alt="">
           <a href="#img2"><img class="flechaDer" src="img/flechaDer.png" alt=""></a>
       </div>
       <div class="img-slider" id="img2">
           <a href="#img1"><img class="flechaIzq" src="img/flechaIzq.png" alt=""></a>
           <img class="fondo" src="img/fondo2.png" alt="">
           <a href="#img3"><img class="flechaDer" src="img/flechaDer.png" alt=""></a>
       </div>
       <div class="img-slider" id="img3">
           <a href="#img2" ><img class="flechaIzq" src="img/flechaIzq.png" alt=""></a>
           <img class="fondo" src="img/fondo3.png" alt="">
           <a href="#img4"><img class="flechaDer" src="img/flechaDer.png" alt=""></a>
       </div>
        <div class="img-slider" id="img4">
           <a href="#img3"><img class="flechaIzq" src="img/flechaIzq.png" alt=""></a>
           <img class="fondo" src="img/fondo4.png" alt="">
           <a href="#img5"><img class="flechaDer" src="img/flechaDer.png" alt=""></a>
       </div>
        <div class="img-slider" id="img5">
           <a href="#img4"><img class="flechaIzq" src="img/flechaIzq.png" alt=""></a>
           <img class="fondo" src="img/fondo5.png" alt="">
           <a href="#img1"><img class="flechaDer" src="img/flechaDer.png" alt=""></a>
       </div>
    </div>
    
    <!--Main-->
    <div class="main">
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="productos-main">
        <img src="img/bolitotoro.jpg" alt="bolígrafo de totoro" width="100%">
        <div class="precio">PRECIO</div>
        </div>
        <div class="limpiar"></div>
    </div>
    
    <!--Pie de página-->
    <footer>
        <p>©2018 Todos los derechos reservados | 
        <a href="https://github.com/IsabelNunez">Isabel Nuñez</a></p>
    </footer>
    
</body>
</html>