<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CND BOOTSTARP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fecha.css">
    <title>Edad Exacta</title>
</head>

<body>
    <div class="main-frame-dat">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Seleccione su fecha de nacimiento:</label>
                <input type="date" name="date_birth" class="form-control" id="exampleFormControlInput1">
            </div>

            <button type="submit" name="verificar" class="btn btn-outline-info">Envíar</button>
        </form>

        <?php


        if (isset($_POST['verificar'])) {
            $date_birth = new DateTime($_POST['date_birth']);

            $fecha_actual = new DateTime(date("y-m-d"));

            $diff = $date_birth->diff($fecha_actual);

            $edad_actual = $diff->y;
            $edad_meses = $diff->m;
            $edad_dias = $diff->d;

            echo "Tienes $edad_actual años, $edad_meses meses y $edad_dias días de edad.";

            if ($edad_actual >= 18) {
                echo "<h1>Es mayor de edad</h1>";
            } else if (18 > $edad_actual && 0 < $edad_actual) {
                echo "<h1>Es menor de edad</h1>";
            }
        }

        ?>

    </div>
</body>

</html>