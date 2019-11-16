<?php
include_once(__DIR__."/../lib/DataJurusan.php");
include_once(__DIR__."/../lib/format_data.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
$datajurusan = new DataJurusan();
$datajurusan->setValue($_POST['id_jurusan'],$_POST['nama_jurusan']);
$result=$datajurusan->delete();
$format= new DataFormat();
echo $format->as_JSON($result);