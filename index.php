<?php 
    include('./funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./weatherApi.php" method="post">
        
        <label for="localidad">Ingrese Localidad</label>
        <select name="localidad">
            <option value="0" selected>---</option>
            <option value="Artigas">Artigas</option>
            <option value="Salto">Salto</option>
            <option value="Rivera">Rivera</option>
            <option value="Paysandú">Paysandú</option>
            <option value="Tacuarembo">Tacuarembó</option>
            <option value="rio,negro">Río Negro</option>
            <option value="Durazno">Durazno</option>
            <option value="Cerro,Largo">Cerro Largo</option>
            <option value="Colonia">Colonia</option>
            <option value="trinidad">Flores</option>
            <option value="Florida">Florida</option>
            <option value="Treinta,y,Tres" disabled>Treinta y Tres</option>
            <option value="Lavalleja">Lavalleja</option>
            <option value="Rocha">Rocha</option>
            <option value="Maldonado">Maldonado</option>
            <option value="Canelones">Canelones</option>
            <option value="Montevideo">Montevideo</option>
            <option value="San,Jose">San José</option>
            <option value="Soriano">Soriano</option>
            
        </select>
</br>

        <input type="submit" value="Ver clima">
       
    </form>


    <table class="table table-striped table-bordered table-primary" style="border: 1px;">
        <thead class="table-dark">
            <tr >
            <!-- <th scope="col-1">#</th> -->
            
            <th>Localidad</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Temperatura</th>
            <th>Humedad</th>
            
            
        </thead>
        <tbody>
            <?php
                lista_consultasClima();
            ?>
        </tbody>
        </table>
</body>
</html>