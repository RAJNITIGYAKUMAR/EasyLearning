<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Learn Here</title>
    <style type="text/css">
      img{
        height:100vh;
        width: 100%;
      } 
      #explore_course{
        
      }
      #explore_class{
        
        
      }
            #explore_subject{
        
        
      }
    </style>
  </head>
  <body >
<?php
include("navbar.php"); ?>
  <div class="justify-" id="explore_course" >

                       <?php
                    $id=$_GET['cat_id'];
                    include("db.php");
                      $get_cat="select * from categories where cat_id=$id ";
                    
                      $result=mysqli_query($con,$get_cat);
                      $row=mysqli_fetch_assoc($result);
                      echo "<h2>".$row['cat_name']."  Courses</h2>";
                      ?>
              
            <div class="d-flex justify-content-around flex-wrap">   
                   <?php
                    $id=$_GET['cat_id'];
                    include("db.php");
                      $get_course="select * from course where cat_id=$id ";
                    
                      $result=mysqli_query($con,$get_course);
                   
                      
                      while ($row=mysqli_fetch_assoc($result)){                
                      echo"
                      <div class='card' style='width: 18rem;'>
                          <img src='image/".$row['course_icon']."' class='card-img-top' style='height: 12rem; alt='..'>  
                           <div class='card-body'>
                           <h5 class='card-title'>".$row['course_name']."</h5>
                           <a href='course.php?courseid=".$row['course_id']."' class='btn btn-primary'>Enroll Now</a> 
                           </div>
                       </div>";
                         }  
                         
                    ?>                     
            </div>
   </div>





<div class=" text-center" >
  <h4 id="copyright" >
  copyright@2022 EasyLearning</h4>
  
</div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>




