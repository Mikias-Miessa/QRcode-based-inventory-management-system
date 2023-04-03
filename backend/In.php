<?php
include 'conn.php';
if (isset($_POST['qrCodeMessage'])) {

    $qrCodeMessage = $_POST['qrCodeMessage'];

    $sql = "SELECT * FROM products WHERE SKU='$qrCodeMessage'";
    $result = mysqli_query($con, $sql);
    // $data = mysqli_fetch_array($result, MYSQLI_NUM);
    //  if(!empty($data)) {
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
}
// else{
//     // $response=array();
//     $response = array('Product_Name' => "Not registered", 'Product_Type' => "Not registered", 'Shelf_Number' => "Not Registered");
//    echo json_encode($response);
// }


// }
else {
    $response['status'] = 200;
    $response['message'] = "Data not found";
}

if (isset($_POST['sku']) && isset($_POST['productquantity'])) {
    $productquantity = $_POST['productquantity'];
    $sku = $_POST['sku'];
    $Stockindate = $_POST['Stockindate'];
    $sql = "UPDATE products SET Quantity= Quantity+$productquantity WHERE SKU='$sku' ";
    $result = mysqli_query($con, $sql);

    $sql1 = "SELECT * FROM products WHERE Quantity > Min_Quan AND SKU='$sku '";
    $res1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($res1) > 0) {
        $querry = "DELETE FROM notifications WHERE SKU='$sku'";
        $res = mysqli_query($con, $querry);
    }

    $sql = "INSERT INTO stockin_date(Stockin_Date,SKU,Quantity)VALUES('$Stockindate','$sku','$productquantity')";
    $res = mysqli_query($con, $sql);
    if ($result) {
        echo "Product Stock In Process Completed!";
    } else {
        echo "something went wrong sorry";
    }
}
