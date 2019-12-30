<?php
/**
 * Created by PhpStorm.
 * User: Siddharth Kaushik
 * Date: 14-Apr-19
 * Time: 12:55 PM
 */session_start();
if (isset($_POST['what'])){
    if ($_POST['what']=='phone'){
        $email=$_SESSION['email'];
        $phone=$_POST['phone'];
        $circle=$_POST['circle'];
        $operator=$_POST['operator'];
        $card_type=$_POST['card_type'];
        $card_no=$_POST['card_no'];
        $exp_date=$_POST['exp_date'];
        $cvv=$_POST['cvv'];
        $rupee=$_POST['rupee'];

        $datetime = date('Y-m-d H:i:s.u');
        $q = "INSERT INTO `recharges_phone`(`sno`, `user_who_do_email`, `rupee`, `payment_option`, `payment_mode`, `card_no`, `exp_date`, `cvv`, `date_of_recharge`, `operator`, `circle`, `number`) VALUES (NULL,'$email','$rupee','online','$card_type','$card_no','$exp_date','$cvv','$datetime','$operator','$circle','$phone')";
        $con = new mysqli('localhost','root','','shoping');
        if (!$con)die($con->connect_error);
        else{
            if ($con->query($q)){
                echo "1";
                $con->close();
            }
        }
    }elseif ($_POST['what']=='electric'){
        $email=$_SESSION['email'];
        $phone=$_POST['phone'];
        $circle=$_POST['circle'];
        $operator=$_POST['operator'];
        $card_type=$_POST['card_type'];
        $card_no=$_POST['card_no'];
        $exp_date=$_POST['exp_date'];
        $cvv=$_POST['cvv'];
        $rupee=$_POST['rupee'];

        $datetime = date('Y-m-d H:i:s.u');
        $q = "INSERT INTO `recharges_electric`(`sno`, `user_who_do_email`, `rupee`, `payment_option`, `payment_mode`, `card_no`, `exp_date`, `cvv`, `date_of_recharge`, `operator`, `circle`, `number`) VALUES (NULL,'$email','$rupee','online','$card_type','$card_no','$exp_date','$cvv','$datetime','$operator','$circle','$phone')";
        $con = new mysqli('localhost','root','','shoping');
        if (!$con)die($con->connect_error);
        else{
            if ($con->query($q)){
                echo "1";
            }
        }
    }elseif ($_POST['what']=='water'){
        $email=$_SESSION['email'];
        $phone=$_POST['phone'];
        $circle=$_POST['circle'];
        $operator=$_POST['operator'];
        $card_type=$_POST['card_type'];
        $card_no=$_POST['card_no'];
        $exp_date=$_POST['exp_date'];
        $cvv=$_POST['cvv'];
        $rupee=$_POST['rupee'];

        $datetime = date('Y-m-d H:i:s.u');
        $q = "INSERT INTO `recharges_water`(`sno`, `user_who_do_email`, `rupee`, `payment_option`, `payment_mode`, `card_no`, `exp_date`, `cvv`, `date_of_recharge`, `operator`, `circle`, `number`) VALUES (NULL,'$email','$rupee','online','$card_type','$card_no','$exp_date','$cvv','$datetime','$operator','$circle','$phone')";
        $con = new mysqli('localhost','root','','shoping');
        if (!$con)die($con->connect_error);
        else{
            if ($con->query($q)){
                echo "1";
                $con->close();
            }
        }
    }elseif($_POST['what']=='internet'){
        $email=$_SESSION['email'];
        $phone=$_POST['phone'];
        $circle=$_POST['circle'];
        $operator=$_POST['operator'];
        $card_type=$_POST['card_type'];
        $card_no=$_POST['card_no'];
        $exp_date=$_POST['exp_date'];
        $cvv=$_POST['cvv'];
        $rupee=$_POST['rupee'];

        $datetime = date('Y-m-d H:i:s.u');
        $q = "INSERT INTO `recharges_internet`(`sno`, `user_who_do_email`, `rupee`, `payment_option`, `payment_mode`, `card_no`, `exp_date`, `cvv`, `date_of_recharge`, `operator`, `circle`, `number`) VALUES (NULL,'$email','$rupee','online','$card_type','$card_no','$exp_date','$cvv','$datetime','$operator','$circle','$phone')";
        $con = new mysqli('localhost','root','','shoping');
        if (!$con)die($con->connect_error);
        else{
            if ($con->query($q)){
                echo "1";
                $con->close();
            }
        }
    }elseif ($_POST['what']=='shop'){
       $full_name=$_POST['full_name'];
       $email=$_POST['email'];
       $session_email=$_SESSION['email'];
       $add=$_POST['add'];
       $item_id=$_POST['item_id'];
        $card_type=$_POST['card_type'];
        $card_no=$_POST['card_no'];
        $exp_date=$_POST['exp_date'];
        $cvv=$_POST['cvv'];
        $rupee=$_POST['price'];
        $datetime = date('Y-m-d H:i:s.u');
        $c = new mysqli('localhost','root','','shoping');
        if ($c){
            $q = "INSERT INTO `orders`(`sno`, `email`, `full_name`, `address`, `item_id`, `card_no`, `card_type`, `exp_date`, `cvv`, `rupee`, `date_of_order`) VALUES (NULL,'$session_email','$full_name','$add','$item_id','$card_no','$card_type','$exp_date','$cvv','$rupee','$datetime')";
            if($c->query($q)){
                echo "1";
            }
        }

    }
}