<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$db = "mi_proyecto";


$conexion = new mysqli($host,$usuario,$contraseña,$db);

if ($conexion->connect_errno) {
    echo "Se experimentan fallos de conexion";
    exit();
}

?>