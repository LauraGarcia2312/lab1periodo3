<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio de alumnos</title>
</head>
<body>
    <form name="formulario" method="post" action="calculo.php" >

        <div class = " mb-3 ">
            <label for="nombre" class= "form-label"> Nombre de alumno: </label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>

        <div class = " mb-3 ">
            <label for="laboratorio1" class= "form-label"> Laboratorio 1: </label>
            <input type="text" class="form-control" name="laboratorio1" id="laboratorio1">
        </div>

        <div class = " mb-3 ">
            <label for="laboratorio2" class= "form-label"> Laboratorio 2: </label>
            <input type="text" class="form-control" name="laboratorio2" id="laboratorio2">
        </div>

        <div class = " mb-3 ">
            <label for="parcial" class= "form-label"> Nota Parcial: </label>
            <input type="text" class="form-control" name="parcial" id="parcial">
        </div>

        <input type="submit" value="Enviar">

    </form>
</body>
</html>
<?php
$nombre=$_POST ['nombre'];
$laboratorio1=$_POST ['laboratorio1'];
$laboratorio2=$_POST ['laboratorio2'];
$parcial=$_POST ['parcial'];

echo "nombre: " .$nombre. ' <br> ';
echo "laboratorio1: " .$laboratorio1. ' <br> ';
echo "laboratorio2: " .$laboratorio2. ' <br> ';
echo "parcial: " .$parcial. ' <br> ';

$promedio = ( $laboratorio1 + $laboratorio2 + $parcial) /3;
echo "promedio: " .float ($promedio, 2) . '<br>';

$conect = mysqli_connect ("localhost", "root" , "catolica", "registro");

if (mysqli_connect_errno ()) {
    printf ("Error de conexion", mysqli_connect_error () );
}

$res=mysqli_query($connect, "SELECT max (idAlu) + 1 maxid FROM alumno_Laura ");
$row= mysqli_fetch_assoc ($res);
$id = $row ['maxid'];
$query= "INSERT INTO alumno_Laura VALUES ($id, '$nombre',$laboratorio1, $laboratorio2, $parcial)" ;

mysqli_query ($connect, $query);

printf ("nuevo registro con el id %d.\n" , $conect->insert_id );
mysqli_close ($conect);

?>