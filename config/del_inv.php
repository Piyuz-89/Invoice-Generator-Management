<?php
    include('connect.php');
    $invId = $_GET['id'];
    $sql1 = "DELETE FROM customer WHERE invoiceId = '$invId' ";
    $res1 = mysqli_query($conn,$sql1);

    $sql2 = "DELETE FROM bill WHERE invoiceId = '$invId' ";
    $res2 = mysqli_query($conn,$sql2);

    if($res1 and $res2){
        header("location: ../viewBill.php");
    }

?>