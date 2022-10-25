<?php 
function lista_consultasClima(){
    include('bd.php');
          // 2) Preparar la orden SQL
          $consulta= "SELECT val_fecha,val_hora,val_temp,val_hum , est_nombre FROM valores inner JOIN estaciones on valores.est_id = estaciones.est_id order by val_hora and val_fecha desc";

          // puedo seleccionar de DB
          $db = mysqli_select_db( $conexion, $nombreBD ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

          // 3) Ejecutar la orden y obtener datos
          $datos= mysqli_query ($conexion,$consulta) or die(mysqli_error());

          // 4) Ir Imprimiendo las filas resultantes
          if($datos){
              while ($fila =mysqli_fetch_array($datos)){
                //<th scope="col-1">'.$i++.'</th>
                
                  echo'
                  <tr>
                    
                      <th scope="col-1" class="align-middle" >'.$fila ["est_nombre"].'</th>
                      <th scope="col-1" class="align-middle" >'.$fila ["val_fecha"].'</th>
                      <th scope="col-1" class="align-middle">'.$fila ["val_hora"].'</th>
                      <th scope="col-1" class="align-middle">'.$fila ["val_temp"].'</th>
                      <th scope="col-1" class="align-middle">'.$fila ["val_hum"].'</th>
                  </tr>';
              }
              
          }
            

          mysqli_close($conexion);
        
      }
?>