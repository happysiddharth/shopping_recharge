<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/navigation.css">

    <title>Orders</title>
</head>
<body>
<?php
require_once 'template/navigation.php'
?>
<div id="orders"style="height: 85vh;overflow-y: scroll">
    <?php
    $conn = new mysqli('localhost','root','','shoping');
    if (!$conn)die($conn->connect_error);
    else{
        session_start();
        $email=$_SESSION['email'];
        $q="select * from orders WHERE email='$email' ";
        if ($r=$conn->query($q)){
            while ($data=$r->fetch_assoc()){
                $d= $data['item_id'];
                $qq="select * from products WHERE sno='$d'";
                if ($re=$conn->query($qq)){

                    while ($daa = $re->fetch_assoc()){
                        ?>
                        <div class="items" style="box-sizing: border-box;box-shadow: -1px 7px 31px -4px rgba(0,0,0,1);;width: 80%;margin-left: 10%;
margin-top: 10px;padding: 10px;position:relative;">
                            <h3 style="text-align: center">Online shoping</h3>
                            <div>
                                <p>Order id:<?php echo $data['sno']?></p>
                                <p>Date:<?php echo $data['date_of_order']?></p>
                                <p>Address:<?php echo $data['address']?></p>
                                <p>Payment Method:<?php echo $data['payment_mode']?></p>
                            </div>
                            <div style="position:relative;">
                                <img src="data:image;base64,<?php echo $daa['product_image'];?> " style="position: absolute;right: 10px;top: -100px;height: 100px;width: 100px;">
                                <p>Amount :<?php echo $data['rupee']?></p>
                            </div>
                        </div>
                        <?php
                    }
                    $re->close();

                }else{
                    echo "error";
                }
            }
        }else{
            echo "first error";
        }

        $q = "select * from recharges_phone WHERE user_who_do_email='$email'";
        if ($r = $conn->query($q)){
            $rows = $r->num_rows;
            if ($rows>0){
                while ($data = $r->fetch_assoc()){
                    ?>
                    <div class="items" style="position: relative;box-sizing: border-box;box-shadow: -1px 7px 31px -4px rgba(0,0,0,1);;width: 80%;margin-left: 10%;
margin-top: 10px;padding: 10px;">
                        <h3 style="text-align: center">Phone Recharge</h3>
                        <div>
                            <p>Order id:<?php echo $data['sno']?></p>
                            <p>Date:<?php echo $data['date_of_recharge']?></p>
                        </div>
                        <div style="position:relative;">
                            <p>Phone :<?php echo $data['number']?></p>
                            <p>operator :<?php echo $data['operator']?></p>
                            <p>Amount :<?php echo $data['rupee']?></p>
                            <p>Payment Method:<?php echo $data['payment_mode']?></p>
                            <img src="./images/a.png" style="position: absolute;right: 10px;top: -100px;height: 100px;width: 100px;">


                        </div>
                    </div>
    <?php
                }
                $r->close();
            }else{
                echo "rows less";
            }
        }
        $q = "select * from recharges_internet WHERE user_who_do_email='$email'";
        if ($r = $conn->query($q)){
            $rows = $r->num_rows;
            if ($rows>0){
                while ($data = $r->fetch_assoc()){
                    ?>
                    <div class="items" style="box-sizing: border-box;box-shadow: -1px 7px 31px -4px rgba(0,0,0,1);;width: 80%;margin-left: 10%;
margin-top: 10px;padding: 10px;">
                        <h3 style="text-align: center">Phone Internet</h3>
                        <div>
                            <p>Order id:<?php echo $data['sno']?></p>
                            <p>Date:<?php echo $data['date_of_recharge']?></p>
                        </div>
                        <div>
                            <p>Phone :<?php echo $data['number']?></p>
                            <p>operator :<?php echo $data['operator']?></p>
                            <p>Amount :<?php echo $data['rupee']?></p>
                            <p>Payment Method:<?php echo $data['payment_mode']?></p>


                        </div>
                    </div>
                    <?php
                }
                $r->close();
            }else{

            }
        }

        $q = "select * from recharges_water WHERE user_who_do_email='$email'";
        if ($r = $conn->query($q)){
            $rows = $r->num_rows;
            if ($rows>0){
                while ($data = $r->fetch_assoc()){
                    ?>
                    <div class="items" style="box-sizing: border-box;box-shadow: -1px 7px 31px -4px rgba(0,0,0,1);;width: 80%;margin-left: 10%;
margin-top: 10px;padding: 10px;">
                        <h3 style="text-align: center"> Water</h3>
                        <div>
                            <p>Order id:<?php echo $data['sno']?></p>
                            <p>Date:<?php echo $data['date_of_recharge']?></p>
                        </div>
                        <div>
                            <p>Phone :<?php echo $data['number']?></p>
                            <p>operator :<?php echo $data['operator']?></p>
                            <p>Amount :<?php echo $data['rupee']?></p>
                            <p>Payment Method:<?php echo $data['payment_mode']?></p>


                        </div>
                    </div>
                    <?php
                }
                $r->close();
            }else{
                echo "rows less";
            }
        }

        $q = "select * from recharges_electric WHERE user_who_do_email='$email'";
        if ($r = $conn->query($q)){
            $rows = $r->num_rows;
            if ($rows>0){
                while ($data = $r->fetch_assoc()){
                    ?>
                    <div class="items" style="box-sizing: border-box;box-shadow: -1px 7px 31px -4px rgba(0,0,0,1);;width: 80%;margin-left: 10%;
margin-top: 10px;padding: 10px;">
                        <h3 style="text-align: center">Electric</h3>
                        <div>
                            <p>Order id:<?php echo $data['sno']?></p>
                            <p>Date:<?php echo $data['date_of_recharge']?></p>
                        </div>
                        <div>
                            <p>Phone :<?php echo $data['number']?></p>
                            <p>operator :<?php echo $data['operator']?></p>
                            <p>Amount :<?php echo $data['rupee']?></p>
                            <p>Payment Method:<?php echo $data['payment_mode']?></p>


                        </div>
                    </div>
                    <?php
                }
                $r->close();
            }else{
                echo "rows less";
            }
        }

    }
    $conn->close();
    ?>

</div>

</body>
</html>