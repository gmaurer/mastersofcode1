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
        document.getElementById("SCbtn").setAttribute("data-amount",e);
        document.getElementById("SCbtn").setAttribute("data-customer-name",c);
        document.getElementById("SCbtn").setAttribute("data-customer-email",a);

        var minValVar = 50;




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
        if (e<minValVar) {
            document.forms["myForm1"]["donateamt"].value = minValVar;
            alert("Donate amount set to minimum");
            return false;
        }


    }


    function sendInfo(){

        document.forms["myForm"].submit();

    }


    function sendInfo1(){

        document.forms["myForm1"].submit();

    }


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

    .btn-info{

        width: 7%;
        top: 20px;
        float: right;
        background-color: #E3AE57;
        color: #FFFFFF;
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

    }

    .form1{

        width: 15%;
        top: 20px;
        float:right;
        /*padding-right: 5px;*/

    }


    .form-control1-btn{
        display: block;
        padding: 10px;
        margin-left: auto ;
        margin-right: auto ;
        background-color: #E3AE57;
        color: #FFFFFF;


    }

    .login-box{

        height: 50px;
        padding: 5px;
        border: 1px solid black;
        background-color: #DC3D24;


    }

    .inputNew{
        top: 40px;
        height: 550px;
        padding: 30px;
        background-color: #b7d7a7;

    }



    .login-center{
        top: 15px;
        height: 40px;
        padding-right: 10px;

    }

    .create-center{
        height: 450px;
        width: 450px ;
        margin-left: auto ;
        margin-right: auto ;
        padding: 20px;
        border: 2px solid black;
        background-color: #6c8672;


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
        
        
        
    }

    /*.headerstuff{*/



    /*}*/



</style>

<body style="background-color: #232B2B">
    <nav class="login-box">
    <form action="payment.php" method="post" name="myForm" class="login-center" role="form">

            <button href="#" onclick="validateForm()" class="btn btn-info" role="button" >Login</button>
            <input type="password" class="form-control form1" name="pass" id="pwd" placeholder="Enter password">
            <input type="email" class="form-control form1" name="email" id="email" placeholder=" Enter email">
            <input type="hidden" name="method" value="li"/>




    </form>
    </nav>

    <div class="inputNew">

        <form action="payment.php" method="post" name="myForm1" class="create-center" role="form">

            <h3 class="headerstuff" >New User</h3>
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
            <input type="hidden" name="method" value="cn"/>

            <button onclick="validateNewForm()" id="SCbtn" data-sc-key="sbpb_M2U5NWFhYjctNzQxNC00MzczLTgyNGMtZWM1OTFiMTVlNTg3" data-name="Donation"
                    data-masterpass="true" data-description="Donation for Giving Ladder Charity" data-reference="99999"
                    data-amount="10000" data-customer-name="Gabe Maurer" data-customer-email="gmaurer@siue.edu" data-redirect-url="http://mc.turco.com/draft.php" data-color="#12B830">
                Give Now
            </button>

        </form>


    </div>



    <div>
<!--       <div class="center"><img src="images/header-charitable-works.jpg" class="images" style="width:300px;height:286px;"></div>-->

    </div>


</body>


</html>

