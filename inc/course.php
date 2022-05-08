<?php
session_start();
include('../db.php');
// Validating Session
if(!isset($_SESSION['email']))
{
header('location:../index.php');
}
else{
?>
<?php

$username=$_SESSION['email'];

    $check="select * from admin where name='$username'";
   $res=mysqli_query($con,$check);
   $row=mysqli_fetch_assoc($res);
?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>course</title>
  </head>
  <style type="text/css">
  	h3{
  		
  		text-align: center;

  	}
  	#cat_form{
  		
  		margin:10px;
  		display: none;

  	}
    #class_selector{
      
      width:100%;
      padding: 5px;
    }
  </style>

  
  <body>

<div class="header sticky-top">
       
      <div class=" welcome container">
          <div >  
            <h4><a href="../index.php">SuccessCurve</a></h4>
          </div>
          <div id="welcome_user">   
            <h4>Welcome to <?php echo $username; ?></h4>
          </div>
          <div class="logoutChangepswd"> 
            <a href="#">Change Password</a>
            <a href="../admin_logout.php">Logout</a>
           </div>        
      </div>
    </div>
    

    <?php include("../admin_sidebar.php"); ?>
      <div class="rightside">
     <div >
  		<h3>Course Details</h3>
  		<button class="btn" onclick="cat_form()" >Add Course</button>
  	</div>
  	<div >
     	<form id="cat_form" method="post" action="" enctype="multipart/form-data">
 

       <div class="form-group" >
          <label >Class Name</label>
        <select  id="class_selector" name="class_name"  required="">
          <option value="" >select class</option>
          <?php 
              
                $output='';
                $get_cat="select * from class";
                $res=mysqli_query($con,$get_cat);
                
                while($row=mysqli_fetch_assoc($res)){ 
                   echo "<option value='".$row['class_id']."'>".$row['class_name']."</option>";
                  
                }

           ?>
        </select>
        </div>               
			 <div class="form-group" >
			    <label >Course Name</label>
			    <input type="text" class="form-control" name="course_name"  required="">
			  </div>
			  <div class="form-group">
			    <label >Course Icon</label>
			    <input type="file" class="form-control" name="image" required="">
			  </div>
			  <div class="form-group">
			    <label >Course Description</label>
			    <input type="text" class="form-control" name="course_desc"  required="">
			  </div>
        <div class="form-group">
          <label >Course level</label>
          <input type="text" class="form-control" name="course_level"  required="">
        </div>
        <div class="form-group">
          <label >Course instructor</label>
          <input type="text" class="form-control" name="course_ins"  required="">
        </div>        
        <div class="form-group">
          <label >Course fee</label>
          <input type="text" class="form-control" name="course_fee"  required="">
        </div>                
			  <center><button type="submit" class="btn btn-primary" name="add_course">Add Course</button></center>
		  </form>
  	</div>
  	<div>
  		<table cellspacing="0" class="table table-responsive">
		<tr>
			<th scope="col">SR No.</th>
			<th scope="col">course ID</th>
      <th scope="col">Class Name</th>
			<th scope="col">course Name</th>
			<th scope="col">course image</th>
      <th scope="col">course desc</th>
      <th scope="col">course level</th>
			<th scope="col">course instructor</th>
      <th scope="col">fee</th>
			<th scope="col">Action</th>
			
		</tr>
  <?php
   
  $get_cat="select * from course inner join class on class.class_id=course.class_id";
  $result=mysqli_query($con,$get_cat);
  $i=1;
  while($row=mysqli_fetch_assoc($result)){ 
    echo"<tr>
            <td>".$i++."</td>
                  <td>".$row['course_id']."</td>
                  <td>".$row['class_name']."</td>
                  <td>".$row['course_name']."</td>
                  <td><img src='../image/".$row['course_icon']."' height='50' width='50'/></td>
                  <td>".$row['course_desc']."</td>
            <td>".$row['course_level']."</td>
            <td>".$row['course_ins']."</td>
            
            <td>".$row['course_fee']."</td>
            <td>
                <a title='Edit' href='course.php?edit_course=".$row['course_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> 
                <a title='Delete' href='course.php?del_course=".$row['course_id']."'><i class='fa fa-trash' aria-hidden='true'></i></a>
            </td>
         
           

       </tr>";
  }

   if(isset($_GET['del_course'])){
    $id=$_GET['del_course'];
    $del="delete  from course where course_id='$id'";
    if(mysqli_query($con,$del)){
      echo "<script>alert('courses delete successfully')</script>";
      echo "<script>window.open('course.php','_self')</script>";
    }else{
      echo "<script>alert('courses not delete successfully')</script>";
      echo "<script>window.open('course.php','_self')</script>";

    }
   } 
    ?>
	</table>
  	</div>
      </div>
              
  </div>

<?php
  if(isset($_POST['add_course'])){
    $name=$_POST['class_name'];

    $course_name=$_POST['course_name']; 
   $course_level=$_POST['course_level'];
    $course_price=$_POST['course_fee'];
    $course_ins=$_POST['course_ins'];
    $course_desc=$_POST['course_desc'];    
    if(isset($_FILES['image']))
    {
      $errors= array();
      // print_r($_FILES);exit;
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];


     $files= explode('.',$file_name);
     $file_ext=strtolower(end($files));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../image/".$file_name);
         // echo "Success";
      }else{
         print_r($errors);
      }
   }
    $check="select * from course where course_name='$course_name' and class_id='$name' ";
    $res=mysqli_query($con,$check);
  
    $count=mysqli_num_rows($res);
  
    if($count==1)
    {
           echo"<script>alert('courses Already Added')</script>";
       echo"<script>window.open('course.php','_self')</script>";
    }
    else{
      $add_course="insert into course
        ( 
        class_id,course_name,course_icon,course_desc,course_level,course_ins,course_fee)
        values
        ( '$name', '$course_name','$file_name','$course_desc','$course_level','$course_ins','$course_price')";
      
    if(mysqli_query($con,$add_course))
    {
      echo"<script>alert('courses added successfully')</script>";
      echo"<script>window.open('course.php','_self')</script>";
    }else{

      echo"<script>alert('course not added successfully')</script>";
      echo"<script>window.open('course.php','_self')</script>";
    }

    }
    
  }

?>



  <script type="text/javascript">

  	    
    function cat_form()
    {
    	var x = document.getElementById("cat_form");
        if(x.style.display === "none")
        x.style.display="block";
        else
        x.style.display="none";
    }
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php }?>