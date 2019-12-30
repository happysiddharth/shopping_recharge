<?php
error_reporting(0);
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="css/navigation.css" type="text/css" rel="stylesheet">
    <link href="css/more_products.css" type="text/css" rel="stylesheet">
    <style>
        body{
            margin:0;
            padding:0 0 0 0;
        }
    </style>
    <script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="./js/sweetalert.js"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded',function (e) {
            function create() {
                if(1) {


                    let a = document.createElement('div');
                    a.style.cssText = "position:fixed;width:100%;height:100vh;background:rgba(6, 6, 6,.5);top:0;left:0;z-index:52";

                    //closing button

                    let close = document.createElement('span');
                    close.innerText = 'x';
                    close.style.cssText = "position:absolute;" +
                        "right:5px;" +
                        "font-weight:bolder;" +
                        "cursor:pointer;color:red;" +
                        "font-size:20px;" +
                        "";

                    let div = document.createElement('div');
                    div.style.cssText = "position:relative;height:250px;" +
                        "width:50vw;margin-left:25vw;background:white;margin-top:25vh;-webkit-box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);" +
                        "         -moz-box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);" +
                        "                box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);  transform: scale(1);" +
                        "                    -webkit-animation-name: animatezoom;" +
                        "                -moz-animation-name: animatezoom;" +
                        "                -o-animation-name: animatezoom;" +
                        "                animation-name: animatezoom;" +
                        "                animation-duration: 0.3s;" +
                        "                animation-iteration-count: 1;" +
                        "                -webkit-transition: transform linear 0.3s;" +
                        "                -moz-transition: transform linear 0.3s ;" +
                        "                -ms-transition: transform linear 0.3s ;" +
                        "                -o-transition: transform linear 0.3s ;" +
                        "                transition: transform linear 0.3s ;";

                    close.onclick = function () {
                        console.log(this.parentNode.parentNode);
                        document.body.removeChild(this.parentNode.parentNode);
                    }

                    let h2 = document.createElement('h2');
                    h2.innerHTML = "You are not login";
                    h2.style.cssText = "width:100%;text-align:center";

                    let p = document.createElement('input');
                    p.setAttribute('type', 'button');
                    p.setAttribute('onclick', 'window.location.href=\'./login\'');
                    p.setAttribute('value', 'LOGIN');
                    p.style.cssText = "box-shadow: -1px 7px 19px -4px rgba(0,0,0,1);background :#54F51C;position:relative;height:50px;width:200px;margin-left:35%;border:none;margin-top:5%;cursor:pointer;border:none;outline:none";

                    let r = document.createElement('input');
                    r.setAttribute('type', 'button');
                    r.setAttribute('onclick', 'window.location.href=\'./signup\'');

                    r.setAttribute('value', 'CREATE NEW ACCOUNT');
                    r.style.cssText = "box-shadow: -1px 7px 19px -4px rgba(0,0,0,1);background:#14A3CD;position:relative;height:50px;width:200px;margin-left:35%;border:none;margin-top:8%;cursor:pointer;border:none;outline:none";


                    div.appendChild(close);
                    div.appendChild(h2);
                    div.appendChild(p);
                    div.appendChild(r);

                    a.appendChild(div);


                    document.body.appendChild(a);
                }
            }
            function cc_shop(name,email,add,id,price) {
                let a = document.createElement('div');
                a.style.cssText="position:fixed;width:100%;height:100vh;background:rgba(6, 6, 6,.3);top:0;left:0;z-index:5";

                //closing button

                let close = document.createElement('span');
                close.innerText='x';
                close.style.cssText="position:absolute;right:5px;font-weight:bolder;cursor:pointer;color:red;font-size:20px;";

                close.onclick=function () {
                    console.log(this.parentNode);
                    document.body.removeChild(this.parentNode.parentNode);
                    document.getElementById('_load').style.display="none";

                }
                let q = document.createElement('form');
                q.setAttribute('id','reset_form');
                //styling form

                q.style.cssText="position:relative;height:250px;" +
                    "width:50vw;margin-left:25vw;background:white;margin-top:25vh;-webkit-box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);" +
                    "         -moz-box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);" +
                    "                box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);  transform: scale(1);" +
                    "                    -webkit-animation-name: animatezoom;" +
                    "                -moz-animation-name: animatezoom;" +
                    "                -o-animation-name: animatezoom;" +
                    "                animation-name: animatezoom;" +
                    "                animation-duration: 0.3s;" +
                    "                animation-iteration-count: 1;" +
                    "                -webkit-transition: transform linear 0.3s;" +
                    "                -moz-transition: transform linear 0.3s ;" +
                    "                -ms-transition: transform linear 0.3s ;" +
                    "                -o-transition: transform linear 0.3s ;" +
                    "                transition: transform linear 0.3s ;";
                let w = document.createElement('fieldset');
                w.style.cssText="border:none";


                //legend

                let r = document.createElement('legend');
                r.innerText="Payment";

                r.style.cssText="border:none;text-align:center;";

                let opt = document.createElement('input')
                opt.setAttribute('type','radio');
                opt.setAttribute('name','method');
                opt.setAttribute('checked','true');
                opt.setAttribute('value','Creadit Card');

                let lable= document.createElement('label');
                lable.innerHTML="Creadit Card";
                lable.style.cssText="padding:10px;";

                let lable1= document.createElement('label');
                lable1.innerHTML="Debit Card";

                let opt1 = document.createElement('input')
                opt1.setAttribute('type','radio');
                opt1.setAttribute('name','method');
                opt1.setAttribute('value','Debit Card');
                //creating input for email address

                let e = document.createElement('input');
                e.setAttribute('type','text');
                e.setAttribute('maxlenght','12');
                e.setAttribute('name','card_no');
                e.setAttribute('placeholder','CARD NUMBER');


                let dd = document.createElement('input');
                dd.setAttribute('type','date');
                dd.setAttribute('maxlenght','12');
                dd.setAttribute('name','exp_date');
                dd.setAttribute('placeholder','EXPIRE DATE');
                dd.style.cssText="width:100%;margin-top:10px;height:30px";


                let ee = document.createElement('input');
                ee.setAttribute('type','text');

                ee.setAttribute('name','_cvv');
                ee.setAttribute('placeholder','CVV');
                ee.style.cssText="width:100%;margin-top:10px;height:30px";


                let sub = document.createElement('input');
                sub.setAttribute('type','button');
                sub.setAttribute('value','PROCEED');
                sub.style.cssText="width:100%;margin-top:10px;height:30px;border:none;background:#00D1FF;cursor:pointer";


                sub.onclick=function () {
                    $.ajax({
                        method:'post',
                        data:{
                            'what':'shop',
                            'full_name':name,
                            'email':email,
                            'add':add,
                            'item_id':id,
                            'card_type':"creadit",
                            'card_no':e.value,
                            'exp_date':dd.value,
                            'cvv':ee.value,
                            'price':price

                        },
                        url:'php/save_order.php',
                        beforeSend:function () {

                        },success:function (v) {
                            console.log(v);
                            if(v==1){
                                swal({
                                    title: "order booked",
                                    text: "You clicked the button!",
                                    icon: "success",
                                });
                                close.click();
                            }

                        },complete:function () {


                        }
                    })
                }
                //setting default value to input entered previously

                // e.value = document.querySelector("input[name='_email']").value;

                e.style.cssText="width:98%;height:25px;border:1xp solid black;padding-left:10px;margin-top:15px;transition:all linear 0.5s";

                q.appendChild(close);

                //apending legend to form

                q.appendChild(r);

                //appending input to filedset



                w.appendChild(lable);
                w.appendChild(opt);
                w.appendChild(lable1);
                w.appendChild(opt1);
                w.appendChild(e);
                w.appendChild(dd);
                w.appendChild(ee);
                w.appendChild(sub);
                q.appendChild(w);

                //appending form to main frame

                a.appendChild(q);


                document.body.appendChild(a);
            }
            let a= document.querySelectorAll('._buy input[type="button"]');
            for(let i=0;i<a.length;i++){
                a[i].addEventListener('click',function (e) {
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])){
                    ?>
                    //cc(no,circle,operator,rupee,'phone');
                    <?php
                    }else{
                    ?>
                    create();
                    <?php
                    }

                    ?>
                })
            }
            let m = document.getElementsByClassName('buy_btn');
            for (let i=0;i<m.length;i++){
                m[i].addEventListener('click',function (e) {
                    let data = this.dataset.id;
                    let price = this.dataset.price;
                    console.log(price);

                    $.ajax({
                        method:'post',
                        url:'php/fetch.php',
                        data:{
                            'fetch':'true'
                        },success:function (v) {
                            v= JSON.parse(v);
                            console.log(v._first_name);
                            let a = document.createElement('div');
                            a.style.cssText="position:fixed;width:100%;height:100vh;background:rgba(6, 6, 6,.3);top:0;left:0;z-index:5";

                            //closing button

                            let close = document.createElement('span');
                            close.innerText='x';
                            close.style.cssText="position:absolute;right:5px;font-weight:bolder;cursor:pointer;color:red;font-size:20px;";

                            close.onclick=function () {
                                console.log(this.parentNode);
                                document.body.removeChild(this.parentNode.parentNode);
                                document.getElementById('_load').style.display="none";

                            }
                            let q = document.createElement('form');
                            q.setAttribute('id','reset_form');
                            //styling form

                            q.style.cssText="position:relative;height:280px;" +
                                "width:50vw;margin-left:25vw;background:white;margin-top:25vh;-webkit-box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);" +
                                "         -moz-box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);" +
                                "                box-shadow: -1px 16px 29px -6px rgba(0,0,0,0.75);  transform: scale(1);" +
                                "                    -webkit-animation-name: animatezoom;" +
                                "                -moz-animation-name: animatezoom;" +
                                "                -o-animation-name: animatezoom;" +
                                "                animation-name: animatezoom;" +
                                "                animation-duration: 0.3s;" +
                                "                animation-iteration-count: 1;" +
                                "                -webkit-transition: transform linear 0.3s;" +
                                "                -moz-transition: transform linear 0.3s ;" +
                                "                -ms-transition: transform linear 0.3s ;" +
                                "                -o-transition: transform linear 0.3s ;" +
                                "                transition: transform linear 0.3s ;";
                            let w = document.createElement('fieldset');
                            w.style.cssText="border:none";

                            let leg = document.createElement('legend');
                            leg.innerHTML="Fill details";
                            leg.style.cssText="font-weight:bolder;text-align:center";
                            let input = document.createElement('input');
                            input.setAttribute('type','name');
                            input.setAttribute('name','name');
                            input.setAttribute('placeholder','FULL NAME');
                            input.setAttribute('value',v._first_name+v._last_name);
                            input.style.cssText="height:50px;width:95%;border:1px solid black;margin-top:5px;margin-left:2%;outline:1px;outline-color:black";

                            let email = document.createElement('input');
                            email.setAttribute('type','email');
                            email.setAttribute('name','email');
                            email.setAttribute('placeholder','Email');
                            email.setAttribute('readonly','true');
                            email.setAttribute('value',v.email);
                            email.style.cssText="background:gray;box-sizing:border-box;padding:10px;margin-top:5px;height:50px;width:95%;border:1px solid black;margin-left:2%;outline:1px;outline-color:black";

                            let add = document.createElement('input');
                            add.setAttribute('type','text');
                            add.setAttribute('name','add');
                            add.setAttribute('placeholder','ADDRESS');
                            add.setAttribute('value',v.address);
                            add.style.cssText="margin-top:5px;height:50px;width:95%;border:1px solid black;margin-left:2%;";

                            let sb = document.createElement('input');
                            sb.setAttribute('type','button');
                            sb.setAttribute('name','sub');
                            sb.setAttribute('value','PLACE ORDER');
                            sb.style.cssText="height:50px;width:95%;border:none;margin-left:2%;margin-top:10px;";

                            sb.onclick=function () {
                                cc_shop(input.value,email.value,add.value,data,price);
                                close.click();
                            }

                            q.appendChild(close);
                            w.appendChild(leg);
                            w.appendChild(input);
                            w.appendChild(email);
                            w.appendChild(add);
                            w.appendChild(sb);

                            q.appendChild(w);


                            a.appendChild(q);

                            document.body.appendChild(a);





                        }
                    })



                })
            }
        })

    </script>
</head>
<body>
<?php
require_once 'template/navigation.php';
?>
<div id="container">
    <div id="_shoping" style="    ">


        <h1 style="">
            Welcome to online shoping
        </h1>

        <div id="_products" style="position: relative;width: 100%;">
            <div id="cat_">
                <h3>Mens>Tshirts</h3>

                <div id="_i"  style="width: 100%;position: relative;margin: 50px;margin-top:10px;left: 0px;transition:all linear 0.3s;">
                    <?php
                    $con = new mysqli("localhost","root","","shoping");
                    if(!$con)die($con->connect_error);
                    else{
                        if($_GET['c']=='m'){
                            $c=$_GET['c'];
                        }else{
                            $c=$_GET['c'];

                        }
                        $q="select * from products WHERE  for_w='$c'";

                        if($r = $con->query($q)){
                            while($data = $r->fetch_assoc()){
                                ?>
                                <div class="_item" style=" ">
                                    <div class="product_img">
                                        <img src="data:image;base64,<?php echo $data['product_image'];?>" >
                                    </div>
                                    <div class="_buy">
                                        <p>Product name: Tshits</p>
                                        <p>Product Description: <?php echo $data['product_name']?></p>
                                        <p>In stock: <?php echo $data['in_stock']?></p>
                                        <p>Price: <?php echo $data['price']?></p>
                                        <input type="button" class="buy_btn" value="BUY" data-id="<?php echo $data['sno']; ?>" data-price="<?php echo $data['price']; ?>" >
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>







                </div>

            </div>

</div>
</body>
</html>