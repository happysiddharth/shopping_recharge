<?php
session_start();
if (isset($_POST['fetch'])){
    $con = new mysqli('localhost','root','','shoping');
    if (!$con)die($con->connect_error);
    else{
        $email = $_SESSION['email'];
        $q = "select * from users WHERE email='$email'";
        if ($r = $con->query($q)){
            $d = $r->fetch_array();
            $d=json_encode($d);
            echo $d;
        }
    }
}