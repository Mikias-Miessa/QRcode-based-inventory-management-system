<?php
include 'conn.php';

if (isset($_POST['sku'])) {

    $SKU = $_POST['sku'];
    $Reason = $_POST['reason'];

    $sqli = "SELECT * FROM products WHERE SKU = '$SKU'";
    $result = mysqli_query($con, $sqli);

    while ($row = mysqli_fetch_assoc($result)) {
        $Product_Name = $row['Product_Name'];
        $Product_Type = $row['Product_Type'];
        $Product_Type2 = $row['Product_Type2'];
        $Safety_Type = $row['Safety_Type'];
        $Quantity = $row['Quantity'];
        $Unit = $row['Unit'];
        $Shelf_Number = $row['Shelf_Number'];
        $Shelf_Life = $row['Shelf_Life'];
        $Warehouse_Number = $row['Warehouse_Number'];
        $Usability = $row['Usability'];
        // $SKU=$row['SKU'];
    }

    $sql = "INSERT INTO discarded_Products(Product_Name,Product_Type,Product_Type2,Safety_Type,Quantity,Unit,Shelf_Life,Usability,Shelf_Number,Warehouse_Number,Reason,SKU) 
    VALUES('$Product_Name','$Product_Type','$Product_Type2','$Safety_Type','$Quantity','$Unit','$Shelf_Life','$Usability', '$Shelf_Number', '$Warehouse_Number','$Reason','$SKU')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $query = "DELETE FROM products WHERE SKU = '$SKU'";
        $result = mysqli_query($con, $query);
    }
}
