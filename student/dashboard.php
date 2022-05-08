
<?php
session_start();
include('../db.php');
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
$result=mysqli_query($con,$check);
$row=mysqli_fetch_assoc($result); 
    
?>   


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student Panel</title>
    <style type="text/css">
      *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
         font-family: sans-serif;
      }
      .header{
        color:white;
        background:#4D1933;
         font-family: sans-serif;
      }
      .welcome{
        display: flex;
        padding: 20px;
        justify-content: space-between;
      }
      .logoutChangepswd a{
        font-weight: bold;
        margin:5px 10px;
        text-decoration: none;
        color:white;
         font-family: sans-serif;
      }
  .sidebar{
      width:20%;
      background: #4D1933;
      padding: 5px;
      height:100vh;
      color: white;
      
     
    }
        .sidebar ul li{
        list-style: none;
        padding:4px 0px;
       margin-bottom:3px;
       text-align: center;
        

     }
    .sidebar ul li a{
      border: 2px solid whitesmoke;
      text-decoration: none;
      outline:none;
      display: block;
      color: white;
      font-family: sans-serif;

    }    
    .rightside{
      
      width:100%;
    }
    </style>
  </head>
  <body>
   
    <div class="header">
       
      <div class=" welcome container">
          <div >  
            <h4>Welcome to <?php echo $username; ?></h4>
          </div>
          <div class="logoutChangepswd"> 
            <a href="#">Change Password</a>
            <a href="../student_logout.php">Logout</a>
           </div>        
      </div>
    </div>
    

    <div class="d-flex">
                          <div class="sidebar">
                            <ul>
                              <li>
                                <a href="../index.php">Home</a>
                              </li>
                              <li>
                                <a href="dashboard.php">Dashboard</a>
                              </li>
                             <li>
                              <a href="#">Profile</a>

                              </li>
                             <li>
                                <a href="#">My Courses</a>            
                              </li>
                             <li>
                                <a href="#">Assignment</a>
                              </li>
                             <li>
                                <a href="#">Practice</a>
                              </li>

                            </ul>
                          </div>
                        <div class="rightside ">
                           <div class="d-flex ml-auto">
                                <div class="card  mb-3" style="width:18rem;">
                                  <div class="card-header">Course One</div>
                                  <div class="card-body">
                                    <h5 class="card-title"><a href="#">Read</a></h5>
                                  </div>
                                </div> 
                                <div class="card  mb-3" style="width: 18rem;">
                                  <div class="card-header">Course Two</div>
                                  <div class="card-body">
                                    <h5 class="card-title"><a href="#">Read</a></h5>
                                  </div>
                                </div>                            
                          </div>
                        <div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php } ?>