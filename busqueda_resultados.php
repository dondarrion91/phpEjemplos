<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    function ejecutaConsulta($labusqueda){                

        require("segunda_pagina.php");
        
        $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
        
        if (mysqli_connect_errno()) {
            echo "Error al conectar";
            exit();
        }
        
        mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
        
        mysqli_set_charset($conexion, "utf8");
        
        $consulta = "SELECT * FROM productos WHERE NOMBREARTICULO LIKE '%$labusqueda%'";
        
        $resultados = mysqli_query($conexion, $consulta);
        
        echo "<table style='width:50%;margin:auto;' border='1'>";
        while ($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {
        
            echo "<tr><td>";
            echo $fila['SECCION'] . "</td><td>";
            echo $fila['NOMBREARTICULO'] . "</td><td>";
            echo $fila['PRECIO'] . "</td></td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($conexion);
        
    }
    
    ?>
</head>
<body>
    <?php
        $mibusqueda=$_GET["buscar"];

        $mipag=$_SERVER["PHP_SELF"];

        if($mibusqueda!=NULL){
            ejecutaConsulta($mibusqueda);
        }else{
            echo("<form action='$mipag' method='GET'>
                <label>Buscar:</label>
                <input type='text' name='buscar'>
                <input type='submit' name='enviando' value='dale!'>
            </form>");
        }
    
    ?>
</body>
</html>