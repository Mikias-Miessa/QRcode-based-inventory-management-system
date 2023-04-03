<?php
include "conn.php";
if (isset($_POST['type'])) {

  // for type 
  $table = '
  <div class="row ">
        <div class="col-6">
          <button class="btn btn-primary" onclick="Addtypemodal()">Add New Type</button>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product Types</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product Type</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions
                      </th>
                    </tr>
                  </thead>';
  $sql = "SELECT * FROM product_type";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['ID'];
    $Product_Type = $row['Product_Type'];


    $table .= ' <tbody>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">' . $Product_Type . '</p>
                      </td>
                      <td class="align-middle text-center">
                        
                         <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="editmodal(\'' . $ID . '\')">edit</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="deletetype(\'' . $ID . '\')">delete</i>
                      </td>
                    </tr>
                    </tbody>';
  }

  $table .= '</table> </div>
            </div>
          </div>
        </div>';
  echo $table;

  // for spec 

  $table = '
   <div class="col-6">
          <button class="btn btn-primary" onclick="Addspecmodal()">Add New Specification</button>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product Specifications</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product Specification</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions
                      </th>
                    </tr>
                  </thead>';
  $sql = "SELECT * FROM product_type2";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['ID'];
    $Product_Type = $row['Product_Type2'];


    $table .= ' <tbody>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">' . $Product_Type . '</p>
                      </td>
                      <td class="align-middle text-center">
                        
                         <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="editmodal2(\'' . $ID . '\')">edit</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="deletespec(\'' . $ID . '\')">delete</i>
                      </td>
                    </tr>
                    </tbody>';
  }

  $table .= '</table> </div>
            </div>
          </div>
          </div>
          </div>';

  echo $table;

  // for safety 

  $table = '
    <div class="row ">
   <div class="col-6">
          <button class="btn btn-primary" onclick="Addsafetymodal()">Add New Safety type</button>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product Safety Type</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product Safety Type</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions
                      </th>
                    </tr>
                  </thead>';
  $sql = "SELECT * FROM safety_type";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['ID'];
    $Safety_Type = $row['Safety_Type'];


    $table .= ' <tbody>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">' . $Safety_Type . '</p>
                      </td>
                      <td class="align-middle text-center">
                        
                         <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="editmodal3(\'' . $ID . '\')">edit</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="deletesafety(\'' . $ID . '\')">delete</i>
                      </td>
                    </tr>
                    </tbody>';
  }

  $table .= '</table> </div>
            </div>
          </div>
          </div>';

  echo $table;

  // for unit 

  $table = '
    
   <div class="col-6">
          <button class="btn btn-primary" onclick="Addunitmodal()">Add New Unit</button>
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Product Measuring Unit</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Product Measuring Unit</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions
                      </th>
                    </tr>
                  </thead>';
  $sql = "SELECT * FROM unit";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row['ID'];
    $Unit = $row['Unit'];


    $table .= ' <tbody>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">' . $Unit . '</p>
                      </td>
                      <td class="align-middle text-center">
                        
                         <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" onclick="editmodal4(\'' . $ID . '\')">edit</i>
                         <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="deleteunit(\'' . $ID . '\')">delete</i>
                      </td>
                    </tr>
                    </tbody>';
  }

  $table .= '</table> </div>
            </div>
          </div>
          </div>';

  echo $table;

  $table = '<div class="text-center mt-3">
        <button class="btn btn-secondary" onclick= "Viewinput()"> Cancel </button>
  </div> ';

  echo $table;
}
