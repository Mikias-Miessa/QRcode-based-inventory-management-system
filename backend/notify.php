<?php
include "conn.php";

$sql = "SELECT * FROM notifications";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
    echo "1";
} else {
    echo "0";
}
