<?php
    session_start();
    include_once('functions.php');
    $userdata = new DB_con();

    
    if (isset($_POST['login_user'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        

        $result = $userdata->login($username,$password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['fname'] = $num['firstname'];
            $_SESSION['lname'] = $num['lastname'];
            $_SESSION['status'] = $num['status'];
            echo "<script>alert('ล็อคอินสำเร็จแล้ว')</script>";
            if ($_SESSION['status'] == "0") { // กรณีเป็น 0 ต้องรออนุมัติก่อน

                echo "<script>window.location.href='wait.php'</script>";
            } if ($_SESSION['status'] == "1") {

                echo "<script>window.location.href='index.php'</script>";

            }
           

        } else {
            echo "<script>alert('ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="fonts/icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

<div class="limiter">
		<div class="container-login100" style="background-image: url('image/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
               
					<span class="login100-form-logo">
                    <i class="zmdi zmdi-spinner"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login_user">
							Login
						</button>
					</div>

                    <div class="text-center p-t-90">
						<a class="txt1" href="#">
						Not yet a member? <a href="register.php">Sign Up</a>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

    
</body>
</html>