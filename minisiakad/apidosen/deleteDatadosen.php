<?php
include_once(__DIR__."/../lib/DataDosen.php");
include_once(__DIR__."/../lib/format_data.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
$datadosen = new DataDosen();
$datadosen->setValue($_POST['nip_dosen'],$_POST['nama_dosen'],$_POST['golongan'],$_POST['jabatan']);
$result=$datadosen->delete();
$format= new DataFormat();
echo $format->as_JSON($result);