<?php
require_once "PHPExcel/PHPExcel.php";

class ExcelToMySQL
{
    public static function readData($filePath)
    {
        $tmpfname = $filePath;
        $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj = $excelReader->load($tmpfname);
        $worksheet = $excelObj->getSheet(0);
        $lastRow = $worksheet->getHighestRow();
        $lastColumn = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());

        $arry = $worksheet->toArray(null,true,true,false);
        
        return $arry;
        /*
        for ($row = 1; $row < $lastRow; $row++) {
            for ($Column = 0; $Column < $lastColumn; $Column++){
                echo($arry[$row][$Column]);
            } 
            echo('<br>');
        }*/
    }
}



?>