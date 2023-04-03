<?php
include "conn.php";

if (isset($_POST['catagory'])) {
  $sql = "SELECT Product_Type from product_type";
  $result = mysqli_query($con, $sql);
  echo "<option selected value='100' class='text-center'>All</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $Product_Type = $row['Product_Type'];
    echo "<option value='$Product_Type'>$Product_Type</option>";
  }
}




if (isset($_POST['value'])) {
  $value = $_POST['value'];
  $table = '
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All Products</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Quantity
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf Life</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Shelf No.</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Warehouse</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SKU
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions
                      </th>
                    </tr>
                  </thead>';
  if ($value != 100) {
    $sql = "SELECT * FROM products WHERE Product_Type='$value'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $Product_Name = $row['Product_Name'];
      $Product_Type = $row['Product_Type'];
      $Quantity = $row['Quantity'];
      $Unit = $row['Unit'];
      $Shelf_Number = $row['Shelf_Number'];
      $Shelf_Life = $row['Shelf_Life'];
      $Warehouse_Number = $row['Warehouse_Number'];
      $Usability = $row['Usability'];
      $SKU = $row['SKU'];
      $today = date("Y-m-d");

      $Present = new DateTime($today);
      $Last = new DateTime($Shelf_Life);
      $left_days = $Last->diff($Present)->format("%a");

      $table .= ' <tbody>
                    <tr>
                      <td class="align-middle text-center">
                        <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">' . $Quantity . $Unit . '</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">' . $left_days . '</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">' . $Shelf_Number . '</span>
                      </td>

                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">' . $Warehouse_Number . '</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">' . $SKU . '</span>
                      </td>
                      <td class="align-middle text-center">
                        <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Product" onclick="editproduct(\'' . $SKU . '\')">edit</i>
                         <i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="StockIn" onclick="Stockin(\'' . $SKU . '\')">add_chart</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="StockOut" onclick="Stockout(\'' . $SKU . '\')">insert_chart</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="deletemodal(\'' . $SKU . '\')">delete</i>
                      </td>
                    </tr>
                    </tbody>';
    }
  } else {
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $Product_Name = $row['Product_Name'];
      $Product_Type = $row['Product_Type'];
      $Quantity = $row['Quantity'];
      $Unit = $row['Unit'];
      $Shelf_Number = $row['Shelf_Number'];
      $Shelf_Life = $row['Shelf_Life'];
      $Warehouse_Number = $row['Warehouse_Number'];
      $Usability = $row['Usability'];
      $SKU = $row['SKU'];
      $today = date("Y-m-d");

      $Present = new DateTime($today);
      $Last = new DateTime($Shelf_Life);
      $left_days = $Last->diff($Present)->format("%a");

      $table .= ' <tbody>
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="text-sm font-weight-bold mb-0">' . $Product_Name . '</h6>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">' . $Product_Type . '</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">' . $Quantity . $Unit . '</span>
                  </td>
                   <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">' . $left_days . '</span>
                      </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $Shelf_Number . '</span>
                  </td>

                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $Warehouse_Number . '</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">' . $SKU . '</span>
                  </td>
                  <td class="align-middle text-center">
                        <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Product" onclick="editproduct(\'' . $SKU . '\')">edit</i>
                         <i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="StockIn" onclick="Stockin(\'' . $SKU . '\')">add_chart</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="StockOut" onclick="Stockout(\'' . $SKU . '\')">insert_chart</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="deletemodal(\'' . $SKU . '\')">delete</i>
                      </td>
                </tr>
                </tbody>';
    }
  }
}
$table .= '</table></table> </div>
           ';

echo $table;
