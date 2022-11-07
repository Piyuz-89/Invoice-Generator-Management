<?php
    include 'header.php';
?>

        <div class="heading">
            <h1>Add Product</h1>
        </div>
        <div class="detail-con">
        <h2>Enter Product Details</h2>

            <form action="./config/con_addpro.php" method="post">    
                <div class="addPro custinfo">
                    
                    <div class="input">
                        <label for="p-id">Product Id</label>
                        <input type="text" name="pid" id="p-id" class="form-control" required>
                    </div>
                    <div class="inp-container input">
                        <label for="p-name">Product Name</label>
                        <input type="text" name="pname" id="p-name" class="form-control" required>
                    </div>
                    <div class="inp-container input">
                        <label for="p-rate">Product Rate</label>
                        <input type="number" name="prate" id="p-rate" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit" value="Add" class="btn btn-success" name="addproduct">
                    </div>

                </div>
            </form>
        </div>

    </div>
</body>
</html>