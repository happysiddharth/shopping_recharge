<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new account</title>
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
    <link rel="stylesheet" type="text/css" href="css/createnewuser.css">
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded',function () {
            let x = document.querySelector('form select');
            x.onchange = function (e) {
                if (this.value!=0 && !document.getElementById('ans')){
                    let y = document.createElement('input');
                    y.setAttribute('type','text');
                    y.setAttribute('name','_sec_ans');
                    y.setAttribute('placeholder','ANSWER');
                    y.setAttribute('id','ans');
                    y.setAttribute('required','true');

                    document.querySelector('#answ').appendChild(y);

                }else if (this.value==0 ){
                    console.log(this.nextElementSibling);
                    document.querySelector('#answ').innerHTML='';
                }
            }
        })
    </script>
</head>
<body>

<?php
include_once "template/navigation.php";
?>
<div class="container">
    <div class="create">
        <form action="php/savenewuser.php" method="post">
            <input type="button" value="Back" style="background:black; color: white; position: absolute;border: 1px solid white;height: 20px; width: 70px;cursor:pointer;top:8px; left: 15px;" onclick="window.location.href='index.php';">
            <fieldset>
                <legend>
                    Create new account
                </legend>
                <input type="text" name="_first_name" maxlength="120" placeholder="FIRST NAME" autocomplete="off" required />
                <input type="text" name="_last_name" maxlength="120" placeholder="LAST NAME" autocomplete="off" required />
                <input type="email" name="_email"  placeholder="EMAIL" autocomplete="off" required />
                <input type="password" name="_password"  placeholder="PASSWORD" autocomplete="off" required />
                <select name="security" required>
                    <option value="0">Select any question</option>
                    <option value="1">Whats your first pat name?</option>
                    <option value="2">Whats your first school name?</option>
                </select>
                <div id="answ"></div>
                <input type="text" name="address" placeholder="ADDRESS" required>

                <input type="submit" value="CREATE NEW ACCOUNT" id="submit" >
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>