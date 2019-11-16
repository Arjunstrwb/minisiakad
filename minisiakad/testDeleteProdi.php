<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataProdi.php");
header("Access-Control-Allow-Origin:*");

$dataprodi = new DataProdi();
$dataprodi->setValue('01','MI');
// echo $dataprodi->id_prodi;
$result=$dataprodi->delete();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$dataprodi->getAll();