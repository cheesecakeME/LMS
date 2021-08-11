<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">


	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login_main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/image2vector(1).svg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Admin Login 
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" value="LOGIN">
							Login
						</button>
					</div>
				 

					
				</form>
			</div>
		</div>
	</div>
	
<?php	
if(isset($_POST['submit'])){
    $count=0;
    $res=mysqli_query($link,"select * from admin_registration where email='$_POST[email]' && password='$_POST[password]'");
    $count=mysqli_num_rows($res);
    echo $count;
    
    if($count==0)
    {
        ?>
       <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong>Invalid</strong> Username Or Password.
</div>

<?php
        
    }
    else
    {
        $_SESSION['admin']=$_POST['email'];
        ?>
        <script type="text/javascript">
            window.location='display_user_info.php';
</script>
<?php   
    }
}
?>

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>

	
<!--===============================================================================================-->
	<script src="js/loginmain.js"></script>

</body>
</html>