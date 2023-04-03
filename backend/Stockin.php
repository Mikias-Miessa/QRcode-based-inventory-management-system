<?php
include 'conn.php';
if (isset($_POST['sku'])) {
  $sku = $_POST['sku'];

  $sql = "SELECT * FROM products WHERE SKU='$sku'";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $Product_Name = $row['Product_Name'];
    $Product_Type = $row['Product_Type'];
    $Quantity = $row['Quantity'];
    $min = $row['Min_Quan'];
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
  }
  $card = '
           
            
             
             
                <div class="row g-3">
                  <div class="col-md-12">
                    <input type="hidden" class="form-control" id="sku" value="' . $sku . '" placeholder="">
                  </div>
                  <div class="col-md-12">
                    <label for="productname" class="form-label">Product Name</label>
                    <input type="text" value="' . $Product_Name . '"class="form-control" id="productname" placeholder="product name here..." required>
                  </div>
                  <div class="col-md-12">
                    <label for="productType" class="form-label">Product Type</label>
                    <input type="text" value="' . $Product_Type . '" class="form-control" id="productType" placeholder="product type here..." required>
                  </div>
                  <div class="col-md-12">
                      <label for="shelfNumber" class="form-label">Shelf Number</label>
                      <input type="text" value="' . $Shelf_Number . '"class="form-control" id="shelfNumber" placeholder="shelf number here..." required>
                   </div>                                                             
                  <div class="col-md-12">
                    <label for="productquantity" class="form-label">Product Quantity</label>
                    <input type="number" class="form-control" id="productquantity"
                      placeholder="product quantity here..." required min="0">
                  </div>
                  <div class="col-md-12">
                    <label for="Stockindate" class="form-label">StockIn Date</label>
                    <input type="date" class="form-control" id="Stockindate" placeholder="Stockin Date here..." required>
                  </div>
                  <div class="col-3">
                    <button type="submit" class="btn btn-info" >Confirm Stock In</button>
                  </div>
                   <div class="col-4">
                <button type="button" onClick="viewProduct()" class="btn btn-warning">Cancel</button>
              </div>
                </div>
              
       ';
  echo $card;
}
