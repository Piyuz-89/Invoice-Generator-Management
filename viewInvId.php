<?php
    include 'header.php';
    include './config/connect.php';
    $invId = $_GET['id'];

    $sql1 = "SELECT * FROM customer WHERE invoiceId ='$invId' ";
    $res1 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($res1);

    $fdate = date('d-m-Y',strtotime($row1['date']));   
?>

        <div class="cust">
            <h2>Customer Details</h2>
            <div class="cust-outer">
                <div class="cust-inner">
                    <label for="name">Invoice No</label>
                    <input type="text" name="invoiceno" id="" value="<?php echo $row1['invoiceId']?>" readonly>
                </div>
                <div class="cust-inner">
                    <label for="name">Date</label>
                    <input type="text" name="c_date" id="" value="<?php echo $fdate?>" readonly>
                </div>    
            </div>
            <div class="cust-outer">
                <div class="cust-inner">
                    <label for="name">Customer Name</label>
                    <input type="text" name="c_name" id="" value="<?php echo $row1['cname']?>" readonly>
                </div>
                <div class="cust-inner">
                    <label for="name">Mobile No</label>
                    <input type="number" name="c_mob" id="" value="<?php echo $row1['mobno']?>" readonly>
                </div>    
            </div>          
        </div>
        <hr>
        <div class="view-bill-table">
            <table class="table">
                <thead>
                    <tr class="bg-danger">
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <?php
                    $sql2 = "SELECT * FROM bill WHERE invoiceId = '$invId' ";
                    $res2 = mysqli_query($conn,$sql2);
                    $sr = 1;
                    while($row2 = mysqli_fetch_assoc($res2)){
                        $sr
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $sr++?></td>
                        <td><?php echo $row2['pname']?></td>
                        <td><?php echo $row2['pquantity']?></td>
                        <td><?php echo $row2['prate']?></td>
                        <td><?php echo $row2['pamount']?></td>
                    </tr>
                </tbody>
                <?php
                    }
                    $sql3 = "SELECT SUM(pamount) as total FROM bill WHERE invoiceId ='$invId' ";
                    $res3 = mysqli_query($conn,$sql3);
                    $row3 = mysqli_fetch_assoc($res3);
                ?>
                <tr class="bg-warning">
                    <th colspan="4">Total</th>
                    <td><?php echo $row3['total']?></td>
                </tr>
                
            </table>
        </div>







    </div>
</body>
</html>