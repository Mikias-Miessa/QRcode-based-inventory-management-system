<?php
include 'conn.php';
include('../assets/phpqrcode/qrlib.php');
$fileName = $_FILES["file"]["name"];
$fileExtension = explode('.', $fileName);
$fileExtension = strtolower(end($fileExtension));
$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

$targetDirectory = "uploads/" . $newFileName;
move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory);

error_reporting(0);
ini_set('display_errors', 0);

require 'excelReader/excel_reader2.php';
require 'excelReader/SpreadsheetReader.php';

$reader = new SpreadsheetReader($targetDirectory);
$amount = "0";
foreach ($reader as $key => $row) {
    $productname = $row[0];
    $productType = $row[1];
    $productType2 = $row[2];
    $safetytype = $row[3];
    $productquantity = $row[4];
    $minimumquantity = $row[5];
    $measuringunit = $row[6];
    //$shelflife = $row[7];

    $shelflife1 = $row[7];
    $date = explode('-', $shelflife1);
    $day = $date[2];
    $month = $date[1];
    $year = $date[0];
    $shelflife = $day . $month . $year;

    $shelfnumber = $row[8];
    $warehousenumber = $row[9];
    $productusability = $row[10];
    $frequency = "0";

    $pn = substr($productname, 0, 2);
    $pt = substr($productType, 0, 2);
    $pt2 = substr($productType2, 0, 2);
    $sn = substr($shelfnumber, 0, 3);
    $wn = substr($warehousenumber, 0, 3);


    $sku = $pt . $pt2 . $pn . $wn . $sn;
    $query = "SELECT * FROM products WHERE SKU LIKE '%$sku%'";
    $res = mysqli_query($con, $query);
    $data = mysqli_fetch_array($res, MYSQLI_NUM);
    if (!empty($data)) {
        echo "Product already exists";
    } else {

        $tempDir = 'image/';
        $codeContents = $sku;

        // we need to generate filename somehow, 
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = $productname . $codeContents . '.png';
        $pngAbsoluteFilePath = $tempDir . $fileName;
        $urlRelativeFilePath = 'backend/' . $tempDir . $fileName;
        // $sqll="INSERT INTO qrcode(SKU,qrimage)VALUES('$sku','$qrimage')";
        // $res=mysqli_query($con,$sqll);
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);

            $sql = "INSERT INTO products(Product_Name,Product_Type,Product_Type2,Safety_Type,Quantity,Min_Quan,Unit,Shelf_Life,Shelf_Number,Warehouse_Number,Usability,FREQUENCY,SKU)
               VALUES('$productname','$productType','$productType2','$safetytype','$productquantity','$minimumquantity','$measuringunit','$shelflife','$shelfnumber','$warehousenumber','$productusability','$frequency','$sku')";
            $result = mysqli_query($con, $sql);
            $amount++;
            // $_SESSION['src'] = $urlRelativeFilePath;

            // echo '<img src="' . $urlRelativeFilePath . '" />';
        } else {
            echo 'File already generated!';
            echo '<hr />';
        }
    }
}
echo "$amount Products Imported Successfully...";
