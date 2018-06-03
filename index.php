<?php


    include 'db.php';



    $error='';
    if($_POST)
    {

        $user_email=$_POST['email'];
        $user_password=$_POST['password'];
        $user_name=$_POST['name'];



        if(!empty($user_email)&&!empty($user_password)&&!empty($user_name))
        {
            if(isset($user_email)&&isset($user_name)&&isset($user_password))
            {
                    $registerDate= time();
                 $user_email= $db->escape(strip_tags($user_email));
                 $user_name= $db->escape(strip_tags($user_name));
                 $user_password= $db->escape(strip_tags($user_password));
                 $suc= $db->query("INSERT INTO users (user_email,user_name,user_password) VALUES ('$user_email','$user_name','$user_password')");
                if($suc){
                    $error='Registered!';
                }
            }
            else
            {
            $error = 'There is something wrong';
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

	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form action="" method="post" validate-form">
					<span class="contact2-form-title">
						Register
					</span>
                <div class="container-contact2-form-btn">
                    <div class="wrap-contact2-form-btn">
                        <div class="contact2-form-bgbtn"></div>
                        <p><?php echo $error;?></p>
                    </div>
                </div>


					<div class="wrap-input2 " >
						<input class="input2" type="text" name="name">
						<span class="focus-input2" data-placeholder="NAME"></span>
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
								Send Your Message
							</button>
						</div>
					</div>
                    <p>Already Registered? <a href="login.php">Login</a></p>
				</form>
			</div>
		</div>
	</div>
            <!-- Login -->






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
