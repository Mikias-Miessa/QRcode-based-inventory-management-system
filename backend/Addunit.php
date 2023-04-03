<?php
include "conn.php";
$sql="SELECT * FROM unit";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $Unit=$row['Unit'];
 echo"<option value='$Unit'>$Unit</option>";
}
?>