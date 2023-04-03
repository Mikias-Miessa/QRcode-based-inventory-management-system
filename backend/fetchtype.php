<?php
include "conn.php";
// for product type 
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM product_type WHERE ID=$id";
    $result = mysqli_query($con, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
}
// for product specification 
if (isset($_POST['id2'])) {
    $id = $_POST['id2'];

    $sql = "SELECT * FROM product_type2 WHERE ID=$id";
    $result = mysqli_query($con, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
}
// for product safety type 
if (isset($_POST['id3'])) {
    $id = $_POST['id3'];

    $sql = "SELECT * FROM safety_type WHERE ID=$id";
    $result = mysqli_query($con, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
}
// for product measuring unit
if (isset($_POST['id4'])) {
    $id = $_POST['id4'];

    $sql = "SELECT * FROM unit WHERE ID=$id";
    $result = mysqli_query($con, $sql);
    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
}
