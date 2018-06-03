<?php
ob_start();
session_start();
include "db.php";

$error='';
if($_POST)
{

    $user_email=$_POST['email'];
    $user_password=$_POST['password'];




    if(!empty($user_email)&&!empty($user_password))
    {


           $sql= $db->query("SELECT * FROM users WHERE user_email = '$user_email' AND user_password='$user_password'");
            print_r($sql);
            if($sql)
            {
                header('LOCATION:user.php');

                $_SESSION['user_email']=$user_email;
                $_SESSION['login']=1;

            }
            else{
                $error='Wrong username or password';
            }


    }
    else
    {
        $error = 'Please Fill in the blanks';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<!-- Login -->
<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form action="login.php" method="post" validate-form">
            <span class="contact2-form-title">
						Login
					</span>
            <div class="container-contact2-form-btn">
                <div class="wrap-contact2-form-btn">
                    <div class="contact2-form-bgbtn"></div>
                    <p><?php echo $error;?></p>
                </div>
            </div>

            <div class="wrap-input2 " >
                <input class="input2" type="email" name="email">
                <span class="focus-input2" data-placeholder="EMAIL"></span>
            </div>

            <div class="wrap-input2 " >
                <input class="input2" type="password" name="password">
                <span class="focus-input2" data-placeholder="password"></span>
            </div>
            <div class="container-contact2-form-btn">
                <div class="wrap-contact2-form-btn">
                    <div class="contact2-form-bgbtn"></div>
                    <button type="submit" class="contact2-form-btn">
                        Log in
                    </button>
                </div>
            </div>


            </form>
        </div>
    </div>
</div>






<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

