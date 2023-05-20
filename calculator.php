<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CND BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/calculadora.css">
    <title>Calculadora</title>
</head>

<body>
    <div class="main-frame-cal">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Numero 1:</label>
                <input type="number" name="n1" class="form-control" id="exampleFormControlInput1" placeholder="Digite Numero 1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">Numero 2:</label>
                <input type="number" name="n2"class="form-control" id="exampleFormControlInput2" placeholder="Digite Numero 2">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Seleccione la operacion que desea:</label>
                <select class="form-control" name="tipo" id="exampleFormControlSelect1">
                    <option value="1">Suma</option>
                    <option value="2">Resta</option>
                    <option value="3">Multiplicacion</option>
                    <option value="4">Division</option>
                </select>
            </div>
            <button type="submit"name="operar" class="btn btn-primary">Operar</button>
        </form>

        <?php

        $n1 = $n2 = $tipo = $resultado = 0;
        
        if (isset($_POST['operar'])) {
            $n1 = $_POST['n1'];
            $n2 = $_POST['n2'];
            $tipo = $_POST['tipo'];

            switch ($tipo) {
                case '1':
                    $resultado = $n1 + $n2;
                    break;
                case '2':
                    $resultado = $n1 - $n2;
                    break;
                case '3':
                    $resultado = $n1 * $n2;
                    break;
                case '4':
                    $resultado = $n1 / $n2;
                    break;

            }
            echo "<h1>".$resultado."</h1>";
        }

        ?>
    </div>
</body>

</html>