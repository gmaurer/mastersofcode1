<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://www.simplify.com/commerce/simplify.pay.js"></script>
    <script>
    function validate() {
       $("button","#scdiv").trigger("click");
    }
    </script>

</head>
<header>



</header>

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
    <form class="login-center" role="form">

            <adsfbutton href="#" class="btn btn-info" role="button" >Login</button>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password">
            <input type="email" class="form-control" id="email" placeholder=" Enter email">
            <input type="checkbox" onclick="validate()">


            

    </form>
    </nav>
    <div>
        <div class="center"><img src="images/Baseball-Heart-L.jpg" class="images" style="width:300px;height:286px;"></div>

<div id="scdiv" style="display: none;">
    <button data-sc-key="sbpb_M2U5NWFhYjctNzQxNC00MzczLTgyNGMtZWM1OTFiMTVlNTg3" data-name="Donation" 
            data-masterpass="true" data-description="Donation for Giving Ladder Charity" data-reference="99999"
data-amount="5000" data-customer-name="Bob Donor" data-customer-email="donor@email.com" data-redirect-url="http://mc.turco.com/draft.php" data-color="#12B830">
      Give Now 
    </button>
</div>


</body>


</html>
