<?php
include "conn.php";
$sql="SELECT * FROM product_type";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $Product_Type=$row['Product_Type'];
 echo"<option value='$Product_Type'>$Product_Type</option>";
}
?>