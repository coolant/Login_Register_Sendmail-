<?php
ob_start();
session_start();
include 'db.php';
function getId($email)
{
    GLOBAL $db;
    $userM= $db->get_row("SELECT * FROM users WHERE user_email='$email'");
    return $userM->user_id;
}

function isUserEmailInDb($email)
{
    GLOBAL $db;
    return $db->get_row("SELECT * FROM users WHERE user_email='$email'");
}


 if(!$_SESSION['login'])
 {
    header('Location:login.php');
 }
    $user_email = $_SESSION['user_email'];

    $user = $db->get_row("SELECT user_id,user_name,user_email FROM users WHERE user_email ='$user_email'");
    $error='SEND MESSAGE TO ANOTHER USER';

    // Login User's id
    $id=$user->user_id;





if($_POST)
{
    if(isUserEmailInDb($_POST['email'])&& $_POST['email']!='')
    {
        $mail = $_POST['email'];
        $m_text=$_POST['message'];
        $m_date = time();
        $m_to = getId($mail);


        $db->query("INSERT INTO messages (m_to,m_date,m_text,m_from) VALUES ($m_to,$m_date,'$m_text',$id)");
        $error='Message Sent';
        header("Location:user.php");
    }
    else
    {
        $error='Wrong user email!';
    }
}





$mesajlar = $db->get_results('SELECT m_to,m_date,m_text,m_from FROM messages WHERE m_to ='.$id.' ORDER BY m_date DESC');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $user->user_name;?></title>
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
            <form action="user.php" method="post" validate-form">
                     <span class="contact2-form-title">
                                Welcome
                        <p><?php echo $user->user_name;?></p>
                    </span>
                    <div class="container-contact2-form-btn">
                        <div class="wrap-contact2-form-btn">

                                <?php echo $error;?>


                        </div>
                    </div>
                    <div class="wrap-input2 " >
                        <input class="input2" type="email" name="email">
                        <span class="focus-input2" data-placeholder="example@example.com"></span>
                    </div>

                    <div class="wrap-input2 " >
                        <input class="input2" type="text" name="message">
                        <span class="focus-input2" data-placeholder="message"></span>
                    </div>

                    <div class="container-contact2-form-btn">
                        <div class="wrap-contact2-form-btn">
                            <div class="contact2-form-bgbtn"></div>
                            <button type="submit" class="contact2-form-btn">
                                Send Your Message
                            </button>
                        </div>
                    </div>
                    <?php if(!empty($mesajlar)):?>
                        <?php foreach($mesajlar as $mesaj): ?>
                        <div style="border-bottom-color: #0069d9;border: 3px solid #0069d9;">
                            <?php
                                $mesajFromId = $mesaj->m_from;
                                $m_from_name = $db->get_row('SELECT user_name FROM users WHERE user_id='.$mesajFromId);

                            ?>
                            <h6>Sender: <?php echo $m_from_name->user_name; ?> </h6>
                            <br />
                            <p>Date : <?php  echo date("Y-m-d H:i:s",$mesaj->m_date); ?> </p>
                            <br>
                            <p>Message :<?php echo $mesaj->m_text;?> </p>
                        </div>
                        <?php endforeach; ?>
                <?php endif; ?>






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
