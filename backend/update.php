<?php
include "conn.php";

if(isset($_POST['sku'])){
$sku=$_POST['sku'];
$productname=$_POST['productname'];
$productType=$_POST['productType'];
$productType2=$_POST['productType2'];
$safetytype=$_POST['safetytype'];

$minimumquantity=$_POST['minimumquantity'];
$measuringunit=$_POST['measuringunit'];
$shelflife=$_POST['shelflife'];
$shelfnumber=$_POST['shelfnumber'];
$warehousenumber=$_POST['warehousenumber'];
$productusability=$_POST['productusability'];

 $query="UPDATE products SET Product_Name='$productname', Product_Type='$productType', Product_Type2='$productType2',
        Safety_Type='$safetytype', Min_Quan='$minimumquantity', Unit='$measuringunit', Shelf_Life='$shelflife', Shelf_Number='$shelfnumber'
         , Warehouse_Number='$warehousenumber', Usability='$productusability' WHERE SKU LIKE '%".$sku."%'";
   
        $res=mysqli_query($con,$query);
}


?>