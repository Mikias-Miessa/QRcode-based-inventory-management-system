<?php
include "conn.php";
include('../assets/phpqrcode/qrlib.php');
session_start();
if (
  isset($_POST['productname']) && isset($_POST['productType'])
  && isset($_POST['productquantity']) && isset($_POST['minimumquantity']) && isset($_POST['measuringunit'])
  && isset($_POST['shelfnumber']) && isset($_POST['shelflife']) && isset($_POST['warehousenumber']) && isset($_POST['productusability'])
) {
  $productname = $_POST['productname'];
  $productType = $_POST['productType'];
  $productType2 = $_POST['productType2'];
  $safetytype = $_POST['safetytype'];
  $productquantity = $_POST['productquantity'];
  $minimumquantity = $_POST['minimumquantity'];
  $measuringunit = $_POST['measuringunit'];
  $shelflife = $_POST['shelflife'];
  $shelfnumber = $_POST['shelfnumber'];
  $warehousenumber = $_POST['warehousenumber'];
  $productusability = $_POST['productusability'];
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

      $_SESSION['src'] = $urlRelativeFilePath;

      echo '<img src="' . $urlRelativeFilePath . '" />';
    } else {
      echo 'File already generated!';
      echo '<hr />';
    }
  }
}

// if (isset($_POST['submit'])) {
// $name = $_POST['name'];


 

// $errorEmpty = false;
// $errorEmail = false;

// if (empty($name) || empty($email) || empty($emaill)) {
// echo "<span class='form-error'>Fill in all fields!</span>";
// $errorEmpty = true;
// }
// elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
// echo "<span class='form-error'>Write a valid e-mail address!</span>";
// }

// else {
// echo "<span class='form-suocess'>Fill in all fields!</span>";
// }
// }