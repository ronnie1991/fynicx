<?php
include_once("main.class.php");
$class=base64_decode($_GET['cls']);
$section=base64_decode($_GET['sec']);
$yar=base64_decode($_GET['y']);

  $data=$object->exportGACExl($class,$section,$yar);
    
    
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    
    // file name for download
    $fileName = "Gen_Admis_Char_" . date('d_m_Y') . ".xls";
    
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