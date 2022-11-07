<?php
    include('./connect.php');

    if(isset($_POST['save'])){
        // echo $mob;
        $pname = $_POST['pname'];
        $pquantity = $_POST['pquantity'];
        $prate = $_POST['prate'];
        $pamount = $_POST['pamount'];
        $invId = $_POST['invoiceno'];
        $amt = $_POST['ptotal'];

        for ($a =0; $a < count($pname); $a++){
            $sql2 = "INSERT INTO bill (invoiceId,pname,pquantity,prate,pamount) VALUES ('$invId','$pname[$a]','$pquantity[$a]','$prate[$a]','$pamount[$a]')";
            $res = mysqli_query($conn,$sql2);

            if(!$res){
                die("Query Unsuccessfull");
            }
        }
        $sql3 = "UPDATE  customer SET total = $amt WHERE  invoiceId = $invId";
        mysqli_query($conn,$sql3);


        header("location: ../index.php");
    }
?>