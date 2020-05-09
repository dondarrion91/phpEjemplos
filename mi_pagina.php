<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

            

        require("segunda_pagina.php");
        
        $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
        
        if (mysqli_connect_errno()) {
            echo "Error al conectar";
            exit();
        }
        
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
        
        mysqli_set_charset($conexion, "utf8");
        
        $consulta = "INSERT INTO productos (SECCION,NOMBREARTICULO,FECHA,PAISDEORIGEN,PRECIO) VALUES ('DEPORTES','RAQUETA','12/3/2020','ARGENTINA','$120')";
        
        $resultados = mysqli_query($conexion, $consulta);
                        
    
    ?>
</head>
<body>
    
</body>
</html>