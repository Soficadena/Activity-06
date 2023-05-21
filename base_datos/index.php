<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 
</head>
<body>
<?php
include 'db/conexion.php';

$buscarGeneral = isset($_GET['txtBuscarGeneral']) ? $_GET['txtBuscarGeneral'] : '';
$buscarNombre = isset($_GET['txtBuscarNombre']) ? $_GET['txtBuscarNombre'] : '';
$buscarApellido = isset($_GET['txtBuscaApellido']) ? $_GET['txtBuscaApellido'] : '';
$buscarCedula = isset($_GET['txtBuscarCedula']) ? $_GET['txtBuscarCedula'] : '';

$query = "SELECT * FROM usuarios";

if (!empty($buscarGeneral)) {

    $query= " SELECT * FROM usuarios WHERE (nombre LIKE '%$buscarGeneral%'  OR
               apellido LIKE '%$buscarGeneral%' OR
               cedula LIKE '%$buscarGeneral%')";
}


if (!empty($buscarNombre)) {
    
    $query= " SELECT * FROM usuarios WHERE nombre LIKE '%$buscarNombre%' ";
}


if (!empty($buscarApellido)) {

    $query= " SELECT * FROM usuarios WHERE apellido LIKE '%$buscarApellido%' ";
}


if (!empty($buscarCedula)) {

    $query= " SELECT * FROM usuarios WHERE cedula LIKE '%$buscarCedula%' ";
}

$daticos = mysqli_query($conexion, $query);

echo '
<h1>Tabla usuarios</h1>
<form method="get">
    <label for="txtBuscarGeneral">Buscar</label>
    <input type="text" placeholder="Buscar" name="txtBuscarGeneral" value="'.$buscarGeneral.'" onkeydown="if(event.keyCode === 13) { this.form.submit(); return false; }">
    <input type="submit" value="Buscar" name="mostrar">
</form>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cédula</th>
        </tr>
        <tr>
        <form method="get">
            <td>
                <input type="text" placeholder="Buscar" name="txtBuscarNombre" value="'.$buscarNombre.'" onkeydown="if(event.keyCode === 13) { this.form.submit(); return false; }">
            </td>
            <td>
                <input type="text" placeholder="Buscar" name="txtBuscaApellido" value="'.$buscarApellido.'" onkeydown="if(event.keyCode === 13) { this.form.submit(); return false; }">
            </td>
            <td>
                <input type="text" placeholder="Buscar" name="txtBuscarCedula" value="'.$buscarCedula.'" onkeydown="if(event.keyCode === 13) { this.form.submit(); return false; }">
            </tr>
        </form>
            </thead>
            <tbody>
        ';
        
        if ($daticos) {

            while ($datos2 = mysqli_fetch_array($daticos)){
                
                $id = $datos2['id'];
                $cedula_ind = $datos2['cedula'];
                $nombre = $datos2['nombre'];
                $apellido = $datos2['apellido'];
                echo '
                    <tr>
                        <td scope="row">'.$nombre.'</td>                
                        <td>'.$apellido.'</td>
                        <td>'.$cedula_ind.'</td>
                    </tr>
                ';
            }
        } else {
            echo '<tr><td colspan="3">No se encontraron resultados</td></tr>';
        }
        
        echo '</tbody></table>';
?>
</body>
</html>


