<?php 

    
    if($_POST['localidad'] != '0'){

        $url='https://api.openweathermap.org/data/2.5/weather?q='.$_POST['localidad'].',UY&APPID=44161ba17ebc3d20f07dba2a7672e92d';
        
        $json=file_get_contents($url);
        
        $jsonObject=json_decode($json,true); // $jsonObject["result"]["value"]
        
        $jsonObject['name'];
        echo '<br>'; 
        echo $jsonObject['main']['temp'];
        echo '<br>'; 
        echo $jsonObject['main']['humidity'];
        echo '<br>'; 
    
        $formated_DATE = date('Y-m-d');
        echo '<br>'; 
        echo $formated_DATE. "<br>";
        $formated_TIME = date('H:i:s');
        echo $formated_TIME. "<br>";
    
        echo '<br>';
        var_dump($jsonObject);
    
        if(isset($_POST['localidad'])){
            include('bd.php');
            ////////
                if($_POST['localidad']=='trinidad'){
                    $_POST['localidad'] = 'Flores';
                }
                if($_POST['localidad']=='San,Jose'){
                    $_POST['localidad'] = 'San Jose';
                }
            ////////
            $consulta = "INSERT INTO `estaciones`(`est_id`, `est_nombre`) VALUES (null,'".$_POST['localidad']."')";
            //$db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
            $insertEstacion= mysqli_query ($conexion,$consulta) or die(mysqli_error());
            mysqli_close($conexion);
            
                if($insertEstacion == 1){
                    include('bd.php');
                    $result = mysqli_query($conexion,"SELECT Max(est_id) FROM estaciones");
                    $row = mysqli_fetch_array($result);
                    $idEstacion = $row[0];
                    
                    echo 'La id de estacion es: '.$idEstacion[0];
                    mysqli_close($conexion);
                    
                    if($idEstacion>0){
                        include('bd.php');
                        $insertValores = "INSERT INTO `valores`(`est_id`, `val_fecha`, `val_hora`, `val_temp`, `val_hum`) VALUES ((SELECT max(est_id) from estaciones),'".$formated_DATE."','".$formated_TIME."',".$jsonObject['main']['temp'].",".$jsonObject['main']['humidity'].")";
                        $datos= mysqli_query ($conexion,$insertValores) or die(mysqli_error());
                        mysqli_close($conexion);
                    }
                    

                    if($datos){
                        header('location: ./index.php');
                    }else{
                        echo "hubo un error:  ".$datos;
                    }
                }
        }
    }else{
        header('location: ./index.php');
    }
?>