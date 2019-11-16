<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataJurusan.php");
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

$datajurusan = new DataJurusan();
$datajurusan->setValue('2','Matematika');
// echo $datajurusan->id_jurusan;
$result=$datajurusan->create();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$datajurusan->getAll();