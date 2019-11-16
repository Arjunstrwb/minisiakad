<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataDosen.php");
header("Access-Control-Allow-Origin:*");

$datadosen = new DataDosen();
$datadosen->setValue('19991105113741791','Wibowo M.T','IV/A');
// echo $datadosen->nip_dosen;
$result=$datadosen->delete();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$datadosen->getAll();