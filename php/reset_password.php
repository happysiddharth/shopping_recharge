<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
  if (isset($_POST['reset'])&&isset($_POST['email'])&&!isset($_POST['sec_que'])){
      require_once 'sanitize_input.php';
      $email = sanitize($_POST['email']);
      $what_to_do = sanitize($_POST['reset']);
      require "require_first.php";
      $conn = new mysqli($hn,$un,$pw,"shoping");

      if (!$conn)die($conn->connect_error);
      else{
          $q = "select sno from users where email='$email' ";
          if ($result = $conn->query($q)){
              $num_rows = $result->num_rows;
              if ($num_rows>0){
                  echo "1";//result found
                  session_start();
                  $_SESSION['reset_email']="$email";
              }else{
                  echo "2";//no result available
              }
              $result->close();
              $conn->close();
          }else{
            //  echo "2";
          }
      }

  }elseif (isset($_POST['reset'])&&isset($_POST['email'])&&isset($_POST['sec_que'])&&isset($_POST['sec_ans'])){
      require_once 'sanitize_input.php';
      session_start();
      $email = $_SESSION['reset_email'];
      $what_to_do = sanitize($_POST['reset']);
      $sec_que = sanitize($_POST['sec_que']);
      $sec_ans = sanitize($_POST['sec_ans']);
      require "require_first.php";
      $conn = new mysqli($hn,$un,$pw,"shoping");
      if (!$conn)die("connection error".$conn->connect_error);
      else{
          $q = "select sec_q ,sec_ans from users WHERE email='$email'";
          if ($result = $conn->query($q)){
              $data = $result->fetch_array();
              $result->close();
              if ($data[0]==$sec_que){
                  if (strcasecmp($data[1],$sec_ans)==0){
                      $pas = rand(100000,9999999);
                      $crypt_pas = crypt($pas,"!@#$%^&*()_+9045426913+_)(*&^%$#@!");

                      $q2 = "update users set password='$crypt_pas' where email='$email'";
                      if($conn->query($q2)){
                          echo "resetdone_".$pas;
                      }
                  }
              }
          }else{
              echo "error";
          }
      }
  }
}else{
    echo "request is not post";
}