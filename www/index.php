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

    .inputNew{


    }

    .login-center{
        top: 10px;
        height: 100px;
      

    }

    .create-center{
        height: 500px;



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

    <div class="inputNew">

        <form name="myForm1" class="create-center" role="form">

            <input style="display:block type="donateamt" class="form-control" name="donateamt" id="donateamt" placeholder=" Enter Donation Amount">
            <input style="display:block type="newreenterpass" class="form-control" name="newreenterpass" id="newreenterpass" placeholder=" Re-Enter password">
            <input style="display:block type="newpass" class="form-control" name="newpass" id="newpass" placeholder=" Enter password">
            <input style="display:block type="newuser" class="form-control" name="newuser" id="newuser" placeholder=" Enter username">
            <input style="display:block type="newemail" class="form-control" name="newemail" id="newemail" placeholder=" Enter email">





        </form>


    </div>



    <div>
        <div class="center"><img src="images/header-charitable-works.jpg" class="images" style="width:300px;height:286px;"></div>


    </div>


</body>


</html>