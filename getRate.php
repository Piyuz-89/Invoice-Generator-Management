<?php
    include './config/connect.php';
    $pname = $_GET['pname'];
    // echo ($pname);

    $sql = "SELECT prate FROM product WHERE pname = '$pname' ";
    $res = mysqli_query($conn,$sql) or die("Query Unsuccessful");

    $row = mysqli_fetch_assoc($res);
    echo $row['prate'];
?>