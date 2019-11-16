<?php
include_once(__DIR__."/../lib/DataSiakad.php");
include_once(__DIR__."/../lib/format_data.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
$datasiakadmahasiswa = new DataSiakadMahasiswa();
$datasiakadmahasiswa->setValue($_POST['npm'],$_POST['nama'],$_POST['jenis_kelamin'],$_POST['alamat'],$_POST['no_hp'],$_POST['program_study']),$_POST['jurusan']),$_POST['dosen_pa']),$_POST['semester']),$_POST['index_prestasi']),$_POST['index_prestasi_kumulatif']);
$result=$datasiakadmahasiswa->delete();
$format= new DataFormat();
echo $format->as_JSON($result);