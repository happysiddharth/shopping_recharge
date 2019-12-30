<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['_first_name'])&&isset($_POST['_last_name'])&&isset($_POST['_email'])&&isset($_POST['_password'])&&isset($_POST['_sec_ans'])){
        if (!empty($_POST['_first_name'])&&!empty($_POST['_last_name'])&&!empty($_POST['_email'])&&!empty($_POST['_password'])&&!empty($_POST['_sec_ans'])){
            require 'sanitize_input.php';
            require "require_first.php";
            $first_name = sanitize($_POST['_first_name']);
            $last_name = sanitize($_POST['_last_name']);
            $email = sanitize($_POST['_email']);
            $password = crypt(sanitize($_POST['_password']),"!@#$%^&*()_+9045426913+_)(*&^%$#@!");
            $sec_ques = sanitize($_POST['security']);
            $_sec_ans = sanitize($_POST['_sec_ans']);
          //  $date = new DateTime();
            $datetime = date('Y-m-d H:i:s.u');
            $address = $_POST['address'];
            $conn = new mysqli($hn,$un,$pw,"shoping");

            if (!$conn)die($conn->connect_error);
            else{
                $query = "INSERT INTO `users` (`sno`, `_first_name`, `_last_name`, `email`, `password`, `createdon`, `address`, `sec_q`, `sec_ans`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$datetime','$address', '$sec_ques', '$_sec_ans')";

                if ($conn->query($query)){
                    $conn->close();
               session_start();
                    $_SESSION['email']=$_POST['_email'];
                    $_SESSION['_first_name']=$_POST['_first_name'];
                   header("location:../index.php");
                }

            }

        }
    }
}