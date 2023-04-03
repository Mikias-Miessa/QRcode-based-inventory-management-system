<?php
include "conn.php";
// $sql = "SELECT * FROM products WHERE SKU='$sku'";
$sql = "SELECT * FROM notifications WHERE _Status=1";
$res = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($res)) {
  $message = $row['Messages'];
  $sku = $row['SKU'];

  $notify = '
<li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">

                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1" onclick="Stockin(\'' . $sku . '\')">
                          <span class="font-weight-bold" >Alert_</span>' . $message . '
                        </h6>

                      </div>
                    </div>
                  </a>
                </li>
';
  echo $notify;
}
