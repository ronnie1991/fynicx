<?php
include_once("main.class.php");

  $year=base64_decode($_GET['admyr']);
  $cls=base64_decode($_GET['cls']);
   $sec=base64_decode($_GET['sec']);   
  $data=$object->exportStudentnmrlbyyrclssec($year,$cls,$sec);
   
    
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    $singlCls=$object->singelClass($cls);
    $singlSec=$object->singelClassSect($sec);
    // file name for download
    $fileName = "student".'-'.$singlCls['class'].'-'.$singlSec['section'].'-'. $year . ".xls";
    
    // headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");
    
    $flag = false;
    foreach($data as $row) {
        if(!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
    
    exit;

    //https://www.codexworld.com/export-data-to-excel-in-php/

    // google - export data to excel in php
?>