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
        if(x == "jbaird@siue.edu"){
            alert("faggot@superfaggot.fag");

        }
    }
</script>



<style type="text/css">


    html{
        height: 100%;
    }
    body {
        min-height: 100%;
    }

    .btn{
        width: 7%;
        top: 20px;
        float: right;


    }

    .form-control{
        width: 15%;
        top: 20px;
        float:right;


    }


    .login-box{

        height: 38px;

        border: 1px solid black;
        background-color: #3D2EFF;


    }

    .login-center{
        top: 10px;
        height: 100px;
      

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


</style>

<body style="background-color: #30C2CF">
    <nav class="login-box">
    <form name="myForm" class="login-center" role="form">

            <button href="#" class="btn btn-info" role="button" >Login</button>
            <input type="password" class="form-control" name="pass" id="pwd" placeholder="Enter password">
            <input type="email" class="form-control" name="email" id="email" placeholder=" Enter email">
            


            

    </form>
    </nav>
    <div>
        <div class="center"><img src="images/Baseball-Heart-L.jpg" class="images" style="width:300px;height:286px;"></div>


    </div>


</body>


</html>