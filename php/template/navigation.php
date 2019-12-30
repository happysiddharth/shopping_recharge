<?php
error_reporting(0);
?>
<div id="contact">
    <ul>
        <marquee> <li>Contact us:9045426913</li></marquee>
    </ul>
</div>
<div id="navigation">
    <nav>
        <span onclick="window.location.href='./index.php'" id="title" style="fcolor: #005900;
font-size: 30px;
text-shadow: #FFFCA8 2px 2px 0px, #9C9C9C 4px 4px 0px;
color: #005900;
;;font-weight: bolder;;margin-left: 50px;position: absolute;">
            <!--<img src="images/kisspng-online-shopping-shopping-cart-logo-icon-shopping-cart-smiley-face-micro-logo-5a814142e13e64.7669827715184202909226.jpg" style="height: 50px;width: 50px;">
       -->
        Quick Facilities
        </span>

        <ul id="_main">
            <li  id="_mens"
                    <?php
                $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                        "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                    $_SERVER['REQUEST_URI'];
                $arr = explode("/",$link);

                $p =  $arr[sizeof($arr)-1];
                if (strcasecmp($p,'signup')==0||strcasecmp($p,'login')==0){
                    ?>
                 onclick="window.location.href='./index.php'">


            HOME

                    <?php
                }else{
                    ?>
                 onclick="window.scrollBy(0,screen.height)">
                     SHOPING
            <?php
                }
                ?>


            <?php
            session_start();
            if (!isset($_SESSION['email'])){
                ?>
                <li onclick="window.location.href='./login'"
                    <?php
                    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                            "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                        $_SERVER['REQUEST_URI'];
                    $arr = explode("/",$link);

                    $p =  $arr[sizeof($arr)-1];
                    if (strcasecmp($p,'login')==0){
                        ?>
                        style="background: #0DEBE4;
          -webkit-box-shadow: 10px 10px 17px -5px rgba(0,0,0,0.75);
          -moz-box-shadow: 10px 10px 17px -5px rgba(0,0,0,0.75);
          box-shadow: 10px 10px 17px -5px rgba(0,0,0,0.75);font-weight: bolder";
                        <?php
                    }
                    ?>>
                    LOGIN
                </li>
                <li onclick="window.location.href='./signup'"
                    <?php
                    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                            "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
                        $_SERVER['REQUEST_URI'];
                    $arr = explode("/",$link);

                    $p =  $arr[sizeof($arr)-1];
                    if (strcasecmp($p,'signup')==0){
                        ?>
                        style="background: cyan;
          -webkit-box-shadow: 10px 10px 17px -5px rgba(0,0,0,0.75);
          -moz-box-shadow: 10px 10px 17px -5px rgba(0,0,0,0.75);
          box-shadow: 10px 10px 17px -5px rgba(0,0,0,0.75);
          font-weight: bolder;
          "
                        <?php
                    }
                    ?>
                >
                    SIGNUP
                </li>
            <?php
            }else{
                ?>
                <li id="_users" style="font-weight: bolder;box-sizing: border-box;;position: relative;;margin-left:50px;margin-top:15px;width: 100px;float:left;">
                   <?php                    echo   strtoupper($_SESSION['_first_name']);
                    ?>
                    <ul id="_subl" style="position:absolute;">
                        <li onclick="window.location.href='./orders'">
                            ORDERS
                        </li>
                        <li style="margin-top: -8px"  onclick="window.location.href='./index.php?v=1'">
                            LOG OUT
                        </li>
                       
                    </ul>
                </li>
            <?php
            }
            ?>

        </ul>


    </nav>
</div>