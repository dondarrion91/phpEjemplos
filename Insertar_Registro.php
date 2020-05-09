<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$sec =$_GET["seccion"];           
$nom =$_GET["n_art"];            
$fec =$_GET["fecha"];            
$por =$_GET["p_orig"];            
$pre =$_GET["precio"];            

require("segunda_pagina.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

if (mysqli_connect_errno()) {
    echo "Error al conectar";
    exit();
}

mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");

$consulta = "INSERT INTO productos (SECCION,NOMBREARTICULO,FECHA,PAISDEORIGEN,PRECIO) VALUES ('$sec','$nom','$fec','$por','$pre')";

$resultados = mysqli_query($conexion, $consulta);

if(!$resultados){
    echo "Error en la consulta";
}else if(mysqli_affected_rows($conexion)==0){
    echo "No se han agregado ningun registro";
    // echo "Registro guardado";
    // echo mysqli_affected_rows($conexion);
}else{
    echo "Se han agregado " . mysqli_affected_rows($conexion) . " registros";
}
                

?>
</body>
</html>