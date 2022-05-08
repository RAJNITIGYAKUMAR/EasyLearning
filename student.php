 <?php
session_start();
include('db.php');
// Validating Session
if(!isset($_SESSION['username']))
{
header('location:index.php');
}
else{
?>

<?php 
$username=$_SESSION['username'];
$check="select * from student where name='$username'";
  $res=mysqli_query($con,$check);
   
    $row=mysqli_fetch_assoc($res);
    $id=$row['student_id'];
    
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>student Panel</title>
    <style type="text/css">
     .container{
      padding: 20px;
     }
     .card{
      margin: 20px;
     }
    </style>
  </head>
  <body>
   
    <div class="header sticky-top">
      <div class=" welcome container-fluid">
          <div >  
            <h4><a href="index.php">SuccessCurve</a></h4>
          </div>
          <div id="welcome_user">  
            <h4>
              Welcome to <?php echo $username; ?>
            </h4>
          </div>
          <div class="logoutChangepswd"> 
            <a href="#">Change Password</a>
            <a href="student_logout.php">Logout</a>
           </div>        
      </div>
    </div>
    <div class="container d-flex justify-content-start flex-wrap">
     <?php
        $get_course="select * from course where student_id=$id ";
        $res=mysqli_query($con,$get_course);      
        while ($row=mysqli_fetch_assoc($res)){                
        echo"
        <div class='card' style='width: 18rem;'>
            <img src='image/".$row['course_icon']."' class='card-img-top' style='height: 12rem; alt='..'>  
             <div class='card-body'>
             <h5 class='card-title'>".$row['course_name']."</h5>
             <a href='course.php?courseid=".$row['course_id']."' class='btn btn-primary'>Start Learning</a> 
             </div>
         </div>";
           }      
    ?>     
    </div>

               
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php } ?>