<?php
if (isset($_POST["v1"])) {
require "vendor/autoload.php";
$url="http://localhost/webservice/ws.php?wsdl";
$cliente=new nusoap_client($url,"wsdl");
$error=$cliente->getError();
if ($error) {
    echo "Error de conexion con el webservice: $error";
}
$parametros=array("v1"=>$_POST["v1"],"v2"=>$_POST["v2"]);
$resultado=$cliente->call('sumatoria',$parametros);
print_r($resultado);
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Numeros</title>
    </head>
    <body>
        <form action="" method="post">
            Digite  primer numero<input type="text" name="v1" id="v1"><br>
            Digite  segundo numero<input type="text" name="v2" id="v2"><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
    </html>
    <?php
    }
    ?>