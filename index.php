<?php
error_reporting(0);
if (isset($_GET['v'])){
    if($_GET['v']==1){
        session_start();
        session_destroy();
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="css/index.css">
    <link type="text/css" rel="stylesheet" href="css/navigation.css">
    <script src="js/sweetalert.js"></script>
    <script
            src="js/jquery-1.11.3.min.js"
           ></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded',function () {

            function cc( no, circle, operator,rupee,task) {
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

                  if(opt.checkbox){
                      var typePM = opt.value;
                  }else{
                      var typePM = opt1.value;
                  }
                    console.log(typePM);
                    $.ajax({
                        method:'post',
                        data:{
                            'what':task,
                            'phone':no,
                            'circle':circle,
                            'operator':operator,
                            'rupee':rupee,
                            'card_type':typePM,
                            'card_no':e.value,
                            'exp_date':dd.value,
                            'cvv':ee.value

                        },
                        url:'php/save_order.php',
                        beforeSend:function () {
                            document.getElementById('_load').style.display='block';
                            console.log(task);
                        },success:function (v) {
                            console.log(v);
                            if(v==1){
                                swal({
                                    title: "Recharge Successfull",
                                    text: "You clicked the button!",
                                    icon: "success",
                                });
                                close.click();
                            }

                        },complete:function () {
                            document.getElementById('recharge_').reset();
                            document.getElementById('_load').style.display="none";


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
            try {
                if(document.getElementById('phone_number')){
                    document.getElementById('recharge_btn').addEventListener('click',function (e) {
                     //   e.preventDefault();
                        var no = document.getElementById('phone_number').value;
                        var circle = document.getElementById('circle').value;
                        var operator = document.getElementById('operator').value;
                        var rupee = document.getElementById('rupee').value;
                        var flag=0;
                        if (isNaN(no)){
                            alert("Please Enter correct no");
                            flag=1;
                        }
                        if (circle==0){
                            alert("Please select circle");
                            flag=1;
                        }
                        if (operator==0){
                            alert("please select operator");
                            flag=1;
                        }
                        if (flag==0){

                        }
                        <?php
                            session_start();
                        if (isset($_SESSION['email'])){
                        ?>
                        document.getElementById('_load').style.display='block';
                        if (no!='' &&circle!=''&&operator!=''&&rupee!='') {
                            cc(no,circle,operator,rupee,'phone');

                        }else{
                            document.getElementById('_load').style.display='none';

                        }
                        <?php
                        }else{
                        ?>
                        create();
                        <?php
                        }

                        ?>

                      //  console.log(localStorage.getItem('isLogin'));


                    })
                }

            }finally {
                console.log("error");
            }

            var glo;
            try {
                document.getElementById('electric').onclick=function () {
                     glo=document.getElementById('_r_f');

                  let l = document.createElement('legend');
                  l.innerText="Pay electric bill";

                    let x = document.createElement('input');
                    x.setAttribute('type','text');
                    x.setAttribute('required','true');
                    x.setAttribute('name','_electric_no');
                    x.setAttribute('placeholder','ACCOUNT NO');

                    let s = document.createElement('select');

                    let option1 = document.createElement('option');
                    option1.setAttribute('value','DELHI');
                    option1.innerHTML="DELHI";

                    let option2 = document.createElement('option');
                    option2.setAttribute('value','UPWEST');
                    option2.innerHTML="UP WEST";

                    let option3 = document.createElement('option');
                    option3.setAttribute('value','upeast');
                    option3.innerHTML="UP EAST";


                    let option4 = document.createElement('option');
                    option4.setAttribute('value','rajisthan');
                    option4.innerHTML="RAJISTHAN";

                    let ss = document.createElement('select');
                    ss.setAttribute('id','operator');

                    let optionn1 = document.createElement('option');
                    optionn1.setAttribute('value','RELIANCE');
                    optionn1.innerHTML="RELIANCE";

                    let optionn2 = document.createElement('option');
                    optionn2.setAttribute('value','UPPCL');
                    optionn2.innerHTML="UPPCL";



                    s.appendChild(option1);
                    s.appendChild(option2);
                    s.appendChild(option3);
                    s.appendChild(option4);

                    ss.appendChild(optionn1);
                    ss.appendChild(optionn2);


                    let amount = document.createElement('input');
                    amount.setAttribute('type','text');
                    amount.setAttribute('name','amount');
                    amount.setAttribute('placeholder','AMOUNT');
                    amount.setAttribute('required','true');

                    let sss = document.createElement('input');
                    sss.setAttribute('type','button');
                    sss.setAttribute('value','Pay electric bill');

                    sss.onclick=function () {
                        <?php
                            session_start();
                        if (isset($_SESSION['email'])){
                        ?>
                        var no = x.value;
                        var circle = s.value;
                        var operator = ss.value;
                        var rupee = amount.value;
                        if (no!='' &&circle!=''&&operator!=''&&rupee!='') {                            cc(no,circle,operator,rupee,'electric');

                            cc(no,circle,operator,rupee,'electric');

                        }else {
                            alert("Enter details correctly");
                        }
                        <?php
                        }else{
                        ?>
                        create();
                        <?php
                        }

                        ?>
                    }

                    document.getElementById('_r_f').innerHTML='';
                    document.getElementById('_r_f').appendChild(l);
                    document.getElementById('_r_f').appendChild(x);
                    document.getElementById('_r_f').appendChild(s);
                    document.getElementById('_r_f').appendChild(ss);
                    document.getElementById('_r_f').appendChild(amount);
                    document.getElementById('_r_f').appendChild(sss);





                }
            }finally {

            }
            try {
                document.getElementById('water').addEventListener('click',function (e) {
                    let l = document.createElement('legend');
                    l.innerText="Pay Water bill";

                    let x = document.createElement('input');
                    x.setAttribute('type','text');
                    x.setAttribute('required','true');
                    x.setAttribute('name','_water_num');
                    x.setAttribute('placeholder','WATER ACCOUNT NO');

                    let s = document.createElement('select');

                    let option1 = document.createElement('option');
                    option1.setAttribute('value','DELHI');
                    option1.innerHTML="DELHI";

                    let option2 = document.createElement('option');
                    option2.setAttribute('value','UPWEST');
                    option2.innerHTML="UP WEST";

                    let option3 = document.createElement('option');
                    option3.setAttribute('value','upeast');
                    option3.innerHTML="UP EAST";


                    let option4 = document.createElement('option');
                    option4.setAttribute('value','rajisthan');
                    option4.innerHTML="RAJISTHAN";

                    let sss = document.createElement('select');
                    sss.setAttribute('id','operator');

                    let optionn1 = document.createElement('option');
                    optionn1.setAttribute('value','0');
                    optionn1.innerHTML="SELECT";

                    let optionn11 = document.createElement('option');
                    optionn11.setAttribute('value','MUMBAI');
                    optionn11.innerHTML="MUMBAI WATER DEPARTMENT";

                    let optionn2 = document.createElement('option');
                    optionn2.setAttribute('value','UPWATER');
                    optionn2.innerHTML="UP WATER";

                    s.appendChild(option1);
                    s.appendChild(option2);
                    s.appendChild(option3);
                    s.appendChild(option4);

                    sss.appendChild(optionn1);
                    sss.appendChild(optionn11);
                    sss.appendChild(optionn2);


                    let amount = document.createElement('input');
                    amount.setAttribute('type','text');
                    amount.setAttribute('name','amount');
                    amount.setAttribute('placeholder','AMOUNT');
                    amount.setAttribute('required','true');

                    let ss = document.createElement('input');
                    ss.setAttribute('type','button');
                    ss.setAttribute('value','Pay water bill');

                    ss.onclick=function () {

                        <?php
                        session_start();
                        if (isset($_SESSION['email'])){
                        ?>
                        var no =x.value;
                        var circle = s.value;
                        var operator = sss.value;
                        var rupee = amount.value;
                        if (no!='' &&circle!=''&&operator!=''&&rupee!=''){

                            document.getElementById('_load').style.display='block';

                            cc(no,circle,operator,rupee,'water');
                        }else{
                            alert("Enter details corrently");
                        }

                        <?php
                        }else{
                        ?>
                        create();
                        <?php
                        }

                        ?>
                    }

                    document.getElementById('_r_f').innerHTML='';
                    document.getElementById('_r_f').appendChild(l);
                    document.getElementById('_r_f').appendChild(x);
                    document.getElementById('_r_f').appendChild(s);
                    document.getElementById('_r_f').appendChild(sss);
                    document.getElementById('_r_f').appendChild(amount);
                    document.getElementById('_r_f').appendChild(ss);

                })
            }finally {
                
            }
            try
            {

            }
            finally {
                document.getElementById('internet').addEventListener('click',function (e) {
                    let l = document.createElement('legend');
                    l.innerText="Pay internet bill";

                    let x = document.createElement('input');
                    x.setAttribute('type','text');
                    x.setAttribute('required','true');
                    x.setAttribute('name','_water_num');
                    x.setAttribute('placeholder','INTERNET NO');

                    let s = document.createElement('select');

                    let option1 = document.createElement('option');
                    option1.setAttribute('value','DELHI');
                    option1.innerHTML="DELHI";

                    let option2 = document.createElement('option');
                    option2.setAttribute('value','UPWEST');
                    option2.innerHTML="UP WEST";

                    let option3 = document.createElement('option');
                    option3.setAttribute('value','upeast');
                    option3.innerHTML="UP EAST";


                    let option4 = document.createElement('option');
                    option4.setAttribute('value','rajisthan');
                    option4.innerHTML="RAJISTHAN";

                    let sss = document.createElement('select');
                    sss.setAttribute('id','operator');

                    let optionn1 = document.createElement('option');
                    optionn1.setAttribute('value','0');
                    optionn1.innerHTML="SELECT";

                    let optionn11 = document.createElement('option');
                    optionn11.setAttribute('value','RATHICABLE');
                    optionn11.innerHTML="RATHI CABLE";

                    let optionn2 = document.createElement('option');
                    optionn2.setAttribute('value','SUNCITY');
                    optionn2.innerHTML="SUNCITY";

                    s.appendChild(option1);
                    s.appendChild(option2);
                    s.appendChild(option3);
                    s.appendChild(option4);

                    sss.appendChild(optionn1);
                    sss.appendChild(optionn11);
                    sss.appendChild(optionn2);


                    let amount = document.createElement('input');
                    amount.setAttribute('type','text');
                    amount.setAttribute('name','amount');
                    amount.setAttribute('placeholder','AMOUNT');
                    amount.setAttribute('required','true');

                    let ss = document.createElement('input');
                    ss.setAttribute('type','button');
                    ss.setAttribute('value','Pay internet bill');

                    ss.onclick=function () {
                        <?php
                        session_start();
                        if (isset($_SESSION['email'])){
                        ?>
                        var no =x.value;
                        var circle = s.value;
                        var operator = sss.value;
                        var rupee = amount.value;
                        if (no!='' &&circle!=''&&operator!=''&&rupee!=''){

                            document.getElementById('_load').style.display='block';

                            cc(no,circle,operator,rupee,'internet');
                        }else{
                            alert("Enter deatila properly");
                        }

                        <?php
                        }else{
                        ?>
                        create();
                        <?php
                        }

                        ?>

                    }

                    document.getElementById('_r_f').innerHTML='';
                    document.getElementById('_r_f').appendChild(l);
                    document.getElementById('_r_f').appendChild(x);
                    document.getElementById('_r_f').appendChild(s);
                    document.getElementById('_r_f').appendChild(sss);
                    document.getElementById('_r_f').appendChild(amount);
                    document.getElementById('_r_f').appendChild(ss);

                })
            }
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
include_once "php/template/navigation.php";
?>
<div id="recharge" style="">
    <div id="_load" style="display: none;position: absolute;height: 400px;width: 300px;background-color: rgba(15, 15, 15,0.6);z-index:3;border-radius: 5px" >


    <div class="spinner" >
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
    </div>
<p>Recharge</p>
    <div id="recharge_cat">
        <div id="reacharge_phone">
            <form id="recharge_" method="post" name="_recharge" action="#">
                <fieldset id="_r_f">
                    <legend id="_l">
                        Recharge a number
                    </legend>

                <input type="text" maxlength="10" id="phone_number" placeholder="Phone no" name="phone_nos" required>
                <select id="circle">
                    <option value="0">
                        Select Circle
                    </option>
                    <option value="delhi">Delhi</option>
                    <option value="upwest">UP WEST</option>
                    <option value="upeast">UP EAST</option>
                    <option value="rajisthan">RAJISTHAN</option>
                </select>
                <select id="operator">
                    <option VALUE="0">SELECT PROVIDER</option>
                    <option value="jio">JIO</option>
                    <option value="idea">IDEA</option>
                    <option value="airtel">AIRTEL</option>
                    <option value="bsnl">BSNL</option>
                </select>
                    <input type="text" name="rupee" id="rupee" value="" placeholder="AMOUNT" required>
                    <input type="button" id="recharge_btn"value="Recharge" id="form_recharge_">
                </fieldset>
            </form>

        </div>
        <p>Pay Bills</p>
        <ul>

            <li id="electric">
                <img src="images/ele.png">
            </li>
            <li id="water">
                <img src="images/img94joktmu714081.png">
            </li>
            <li id="internet">
                <img src="images/internet.png">
            </li>
        </ul>
    </div>

</div>



<div id="_slide_show" style="position: relative;">


    <div class="slideshow-container" style="height: 500px;overflow: hidden;">



    <div class="mySlides fade" style="">
        <div class="numbertext">1 / 3</div>
        <img src="images/1741476782452.png" style="width:100vw">
        <div class="text" style="color: black">RECHARGE</div>
    </div>

    <div class="mySlides fade"  style="width:100vw !important;">
        <div class="numbertext">2 / 3</div>
        <img src="images/7.jpg" style="width:100%">
        <div class="text" style="color: black">SHOPING</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="images/download.jpg" style="width:100%">
        <div class="text" style="color: black">SHOPING</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>

    <p onclick="window.scrollBy(0,screen.height);" STYLE="background:black;color: white;border-radius:5px;height: 30px;width: 300px;position:absolute;bottom: 80px;left:550px;text-align:center;z-index:5;-webkit-box-shadow: -5px 7px 21px -4px rgba(92,40,92,1);
-moz-box-shadow: -5px 7px 21px -4px rgba(92,40,92,1);
box-shadow: -5px 7px 21px -4px rgba(92,40,92,1);font-family: 'Courier New', Courier, monospace;
    font-size: 22px;
    letter-spacing: -1.4px;
    word-spacing: 3.6px;
    color: white;
    font-weight: 700;
    text-decoration: none;
    font-style: normal;
    font-variant: normal;
    text-transform: none;">Scroll down for shoping</p>
</div>

<div id="_shoping" style="    ">


    <h1 style="">
        Welcome to online shoping
    </h1>

    <div id="_products" style="position: relative;width: 100%;overflow: hidden">
        <p style="position: absolute;font-weight: bolder;z-index: 6;top: 40%;height: 50px;width: 50px;box-sizing: border-box;padding: 15px;background: rgba(4, 4, 5,0.5);cursor: pointer" onclick="console.log(document.getElementById('_i').style.left='-300px');"><</p>
        <div id="cat_">
            <h3>Mens>Tshirts<a href="./extra?c=m">&nbsp;&nbsp;more</a></h3>

            <div id="_i"  style="width: 120vw;position: relative;;left: 0px;transition:all linear 0.3s;">
                <?php
                $con = new mysqli("localhost","root","","shoping");
                if(!$con)die($con->connect_error);
                else{
                    $q="select * from products where for_w='m' limit 5";

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





        <p style="position: absolute;font-weight: bolder;z-index: 6;top: 40%;right:10px;height: 50px;width: 50px;box-sizing: border-box;padding: 15px;background: rgba(4, 4, 5,0.5);cursor: pointer" onclick="console.log(document.getElementById('_i').style.left='0px');">
            >
        </p>

    </div>

</div>
<script type="text/javascript">

</script>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
        <div id="_products" style="position: relative;width: 100%;overflow: hidden">
            <p style="position: absolute;font-weight: bolder;z-index: 6;top: 40%;height: 50px;width: 50px;box-sizing: border-box;padding: 15px;background: rgba(4, 4, 5,0.5);cursor: pointer" onclick="console.log(document.getElementById('_i').style.left='-300px');"><</p>
            <div id="cat_">
                <h3>Womens>Tshirts<a href="extra?c=f">&nbsp;&nbsp;more</a></h3>

                <div id="_i"  style="width: 120vw;position: relative;;left: 0px;transition:all linear 0.3s;">
                    <?php
                    $con = new mysqli("localhost","root","","shoping");
                    if(!$con)die($con->connect_error);
                    else{
                        $q="select * from products WHERE for_w='f'";

                        if($r = $con->query($q)){
                            while($data = $r->fetch_assoc()){
                                ?>
                                <div class="_item" style=" ">
                                    <div class="product_img">
                                        <img src="data:image/jpeg;charset=utf-8;base64,<?php echo $data['product_image'];?>" >
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





                    <p style="position: absolute;font-weight: bolder;z-index: 6;top: 40%;right:10px;height: 50px;width: 50px;box-sizing: border-box;padding: 15px;background: rgba(4, 4, 5,0.5);cursor: pointer" onclick="console.log(document.getElementById('_i').style.left='0px');">
                        >
                    </p>

                </div>

            </div>
            <script type="text/javascript">

            </script>
            <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                }
            </script>
</body>
</html>