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
       <div class="logo">LOGO</div>
       <nav>
           <ul>
               <li><a href="index.html" class="active">Inicio</a></li>
               <li><a href="#" class="sub-menu">Productos</a>
                   <ul>
                       <li><a href="#">Pendrives</a></li>
                       <li><a href="#">Bolis</a></li>
                       <li><a href="#">Lápices</a></li>
                       <li><a href="#">Stickers</a></li>
                       <li><a href="#">Notas</a></li>
                       <li><a href="#">Borradores</a></li>
                       <li><a href="#">Subrayadores</a></li>
                       <li><a href="#">Libretas</a></li>
                       <li><a href="#">Estuches</a></li>   
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
       <div class="menu-barra"><i><img src="../../img/iconoMenu.png" alt="icono-barra"></i></div>
   </header>
   
   <!--Mensaje de alerta para cuando se ha añadido correctamente una categoria--> 
   <?php if(isset($_GET['validado'])){?> 
    <div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert">
      <p class="texto-centrado"><strong>Bien!</strong> La categoria se ha añadido correctamente.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php }?>
    
    <div class="cont-formulario">
    <div class="add-categorias">
        Añadir Categorias
    </div>
    <form class="formulario" action="anadircategorias.php" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Categoria</label>
        <input type="text" class="form-control" placeholder="Introduce categoria" name="nombrecategoria">
      </div>
      <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
    
    <!--Mostrar categorias-->
    <div class="mostrar-categorias">
        <?php 
            include('../../php/conexion.php');
            $sql = "SELECT * FROM categorias";                                    
            $registros=mysqli_query($GLOBALS['link'],$sql); 
            cerrarconexion();
        ?>
        
        <table class="table table-hover">
          <thead>
            <tr class="table-primary">
              <th scope="col">Categorias</th>
            </tr>
          </thead>
        <?php while($fila=mysqli_fetch_array($registros)){ ?>
          <tbody>
            <tr class="table-light">
              <td><?php echo $fila['categoria'];?></td>
            </tr>
          </tbody>
        <?php
            }                                    
        ?>
        </table>
        
    </div> 
    </div>
    
    <!--Pie de página-->
    <footer>
        <p>©2018 Todos los derechos reservados | 
        <a href="https://github.com/IsabelNunez">Isabel Nuñez</a></p>
    </footer>
    
</body>
</html>

<?php } else {
    
    header('location:../index.html');
    }
?>


