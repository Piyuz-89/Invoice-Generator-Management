<?php
    include 'header.php';
    include './config/connect.php';

    $sql1 = "SELECT * FROM product";
    $res = mysqli_query($conn,$sql1) or die("Query Unsuccessful");
?>
    <div class="heading">
        <h1>Product List</h1>
    </div>
    <br>
    <div class="table-con view-con">
        <table class="table" >
            <tr class="bg-primary">
                <th>Sr No.</th>
                <th>Pid</th>
                <th>Name</th>
                <th>Rate</th>
            </tr>
        
            <?php
                    if(mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){                   
            ?>
                <tr class="bg-success">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['pid']; ?></td>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['prate']; ?></td>
                </tr>
            <?php
                        }
                    }
            ?>
        </table>
    </div>


    </div>
</body>
</html>