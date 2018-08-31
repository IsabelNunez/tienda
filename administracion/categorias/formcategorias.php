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
        function eliminar(id){
            
            if(confirm("Se eliminará la categoria con todos los productos, ¿Confirma su eliminación?")){
                
                //location.href="eliminarcategorias.php?idcategoria="+id;
                $.ajax({
                    type:"POST",
                    url:"eliminarcategorias.php",
                    data:'idcategoria='+id,
                });
                
                $("#"+id).hide("slow");
            }
        }
    </script>
</head>
<body>
   <header>
       <div class="logo"><a href="../../index.php">LOGO</a></div>
       
       <div class="menu-barra"><i><img src="../../img/iconoMenu.png" alt="icono-barra"></i></div>
   </header>
   
   <!--Mensaje de alerta para cuando se ha añadido correctamente una categoria--> 
   <?php if(isset($_GET['validado'])){
        $validado=$_GET['validado'];
        switch($validado){ 
            case 1:
    ?> 
        <div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert">
          <p class="texto-centrado"><strong>Bien!</strong> La categoria <strong><?php echo $_GET['alert'];?></strong> se ha añadido correctamente.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        break;
        case 2:
    ?>
        <div id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert">
          <p class="texto-centrado"><strong>Error</strong>. No has añadido una categoria.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php  
        break;    
        case 3: 
    ?>
        <div id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert">
          <p class="texto-centrado"><strong>Error</strong>. La categoria <strong><?php echo $_GET['alert'];?></strong> ya existe.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>                 
       <?php 
            break;    
            case 4:
        ?>
        <div id="alerta" class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="texto-centrado"><strong>Bien!</strong> La categoria <strong><?php echo utf8_encode($_GET['categoriavieja']);?></strong> se ha actualizado correctamente por <strong><?php echo utf8_encode($_GET['categorianueva']);?></strong>.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>        
        <?php
            break;
            case 5: 
        ?>
        <div id="alerta" class="alert alert-danger alert-dismissible fade show" role="alert">
            <p class="texto-centrado"><strong>Error</strong>. No has actualizado ninguna categoria. </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
            break;
            }
    }?>
    
    <div class="cont-formulario">
    <div class="add-categorias">
        Añadir Categorias
    </div>
    <form class="formulario" action="anadircategorias.php" method="post">
      <div class="form-group">
        <label>Categoria</label>
        <input type="text" class="form-control" placeholder="Introduce categoria" name="nombrecategoria">
      </div>
      <button type="submit" class="btn btn-primary">Añadir</button>
    </form>
    
    <!--Mostrar categorias-->
    <div class="mostrar-categorias">
        <?php 
            include('../../php/conexion.php');
            $sql = "SELECT * FROM categorias ORDER BY id DESC";                                    
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
            <tr class="table-light" id=<?php echo $fila['id']; ?>>
              <td><?php echo utf8_encode($fila['categoria']);?></td>
              <td><a href="formmodificarcategorias.php?categoriavieja=<?php echo utf8_encode($fila['categoria']);?>"><button type="button" class="btn btn-success">Editar</button></a></td>
              <td><a onclick="eliminar('<?php echo $fila['id']; ?>')"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
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


