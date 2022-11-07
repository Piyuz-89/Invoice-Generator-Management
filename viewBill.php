<?php
    include 'header.php';
    include './config/connect.php';

    $sql1 = "SELECT * FROM customer";
    $res = mysqli_query($conn,$sql1) or die("Query Unsuccessful");
?>

    <div class="view-con">

        <div class="heading text-center">
            <h1>Invoice List</h1>
        </div>
            <div>
                <table class="table">
                    <tr class="bg-danger">
                        <th>Inv Id</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        if(mysqli_num_rows($res) > 0){
                            while($row = mysqli_fetch_assoc($res)){                   
                    ?>
                    <tr class="bg-success">
                        <td><?php echo $row['invoiceId']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo $row['mobno']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td>
                            <a href="./viewInvId.php?id=<?php echo $row['invoiceId']; ?>"><button type="button" class="btn btn-primary btn-sm">View</button></a>
                            <a href="./config/del_inv.php?id=<?php echo $row['invoiceId']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
    </div>







    </div>
</body>
</html>