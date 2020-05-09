<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$busqueda= $_GET["buscar"];

require("segunda_pagina.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

if (mysqli_connect_errno()) {
    echo "Error al conectar";
    exit();
}

mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");

$sql="SELECT SECCION,PRECIO,PAISDEORIGEN FROM productos where PAISDEORIGEN=?";

$resultado=mysqli_prepare($conexion,$sql);

$ok = mysqli_stmt_bind_param($resultado,"s",$busqueda);

$ok = mysqli_stmt_execute($resultado);

if(!$ok){
    echo "Error";
}else{
    
    $ok=mysqli_stmt_bind_result($resultado,$seccion,$precio,$pais);

    echo "Articulos encontrados: <br><br>";

    while(mysqli_stmt_fetch($resultado)){
        echo $seccion . " " . $precio . " " . $pais . "<br>";
    }

    mysqli_stmt_close($resultado);


}

?>
</body>
</html>