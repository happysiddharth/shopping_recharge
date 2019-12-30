<?php
/**
 * Created by PhpStorm.
 * User: Siddharth Kaushik
 * Date: 18-Mar-19
 * Time: 3:25 PM
 */

function sanitize($input=""){
    $input  = htmlspecialchars(trim($input));
    return $input;
}