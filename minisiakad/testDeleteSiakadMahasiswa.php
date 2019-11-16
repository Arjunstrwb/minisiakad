<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataSiakad.php");
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$datasiakadmahasiswa = new DataSiakadMahasiswa();
$datasiakadmahasiswa->setValue('1707051007','arjun','L','blmp','98777','01','1','19991105113741791','7','9','9');
// echo $datamahasiswa->npm;
$result=$datasiakadmahasiswa->delete();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$datamahasiswa->getAll();