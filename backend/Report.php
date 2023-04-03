<?php
include 'conn.php';
// low in stock products 
$table = ' <div class="row mb-5">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Low in Stock Products</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product</th>
                      <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Quantity
                      </th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf Life</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU
                      </th>
                      
                      
                    </tr>
                  </thead>';
$sql = "SELECT * FROM products WHERE Quantity <= Min_Quan";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $Product_Name = $row['Product_Name'];
  $Product_Type = $row['Product_Type'];
  $Quantity = $row['Quantity'];
  $Shelf_Number = $row['Shelf_Number'];
  $Shelf_Life = $row['Shelf_Life'];
  $WareHouse_Number = $row['Warehouse_Number'];
  $sku = $row['SKU'];

  $today = date("Y-m-d");

  $Present = new DateTime($today);
  $Last = new DateTime($Shelf_Life);
  $left_days = $Last->diff($Present)->format("%a");

  $table .= ' <tbody class="text-center">
            <tr>
                <td class="align-middle text-center">
                    <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">' . $Quantity . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $left_days . " Days left" . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $sku . '</span>
                  </td>
                     
            
            </tr>
            </tbody>';
}
$table .= '</table> </div>
            </div>
          </div>
           </div>';

echo $table;


// Discarded products 

$table = ' 
        <div class="col-12 mt-5">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Discarded Products</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product</th>
                      <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Quantity
                      </th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf Life</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason
                      </th>
                    </tr>
                  </thead>';
$sql = "SELECT * FROM discarded_products";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $Product_Name = $row['Product_Name'];
  $Product_Type = $row['Product_Type'];
  $Quantity = $row['Quantity'];
  $Shelf_Number = $row['Shelf_Number'];
  $Shelf_Life = $row['Shelf_Life'];
  $WareHouse_Number = $row['Warehouse_Number'];
  $sku = $row['SKU'];
  $Reason = $row['Reason'];
  $today = date("Y-m-d");

  $Present = new DateTime($today);
  $Last = new DateTime($Shelf_Life);
  $left_days = $Last->diff($Present)->format("%a");

  $table .= ' <tbody class="text-center">
            <tr>
                <td class="align-middle text-center">
                    <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">' . $Quantity . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $left_days . " Days left" . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $sku . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $Reason . '</span>
                  </td>
                  
                     
            
            </tr>
            </tbody>';
}
$table .= '</table> </div>
            </div>
          </div>
           ';

echo $table;

// most used products 
$table = ' 
        <div class="col-12 mt-5">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Most Used Products</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product</th>
                      <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Quantity
                      </th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf Life</th>
                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Times being used</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU
                      </th>
                     
                    </tr>
                  </thead>';
$sql = "SELECT * FROM products ORDER BY FREQUENCY DESC LIMIT 3";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $Product_Name = $row['Product_Name'];
  $Product_Type = $row['Product_Type'];
  $Quantity = $row['Quantity'];
  $Shelf_Number = $row['Shelf_Number'];
  $Shelf_Life = $row['Shelf_Life'];
  $WareHouse_Number = $row['Warehouse_Number'];
  $sku = $row['SKU'];
  $today = date("Y-m-d");
  $frequency = $row['FREQUENCY'];
  $Present = new DateTime($today);
  $Last = new DateTime($Shelf_Life);
  $left_days = $Last->diff($Present)->format("%a");

  $table .= ' <tbody class="text-center">
            <tr>
                <td class="align-middle text-center">
                    <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">' . $Quantity . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $left_days . " Days left" . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $frequency . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $sku . '</span>
                  </td>
                  
                  
                     
            
            </tr>
            </tbody>';
}
$table .= '</table> </div>
            </div>
          </div>
           ';

echo $table;

// least used product 
$table = ' 
        <div class="col-12 mt-5">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Least Used Products</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product</th>
                      <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Quantity
                      </th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf Life</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Times being used</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU
                      </th>
                     
                    </tr>
                  </thead>';
$sql = "SELECT * FROM products ORDER BY FREQUENCY ASC LIMIT 3";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $Product_Name = $row['Product_Name'];
  $Product_Type = $row['Product_Type'];
  $Quantity = $row['Quantity'];
  $Shelf_Number = $row['Shelf_Number'];
  $Shelf_Life = $row['Shelf_Life'];
  $WareHouse_Number = $row['Warehouse_Number'];
  $sku = $row['SKU'];
  $today = date("Y-m-d");
  $frequency = $row['FREQUENCY'];

  $Present = new DateTime($today);
  $Last = new DateTime($Shelf_Life);
  $left_days = $Last->diff($Present)->format("%a");

  $table .= ' <tbody class="text-center">
            <tr>
                <td class="align-middle text-center">
                    <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">' . $Quantity . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $left_days . " Days left" . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $frequency . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $sku . '</span>
                  </td>
                  
                  
                     
            
            </tr>
            </tbody>';
}
$table .= '</table> </div>
            </div>
          </div>
           ';
echo $table;

// close to best befor date products 
$table = ' 
        <div class="col-12 mt-5">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Best before date</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product</th>
                      <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Quantity
                      </th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf Life</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU
                      </th>
                     
                    </tr>
                  </thead>';
$sql = "SELECT * FROM products";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $Product_Name = $row['Product_Name'];
  $Product_Type = $row['Product_Type'];
  $Quantity = $row['Quantity'];
  $Shelf_Number = $row['Shelf_Number'];
  $Shelf_Life = $row['Shelf_Life'];
  $WareHouse_Number = $row['Warehouse_Number'];
  $sku = $row['SKU'];
  $today = date("Y-m-d");

  $Present = new DateTime($today);
  $Last = new DateTime($Shelf_Life);
  $left_days = $Last->diff($Present)->format("%a");
  if ($left_days < 10) {
    $table .= ' <tbody class="text-center">
            <tr>
                <td class="align-middle text-center">
                    <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">' . $Quantity . '</span>
                  </td>
                  <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">' . $left_days . " Days left" . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $sku . '</span>
                  </td>
            </tr>
            </tbody>';
  }
}
$table .= '</table> </div>
            </div>
          </div>
           ';
echo $table;
