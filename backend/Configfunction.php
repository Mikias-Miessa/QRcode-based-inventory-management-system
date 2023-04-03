<?php
include "conn.php";
// product type configurations
if (isset($_POST['newtype']) && isset($_POST['editid'])) {
    $id = $_POST['editid'];
    $producttype = $_POST['newtype'];
    $sql = "UPDATE product_type SET Product_Type='$producttype' WHERE ID=$id ";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['addnewtype'])) {
    $producttype = $_POST['addnewtype'];
    $sql = "INSERT INTO product_type(Product_Type) VALUES('$producttype')";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['deletetypeid'])) {
    $ID = $_POST['deletetypeid'];
    $sql = "DELETE FROM product_type WHERE ID=$ID";
    $result = mysqli_query($con, $sql);
}

// product specification configurations

if (isset($_POST['newtype2']) && isset($_POST['editid2'])) {
    $id = $_POST['editid2'];
    $producttype = $_POST['newtype2'];
    $sql = "UPDATE product_type2 SET Product_Type2='$producttype' WHERE ID=$id ";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['addnewtype2'])) {
    $producttype = $_POST['addnewtype2'];
    $sql = "INSERT INTO product_type2(Product_Type2) VALUES('$producttype')";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['deletespecid'])) {
    $ID = $_POST['deletespecid'];
    $sql = "DELETE FROM product_type2 WHERE ID=$ID";
    $result = mysqli_query($con, $sql);
}

// product safety type configurations 

if (isset($_POST['newtype3']) && isset($_POST['editid3'])) {
    $id = $_POST['editid3'];
    $Safety_Type = $_POST['newtype3'];
    $sql = "UPDATE safety_type SET Safety_Type='$Safety_Type' WHERE ID=$id ";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['addnewtype3'])) {
    $Safety_Type = $_POST['addnewtype3'];
    $sql = "INSERT INTO safety_type(Safety_Type) VALUES('$Safety_Type')";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['deletesafetyid'])) {
    $ID = $_POST['deletesafetyid'];
    $sql = "DELETE FROM safety_type WHERE ID=$ID";
    $result = mysqli_query($con, $sql);
}

// product measuring unit configurations 

if (isset($_POST['newtype4']) && isset($_POST['editid4'])) {
    $id = $_POST['editid4'];
    $unit = $_POST['newtype4'];
    $sql = "UPDATE unit SET Unit='$unit' WHERE ID=$id ";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['addnewtype4'])) {
    $unit = $_POST['addnewtype4'];
    $sql = "INSERT INTO unit(Unit) VALUES('$unit')";
    $result = mysqli_query($con, $sql);
}
if (isset($_POST['deleteunitid'])) {
    $ID = $_POST['deleteunitid'];
    $sql = "DELETE FROM unit WHERE ID=$ID";
    $result = mysqli_query($con, $sql);
}
