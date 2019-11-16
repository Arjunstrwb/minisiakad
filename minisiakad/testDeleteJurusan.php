<?php
include_once(__DIR__."/lib/format_data.php");
include_once(__DIR__."/lib/DataJurusan.php");
header("Access-Control-Allow-Origin:*");

$datajurusan = new DataJurusan();
$datajurusan->setValue('1','Biologi');
// echo $datajurusan->id_jurusan;
$result=$datajurusan->delete();
$format= new format_data();
// print_r($result);
echo $format->as_JSON($result);
// $data=$datajurusan->getAll();