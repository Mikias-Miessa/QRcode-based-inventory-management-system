<?php
include "conn.php";
$sql="SELECT * FROM safety_type";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $Safety_Type=$row['Safety_Type'];
 echo"<option value='$Safety_Type'>$Safety_Type</option>";
}
?>