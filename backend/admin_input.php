<?php
include 'conn.php';
$sql = "SELECT * FROM administrator WHERE ID = 1";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['Admin_Name'];
    $email = $row['Email'];
}
$form = '
 <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" value="' . $name . '" required>
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" value="' . $email . '" required>
                            <div class="mt-3 text-center">
                                <input type="submit" value="Save" class="btn btn-info">
                            </div>
';
echo $form;

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name1 = $_POST['name'];
    $email1 = $_POST['email'];

    $sql = "UPDATE administrator SET Admin_Name='$name1', Email='$email1' WHERE ID = 1";
    $res = mysqli_query($con, $sql);
}
