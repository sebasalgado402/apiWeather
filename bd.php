
<?php

    $nombreBD = 'ejclima';
  
    $conexion = mysqli_connect("localhost", "root", "","$nombreBD");
        if(!$conexion){
            echo "no se ha conectado a la base de datos";
        }
            
?>
