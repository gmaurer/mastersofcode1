<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



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

    }


    function validateNewForm() {
        var a = document.forms["myForm1"]["newemail"].value;
        var b = document.forms["myForm1"]["newpass"].value;
        var c = document.forms["myForm1"]["newuser"].value;
        var d = document.forms["myForm1"]["newreenterpass"].value;
        var e = document.forms["myForm1"]["donateamt"].value;
        var minValVar = 50;


        if (a == null || b == "") {
            alert("Email must be filled out");
            return false;
        }
        if (b == null || b == "") {
            alert("Password must be filled out");
            return false;
        }
        if (c == null || c == "") {
            alert("Username must be filled out");
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
        background-color: #2BADD4;
        color: white;
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
        background-color: #2BADD4;
        color: white;

    }

    .login-box{

        height: 50px;
        padding: 5px;
        border: 1px solid black;
        background-color: #3D2EFF;


    }

    .inputNew{
        top: 40px;
        height: 550px;
        padding: 30px;


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
        background-color: #3D2EFF;


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

    .headerstuff{



    }



</style>

<body style="background-color: #30C2CF">
    <nav class="login-box">
    <form name="myForm" class="login-center" role="form">

            <button href="#" class="btn btn-info" role="button" >Login</button>
            <input type="password" class="form-control form1" name="pass" id="pwd" placeholder="Enter password">
            <input type="email" class="form-control form1" name="email" id="email" placeholder=" Enter email">





    </form>
    </nav>

    <div class="inputNew">

        <form name="myForm1" class="create-center" role="form">

            <h3 class="headerstuff" >New User</h3>
            <br>

            <input  type="email" class="form-control form-control1" name="newemail" id="newemail" placeholder=" Enter email">
            <br>
            <input  type="text" class="form-control form-control1" name="newuser" id="newuser" placeholder=" Enter username">
            <br>
            <input  type="password" class="form-control form-control1" name="newpass" id="newpass" placeholder=" Enter password">
            <br>
            <input  type="password" class="form-control form-control1" name="newreenterpass" id="newreenterpass" placeholder=" Re-Enter password">
            <br>
            <input  type="number" class="form-control form-control-num" name="donateamt" id="donateamt" placeholder=" Donation amount ">
            <br>
            <button href="#" class="btn form-control1-btn" role="button" >Login</button>


        </form>


    </div>



    <div>
<!--       <div class="center"><img src="images/header-charitable-works.jpg" class="images" style="width:300px;height:286px;"></div>-->

    </div>


</body>


</html>