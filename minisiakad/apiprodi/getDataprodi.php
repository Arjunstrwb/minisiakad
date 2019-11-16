<?php
include_once(__DIR__."/../lib/DataProdi.php");
include_once(__DIR__."/../lib/format_data.php");
header('Access-Control-Allow-Origin:*');
$dataprodi = new DataProdi();
if(isset($_GET['kode'])){
    $data=$dataprodi->getDataProdi($_GET['kode']);
} else {
    $data=$dataprodi->getAll();
}
$format=new format_data();
error_reporting(E_ALL ^ E_NOTICE);
if($_GET['view']=='xml'){
    header('Content-Type: application/xml; charset=utf-8');
    echo $format->as_XML($data,'DataProdi');
} else if ($_GET['view']=='json'){
    header('Content-Type: application/json');
    echo $format->as_JSON($data);
} else {
    echo $format->as_HTML($data);
}