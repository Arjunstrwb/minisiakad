<?php
include_once(__DIR__."/../lib/DataSiakad.php");
include_once(__DIR__."/../lib/format_data.php");
header('Access-Control-Allow-Origin:*');
$datasiakadmahasiswa = new DataSiakadMahasiswa();
if(isset($_GET['kode'])){
    $data=$datasiakadmahasiswa->getDataSiakadMahasiswa($_GET['kode']);
} else {
    $data=$datasiakadmahasiswa->getAll();
}
$format=new format_data();
error_reporting(E_ALL ^ E_NOTICE);
if($_GET['view']=='xml'){
    header('Content-Type: application/xml; charset=utf-8');
    echo $format->as_XML($data,'DataSiakadMahasiswa');
} else if ($_GET['view']=='json'){
    header('Content-Type: application/json');
    echo $format->as_JSON($data);
} else {
    echo $format->as_HTML($data);
}