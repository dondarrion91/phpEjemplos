<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

       require("segunda_pagina.php");       

       $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

       if(mysqli_connect_errno()){
            echo "Error al conectar";
            exit();
       }

       mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");

       mysqli_set_charset($conexion,"utf8");

       $consulta = "SELECT * FROM productos WHERE PAISDEORIGEN='ESPAÑA'";

       $resultados=mysqli_query($conexion,$consulta);              

       echo "<table style='width:50%;margin:auto;' border='1'>";
       while($fila=mysqli_fetch_array($resultados,MYSQLI_ASSOC)){    

        echo "<tr><td>";        
        echo $fila['SECCION']."</td><td>";
        echo $fila['NOMBREARTICULO']."</td><td>";
        echo $fila['PRECIO']."</td></td>";   
        echo "</tr>";     
       }    
       echo "</table>";
       mysqli_close($conexion);

    ?>
</body>
</html>