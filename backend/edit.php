<?php
include "conn.php";
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
            <h5 class="card-title">Edit Product Details</h5>
            <div method="post" class="row g-3" id="addform">
            <input type="hidden" value="' . $sku . '" id="hidsku">
              <div class="col-md-6">
                <label for="productname" class="form-label">Product Name</label>
                <input type="text" value="' . $Product_Name . '" class="form-control" id="productname" name="productname" placeholder="product name here..." required>
              </div>
              <div class="col-md-6">
                <label for="productType" class="form-label">Product Type</label>
                <select id="productType"  name="productType" class="form-select" required>
                 <option value="' . $Product_Type . '" selected></option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="productType2" class="form-label">Product Specification</label>
                <select id="productType2" name="productType2" class="form-select" required>
                 
                </select>
                </div>
                <div class="col-md-6">
                <label for="safetytype" class="form-label">Safety Type</label>
                <select id="safetytype" name="safetytype" class="form-select" required>
                 
                </select>
              </div>
              
              <div class="col-md-3">
                <label for="minimumquantity" class="form-label">Minimum Quantity</label>
                <input type="number" class="form-control" value="' . $min . '" id="minimumquantity" name="minimumquantity" placeholder="minimum quantity here..." required min="0">
              </div>
              <div class="col-md-6">
                <label for="measuringunit" class="form-label">Measuring Unit</label>
                <select id="measuringunit" name="measuringunit" class="form-select" required>
                 
                </select>
              </div>
              <div class="col-6">
                <label for="shelfnumber" class="form-label">Shelf Number</label>
                <input type="text" class="form-control" id="shelfnumber" value="' . $Shelf_Number . '" name="shelfnumber" placeholder="shelf number here..." required>
              </div>
              <div class="col-6">
                <label for="shelflife" class="form-label">Expire Date</label>
                <input type="date" class="form-control" id="shelflife" value="' . $Shelf_Life . '"name="shelflife" placeholder="Expire Date here..." required>
              </div>
              <div class="col-6">
                <label for="warehousenumber" class="form-label">Warehouse Number</label>
                <input type="text" class="form-control" id="warehousenumber" value="' . $Warehouse_Number . '" name="warehousenumber" placeholder="Warehouse number here..." required>
              </div>
              <div class="col-md-6">
                <label for="productusability" class="form-label">Product Usability</label>
                <select id="productusability" name="productusability" class="form-select" required>
                  <option selected>Reusable</option>
                  <option>non Reusable</option>
                </select>
              </div>
              <div></div>

              <div class="col-2">
                <button type="submit" id="submit" class="btn btn-info" >Edit Product</button>  
              </div>
              <div class="col-4">
                <button type="button" onClick="viewProduct()" class="btn btn-warning">Cancel</button>
              </div>
           </div> 
           
       ';
  echo $card;
}
