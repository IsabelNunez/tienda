<?php 
    session_start();
    include('../../php/conexion.php');
    $sql = "SELECT * FROM categorias ORDER BY id DESC";                                    
    $registros=mysqli_query($GLOBALS['link'],$sql); 
    cerrarconexion();
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
    
    <!--Utilizaremos javascript para mostrar mensajes de error y correcto-->
    <script>
        
        function mostrar() {
            $("#imagenes").show("fast");        
        }
        
        function validarformulario(){
        
            if(document.formproductos.nombre.value == ""){
                $('.avisonombre').show('fast');
                document.formproductos.nombre.style.border='1px solid red';
            }
            
            if(document.formproductos.precio.value == ""){
                $('.avisoprecio').show('fast');
                document.formproductos.precio.style.border='1px solid red';
            }
            
            if(document.formproductos.descripcion.value == ""){
                $('.avisodescripcion').show('fast');
                document.formproductos.descripcion.style.border='1px solid red';
            }
            
            if(document.formproductos.categoria.value == ""){
                $('.avisocategoria').show('fast');
                document.formproductos.categoria.style.border='1px solid red';
            }
            
            if(document.formproductos.nombre.value != "" && document.formproductos.precio.value != "" && document.formproductos.descripcion.value != "" && document.formproductos.categoria.value != ""){
                
                // formData contiene todos los datos de los campos.
                var formData=new FormData($("#form")[0]);
                
                var nombre=document.formproductos.nombre.value;
                var precio=document.formproductos.precio.value;
                var descripcion=document.formproductos.descripcion.value;
                var categoria=document.formproductos.categoria.value;
                
                $.ajax({
                    
                    type:"POST",
                    url:"addproductos.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    
                    success:function(resp) {
                        
                        // Para hacer el efecto de que aparezca y desaparezca
                        $('#nombrerepetido').hide('fast');
                        $('#exito').hide('fast');
                        
                        if(resp=="exito") {
                            $('#nombrerepetido').hide('fast');
                            $('#exito').show('slow');
                        }
                        
                        if(resp=="nombrerepetido") {
                            $('#exito').hide('fast');
                            $('#nombrerepetido').show('slow');
                            document.formproductos.nombre.style.border="1px solid red";
                        }
                    }
                });
            }
        }
        
        function validadonombre(){
            $('.avisonombre').hide('slow');
            document.formproductos.nombre.style.border='1px solid green';
        }
        
        function validadoprecio(){
            $('.avisoprecio').hide('slow');
            document.formproductos.precio.style.border='1px solid green';
        }
        
        function validadodescripcion(){
            $('.avisodescripcion').hide('slow');
            document.formproductos.descripcion.style.border='1px solid green';
        }
        
        
    </script>
</head>
<body>
   <header>
       <div class="logo"><a href="../../index.php">LOGO</a></div>
       
       <div class="menu-barra"><i><img src="../../img/iconoMenu.png" alt="icono-barra"></i></div>
   </header>
   
   <div class="cont-formulario">
    <div class="add-categorias">
        Añadir Productos
    </div>
    <form id="form" class="formulario" name="formproductos" method="post" enctype="multipart/form-data">
     
     <!-- Nombre -->
      <div class="form-group">
        <label>Nombre</label>
        <input onkeyup="validadonombre()" type="text" class="form-control" placeholder="Nombre producto" name="nombre">
      </div>
      
        <!--Alerta con Ajax si no añadimos nombre del producto en el formulario-->
        <div id="alerta" class="alert alert-danger alert-dismissible fade show ocultar avisonombre"  role="alert">
        <p class="texto-centrado"><strong>Error</strong>. No has añadido ningún nombre.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> 
      
      <!-- Precio -->
      <div class="form-group">
        <label>Precio</label>
        <input onkeyup="validadoprecio()" type="float" class="form-control" placeholder="Precio producto" name="precio">
      </div>
      
        <!--Alerta con Ajax si no añadimos nombre del producto en el formulario-->
        <div id="alerta" class="alert alert-danger alert-dismissible fade show ocultar avisoprecio"  role="alert">
        <p class="texto-centrado"><strong>Error</strong>. No has añadido ningún precio.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> 
        
      <!-- Descripción -->
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Descripcion</label>
        <textarea onkeyup="validadodescripcion()" name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción del producto"></textarea>
      </div>
      
         <!--Alerta con Ajax si no añadimos nombre del producto en el formulario-->
        <div id="alerta" class="alert alert-danger alert-dismissible fade show ocultar avisodescripcion"  role="alert">
        <p class="texto-centrado"><strong>Error</strong>. No has añadido ninguna descripción.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
            
      <!-- Categoria -->
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Categoría</label>
        <select name="categoria" class="form-control">
            <?php while($fila=mysqli_fetch_array($registros)) {?>
            <option value="<?php echo $fila['id']?>"><?php echo utf8_encode($fila['categoria']); ?></option>
            <?php } ?>
        </select>
      </div>
            
        <!-- Imágenes -->
      <button type="button" onclick="mostrar()" class="btn btn-success botonestilo">Añadir alguna imagen</button>
      <div id="imagenes" style="display:none;">  
            <p>Solo se admiten archivos con extensión <strong>.jpg, .jpeg, .gif, .png</strong> y que sean menores de 1MByte</p>

            <div class="form-group">
                <label for="exampleFormControlFile1">Imagen 1 (principal)</label>
                <input type="file" class="form-control-file" name="imagen1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Imagen 2 (secundaria)</label>
                <input type="file" class="form-control-file" name="imagen2">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Imagen 3</label>
                <input type="file" class="form-control-file" name="imagen3">
            </div>
       </div>
      
        <!--Alerta con Ajax si no añadimos nombre del producto en el formulario-->
        <div id="alerta" class="alert alert-danger alert-dismissible fade show ocultar avisocategoria"  role="alert">
        <p class="texto-centrado"><strong>Error</strong>. No has añadido ninguna categoria. <a target="_blank" href='../categorias/formcategorias.php'>Añadir categoría</a></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>  
              
      <!-- Alert de exito -->
        <div id="exito" class="alert alert-success alert-dismissible fade show ocultar" role="alert">
            <p class="texto-centrado"><strong>Bien!</strong> El producto se ha añadido correctamente.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
       <!-- Alert de error por nombre repetido-->
       <div id="nombrerepetido" class="alert alert-danger alert-dismissible fade show ocultar" role="alert">
          <p class="texto-centrado"><strong>Error</strong>. Ya existe ese nombre de producto.</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
       </div>
        
      <!-- Botón -->
      <div>
          <button onclick="validarformulario()" type="button" class="btn btn-primary botonestilo">Añadir</button>
      </div>
    </form>
    
    </div>
   
 
    
  </body>
</html>

<?php } else {
    
    header('location:../index.php');
    }
?>
