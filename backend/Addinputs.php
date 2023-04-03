<?php
include "conn.php";
$input = '
         
              <div class="col-md-6">
                <label for="productname" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productname" name="productname" placeholder="product name here..." data-parsley-trigger="keyup" required>
              </div>
              <div class="col-md-5 pr-1">
                <label for="productType" class="form-label">Product Type</label>
                <select id="productType" name="productType" class="form-select" required>

                </select>
              </div>
              <div class="col-md-1 px-0">
                <a class="fixed-plugin-button text-secondary position-fixed pt-5 pb-2">
                  <i class="material-icons cursor-pointer" onclick="TypeEdit()">settings</i>
                </a>
              </div>
              <div class="col-md-5">
                <label for="productType2" class="form-label">Product Specification</label>
                <select id="productType2" name="productType2" class="form-select" required>

                </select>
              </div>
              <div class="col-md-1 px-0">
                <a class="fixed-plugin-button text-secondary position-fixed pt-5 pb-2">
                  <i class="material-icons cursor-pointer" onclick="TypeEdit()">settings</i>
                </a>
              </div>
              <div class="col-md-5">
                <label for="safetytype" class="form-label">Safety Type</label>
                <select id="safetytype" name="safetytype" class="form-select" required>

                </select>
              </div>
              <div class="col-md-1 px-0">
                <a class="fixed-plugin-button text-secondary position-fixed pt-5 pb-2">
                  <i class="material-icons cursor-pointer" onclick="TypeEdit()">settings</i>
                </a>
              </div>
              <div class="col-md-3">
                <label for="productquantity" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="productquantity" name="productquantity" placeholder="product quantity here..." required min="0" data-parsley-trigger="keyup">
              </div>
              <div class="col-md-3">
                <label for="minimumquantity" class="form-label">Minimum Quantity</label>
                <input type="number" class="form-control" id="minimumquantity" name="minimumquantity" placeholder="minimum quantity here..." required data-parsley-trigger="keyup" data-parsley-lte="#productquantity">
              </div>
              <div class="col-md-5">
                <label for="measuringunit" class="form-label">Measuring Unit</label>
                <select id="measuringunit" name="measuringunit" class="form-select" required>

                </select>
              </div>
              <div class="col-md-1 px-0">
                <a class="fixed-plugin-button text-secondary position-fixed pt-5 pb-2">
                  <i class="material-icons cursor-pointer" onclick="TypeEdit()">settings</i>
                </a>
              </div>
              <div class="col-6">
                <label for="shelfnumber" class="form-label">Shelf Number</label>
                <input type="text" class="form-control" id="shelfnumber" name="shelfnumber" placeholder="shelf number here..." required>
              </div>
              <div class="col-6">
                <label for="shelflife" class="form-label">Expire Date</label>
                <input type="date" class="form-control" id="shelflife" name="shelflife" placeholder="Expire Date here..." required>
              </div>
              <div class="col-6">
                <label for="warehousenumber" class="form-label">Warehouse Number</label>
                <input type="text" class="form-control" id="warehousenumber" name="warehousenumber" placeholder="Warehouse number here..." required>
              </div>
              <div class="col-md-6">
                <label for="productusability" class="form-label">Product Usability</label>
                <select id="productusability" name="productusability" class="form-select">
                  <option selected>Reusable</option>
                  <option>non Reusable</option>
                </select>
              </div>

              <div class="col-12">
                <input type="submit" id="submit" class="btn btn-info" value="Add Product">
                <button type="button" class="btn btn-primary" onclick="ImportModal()">
  Import From Excel
</button>
              </div>
            </form>  
              ';
echo $input;
