<?php
include "conn.php";
$input = '
 <div class="card ">
        <div class="container">
          <div class="card-body px-4">
            <h5 class="card-title">Scan QR Code Here</h5>
            <div class="row">
              <div class="col">
                <div class="col-md-6">
                  <div style="width:500px;" id="reader"></div>
                </div>
              </div>
              <div class="col">
                <div class="row g-3">
                  <div class="col-md-12">
                    <input type="hidden" class="form-control" id="sku" placeholder="">
                  </div>
                  <div class="col-md-12">
                    <label for="productname" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productname" placeholder="product name here...">
                  </div>
                  <div class="col-md-12">
                    <label for="productType" class="form-label">Product Type</label>
                    <input type="text" class="form-control" id="productType" placeholder="product type here...">
                  </div>
                  <div class="col-md-12">
                    <label for="shelfNumber" class="form-label">Shelf Number</label>
                    <input type="text" class="form-control" id="shelfNumber" placeholder="shelf number here...">
                  </div>
                  <div class="col-md-12">
                    <label for="productquantity" class="form-label">Product Quantity</label>
                    <input type="number" class="form-control" id="productquantity" placeholder="product quantity here...">
                  </div>
                  <div class="col-md-12">
                    <label for="Stockindate" class="form-label">Return Date</label>
                    <input type="date" class="form-control" id="Stockindate" placeholder="Return Date here...">
                  </div>
                  <div class="col-md-12">
                    <label for="returnedby" class="form-label">Returned by</label>
                    <input type="text" class="form-control" id="returnedby" placeholder="Returned by...">
                  </div>
                  <div class="col-12">
                    <button type="buton" class="btn btn-info" onclick="ConfirmIn()">Return</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 ';
echo $input;
