<?php
include "conn.php";
$sql="SELECT * FROM product_type2";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $Product_Type2=$row['Product_Type2'];
 echo"<option value='$Product_Type2'>$Product_Type2</option>";
}
?>