<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataSiakad.php");
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

$datasiakadmahasiswa = new DataSiakadMahasiswa();
$datasiakadmahasiswa->setValue('1707051007','Rizky Sidiq','L','Bandar Jaya','08975516771','D3 MI','Ilmu Komputer','Dr. ENG. Admi sarif','5','3.00','3.45');
// echo $datamahasiswa->npm;
$result=$datasiakadmahasiswa->create();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$datamahasiswa->getAll();