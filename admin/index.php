<?php
 session_start();
 $conn=mysqli_connect('localhost','root','','hotel');

if(!$conn){
	echo 'Error in Connection';
}
if(isset($_POST['login'])){
	$name=$_POST['name'];
	$pass=$_POST['password'];
		
$chk="select * from admins where name='$name' AND password='$pass'";
$run=mysqli_query($conn,$chk);
if($run->num_rows!=0){
	 $_SESSION['admin']= $name;
	 echo '<script>alert("Correct Information");</script>' ;
	 header('REFRESH:1;URL=one.php');
}
else{
	echo '<script>alert("Wrong Name Or Password");</script>';
}
}

?>

<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<link rel="stylesheet" href="css/login.css">
<style>
body {
    --color-primary: #009579;
    --color-primary-dark: #007f67;
    --color-secondary: #252c6a;
    --color-error: #cc3333;
    --color-success: #4bb544;
    --border-radius: 4px;

    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
	background:#c4c3cdf5;
}
</style>
<title>Login|Admin</title>
</head>
<body bgcolor="white">
<br><br>
<div class="container">
        <form class="form" id="login" action="" method="POST">
		<center CLASS="CENTER">
<h2> 
<IMG SRC="img/htl.png" width="70" CLASS="LOGO">
</h2>
</center>
            <h1 class="form__title">
			 <br>
			Login Admin
			</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" name="name" autofocus placeholder="username">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="password" autofocus placeholder="password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" name="login">Login</button><br><br>
           <a href="../index.php">Login As Reception</a>
        </form>

</body>
</html>