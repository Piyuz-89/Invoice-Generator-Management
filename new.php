<?php
include './config/connect.php';
    echo $id = $_GET['id'];
    $sql1 = "SELECT * FROM customer WHERE  invoiceId= $id ";
    $res1 = mysqli_query($conn,$sql1);
    $sql1 = "SELECT * FROM customer WHERE invoiceId= $id ";
    $res1 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($res1);
    // echo $row['cname'];

    while($ro = mysqli_fetch_assoc($res1)){
?>

        <div><?php echo $ro['pname'];?></div>

<?php
    }
?>