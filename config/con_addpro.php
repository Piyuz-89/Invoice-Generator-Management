<?php
include './connect.php';
    if(isset($_POST['addproduct'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $prate = $_POST['prate'];

        $sql2 = "INSERT INTO product (pid,pname,prate) VALUES ('$pid','$pname','$prate')";
        $res = mysqli_query($conn,$sql2) or die("Error");

        if($res){
            header('location: ../addProduct.php');
        }
    }
?>