<?php
require "vendor/autoload.php";
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace='urn=server';
$server-> register('sumatoria',
                array('v1'=>'xsd:int','v2'=>'xsd:int'),
                array('resultado'=>'xsd:int'),
                'urn:server',
                'urn:sever#SumatoriaServer',
                'rpc',
                'encoded',
                'Funcion para calcular la sumatoria de dos numeros'
);

$server-> register('sumatoria',
                array('v1'=>'xsd:int','v2'=>'xsd:int'),
                array('resultado'=>'xsd:int'),
                'urn:server',
                'urn:sever#SumatoriaServer',
                'rpc',
                'encoded',
                'Funcion para calcular la sumatoria de dos numeros'
);

function hola ($usuario) {
    return "Bienvenido $usuario";
}

function sumatoria($v1,$v2) {
    $total=0;
    for ($i=$v1;$i<=$v2;$i++) {
        $total+=$i;
    }
    return $total;
}



$server->service(file_get_contents("php://input"));