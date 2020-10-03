<?php

    include_once('functions.php');
    $userdata = new DB_con();
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        
        $username =  $_POST['username'];
        $password_1 =  $_POST['password_1'];
        $password_2 =  $_POST['password_2'];
        $firstname =  $_POST['firstname'];
        $lastname =  $_POST['lastname'];

        if (empty($username)) { //กรณีถ้ามันเป็นค่าว่าง
            array_push($errors);
        }
        if (empty($password_1)) {
            array_push($errors);
        }
        if (empty($password_2)) {
            array_push($errors);
        }
        if ($password_1 != $password_2) {
            array_push($errors,"รหัสผ่านของท่านไม่ตรงกัน");
            echo "<script>alert('กรุณากรอก : รหัสผ่านให้ตรงกัน')</script>";
        }


        
        
        $sql1= $userdata->usernameavailable($username);
        $result = mysqli_fetch_assoc($sql1);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors,"Username alrdy exists");
                echo "<script>alert('ชื่อบัญชีผู้ใช้ของคุณได้ถูกใช้งานแล้ว')</script>";
            }
            
         

        


            else if (count($errors) == 0) { //ถ้านับแล้ว = 0 
                $password = md5($password_1);
                $sql = $userdata->registration($username,$password,$firstname,$lastname);   
                echo "<script>alert('ลงทะเบียนสำเร็จแล้ว')</script>";
                echo "<script>window.location.href='login.php'</script>";
            } 

        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="fonts/icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100"  style="background-image: url('image/bg-01.jpg');">
            <div class="wrap-login100">
                <form method="post" class="login100-form validate-form" >
                    <span class="login100-form-logo">
						<i class="zmdi zmdi-spinner"></i>
                    </span>
                    
                    <span class="login100-form-title p-b-34 p-t-27">
						Register
                    </span>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    
                   

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password_1" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password_2" placeholder="Confim Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="firstname" placeholder="Firstname" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="lastname" placeholder="Lastname" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
                    
					<div class="container-login100-form-btn">
						<button type="submit" name="reg_user" class="login100-form-btn">
							Register
						</button>
					</div>

                    <div class="text-center p-t-90">
						<a class="txt1" href="#">
						Already a member ? <a href="login.html">Sign In</a>
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