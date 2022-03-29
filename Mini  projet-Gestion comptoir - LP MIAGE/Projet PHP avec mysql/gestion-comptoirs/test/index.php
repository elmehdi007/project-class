<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "../model/PHPExcel/PHPExcel.php";
                $tmpfname = "fileTest.xlsx";
                $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
                $excelObj = $excelReader->load($tmpfname);
                $worksheet = $excelObj->getSheet(0);
                $lastRow = $worksheet->getHighestRow();
                $lastColumn = PHPExcel_Cell::columnIndexFromString($worksheet->getHighestColumn());

                $arry = $worksheet->toArray(null,true,true,false);
                
                for ($row = 1; $row < $lastRow; $row++) {
                    for ($Column = 0; $Column < $lastColumn; $Column++){
                        echo($arry[$row][$Column]);
                    } 
                    echo('<br>');
                }


                /*echo "<table>";
                for ($row = 1; $row <= $lastRow; $row++) {
                    echo "<tr><td>";
                    echo $worksheet->getCell('A'.$row)->getValue();
                    echo "</td><td>";
                    echo $worksheet->getCell('B'.$row)->getValue();
                    echo "</td><tr>";
                }
                echo "</table>";*/	
    ?>
</body>
</html>