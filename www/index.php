<?php

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://www.simplify.com/commerce/simplify.pay.js"></script>




</head>
<header>



</header>

<script>
    function validateForm() {
        var x = document.forms["myForm"]["email"].value;
        var y = document.forms["myForm"]["pass"].value;
        if (x == null || x == "") {
            alert("Email must be filled out");
            return false;
        }
        if (y == null || y == "") {
            alert("Password must be filled out");
            return false;
        }
        sendInfo();

    }

    function validateNewForm() {
        var a = document.forms["myForm1"]["email"].value;
        var b = document.forms["myForm1"]["pass"].value;
        var c = document.forms["myForm1"]["name"].value;
        var d = document.forms["myForm1"]["newreenterpass"].value;
        var e = document.forms["myForm1"]["donateamt"].value;


        if (a == null || a == "") {
            alert("Email must be filled out");
            return false;
        }
        if (b == null || b == "") {
            alert("Password must be filled out");
            return false;
        }
        if (c == null || c == "") {
            alert("Name must be filled out");
            return false;
        }
        if (d == null || d == "") {
            alert("Password must be filled out");
            return false;
        }
        if (b != d) {
            alert("Passwords must match");
            return false;
        }
        if (e == null || e == "" ) {
            alert("Donate amount must be filled in");
            return false;
        }

        $("button","#scdiv").attr("data-amount",e);
        $("button","#scdiv").attr("data-customer-name",c);
        $("button","#scdiv").attr("data-customer-email",a);
        // $("button","#scdiv").each(function(){console.log($(this))});
        var data = $('#formNew').serialize();
       // $.post('/saveuser.php',data);
    setTimeout(function () {
        $("button","#scdiv").trigger("click");
    }, 7000);
        return false;
    }


    function sendInfo(){

        document.forms["myForm"].submit();

    }


//    function sendInfo1(){
//
//        document.forms["myForm1"].submit();
//
//    }


</script>



<style type="text/css">


    html{
        height: 100%;
        /*padding: 3px;*/
    }
    body {
        min-height: 100%;
        /*padding: 3px;*/
    }

    .btn{
        /*width: 7%;*/
        /*top: 20px;*/
        /*float: right;*/


    }

    .btn-info1{

        width: 80px;
        top: 20px;
        float: right;
        background-color: #DC3D24;
        color: #FFFFFF;
        border: 1px solid black;
        /*padding-right: 5px;*/

    }

    .form-control{
        /*width: 15%;*/
        /*top: 20px;*/
        /*float:right;*/


    }

    .form-control1{

        display: block;
        padding: 10px;
        margin-left: auto ;
        margin-right: auto ;

        border: 1px solid black;

    }

    .form1{

        width: 130px;
        top: 20px;
        float:right;
        border: 1px solid black;

        /*padding-right: 5px;*/

    }


    .form-control1-btn{
        display: block;
        padding: 10px;

        margin-left: auto ;
        margin-right: auto ;
        background-color: #DC3D24;
        color: #FFFFFF;


    }

    .login-box{

        height: 50px;
        padding: 5px;
        border: 1px solid black;
        background-color: #434B4B;


    }

    .inputNew{
        top: 40px;
        height: 550px;
        padding: 30px;
        background-color: #232B2B;

    }



    .login-center{
        top: 15px;
        height: 40px;
        padding-right: 10px;
        float:right;


    }

    .create-center{
        height: 520px;
        width: 450px ;
        margin-left: auto ;
        margin-right: auto ;
        padding: 20px;
        border: 2px solid black;
        background-color: #E3AE57;


    }

    .images{
        position: relative;
        margin: auto;
        left: 400px;
        
        padding: 10px;

    }

    .center {
        margin: auto;


    }
    
    .form-control-num{
        height: 45px;
        border: 1px solid black;
        
        
    }

    .headerstuff{

        font-family: Futura, “Trebuchet MS”, Arial, sans-serif;

    }

    .h3thing{

        top=15px;
        font-family: Futura, “Trebuchet MS”, Arial, sans-serif;
        color:#DC3D24;
    }





</style>

<body style="background-color: #232B2B">
    <nav class="login-box">
        <form action="payment.php" method="post" name="myForm" class="login-center" role="form">

            <button href="#" onclick="validateForm()" class="btn btn-info1" role="button" >Login</button>
            <input type="password" class="form-control form1" name="pass" id="pwd" placeholder="Enter password">
            <input type="email" class="form-control form1" name="email" id="email" placeholder=" Enter email">
            <input type="hidden" name="method" value="li"/>




        </form>
        <h2 class="h3thing">Fans4TheCause</h2>


    </nav>

    <div class="inputNew">

        <form id="formNew" name="myForm1" class="create-center" role="form">

            <h3 class="headerstuff" >New User</h3>
            <br>
            <p class="headerstuff"> Sign up and support Save the Puppies. Join the exciting fantasy baseball league and thank you for helping Save the Puppies</p>
            <br>

            <input  type="email" class="form-control form-control1" name="email" id="email" placeholder=" Enter email">
            <br>
            <input  type="text" class="form-control form-control1" name="name" id="name" placeholder=" Enter name">
            <br>
            <input  type="password" class="form-control form-control1" name="pass" id="pass" placeholder=" Enter password">
            <br>
            <input  type="password" class="form-control form-control1" name="newreenterpass" id="newreenterpass" placeholder=" Re-Enter password">
            <br>
            <input  type="number" class="form-control form-control-num" name="donateamt" id="donateamt" placeholder=" Donation amount ">
            <br>
            <button href="#" onclick="validateNewForm()" class="btn form-control1-btn" role="button" >Give</button>
        </form>



        <div id="scdiv" style="display: none;">

            <button data-sc-key="sbpb_M2U5NWFhYjctNzQxNC00MzczLTgyNGMtZWM1OTFiMTVlNTg3" data-name="Donation"
                    data-masterpass="true" data-description="Charitable Donation" 1data-reference=""
                    1data-amount="100" 1data-customer-name="" 1data-customer-email="" data-redirect-url="http://mc.turco.com/draft.php" data-color="#12B830">
                Give Now
            </button>
        </div>

    </div>



    <div>
<!--       <div class="center"><img src="images/header-charitable-works.jpg" class="images" style="width:300px;height:286px;"></div>-->

    </div>


</body>


</html>

