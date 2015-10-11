<?php
if(isset($_POST['method'])&&isset($_POST['email'])&&isset($_POST['pass']){
    $method = $_POST['method'];
    include 'getuser.php';
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if($method = 'li'){
        if(!checkuserli($email, $pass)){
            $_POST['error'] = 'li';
	    $_POST['error1'] = 'Invalid username or password';
            header("Location: http://mc.turco.com");
    	    die();
        }
        $_SESSION['user'] = $email;
        header("Location: http://mc.turco.com/draft.php");
        die();
    }
    if(isset($_POST['name']&&$_POST['donateamt']){
	$name = $_POST['name'];
	$donateamt = $_POST['donateamt'];
	if(checkusername($email, $pass, $name)){
	    $_SESSION['user'] = $email;
	    //userpay, now
	}else{
	    $_POST['error'] = 'cn';
	    $_POST['error1'] = 'Username is currently taken , please pick a new one.'
	    header("Location: http://mc.turco.com");
	    die();
	}
    }else{
	header("Location:http://mc.turco.com");
    	die();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <script type="text/javascript"

            src="https://www.simplify.com/commerce/simplify.pay.js"></script>

    <iframe name="my-hosted-form"

            data-sc-key="YOUR_HOSTED_PAYMENTS_ENABLED_PUBLIC_KEY"

            data-name="Jasmine Green Tea"

            data-description="Smooth tea with a rich jasmine bouquet"

            data-reference="99999"

            data-amount="3000"

            data-color="#12B830">

    </iframe>
    </script>
</body>
</html>