<?php
include 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['qrCodeMessage'])) {

    $qrCodeMessage = $_POST['qrCodeMessage'];

    $sql = "SELECT * FROM products WHERE SKU='$qrCodeMessage'";
    $result = mysqli_query($con, $sql);

    $response = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response = $row;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Data not found";
}

if (isset($_POST['sku']) && isset($_POST['productquantity'])) {
    $productquantity = $_POST['productquantity'];
    $sku = $_POST['sku'];
    $issued_date = $_POST['issued_date'];
    $issued_to = $_POST['issued_to'];
    $ISSUEDTO = strtoupper($issued_to);


    $sql = "UPDATE products SET Quantity= Quantity-$productquantity WHERE SKU='$sku' ";
    $result = mysqli_query($con, $sql);

    $sql1 = "SELECT * FROM products WHERE Quantity<= Min_Quan AND SKU='$sku '";
    $res1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($res1) > 0) {
        while ($row = mysqli_fetch_assoc($res1)) {
            $pname = $row['Product_Name'];
            $psku = $row['SKU'];
        }
        $message1 = $pname . " Capacity Low in stock";
        $querry = "INSERT INTO notifications(SKU,Messages,_Status) VALUES('$psku','$message1','1')";
        $res = mysqli_query($con, $querry);
        $sql = "SELECT * FROM administrator WHERE ID = 1";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $recever_name = $row['Admin_Name'];
            $recever_email = $row['Email'];
        }
        $email = "mikiasmiessa@gmail.com";
        $name = "Inventory Management System";
        $subject = "Alert";
        $message = "Hi " . $recever_name . ", " . $message1;

        // $sql = "SELECT * FROM notifications";
        // $result = mysqli_query($con, $sql);
        // while ($row = mysqli_fetch_assoc($result)) {
        //     $message = $row['Messages'];
        // }

        require "vendor/autoload.php";



        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = "mikiasmiessa@gmail.com";
        $mail->Password = "wwnkjusiiunmelhz";

        $mail->setFrom($email, $name);
        $mail->addAddress($recever_email, "Inventory");

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    }


    $query = "UPDATE products SET FREQUENCY= FREQUENCY+1 WHERE SKU='$sku' ";
    $res = mysqli_query($con, $query);

    $querry = "INSERT INTO stockout_date(Stockout_Date,SKU,Quantity)VALUES('$issued_date','$sku','$productquantity')";
    $ress = mysqli_query($con, $querry);
    $usage = "Reusable";

    $sql1 = "SELECT * FROM products WHERE SKU='$sku'";
    $res1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_assoc($res1)) {
        $Usability = $row['Usability'];
    }
    if ($Usability == $usage) {
        $querry = "INSERT INTO issued_products(Quantity,Issued_Date,Issued_To,SKU)VALUES('$productquantity','$issued_date','$ISSUEDTO','$sku')";
        $ress = mysqli_query($con, $querry);
    }


    // if($use=$comp){
    //     $query="INSERT INTO reusable(SKU,Quantity)VALUES('$sku',$productquantity)";
    //     $res=mysqli_query($con,$query);

    //     $sql="UPDATE products SET Quantity= Quantity-$productquantity WHERE SKU='$sku' ";
    //     $result=mysqli_query($con,$sql);
    // }
    // else(




    // )

}
