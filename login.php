<?php
session_start();
  if($_SERVER['REQUEST_METHOD']=='POST'){
      if (isset($_POST['_email'])&&isset($_POST['_password'])){
          if (!empty($_POST['_email'])&&!empty($_POST['_password'])){
              $email = htmlspecialchars(trim($_POST['_email']));
              $pas = crypt(htmlspecialchars(trim($_POST['_password'])),"!@#$%^&*()_+9045426913+_)(*&^%$#@!");
              require 'php/require_first.php';
              $con = new mysqli($hn,$un,$pw,'shoping');
              if (!$con)die($con->connect_error);
              else{
                  $q1 = "select email from users WHERE email='$email'";
                  if ($res = $con->query($q1)){
                      if ($res->num_rows>0){
                          $e = $res->fetch_assoc()['email'];
                          if (strcasecmp($e,$email)==0){
                              $q2 = "select password,_first_name from users WHERE email='$email'";
                              if ($res2 = $con->query($q2)){
                                  $saved_pa = $res2->fetch_assoc()['password'];
                                  if (strcmp($pas,$saved_pa)==0){

                                      $_SESSION['email']=$email;
                                      $res2->data_seek(0);
                                      $_SESSION['_first_name']=$res2->fetch_assoc()['_first_name'];
                                      header("location:./index.php");
                                  }else{
                                      ?>
                                      <script type="text/javascript">
                                          alert("Sorry! entered wrong password");
                                      </script>
<?php
                                  }
                              }else{
                                  echo "error in sec";
                              }
                          }else{
                              echo "emailnot match";
                          }
                      }else{
                          echo "no account";
                      }
                  }else{
                      echo "first";
                  }
              }
          }
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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./css/i.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">


    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript" >
        window.addEventListener("DOMContentLoaded",function () {
            let x = document.querySelector("#fpass a");
            x.addEventListener('click',function () {

                //creating black background

                let a = document.createElement('div');
                a.style.cssText="position:fixed;width:100%;height:100vh;background:rgba(6, 6, 6,.3);top:0;left:0;";

                //closing button

                let close = document.createElement('span');
                close.innerText='x';
                close.style.cssText="position:absolute;right:5px;font-weight:bolder;cursor:pointer;color:red;font-size:20px;";

                close.onclick=function () {
                    console.log(this.parentNode);
                    document.body.removeChild(this.parentNode.parentNode);
                }

               //creating form to reset

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

                //creating fieldset

                let w = document.createElement('fieldset');
                w.style.cssText="border:none";


                //legend

                let r = document.createElement('legend');
                r.innerText="Reset password";

                r.style.cssText="border:none;text-align:center;";

                //creating input for email address

                let e = document.createElement('input');
                e.setAttribute('type','email');
                e.setAttribute('name','_reset_email');
                e.setAttribute('placeholder','EMAIL');

                //setting default value to input entered previously

                e.value = document.querySelector("input[name='_email']").value;

                e.style.cssText="width:98%;height:25px;border:1xp solid black;padding-left:10px;margin-top:15px;transition:all linear 0.5s";

                //creating input button for next step

                let t = document.createElement('input');
                t.setAttribute('type','button');
                t.setAttribute('value','NEXT');



                //extra div for further attachment
                let g = document.createElement('div');
                q.setAttribute('id','extra');



                //firing ajax on click next button

                t.onclick=function () {
                    if (e.value!=''){
                        $.ajax({
                            url:'php/reset_password.php',
                            method:'POST',
                            data:{
                                'reset':'true',
                                'email':e.value
                                
                            },
                            beforeSend:function () {
                                e.setAttribute('disabled','true');
                            },success:function (value) {
                                console.log(value);
                                if (value==1){
                                    e.setAttribute('disabled','true');

                                    let a = "<select id='reset_sel' name=\"security\" style='width:100%;height:25px;border:1xp solid black;padding-left:10px;margin-top:15px;transition:all linear 0.5s' required>" +
                                    "<option value=\"0\">Select any question</option>" +
                                    "<option value=\"1\">Whats your first pat name?</option>" +
                                    "<option value=\"2\">Whats your first school name?</option>" +
                                    "</select>" +
                                        "<input type=\"text\" name='_sec_ans' placeholder='ANSWER' style='width:98%;height:25px;border:1xp solid black;padding-left:10px;margin-top:15px;transition:all linear 0.5s' required>";
                                    // a = new HTMLtoDOM(a);


                                    g.innerHTML=a;

                                    t.onclick=function () {
                                        console.log("as");
                                        $.ajax({
                                            url:'php/reset_password.php',
                                            method:'POST',
                                            data:{
                                                'reset':"2",
                                                "email":e.value,
                                                "sec_que":document.querySelector('#reset_sel').value,
                                                "sec_ans":document.querySelector('input[name="_sec_ans"]').value
                                            },beforeSend:function () {

                                            },success:function (val) {
                                               // console.log(val);
                                                //console.log(document.querySelector('input[name="_sec_ans"]').value);
                                                let ar = val.split("_");
                                                if(ar[0]=='resetdone'){

                                                    let p = document.createElement('p');
                                                    p.style.cssText="background:#FFE9C7;height:100px;width:100px;margin-left:40%;box-sizing:border-box;padding-top:50px;text-align:center;border:1px solid gray;position:relative;color:red;font-weight:bolder";
                                                    p.innerText= ar[1];

                                                    //paragraph 2
                                                    let para = document.createElement('p');
                                                    para.style.cssText="font-weight:bolder;text-align:center;position:relative;width:95%";
                                                    para.innerText="Your new password";
                                                    //closing button

                                                    let close = document.createElement('span');
                                                    close.innerText='x';
                                                    close.style.cssText="position:absolute;right:5px;font-weight:bolder;cursor:pointer;color:red;font-size:20px;";

                                                    close.onclick=function () {
                                                        console.log(this.parentNode);
                                                        document.body.removeChild(this.parentNode.parentNode);
                                                    }

                                                    q.innerHTML ='';
                                                    q.appendChild(close);
                                                    q.appendChild(para);
                                                    q.appendChild(p);

                                                }
                                            },complete:function () {

                                            }
                                        })
                                    }

                                }else if(value==2) {
                                    alert('Account with this email not exists');
                                    e.removeAttribute('disabled','true');
                                }
                            },complete:function () {
                                
                            }
                        })
                    }
                }


                t.style.cssText="width:100%;height:25px;margin-top:15px";

                //appending


                //appendind close to form

                q.appendChild(close);

                //apending legend to form

                q.appendChild(r);

                //appending input to filedset

                w.appendChild(e);
                w.appendChild(g);
                w.appendChild(t);

                //appending fieldset to form
                q.appendChild(w);

                //appending form to main frame

                a.appendChild(q);


                document.body.appendChild(a);
            })
        })
    </script>
</head>
<body>
<?php
include_once "php/template/navigation.php";
?>
<div class="container">
    <div id="form">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <legend>
                    Log In
                </legend>

                <input type="email" name="_email" placeholder="EMAIL" autocomplete="off" required>
                <div id="pass">
                    <input type="password" name="_password" placeholder="PASSWORD" autocomplete="off" required>
                    <div id="fpass">
                        <a href="#">Reset password?</a>
                    </div>
                </div>
                <input type="submit" value="Log In" id="submit">
                <p style="text-align: center;font-weight: bold">OR</p>
                <input type="button" value="CREATE NEW ACCOUNT" style="background-color:  #C17A0B;;cursor: pointer" onclick="window.location.href='signup'">

    </fieldset>
    </form>

</div>
</body>
</html>