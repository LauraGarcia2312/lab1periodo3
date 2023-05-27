<?php
include "vendor/autoload.php";
$server=new nusoap_server;
$server-> configureWSDL ('server', 'urn:server');
$server-> wsdl->schemaTargetNamespace = 'urn:server';

$server-> wsd1->addComplexType (
    'promedio',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'nombre'=>array('name'=> 'nombre','type'=>'xsd:string'),
        'laboratorio1'=>array('name'=> 'laboratorio1','type'=>'xsd:float'),
        'laboratorio2'=>array('name'=> 'laboratorio2','type'=>'xsd:float'),
        'parcial'=>array('name'=> 'parcial','type'=>'xsd:float'),
        'promedio'=>array('name'=> 'promedio','type'=>'xsd:float')
        )
    );

$server-> register (
    'promedio',
    array('nombre'=>'xsd:string','laboratorio1'=>'xsd:float','laboratorio2'=>'xsd:float','parcial'=>'xsd:float'),
    array('return'=>'tns:promedio'),
    'urn:server',
    'urn:sever#PromedioServer',
    'rpc',
    'encoded',
);

function promedio ($nombre, $laboratorio1, $laboratorio2, $parcial) {
    $promedio=($laboratorio1*0.25) ($laboratorio2*0.25) + ($parcial * 0.50);
    $conect = mysqli_connect ("localhost","root", "catolica", "registro");
    $this-> executeInsert ("insert into alumno_Laura set nombre = '{$nombre}', laboratorio1= '{$labratorio1}',
    laboratorio2 = '{$laboratorio2}', parcial = '{$parcial}'");
    $result=array('nombre' => $nombre, 'laboratorio1'=>$laboratorio1,'laboratorio2'=> $laboratorio2, 'parcial'=> $parcial);
}