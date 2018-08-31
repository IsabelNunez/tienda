<?php 
    session_start();
?>
<?php 
            include('../php/conexion.php');
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
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/normalizar.css">
    <link rel="stylesheet" href="../css/administracion.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
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
       <div class="logo"><a href="../index.php">LOGO</a></div>
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
                       <li><a href="#">Login</a></li>
                       <li><a href="#">Registro</a></li>
                   </ul>
                </li>
           </ul>
       </nav>
       <div class="menu-barra"><i><img src="../img/iconoMenu.png" alt="icono-barra"></i></div>
   </header>
       
    
    <div class="cont-formulario-corto">
    <div class="login">
        Login
    </div>
    <form class="formulario" action="validar.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce email" name="email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Introduce contraseña" name="password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recordarme</label>
      </div>
      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
    </div>
    
    <!--Pie de página-->
    <footer>
        <p>©2018 Todos los derechos reservados | 
        <a href="https://github.com/IsabelNunez">Isabel Nuñez</a></p>
    </footer>
    
</body>
</html>