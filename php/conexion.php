<?php 
    $link=mysqli_connect("localhost","root","","tiendabd");

    if(!$link) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    function cerrarconexion() {
        
        mysqli_close($GLOBALS['link']);
    }
?>