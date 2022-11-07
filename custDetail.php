<?php
    include'header.php';   
?>

        <div class="detail-con">
            <h2>Customer Details</h2>

            <form action="./invoice.php" method="post">

                <div class="custinfo">
                    <div class="input">                   
                            <label for="cname">Name</label>
                            <input type="text" name="cname" id="cname" class="form-control" required>                   
                    </div>
                    <div class="input">                   
                            <label for="cname">Mob No</label>
                            <input type="number" name="cmob" id="mobno" class="form-control" required>
                    </div>

                    <input type="submit" value="Next" id="nxt-btn" name="nxt" class="btn btn-success" required>
                </div>
            </form>
        </div>

    </div>

    <footer>
        <div>Hello</div>
    </footer>


</body>
</html>