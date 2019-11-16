<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataProdi.php");
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

$dataprodi = new DataProdi();
$dataprodi->setValue('07','Manajemen Informatika');
// echo $dataprodi->id_prodi;
$result=$dataprodi->create();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$dataprodi->getAll();