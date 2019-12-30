<?php
/**
 * Created by PhpStorm.
 * User: Siddharth Kaushik
 * Date: 14-Apr-19
 * Time: 8:44 AM
 */
if (isset($_POST['check'])){
    if (strcmp($_POST['check'],'login')==0){
        session_start();
        if (isset($_SESSION['email'])){
            echo '1';
        }else{
            echo '0';
        }
    }
}