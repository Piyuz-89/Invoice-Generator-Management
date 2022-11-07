<?php
include 'header.php';
include './config/connect.php';

if (isset($_POST['nxt'])) {
    $mob = $_POST['cmob'];
    $name = $_POST['cname'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y');
    $mydate = date('Y-m-d');


    $sql1 = "INSERT INTO customer (cname,mobno,date) VALUES ('$name','$mob','$mydate')";
    mysqli_query($conn,$sql1) or die("Query Unsuccessfull");

    $invId = mysqli_insert_id($conn);
    

    $sql2 = "SELECT * FROM product";
    $res = mysqli_query($conn, $sql2);
}





?>
<!-- ./config/con_addbill.php -->
<form action="./config/con_addbill.php" method="post">
    <div class="cust">
        <h2 class="text-primary">Customer Details</h2>
        <div class="cust-outer">
            <div class="cust-inner">
                <label for="name">Invoice No</label>
                <input type="text" name="invoiceno" id="" value="<?php echo $invId ?>" readonly>
            </div>
            <div class="cust-inner">
                <label for="name">Date</label>
                <input type="text" name="c_date" id="" value="<?php echo $date ?>" readonly>
            </div>
        </div>
        <div class="cust-outer">
            <div class="cust-inner">
                <label for="name">Customer Name</label>
                <input type="text" name="c_name" id="" value="<?php echo $name ?>" readonly>
            </div>
            <div class="cust-inner">
                <label for="name">Mobile No</label>
                <input type="number" name="c_mob" id="" value="<?php echo $mob ?>" readonly>
            </div>
        </div>
    </div>
    <!-- <hr> -->
    <div class="break"></div>

    <div class="cust">
        <h2 class="text-primary">Add Product</h2>
        <div class="add-pro">
            <table class="table add-pro">
                <thead>
                    <tr class="bg-danger">
                        <th id="name-th">Name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- <td><input type="text" name="p_name" id="pname" ></td> -->
                        <td><select name="p_name" id="pname" class="form-control" onchange="product(this.value)">
                                <option value="" default>Select Product</option>
                                <?php
                                // if(mysqli_num_rows($res) > 0){
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>
                                <?php
                                }
                                // }
                                ?>
                            </select>
                        </td>
                        <td><input type="number" name="p_quantity" id="pquantity" class="form-control"></td>
                        <td><input type="number" name="p_rate" id="prate" class="form-control" value="" readonly></td>
                        <td><button type="button" class="btn btn-primary" onclick="additem();">Add</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="break"></div>

    <div class="cust inv-con">
        <h2 class="text-primary">Invoice</h2>
        <div class="add-pro bg-success">
            <table id="table" class="table inv-table">
                <thead>
                    <tr class="bg-warning table-th">
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
                <tr class="bg-warning">
                    <td></td>
                    <td></td>
                    <th>TOTAL</th>
                    <td><input type="number" name="ptotal" id="ptotal" class="form-control" value="0"></td>
                    <td></td>
                </tr>
                <!-- <tr>
                        <td><input type="text" name="pname" id=""></td>
                        <td><input type="number" name="pquantity" id=""></td>
                        <td><input type="number" name="prate" id=""></td>
                        <td><input type="number" name="pamount[]" id="" value="4"> </td>
                        <td><button type="button" onclick="remove(this);" id="del">❌</button></td>
                    </tr> -->
            </table>
        </div>
        <center>
            <input type="submit" value="Save" class="btn btn-success" name="save">
        </center>
    </div>






    

</form>


</div>

<script>

    function product(data){
        if (data != "") {
            const ajaxreq = new XMLHttpRequest();
            ajaxreq.open('GET','./getRate.php?pname='+data,'TRUE');
            ajaxreq.send();
            ajaxreq.onreadystatechange = function(){
                if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                    document.getElementById('prate').value = ajaxreq.responseText;
                }
            }
        }
        

    }                             

    function additem() {

        var pname = document.getElementById("pname").value;
        var pquan = document.getElementById("pquantity").value;
        var prate = document.getElementById("prate").value;
        var pamount = pquan * prate;
        var ptotal = document.getElementById("ptotal").value;

        // var sum = Number(pamount) + Number(ptotal);

        if (pname == "" || pquan == "" || prate == "") {
            alert("Enter all details");
            return;
        }
        var html = "<tr>";
        html += "<td><input type='text' name='pname[]' class='form-control' value= " + pname + "></td>";
        html += "<td><input type='number' name='pquantity[]' class='form-control' value= " + pquan + "></td>";
        html += "<td><input type='number' name='prate[]' class='form-control' value= " + prate + "></td>";
        html += "<td><input type='number' name='pamount[]' class='form-control' value=" + pamount + "></td>";
        html += "<td><button type='button' onclick='remove(this);' class='btn btn-danger' id='del'>✖</button></td>"
        html += "</tr>";

        document.getElementById("tbody").insertRow().innerHTML = html;

        sum();


    }

    function remove(x) {
        var btn = document.getElementById("del");

        x.parentNode.parentNode.remove();
        // btn.closest('tr').remove();

        console.log("Deleted");

        sum();

    }

    function sum() {
        var sum = 0;

        var arr = document.getElementsByName('pamount[]');
        // console.log(arr);
        // console.log(arr.length);

        for (let index = 0; index < arr.length; index++) {
            sum += parseInt(arr[index].value);
        }

        // console.log(sum);
        document.getElementById("ptotal").value = sum;
    }

    






</script>


</body>

</html>