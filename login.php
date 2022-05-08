<?php

session_start();
include("db.php");

if(isset($_POST["login"]))
{
        $username=$_POST['username'];
        $password=$_POST['password'];
		$check="select * from student where email='$username' and password='$password'";
		$result=mysqli_query($con,$check);
		$row=mysqli_fetch_assoc($result);
		$count=mysqli_num_rows($result);
		if($count == 1)
		{
			$_SESSION['username']=$row['email'];
			header("location:student/dashboard.php"); 
			
		}
		else
		{
	         
		   echo"<script>window.open('index.php','_self')</script>";
		}
	
}

if(isset($_POST['Register']))
	{
		$name=$_POST['name'];
		$phone=$_POST['mobile'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		$check="select * from student where email='$email'";
		$result=mysqli_query($con,$check);
		$count=mysqli_num_rows($result);


		if($count==1)
		{
		echo"<script>alert(' Already ragistered')</script>";
		echo"<script>window.open('index.php','_self')</script>";
		}


		$query="insert into student(name,email,password,mobile)values('$name','$email','$password','$phone')";
		if(mysqli_query($con,$query))
		{
			echo"<script>alert('ragistration successfully')</script>";
			echo"<script>window.open('index.php','_self')</script>";
		}else{
			echo"<script>alert('Registration not  successfully')</script>";
			
		}

	}
if(isset($_POST['adminlogin']))
{
	$email=$_POST['username'];
	$password=$_POST['password'];
	$sql="select *from admin where email='$email' and password='$password' "; 
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$c=mysqli_num_rows($result);
	$_SESSION['email']=$row['email'];
	if($c==1)
	{
		header("location:admin.php");
	}
	else{
		header("location:login.php");
	}
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>admin!Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,
    body {
        background-image: url('image/bg.jpg');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .container {
        height: 100%;
        align-content: center;
    }

    .card {
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .social_icon span {
        font-size: 40px;
        margin-left: 10px;
        color: #FFC312;
    }

    .social_icon span:hover {
        color: white;
        cursor: pointer;
    }

    .card-header h3 {
        color: white;
    }

    .social_icon {
        position: absolute;
        right: 20px;
        top: -35px;
    }

    .input-group-prepend span {
        width: 50px;
        background-color: #FFC312;
        color: black;
        border: 0 !important;
    }

    input:focus {
        outline: 0 0 0 0 !important;
        box-shadow: 0 0 0 0 !important;

    }

    .remember {
        color: white;
    }

    .remember input {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }

    .login_btn {
        color: black;
        background-color: #FFC312;
        width: 100px;
    }

    .login_btn:hover {
        color: black;
        background-color: white;
    }

    .links {
        color: white;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Admin Login</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Enter Your Username"
                                required="">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter Your Password" required="">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" name="adminlogin" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="#">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>

</html>