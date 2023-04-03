<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Inventory Management System
  </title>
  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/parsley.css">

</head>

<body class="g-sidenav-show  bg-gray-200">
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content  border border-warning border-3  rounded-3 shadow">
        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title  text-dark font-weight-bold" id="exampleModalLabel">Deleting Product</h5>
          <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <label for="reason">Enter your reason</label>
          <input type="text" id="reason" class="form-control">
          <input type="hidden" id="hiddensku">
        </div>
        <div class="modal-footer">

          <a type="button" class="btn btn-secondary" onclick="Deleteproduct()">Delete</a>

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


        </div>
      </div>
    </div>
  </div>
  </div>

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-warning" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" # " target="_blank">


        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-box-seam" viewBox="0 0 16 16">
          <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
        </svg>
        <span class="ms-1 font-weight-bold text-white">Inventory System</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info " href="Products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Products Catalog</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="Add product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Add Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="Return.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">view_in_ar</i> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Return Product</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="Inflow.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Stock inflow</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="Outflow.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-dash" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Z" />
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Stock outflow</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="Report.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Report</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="Admin.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
              </svg>
            </div>
            <span class="nav-link-text ms-1">Admin</span>
          </a>
        </li>

      </ul>
    </div>

  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Product Catalog</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Product Catalog</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">search here...</label>
              <input type="search" id="search" name="searchquery" aria-label="Search" class="form-control">
            </div>
          </div>

          <ul class="navbar-nav  justify-content-end">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group input-group-outline">
                <label class="form-label">Filter by</label>
                <select id="filter" class="form-select"> </select>

              </div>
            </div>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>

              </a>
              <span style="background-color:transparent; width: 7px; height: 7px; border-radius: 50%;" class="mb-2 mr-1" id="notify"></span>

              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton " id="notification">
                <!-- <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">

                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Alert</span> T-shirt capacity low in stock
                        </h6>

                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Alert</span> Product one have completed shelf time
                        </h6>
                      </div>
                    </div>
                  </a>
                </li> -->
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="row mt-5">
      <div class="col-12">
        <div class="card my-4">

          <form class="row g-3 here" id="form" method="post">
          </form>
          <form class="row g-3 here mt-2" id="form2" method="post">
          </form>
          <form class="row g-3 here mt-2" id="form3" method="post">
          </form>
          <div id="here">

          </div>


        </div>
      </div>
    </div>



    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>,
              made by
              <a href="#" class="font-weight-bold" target="_blank">Visioneries ICT solution</a>

            </div>
          </div>

        </div>
      </div>
    </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info active" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-Warning" onclick="sidebarType(this)">Default</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="position-fixed top-1 end-1 z-index-2">
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToastdelete" aria-atomic="true">
      <div class="toast-header border-0">
        <i class="material-icons text-success me-2">
          check
        </i>
        <span class="me-auto font-weight-bold">Success</span>
        <small class="text-body">Just Now</small>
        <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
      </div>
      <hr class="horizontal dark m-0">
      <div class="toast-body">
        Product Deleted Successfully
      </div>
    </div>
    <div class="position-fixed top-1 end-1 z-index-2">
      <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast1" aria-atomic="true">
        <div class="toast-header border-0">
          <i class="material-icons text-success me-2">
            check
          </i>
          <span class="me-auto font-weight-bold">Success</span>
          <small class="text-body">Just Now</small>
          <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
          Stock In Completed
        </div>
      </div>
      <div class="position-fixed top-1 end-1 z-index-2">
        <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast2" aria-atomic="true">
          <div class="toast-header border-0">
            <i class="material-icons text-success me-2">
              check
            </i>
            <span class="me-auto font-weight-bold">Success</span>
            <small class="text-body">Just Now</small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
          </div>
          <hr class="horizontal dark m-0">
          <div class="toast-body">
            Stock Out Completed
          </div>
        </div>
        <!--   Core JS Files   -->
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>

        <!-- Parsley Script include  -->
        <script src="assets/js/parsley.min.js"></script>

        <script>
          var win = navigator.platform.indexOf('Win') > -1;
          if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
              damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
          }
        </script>
        <!-- parsley custom js  -->
        <script>
          var parseRequirement = function(requirement) {
            if (isNaN(+requirement))
              return parseFloat(jQuery(requirement).val());
            else
              return +requirement;
          };
          window.Parsley.addValidator('lte', {
            validateString: function(value, requirement) {
              return parseFloat(value) <= parseRequirement(requirement);
            },
            messages: {
              en: 'Not enough amount in stock',

            },
            priority: 32
          });
        </script>
        <script>
          $(document).ready(function() {

            viewProduct();
            Viewtype();
            notification();
            notify();

            $("#form").on('submit', function(event) {
              event.preventDefault();
              var form = $(this);
              form.parsley().validate();
              if (form.parsley().isValid()) {
                var sku = $('#sku').val();
                var productquantity = $('#productquantity').val();
                var Stockindate = $('#Stockindate').val();


                $.ajax({
                  url: "backend/In.php",
                  type: 'post',
                  data: {
                    sku: sku,
                    productquantity: productquantity,
                    Stockindate: Stockindate
                  },
                  success: function(data, status) {
                    $('#productname').val('');
                    $('#productType').val('');
                    $('#shelfNumber').val('');
                    $('#productquantity').val('');
                    $('#sku').val('');
                    $('#successToast1').toast('show');
                  }

                });
              }

            });
            $("#form2").on('submit', function(event) {
              event.preventDefault();
              var form = $(this);
              form.parsley().validate();
              if (form.parsley().isValid()) {
                var sku = $('#sku').val();
                var productquantity = $('#productquantity').val();
                var issued_date = $('#issued_date').val();
                var issued_to = $('#issued_to').val();

                $.ajax({
                  url: "backend/Out.php",
                  type: 'post',
                  data: {
                    sku: sku,
                    productquantity: productquantity,
                    issued_to: issued_to,
                    issued_date: issued_date
                  },
                  success: function(data, status) {
                    $('#productname').val('');
                    $('#productType').val('');
                    $('#shelfNumber').val('');
                    $('#sku').val('');
                    //   alert(data);
                    $('#successToast2').toast('show');
                  }

                });
              }

            });
            $("#form3").on('submit', function(event) {
              event.preventDefault();
              var form = $(this);
              form.parsley().validate();
              if (form.parsley().isValid()) {
                var sku = $('#hidsku').val();
                var productname = $('#productname').val();
                var productType = $('#productType').val();
                var productType2 = $('#productType2').val();
                var safetytype = $('#safetytype').val();
                //  var productquantity = $('#productquantity').val();
                var minimumquantity = $('#minimumquantity').val();
                var measuringunit = $('#measuringunit').val();
                var shelfnumber = $('#shelfnumber').val();
                var shelflife = $('#shelflife').val();
                var warehousenumber = $('#warehousenumber').val();
                var productusability = $('#productusability').val();
                $.ajax({
                  url: "backend/update.php",
                  type: "post",
                  data: {
                    sku: sku,
                    productname: productname,
                    productType: productType,
                    productType2: productType2,
                    safetytype: safetytype,
                    // productquantity:productquantity,
                    minimumquantity: minimumquantity,
                    measuringunit: measuringunit,
                    shelfnumber: shelfnumber,
                    shelflife: shelflife,
                    warehousenumber: warehousenumber,
                    productusability: productusability
                  },
                  success: function(data, status) {

                    viewProduct();
                  }
                });
              }

            });

          });

          function editproduct(sku) {
            var sku = sku;
            $.ajax({
              url: 'backend/edit.php',
              type: 'POST',
              data: {
                sku: sku
              },
              success: function(data, status) {
                Viewunit();
                ViewAddtype();
                Viewtype2();
                Viewsafety();
                console.log(sku)
                $('#form3').html(data);
                $('#form').empty();
                $('#form2').empty();
                $('#here').empty();
              }
            });

          }

          function Viewtype2() {
            var catagory = 'true';
            $.ajax({
              url: "backend/Addtype2.php",
              type: 'post',
              data: {
                catagory: catagory
              },
              success: function(data, status) {
                $('#productType2').html(data);
              }
            })
          }

          function Viewsafety() {
            var catagory = 'true';
            $.ajax({
              url: "backend/Safety.php",
              type: 'post',
              data: {
                catagory: catagory
              },
              success: function(data, status) {
                $('#safetytype').html(data);
              }
            })
          }

          function ViewAddtype() {
            var catagory = 'true';
            $.ajax({
              url: "backend/Addtype.php",
              type: 'post',
              data: {
                catagory: catagory
              },
              success: function(data, status) {
                $('#productType').html(data);
              }
            })
          }

          function Viewunit() {
            var catagory = 'true';
            $.ajax({
              url: "backend/Addunit.php",
              type: 'post',
              data: {
                catagory: catagory
              },
              success: function(data, status) {
                $('#measuringunit').html(data);
              }
            })
          }

          function viewProduct() {
            var viewBook = "true";

            $.ajax({
              url: "backend/view.php",
              type: 'post',
              data: {
                viewBook: viewBook
              },
              success: function(data, status) {
                $('#here').html(data);
                $("#form").empty();
                $("#form2").empty();
                $("#form3").empty();

              }
            });

          }
          $('#search').keydown(function() {
            var input = $(this).val();

            $.ajax({
              url: 'backend/search.php',
              type: 'POST',
              data: {
                input: input
              },
              success: function(data) {
                $('#here').html(data);
                $("#form").empty();
                $("#form2").empty();
              }
            });
          });

          function Viewtype() {
            var catagory = 'true';
            $.ajax({
              url: "backend/filter.php",
              type: 'post',
              data: {
                catagory: catagory
              },
              success: function(data, status) {
                $('#filter').html(data);
              }
            })
          }
          $('#filter').on('change', function() {
            var value = $(this).val();
            $.ajax({
              url: 'backend/filter.php',
              type: 'POST',
              data: {
                value: value
              },
              success: function(data, status) {
                $('#form').empty();
                $('#form2').empty();
                $('#form3').empty();
                $('#here').html(data);

              }
            });


          });

          function Edit() {
            var sku = sku;
            var productname = $('#productname').val();
            var productType = $('#productType').val();
            var productType2 = $('#productType2').val();
            var safetytype = $('#safetytype').val();
            //  var productquantity = $('#productquantity').val();
            var minimumquantity = $('#minimumquantity').val();
            var measuringunit = $('#measuringunit').val();
            var shelfnumber = $('#shelfnumber').val();
            var shelflife = $('#shelflife').val();
            var warehousenumber = $('#warehousenumber').val();
            var productusability = $('#productusability').val();
            $.ajax({
              url: "backend/update.php",
              type: "post",
              data: {
                sku: sku,
                productname: productname,
                productType: productType,
                productType2: productType2,
                safetytype: safetytype,
                // productquantity:productquantity,
                minimumquantity: minimumquantity,
                measuringunit: measuringunit,
                shelfnumber: shelfnumber,
                shelflife: shelflife,
                warehousenumber: warehousenumber,
                productusability: productusability
              },
              success: function(data, status) {

                viewProduct();
              }
            });



          }

          function Stockin(sku) {
            var sku = sku;
            $.ajax({
              url: 'backend/Stockin.php',
              type: 'POST',
              data: {
                sku: sku
              },
              success: function(data, status) {
                Viewunit();
                ViewAddtype();
                $('#form').html(data);
                $('#form2').empty();
                $('#here').empty();
                $('#form3').empty();
              }
            });
          }


          function Stockout(sku) {
            var sku = sku;
            $.ajax({
              url: 'backend/Stockout.php',
              type: 'POST',
              data: {
                sku: sku
              },
              success: function(data, status) {
                Viewunit();
                ViewAddtype();
                $('#form2').html(data);
                $('#here').empty();
                $('#form').empty();
                $('#form3').empty();

              }
            });

          }

          function deletemodal(sku) {
            $('#hiddensku').val(sku);
            $('#deleteModal').modal('show');
          }

          function Deleteproduct() {
            var sku = $('#hiddensku').val();
            var reason = $('#reason').val();
            $.ajax({
              url: 'backend/Delete.php',
              type: 'post',
              data: {
                sku: sku,
                reason: reason
              },
              success: function(data, status) {
                $('#successToastdelete').toast('show');
                $('#reason').val('');
                $('#deleteModal').modal('hide');
                viewProduct();
              }
            });
          }

          function notification() {
            var notfication = "true"
            $.ajax({
              url: "backend/Notification.php",
              type: "post",
              data: {
                notfication: notfication
              },
              success: function(data, status) {
                $('#notification').html(data);
              }
            });
          }

          function notify() {
            $.ajax({
              url: "backend/notify.php",
              success: function(data, status) {
                if (data == 1) {
                  $('#notify').css("background-color", "red");
                } else {
                  $('#notify').css("background-color", "transparent");
                }
              }
            });
          }

          function ConfirmIn() {
            var sku = $('#sku').val();
            var productquantity = $('#productquantity').val();
            var Stockindate = $('#Stockindate').val();


            $.ajax({
              url: "backend/In.php",
              type: 'post',
              data: {
                sku: sku,
                productquantity: productquantity,
                Stockindate: Stockindate
              },
              success: function(data, status) {
                $('#productname').val('');
                $('#productType').val('');
                $('#shelfNumber').val('');
                $('#productquantity').val('');
                $('#sku').val('');
                $('#successToast1').toast('show');
              }

            });
          }

          function ConfirmOut() {
            var sku = $('#sku').val();
            var productquantity = $('#productquantity').val();
            var issued_date = $('#issued_date').val();
            var issued_to = $('#issued_to').val();

            $.ajax({
              url: "backend/Out.php",
              type: 'post',
              data: {
                sku: sku,
                productquantity: productquantity,
                issued_to: issued_to,
                issued_date: issued_date
              },
              success: function(data, status) {
                $('#productname').val('');
                $('#productType').val('');
                $('#shelfNumber').val('');
                $('#sku').val('');
                //   alert(data);
                $('#successToast2').toast('show');
              }

            });
          }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>