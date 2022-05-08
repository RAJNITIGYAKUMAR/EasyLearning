<?php include('db.php');
  session_start();
  if(isset($_SESSION['email']))
  {
    $sql="select count(*) as teacher from instructor";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $total_instructor=$row['teacher'];

    $sql1="select count(*) as student from student";
    $result1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $total_student=$row1['student'];

    $sql2="select count(*) as c from course";
    $result2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $total_course=$row2['c'];
    $email=$_SESSION['email'];

    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Panel</title>
    <style type="text/css">

    </style>
</head>

<body>

    <div class="header sticky-top">
        <div class=" welcome container-fluid">
            <div>
                <h4><a href="index.php">SuccessCurve</a></h4>
            </div>
            <div id="welcome_user">
                <h4>
                    Welcome to <?php echo $email; ?>
                </h4>
            </div>
            <div class="logoutChangepswd">
                <a href="#">Change Password</a>
                <a href="admin_logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class=" admin_content">
        <div class="sidebar ">
            <ul>
                <li>
                    <a href="index.php">Go To Home Page</a>
                </li>
                <li>
                    <a href="admin.php">Dashboard</a>
                </li>
                <li>
                    <a href="inc/adminprofile.php">Profile</a>
                </li>
                <li>
                    <a href="inc/categories.php">Categories</a>
                </li>
                <li>
                    <a href="inc/class.php">Class</a>
                </li>
                <li>
                    <a href="inc/course.php">Course</a>
                </li>
                <li>
                    <a href="inc/student_details.php">Student</a>
                </li>
                <li>
                    <a href="inc/instructor.php">Instructor</a>
                </li>
                <li>
                    <a href="student_details.php">Quiz</a>
                </li>
                <li>
                    <a href="instructor.php">Asignment</a>
                </li>
            </ul>
        </div>

        <div class="rightside">
            <div class="right_content d-flex">
                <div class="card " style="width:18rem;height: 250px;">
                    <div class="card-body">
                        <h4 class="card-title">Total Enroll Course</h4>

                        <h6 class="card-subtitle mb-2 "><?php echo $total_course; ?></h6>

                    </div>
                </div>
                <div class="card" style="width: 18rem;height: 250px;">
                    <div class="card-body">
                        <h4 class="card-title">Total Enroll student</h4>
                        <h6 class="card-subtitle mb-2 "><?php echo $total_student; ?></h6>
                    </div>
                </div>
                <div class="card" style="width: 18rem;height: 250px;">
                    <div class="card-body">
                        <h4 class="card-title">Total Enroll instructor</h4>
                        <h6 class="card-subtitle mb-2 "><?php echo $total_instructor; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
 <?php }
  else{
    header("location:login.php");
  }
  ?>