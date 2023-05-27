<?php
require "vendor/autoload.php";
$url="http://dneonline.com/calculator.asmx?WSDL";
$cliente=new nusoap_client($url,"wsdl");
$error=$cliente->getError();
if ($error) {
    echo "Error de conexion con el webservice: $error";
}
$parametros=array("intA"=>25, "intB"=>10);
$suma=$cliente -> call ('Add',$parametros);
//print_r($suma);
echo "<h1> El resultado de sumar {$parametros["intA"]} con {$parametros["intB"]} es: {$suma["AddResult"]}</h1>";

$resta=$cliente -> call ('Subtract',$parametros);
//print_r($resta);
echo "<h1>La diferencia de restar {$parametros["intA"]} con {$parametros["intB"]} es: {$resta["SubtractResult"]}</h1>";

$multiplicar=$cliente -> call ('multiplicar',$parametros);
//print_r($multiplicar);
echo "<h1>El producto de {$parametros["intA"]} con {$parametros["intB"]} es: {$multiplicar["MultiplicarResult"]}</h1>";







//http://172.19.1.61/webservice/calculadora.php