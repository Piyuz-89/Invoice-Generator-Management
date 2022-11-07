<?php
    include 'header.php';
    include './config/connect.php';

    $sql1 = "SELECT COUNT(invoiceId) as invNo FROM customer";
    $res1 = mysqli_query($conn,$sql1);
    $inv = mysqli_fetch_assoc($res1);
    
    $sql2 = "SELECT COUNT(pid) as pNo FROM product";
    $res2 = mysqli_query($conn,$sql2);
    $pno = mysqli_fetch_assoc($res2);
    
?>

        <div class="container">
            <div class="box">
                    <div class="demo"><img src="./images/invoice.png"></div>
                    <span>
                        <p>Invoice</p>
                        <p><?php echo $inv['invNo']; ?></p>
                    </span>
                
            </div>
            <div class="box">
                <div class="demo"><img src="./images/box.png" alt=""></div>
                    <span>
                        <p>Products</p>
                        <p><?php echo $pno['pNo']; ?></p>
                    </span>
            </div>

        </div>

        

    </div>

    

    <footer>
        <div class="text-center">©Piyush Zambre</div>
    </footer>

    
</body>
</html>