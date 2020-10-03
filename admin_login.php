<?php
    session_start();
    include_once('functions.php');
    $userdata = new DB_con();

    
    if (isset($_POST['admin_login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        

        $result = $userdata->loginadmin($username,$password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
			$_SESSION['fname'] = $num['firstname'];
            $_SESSION['lname'] = $num['lastname'];
           
            echo "<script>alert('ล็อคอินสำเร็จแล้ว')</script>";
            echo "<script>window.location.href='index_admin.php'</script>";
           
           

        } else {
            echo "<script>alert('โปรกล็อคอินใหม่อีกครั้ง')</script>";
            echo "<script>window.location.href='admin_login.php'</script>";
        }
    }
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/admin_login.css">
    <link rel="stylesheet" href="css/util.css">

    <title>AdimnLogin</title>

</head>
<body>

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="image/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
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
						<button class="login100-form-btn" name="admin_login">
							Login
						</button>
					</div>

					

					
				</form>
			</div>
		</div>
	</div>

    <script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
    <script src="js/jquery.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>